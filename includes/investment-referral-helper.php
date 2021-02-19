<?php

class InvestmentReferralHelper
{
	protected $transaction;
	public function __construct(Transaction $transaction)
	{
		$this->transaction = $transaction;
 	}

 	public function addToken($action='refer_by') {
		if($this->getWhoRefer() == false) return false;

		$actions = ['refer_to']; 
		if(!in_array($action, $actions)) return false;

        return $this->addReferralBonuses($this->transaction->user);
 	}

 	public function calculate($level = null) {
        if (!empty($level)) {
            $amount = $this->calcAmount($level);
            return ($amount > 0) ? floor($amount) : 0;
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

    /* @function createTransaction()  @version v1.1  @since 1.0.3 */
	protected function createTransaction($level, $user_id, $prev_user=null) {
		
        $token = $this->calculate($level);
        $unsold = IcoStage::get_stages($this->transaction->stage)->unsold;

        if($token < 1) return false;
        if($token > $unsold) return false;

        $tc = new TC();
        $transaction = null;
        $stage = $this->transaction->stage;
        $currency = $this->transaction->currency;
        $currency_rate = $this->transaction->currency_rate;
        $base_currency = $this->transaction->base_currency;
        $base_currency_rate = $this->transaction->base_currency_rate;
        $token_add = round($token, min_decimal());
        $token_price = round($tc->calc_token($token, 'price')->$currency, max_decimal());
        $zero_level = ($level=='lv0'||$level=='level0') ? true : false;

        $save_data = [
            'created_at' => now()->toDateTimeString(),
            'tnx_id' => set_id(rand(100, 999), 'trnx'),
            'tnx_type' => ($zero_level==true) ? 'bonus' : 'referral',
            'tnx_time' => now()->toDateTimeString(),
            'tokens' => $token_add,
            'bonus_on_base' => 0,
            'bonus_on_token' => 0,
            'total_bonus' => 0,
            'total_tokens' => $token_add,
            'stage' => $stage,
            'user' => $user_id,
            'amount' => $token_price,
            'base_amount' => 0,
            'base_currency' => $base_currency,
            'base_currency_rate' => $base_currency_rate,
            'currency' => $currency,
            'currency_rate' => $currency_rate,
            'receive_currency' => null,
            'all_currency_rate' => null,
            'payment_method' => 'system',
            'payment_to' => '',
            'added_by' => set_added_by('00'),
            'checked_by' => json_encode(['name' => 'System', 'id' => '0']),
            'checked_time' => now()->toDateTimeString(),
            'details' => ($zero_level==true) ? 'Bonus Token for Referral Join' : 'Referral Bonus on Token Purchase',
            'extra' => json_encode($this->getBonusMeta($level, $user_id, $prev_user)),
            'status' => 'new',
        ];

        // $transaction = (object) $save_data;
        $iid = Transaction::insertGetId($save_data);
        if ($iid != null) {
            $transaction = Transaction::where('id', $iid)->first();
            $transaction->tnx_id = set_id($iid, 'trnx');
            $transaction->status = 'approved';
            $transaction->save();

            IcoStage::token_add_to_account($transaction, 'add');
            IcoStage::token_add_to_account($transaction, null, 'add');
        } else {
            Transaction::where('id', $iid)->delete();
        }
        return $transaction;
	}

    protected function addReferralBonuses($user_id) {
        $return = []; 
        $referrals = $this->getSettings('all');
        $prev_user = $refer_by = $is_allowed = null;

        foreach ($referrals as $ref) {
            $TNX = null;
            $level = 'lv'.$ref->level;
        
            if(!empty($user_id)) {
                $is_allowed = $this->isBonusAllow($level, $user_id);
                
                $refer_user = $this->getWhoRefer($user_id) ?? null;
                $refer_by   = (isset($refer_user->id)) ? $refer_user->id : false;

                if($is_allowed==true) {
                    $TNX = $this->createTransaction($level, $user_id, $prev_user);
                    if(!empty($TNX)) {
                        $user_token = (double)(($TNX->user==$this->transaction->user) ? $TNX->total_tokens : 0);
                        $refer_token = (double)(($TNX->user==$this->transaction->user) ? 0 : $TNX->total_tokens);

                        if($refer_by==false) {
                            $refAcc = Referral::where(['user_id' => $TNX->user])->first(); 
                            $user_bonus = (isset($refAcc->user_bonus) ? ((double)$refAcc->user_bonus + $user_token) : $user_token);
                            $refer_bonus = (isset($refAcc->refer_bonus) ? ((double)$refAcc->refer_bonus + $refer_token) : $refer_token);
                            $updateRef = Referral::updateOrCreate(
                                ['user_id' => $TNX->user], 
                                ['user_bonus' => $user_bonus, 'refer_bonus' => $refer_bonus]
                            );
                            if($updateRef->refer_by==null) {
                                $updateRef->refer_by = 0;
                                $updateRef->save();
                            }
                        } else {
                            $refAcc = Referral::where(['user_id' => $TNX->user, 'refer_by' => $refer_by])->first();
                            $user_bonus = (isset($refAcc->user_bonus) ? ((double)$refAcc->user_bonus + $user_token) : $user_token);
                            $refer_bonus = (isset($refAcc->refer_bonus) ? ((double)$refAcc->refer_bonus + $refer_token) : $refer_token);
                            Referral::updateOrCreate(
                                ['user_id' => $TNX->user, 'refer_by' => $refer_by], 
                                ['user_bonus' => $user_bonus, 'refer_bonus' => $refer_bonus]
                            );
                        }
                    }
                }
            }

            $return[] = ['level' => $ref->level, 'user' => $user_id, 'allowed' => $is_allowed, 'token' => ($TNX->total_tokens ?? 0), 'prev' => ($prev_user ?? 0), 'next' => $refer_by, 'status' => (($TNX) ? true : false), 'tranx' => ($TNX ?? null)];
            $prev_user = $user_id; $user_id = $refer_by;
            if(empty($refer_by)) break;
        }

        return $return ?? null;
    }

	protected function getWhoRefer($user_id=null) {
        $refer = false;
        $user = (empty($user_id)) ? $this->transaction->user : $user_id;
        $get_user = User::where('id', $user)->select(['id', 'name', 'email', 'tokenBalance', 'referral'])->first();
    
        if(!empty($get_user->referral) && (!$get_user->referee == null)){
            $refer = $get_user->referee ?? User::find($get_user->referral);
        }
		return (!empty($refer)) ? $refer : false;
	}

    protected function countTnx($user_id=null, $level='lv1') {
        $user = (empty($user_id)) ? $this->transaction->user : $user_id;
        $lv = (int) str_replace(['level', 'lv'], '', $level);

        $get_tnx = Transaction::where(['user' => $user, 'status' => 'approved'])->get();
        $count = ($lv >= 1) ? $get_tnx->where('tnx_type', 'referral')->sum('total_tokens') : $get_tnx->where('tnx_type', 'purchase')->count();

        return $count ?? 0;
    }

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
            $tokens = $this->transaction->tokens;
            return ($tokens * $amount / 100);
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
                'allow' => $this->isAllow($level),
                'count' => $this->countTnx($user_id, $level),
                'tokens' => $this->transaction->tokens,
                'tnx_by' => $this->transaction->user,
                'tnx_id' => $this->transaction->tnx_id,
            ];
        }

        return $return;
    }

    public function getSettings($for='lv1', $out=null) {
        $settings = [
            'lv0' => (object) [
                'level' => 0,
                'allow' => get_setting('referral_allow_join', 'all_time'),
                'calc' => get_setting('referral_calc_join', 'percent'),
                'bonus' => (float) get_setting('referral_bonus_join', 0)
            ],
            'lv1' => (object) [
                'level' => 1,
                'allow' => get_setting('referral_allow', 'all_time'),
                'calc' => get_setting('referral_calc', 'percent'),
                'bonus' => (float) get_setting('referral_bonus', 0)
            ]
        ];
        if(!empty($this->getAdvanced())) {
            $settings = array_merge($settings, $this->getAdvanced());
        }

        if($for=='all') return ($out=='levels') ? count($settings) : $settings;

        $level      = (!empty($for)) ? 'lv'.str_replace(['level', 'lv'], '', $for) : 'lv1';
        $level_set  = (isset($settings[$level])) ? $settings[$level] : null;

        if($out=='all') return $level_set;
        if(empty($out)) return false;

        if(in_array($out, ['level', 'allow', 'calc', 'bonus'])) {
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
            $extend = json_decode( gws('referral_extend_bonus'), TRUE);
            if(!empty($extend) && is_array($extend)) {
                foreach ($extend as $lv => $data) {
                    $lv_n = (int) str_replace('l', '', $lv);
                    $level = ($lv_n+1);
                    $calc = $data['type'] ?? 'percent'; 
                    $allow = $data['allow'] ?? '1'; 
                    $bonus = $data['amount'] ?? 0;

                    $return['lv'.$level] = (object) [ 
                        'level' => $level, 
                        'allow' => $allow, 
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