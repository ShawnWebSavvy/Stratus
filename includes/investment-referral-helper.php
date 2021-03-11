<?php

class InvestmentReferralHelper
{
	protected $transaction;
    protected $referralSeting;
    public function __construct($transaction)
	{   


        global $db, $system;
        $this->transaction = $transaction;
        // echo '<pre>'; print_r($referral); die;
        $referral  =  httpGetCurl('investment/get_referral_setting/'.$transaction->token_name.'_usdt',$system['investment_api_base_url']);
        if (!isset($referral['referral_calc'])) {
            throw new Exception(__("Something Went Wrong!! Please try again"));
        }
        // echo '<pre>'; print_r($referral); die;
        
        $this->referralSeting = $referral;
 	}

 	public function addToken($action='refer_by') {
		if($this->getWhoRefer($this->transaction->user_id) == false) return false;

        $actions = ['refer_by']; 
    
		if(!in_array($action, $actions)) return false;
       
        return $this->addReferralBonuses($this->transaction->user_id);
 	}

 	public function calculate($level = null) {
        if (!empty($level)) {
            $amount = $this->calcAmount($level);
            return ($amount > 0) ? $amount : 0;
        }
		return 0;
    }
    
    // public static function getLists($user_id, $level=10, $out='full') {
    //     $full = $only = [];
    //     $user = $user_id;
    //     for($lv=0; $lv <= $level; $lv++) {
    //         if(!empty($user_id)) {
    //             $get_user = User::where('id', $user_id)->select(['id', 'name', 'referral'])->first();
    //             $refer_by   = $get_user->referral ?? false;
                
    //             if($lv > 0) {
    //                 $only[] = $get_user->id;
    //                 $full[$get_user->id] = ['level' => $lv, 'name' => $get_user->name, 'refer' => $get_user->referral ?? 0];
    //             }
    //         }

    //         if(empty($refer_by)) break;
    //         $user_id = $refer_by;
    //     }
    //     $return[$user] = ($out=='only'||$out=='id') ? $only : $full;
    //     return $return;
    // }
    
    public function calculateCustomBonusAmount($detail) {

        if (!empty($detail)) {
            if($detail['type']=='percent') {
                $token_amount = $this->transaction->amount;
                $amount = $detail['amount'];
                return ($token_amount * $amount / 100);
            } else {
                return $amount;
            }
            return ($amount > 0) ? $amount : 0;
        }
		return 0;
    }

    /* @function createTransaction()  @version v1.1  @since 1.0.3 */
	protected function createTransaction($level, $user_id, $prev_user=null) {
        global $db, $system;
     
        $amount = $this->calculate($level);
     
        if($amount < 0 || $amount == 0){
            return false;
        }

        $custom_bonus = $db->query(sprintf("SELECT * FROM user_custom_referrals where user_id=$user_id")) or _error("SQL_ERROR_THROWEN"); 
        if ($custom_bonus->num_rows > 0 && $amount>0) {
            
            $custom_bonus = $custom_bonus->fetch_assoc();
            $COINS = json_decode($custom_bonus['referral'],true);
            $key = array_search($this->transaction->token_name.'_usdt', array_column($COINS,'coin'));
            $COINS = $COINS[$key];
            
            if(!empty($COINS)&&$COINS['coin']==$this->transaction->token_name.'_usdt'){
                
                $customAmount = $this->calculateCustomBonusAmount($COINS);
              
                if($customAmount>$amount){
                    
                    $amount = $customAmount;
                    
                    $extra = $this->getCustomBonusMeta($COINS, $user_id, $prev_user);
                   
                }else{
                    $extra = $this->getBonusMeta($level, $user_id, $prev_user);
                }
            
            }else{
                $extra = $this->getBonusMeta($level, $user_id, $prev_user);
            }
           

        }else{
            $extra = $this->getBonusMeta($level, $user_id, $prev_user);
        }

        

        try{    
            $transaction = null;
            $zero_level = ($level=='lv0'||$level=='level0') ? true : false;
            $order_id = rand(100, 9999);
         
            $base_currency = 'usd';
            $currency = NULL;
            $tnx_type = ($zero_level==true) ? 'bonus' : 'referral';
            $extra = json_encode($extra);
            $details = ($zero_level==true) ? 'Bonus Token for Referral Join' : 'Referral Bonus on Token Purchase';
           
            $check_exist = $db->query(sprintf("SELECT * FROM investment_transactions WHERE user_id = $user_id and tnx_type='referral' and json_contains(extra,'$extra')")) or _error("SQL_ERROR_THROWEN");
         
            if ($check_exist->num_rows == 0) {
                $db->query(sprintf("INSERT INTO investment_transactions (user_id, order_id, base_currency, tnx_type ,amount, receive_amount, details, extra, status) VALUES ('{$user_id}','{$order_id}', '{$base_currency}','{$tnx_type}','{$amount}','{$amount}', '{$details}','{$extra}', 'completed')")) or _error("SQL_ERROR_THROWEN");
                $investment_id = $db->insert_id;
                if($investment_id){
                    // die($db->insert_id.'enter');
                    $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, investment_id, node_type, node_id, amount, type, date,paymentMode) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($user_id, 'int'), secure($investment_id), secure('investment_referral_bonus'), secure(0, 'int'), secure($amount), secure('in'), secure(date('Y-m-d h:i:m')), secure('wallet'))) or _error("SQL_ERROR_THROWEN");
                    $db->query(sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + $amount, refer_bonus = refer_bonus + $amount WHERE user_id = $user_id")) or _error("SQL_ERROR_THROWEN");
                    $transaction =  $db->query(sprintf("SELECT * from investment_transactions WHERE id = %s",secure($investment_id))) or _error("SQL_ERROR_THROWEN");
                    if ($transaction->num_rows > 0) {
                        $order_id = sprintf('%06s', $investment_id);
                        $db->query(sprintf("UPDATE investment_transactions SET order_id = %s WHERE id = %s", secure($order_id),  secure($investment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                        // $transaction =  (object)$transaction->fetch_assoc();
                        // $transaction->order_id = $order_id;
                    }
                }else{
                    $db->query(sprintf('DELETE from investment_transactions WHERE id = $investment_id'));
                }      
            }
            
            return $transaction;
        }catch(Exception $e){
         
        }
       
	}

    protected function addReferralBonuses($user_id) {
        $return = [];
        $referrals = $this->getSettings('all');
        $prev_user = $refer_by = null;
        // echo '<pre>'; print_r($referrals); die;
        $refer = [];
        foreach ($referrals as $key=>$ref) {
            $TNX = null;
            $level = 'lv'.$ref->level;
            // die($level);
            if(!empty($user_id)) {
                
                $refer_user = $this->getWhoRefer($user_id) ?? null;
                $refer[$key] = $refer_user;
                $refer_by   = (isset($refer_user)) ? $refer_user : false;
                // echo'<pre>'; print_r($refer_by); die;
                if($level!='lv0'){
                    $TNX = $this->createTransaction($level, $user_id, $prev_user);
                }            
            }

            $return[] = ['level' => $ref->level, 'user_id' => $user_id, 'prev' => ($prev_user ?? 0), 'next' => $refer_by];
            $prev_user = $user_id; $user_id = $refer_by;
            if(empty($refer_by)) break;
        }

        return $return ?? null;
    }

	protected function getWhoRefer($user_id=null) {
        global $db,$system;   
        $refer = false;
        $user_id = (empty($user_id)) ? $this->transaction->user_id : $user_id;
        // $get_user = User::where('id', $user)->select(['id', 'name', 'email', 'tokenBalance', 'referral'])->first();
        $get_user = $db->query(sprintf("SELECT * from  users WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_user->num_rows == 0) {
            return false;
        }
        $get_user =  $get_user->fetch_assoc();

        if(!empty($get_user['user_referrer_id']) && (!$get_user['user_referrer_id'] == null)){
            $refer = $get_user['user_referrer_id'] ?$get_user['user_referrer_id']:'';
        }

		return (!empty($refer)) ? $refer : false;
	}

    // protected function countTnx($user_id=null, $level='lv1') {
    //     $user = (empty($user_id)) ? $this->transaction->user_id : $user_id;
    //     $lv = (int) str_replace(['level', 'lv'], '', $level);

    //     $get_tnx = Transaction::where(['user' => $user, 'status' => 'approved'])->get();
    //     $count = ($lv >= 1) ? $get_tnx->where('tnx_type', 'referral')->sum('total_tokens') : $get_tnx->where('tnx_type', 'purchase')->count();

    //     return $count ?? 0;
    // }

    protected function isAllow($level='lv1') {
        $allow = $this->getSettings($level, 'allow');
        return ($allow && $allow=='all_time') ? -1 : (int) $allow;
    }

    protected function isBonusAllow($level='lv1', $user_id=null) {
        if(empty($user_id)) return false;

        $allow = $this->isAllow($level);
        if ($allow === -1) {
            return true;
        } else {
            if($this->countTnx($user_id, $level) >= $allow) {
                return false;
            }
            return true;
        }
    }

    protected function getType($level='lv1', $compare=null) {
        $calc = $this->getSettings($level, 'calc');
    	if($compare!=null){
    		return ($calc == $compare) ? true : false;
    	} 
    	return $calc;
    }

    private function getAmount($level='lv1') : float {
        $percent = $this->getType($level, 'percent');
        $bonus = $this->getSettings($level, 'bonus');
       
        $amount = ($percent && $bonus > 100) ? 100 : $bonus;
        return abs($amount);
    }

    protected function calcAmount($level='lv1') {
        $percent = $this->getType($level, 'percent');
        $amount = $this->getAmount($level);
        if($percent==true) {
            $token_amount = $this->transaction->amount;
            return ($token_amount * $amount / 100);
        } else {
            return $amount;
        }
    }

    public function getBonusMeta($level='lv1', $user_id=null, $prev_user=null) {
        $bonus  = $this->getAmount($level);
        $calc   = $this->getType($level);
        $joined = ($level=='lv0'||$level=='level0') ? true : false;
        $refer  = $this->getWhoRefer($user_id)->id ?? 0;
        $whois  = $prev_user ?? $refer;

        $return = [];
        if($bonus > 0) {
            $return = [
                'level' => str_replace('lv', 'level', $level),
                'bonus' => $bonus,
                'calc'  => $calc,
                'who'   => $whois,
                'type'  => ($joined) ? 'join' : 'invite',
                // 'allow' => $this->isAllow($level),
                // 'count' => $this->countTnx($user_id, $level),
                'amount' => $this->transaction->amount,
                'tnx_by' => $this->transaction->user_id,
                'order_id' => $this->transaction->order_id,
            ];
        }

        return $return;
    }

    public function getCustomBonusMeta($detail, $user_id=null, $prev_user=null) {
      
        $bonus  = $detail['amount'];
        $calc   = $detail['type'];
        $refer  = $this->getWhoRefer($user_id)->id ?? 0;
        $whois  = $prev_user ?? $refer;

        $return = [];
        if($bonus > 0) {
            $return = [
                'level' => 'custom bonus',
                'bonus' => $bonus,
                'calc'  => $calc,
                'who'   => $whois,
                'type'  => 'invite',
                'amount' => $this->transaction->amount,
                'tnx_by' => $this->transaction->user_id,
                'order_id' => $this->transaction->order_id,
            ];
        }

        return $return;
    }

    public function getSettings($for='lv1', $out=null) {
       
        $settings = [
            'lv0' => (object) [
                'level' => 0,
                'calc' => 'percent',
                'bonus' => 0
            ],
            'lv1' => (object) [
                'level' => 1,
                // 'allow' => get_setting('referral_allow', 'all_time'),
                'calc' => $this->referralSeting['referral_calc'],
                'bonus' => (float) $this->referralSeting['referral_bonus']
            ]

            
        ];
        if(!empty($this->getAdvanced())) {
            $settings = array_merge($settings, $this->getAdvanced());
        }
        // echo'<pre>'; print_r($settings); die;

        if($for=='all') return ($out=='levels') ? count($settings) : $settings;

        $level      = (!empty($for)) ? 'lv'.str_replace(['level', 'lv'], '', $for) : 'lv1';
        $level_set  = (isset($settings[$level])) ? $settings[$level] : null;

        if($out=='all') return $level_set;
        if(empty($out)) return false;

        if(in_array($out, ['level', 'calc', 'bonus'])) {
            return (isset($level_set->$out)) ? $level_set->$out : false;
        }

        return false;
    }

    // public static function getSteps($who='refer') {
    //     $steps = [
    //         'join' => [1, 2, 3, 4, 5, 10],
    //         'refer' => [5000, 10000, 25000, 50000, 75000, 100000, 250000, 500000, 1000000, 5000000, 10000000, 100000000]
    //     ];

    //     return (isset($steps[$who])) ? $steps[$who] : $steps['refer'];
    // }

    public function getAdvanced() {
        $return = [];

        $advanced = true;
        if($advanced) {
            $extend = json_decode( $this->referralSeting['referral_extend_bonus'], TRUE);
            if(!empty($extend) && is_array($extend)) {
                foreach ($extend as $lv => $data) {
                    $lv_n = (int) str_replace('l', '', $lv);
                    $level = ($lv_n+1);
                    $calc = $data['type'] ?? 'percent'; 
                    $bonus = $data['amount'] ?? 0;

                    $return['lv'.$level] = (object) [ 
                        'level' => $level, 
                        // 'allow' => $allow, 
                        'calc' => $calc, 
                        'bonus' => (float) $bonus
                    ];
                }
            }
        }

        return ($return) ? $return : [];
    }

    // public static function general_option() {
    //     $settings = (object) [
    //         'steps_join' => self::getSteps('join'),
    //         'steps_refer' => self::getSteps('refer')
    //     ];
    //     return ($settings) ? $settings : false;
    // }

    public static function advanced_option($referral_extend_bonus) {
    
        $settings = []; 
        $default = json_encode(['l1' => ['type' => 'percent', 'amount' => 0]]);
        $have_key = 1;
        $levels = ((int)$have_key * 3) + 1;
        $data   = json_decode($referral_extend_bonus, TRUE);
        // echo '<pre>'; print_r($data);die;
        $data = empty($data)?$default:$data;
        $settings = (object) [
            'valid' => (int)$have_key,
            'levels' => $levels,
            'keys' => 'referral_extend_bonus',
            // 'steps' => self::getSteps('refer'),
            'options' => self::level_option($levels, $data)
        ];
        return ($settings) ? $settings : false;
    }
    public static function level_option($level, $value=null){
        $level_data = [];
        if(!empty($level)) {
            for($i=1; $i <= $level; $i++) {
                $level_data['level'.$i] = [
                    'id' => $i,
                    // 'allow' => (isset($value['l'.$i]['allow'])) ? $value['l'.$i]['allow'] : 'all_time',
                    'type' => (isset($value['l'.$i]['type'])) ? $value['l'.$i]['type'] : 'percent',
                    'amount' => (isset($value['l'.$i]['amount'])) ? $value['l'.$i]['amount'] : 0,
                    'title' => 'Level #'.($i+1),
                ];
            }
        }
        return $level_data;
    }
}