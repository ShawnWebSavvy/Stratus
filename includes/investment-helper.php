<?php
/**
 * class -> investment
 * 
 */

class InvestmentHelper {
    public function __construct()
    {
        global $db, $system;
    }
     
/**
 * get_ticker_price
 *
 * @param string $username_email
 * @param string $password
 * @param boolean $remember
 *
 * @return void
 */
    public static function get_ticker_price($token)
    {   
        global $system;
        $token_price  =  httpGetCurl('investment/get_ticker/'.$token.'_USDT',$system['investment_api_base_url']);
        if (!isset($token_price['data'])) {
            throw new Exception(__("Something Went Wrong!! Please try again"));
        }
        return $token_price;
    }
    public static function get_all_token_price()
    {   global $db,$system;
        $tokens = $db->query("SELECT * FROM investment_coins") or _error("SQL_ERROR_THROWEN");
        $return = [];
        if ($tokens->num_rows > 0) {
            $i = 0;
            while ($token = $tokens->fetch_assoc()) {
                $id = $token['id'];
                $return['token'][$i]['id']=$token['id'];
                $return['token'][$i]['buy_price']=$token['buy_price'];
                $return['token'][$i]['sell_price']=$token['sell_price'];
                $return['token'][$i]['name']=$token['name'];
                $return['token'][$i]['short_name']=$token['short_name'];
                $return['buy'][$token['short_name']] = $token['buy_price'];
                $return['sell'][$token['short_name']] = $token['sell_price'];
                $i++;
                
            }
        }
        return $return;
    }
    public static function update_all_token_price()
    {   global $db,$system;
        $tokens = $db->query("SELECT * FROM investment_coins") or _error("SQL_ERROR_THROWEN");
        $return = [];
        if ($tokens->num_rows > 0) {
            $i = 0;
            while ($token = $tokens->fetch_assoc()) {
                $id = $token['id'];
                $token_price  =  httpGetCurl('investment/get_ticker/'.$token['trade_pair'],$system['investment_api_base_url']);
                $buy_price = round(($token_price['data']['buy_price']),3);
                $sell_price = round(($token_price['data']['sell_price']),3);
                $fluctuation = $token_price['fluctuation'];
                $db->query("UPDATE investment_coins SET buy_price = '$buy_price', sell_price = '$sell_price', fluctuation = '$fluctuation' WHERE id='$id'") or _error("SQL_ERROR_THROWEN");
                $return['buy'][$token['short_name']] = $buy_price;
                $return['sell'][$token['short_name']] = $sell_price;
                $return['fluctuation'] = $fluctuation;
                $i++;
                
            }
        }
        return $return;
    }

    public static function buy_order($params){
        global $db,$system;
        $result  =  httpPostCurl('investment/place_order/',$system['investment_api_base_url'],$params);
        return $result;
    }
        
    public static function savePurchaseTokenOrder($action,$token_name,$token_value,$amount,$user_data){
        global $db,$system;   
        try{
            $params['symbol'] = strtoupper($_POST['token_name']).'_USDT';
            $params['side'] = 'buy'; 
            $token_price = self::get_ticker_price(strtoupper($token_name));
            $token_value=round($amount/$token_price['data']['buy_price'], 5);
            $fees = 1;
            $fees_token = round($token_value*$fees/100,5);
            $receive_token = round($token_value-$fees_token,5);
            $params['size'] = $receive_token;
            // $result = InvestmentHelper::buy_order($params);
            $order_id = "435345";
            // if(isset($result['data']['data']['order_id'])){
            if(isset($order_id)){
                $db->query(sprintf("INSERT INTO investment_transactions (user_id, order_id, tokens, currency, tnx_type ,amount, receive_amount, recieve_token, fees, status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", secure($user_data['user_id'], 'int'), secure($order_id), secure($token_value), secure($token_name), secure($action),secure($amount),secure($amount), secure($receive_token), secure($fees), secure('completed') )) or _error("SQL_ERROR_THROWEN");
                $investment_id = $db->insert_id;
                if($investment_id){
                    // die($db->insert_id.'enter');
                    $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, investment_id, node_type, node_id, amount, type, date,paymentMode) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($user_data['user_id'], 'int'), secure($investment_id), secure('purchase_coin'), secure(0, 'int'), secure($amount), secure('out'), secure(date('Y-m-d h:i:m')), secure('wallet'))) or _error("SQL_ERROR_THROWEN");
                    $db->query(sprintf('UPDATE users SET user_wallet_balance = IF(user_wallet_balance-%1$s<=0,0,user_wallet_balance-%1$s) WHERE user_id = %2$s', secure($amount), secure($user_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    $wallet_name =$token_name.'_wallet';
                    // die($receive_token);
                    $db->query(sprintf("UPDATE users SET $wallet_name = $wallet_name + %s WHERE user_id = %s", secure($receive_token), secure($user_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                return true;
                // echo '<pre>'; print_r($save); die;
            }else{
                return false;
            }
            
        }catch(Exception $e){
            // echo '<pre>'; print_r($e); die;
            return $false;
        }
        
    }

    public static function saveSellTokenOrder($action,$token_name,$token_value,$amount,$user_data){
        global $db,$system;   
        try{
            $params['symbol'] = strtoupper($_POST['token_name']).'_USDT';
            $params['side'] = 'sell'; 
            $params['size'] = $token_value;
            $token_price = self::get_ticker_price(strtoupper($token_name));
            $amount=round(($token_value*$token_price['data']['sell_price']), 2);
            $fees = 1;
            $fees_amount = round($amount*$fees/100,5);
            $receive_amount = round($amount-$fees_amount,2);
            // die($token_value);
            // $result = InvestmentHelper::buy_order($params);
            $order_id = "435345";
            // if(isset($result['data']['data']['order_id'])){
            if(isset($order_id)){
                $db->query(sprintf("INSERT INTO investment_transactions (user_id, order_id, tokens, currency, tnx_type ,amount, receive_amount, recieve_token, fees, status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", secure($user_data['user_id'], 'int'), secure($order_id), secure($token_value), secure($token_name), secure($action),secure($amount),secure($receive_amount), secure($token_value), secure($fees), secure('completed') )) or _error("SQL_ERROR_THROWEN");
                $investment_id = $db->insert_id;
                if($investment_id){
                    // die($db->insert_id.'enter');
                    $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, investment_id, node_type, node_id, amount, type, date,paymentMode) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($user_data['user_id'], 'int'), secure($investment_id), secure('purchase_coin'), secure(0, 'int'), secure($receive_amount), secure('in'), secure(date('Y-m-d h:i:m')), secure('wallet'))) or _error("SQL_ERROR_THROWEN");
                    $db->query(sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($receive_amount), secure($user_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    $wallet_name =$token_name.'_wallet';
                    // die($wallet_name);
                    $db->query(sprintf("UPDATE users SET $wallet_name = $wallet_name - %s WHERE user_id = %s", secure($token_value), secure($user_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                return true;
                // echo '<pre>'; print_r($save); die;
            }else{
                return false;
            }
            
        }catch(Exception $e){
            // echo '<pre>'; print_r($e); die;
            return $false;
        }
        
    }

    public static function getAllActiveTokens(){
        global $db,$system;
        $tokens = $db->query("SELECT * FROM investment_coins") or _error("SQL_ERROR_THROWEN");
        $return = [];
        if ($tokens->num_rows > 0) {
            while ($token = $tokens->fetch_assoc()) {
                $token['wallet_name'] = $token['short_name'].'_wallet';
                $return[] = $token;
                
            }
        }
        return $return;
    }

    public static function getAdminExchangeDetail($api_suffix)
    {   
        global $system;
        $details  =  httpGetCurl($api_suffix,$system['investment_api_base_url']);
      
        if (!isset($details['data'])) {
            throw new Exception(__("Something Went Wrong!! Please try again"));
        }
        return $details['data']['list'];
    }

    public static function getAdminTickerPrice($url)
    {   
        global $system;
        $token_price  =  httpGetCurl($url,$system['investment_api_base_url']);
        if (!isset($token_price['data'])) {
            throw new Exception(__("Something Went Wrong!! Please try again"));
        }
        return $token_price['data']['price'];
    }

    public static function getAdminSettingDetail($api_suffix,$params)
    {   
        global $system;
        $details  =  httpPostCurl($api_suffix,$system['investment_api_base_url'],$params);
        
        // echo '<pre>'; print_r($details); die;
        if (!isset($details['data'])) {
            throw new Exception(__("Something Went Wrong!! Please try again"));
        }
        return $details['data'];
    }

    public static function getDashboardDate($user_data){
         global $db,$system;
        $tokens = $db->query("SELECT * FROM investment_coins") or _error("SQL_ERROR_THROWEN");
        $return = [];
        $i =0;
        if ($tokens->num_rows > 0) {
            while ($token = $tokens->fetch_assoc()) {
                $token['wallet_name'] = $token['short_name'].'_wallet';
                $details  =  httpGetCurl('investment/get_kline_data/'.strtoupper($token['short_name']).'_USDT',$system['investment_api_base_url']);
                      
        // echo '<pre>'; print_r($details); die;
                $return['graph'][$token['short_name'].'_kline_data'] =  array_map(function ($ar) {return (double)$ar['close'];}, $details['data']);
                $return['series'][$i] = $user_data[$token['short_name'].'_wallet'];
                $return['total_coin'] = $return['total_coin']+$return['series'][$i];
                $return['labels'][$i] = strtoupper($token['short_name']);
                $return['token_data'][$i] = $token;
                $i++;
                
            }
            if($return['total_coin']>0){
                foreach($return['series'] as $key=>$item){
                    $return['series'][$key] = round($item*100/$return['total_coin'],2);
                }
            }
           
            // echo '<pre>'; print_r($return); die;
        }
        
        return $return;
   
    }

    // public static function getBtcBlance($user_data){
    //     $total_btc = $user_data['btc_wallet'];
    //     $total_apl = $user_data['apl_wallet'];
    //     $total_eth = $user_data['eth_wallet'];
    //     $apl_price =  $total_apl>0?self::get_ticker_price('APL'):0;
    //     $apl_price = $total_apl>0?$apl_price['buy_price']:0;
    //     $eth_price =  $total_eth>0?self::get_ticker_price('ETH'):0;
    //     $eth_price = $total_eth>0?$eth_price['buy_price']:0;
    //     // $eth_price =  $total_eth>0?self::get_ticker_price('ETH_USDT'):0;   
    //      echo '<pre>'; print_r($eth_price); die;
    // }
}