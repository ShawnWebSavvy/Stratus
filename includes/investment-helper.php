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
    public static function get_all_token_price($user_data=null)
    {   global $db,$system;
        $return = [];
        $tokens  =  httpGetCurl('investment/get_tickers',$system['investment_api_base_url']);
        if(!empty($tokens)){
            foreach($tokens['data'] as $i=>$token){
                $return['token'][$i]['buy_price']=$token['buy_price'];
                $return['token'][$i]['sell_price']=$token['sell_price'];
                $return['token'][$i]['total_wallet_quote_amount'] = self::convertBaseToQuoteCurrency($token['buy_price'],$user_data[$token['short_name'].'_wallet']);
                $return['token'][$i]['name']=$token['name'];
                $return['token'][$i]['short_name']=$token['short_name'];
                $return['buy'][$token['short_name']] = round($token['buy_price'],5);
                $return['sell'][$token['short_name']] = round($token['sell_price'],5);
                $return['order'][$token['short_name']]['min_buy_amount'] = $token['min_buy_amount'];
                $return['order'][$token['short_name']]['min_sell_amount'] = $token['min_sell_amount'];
                $return['order'][$token['short_name']]['base_max_size'] = $token['base_max_size'];
                if(!empty($user_data)){
                    $return['wallet_amount']['balance'][$token['short_name']]=$user_data[$token['short_name'].'_wallet'];
                }
            }
        }
       
        return $return;
    }
    public static function update_all_token_price($user_data=null)
    {   global $db,$system;
        $return = [];
        $tokens  =  httpGetCurl('investment/get_tickers',$system['investment_api_base_url']);
        foreach($tokens['data'] as $i=>$token){
            $return['token'][$i]['buy_price']=$token['buy_price'];
            $return['token'][$i]['sell_price']=$token['sell_price'];
            $return['token'][$i]['name']=$token['name'];
            $return['token'][$i]['short_name']=$token['short_name'];
            $return['buy'][$token['short_name']] = round($token['buy_price'],5);
            $return['sell'][$token['short_name']] = round($token['sell_price'],5);
            $return['wallet'][$token['short_name']] = round($user_data[$token['short_name'].'_wallet'],5);
            if(!empty($user_data)){
                $return['wallet_amount']['balance'][$token['short_name']]=$user_data[$token['short_name'].'_wallet'];
            }
        }
        return $return;
    }

    public static function buySellOrder($params){
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
            $fees        = $token_price['data']['buy_fees'];
            $fees_token = round($token_value*$fees/100,5);
            $receive_token = round($token_value-$fees_token,5);
            $params['size'] = $receive_token;
            $result = InvestmentHelper::buySellOrder($params);
            if(isset($result['data']['data']['order_id'])){
                $order_id = $result['data']['data']['order_id'];

                $db->query(sprintf("INSERT INTO investment_transactions (user_id, order_id, base_currency, tokens, currency, tnx_type ,amount, receive_amount, recieve_token, fees, status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", secure($user_data['user_id'], 'int'),secure($order_id),secure('usd'), secure($token_value), secure($token_name), secure($action),secure($amount),secure($amount), secure($receive_token), secure($fees), secure('completed') )) or _error("SQL_ERROR_THROWEN");
                $investment_id = $db->insert_id;
          
                if($investment_id){
                   
                    $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, investment_id, node_type, node_id, amount, type, date,paymentMode) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($user_data['user_id'], 'int'), secure($investment_id), secure('purchase_coin'), secure(0, 'int'), secure($amount), secure('out'), secure(date('Y-m-d h:i:m')), secure('usd_wallet_balance'))) or _error("SQL_ERROR_THROWEN");
                    $db->query(sprintf('UPDATE users SET user_wallet_balance = IF(user_wallet_balance-%1$s<=0,0,user_wallet_balance-%1$s) WHERE user_id = %2$s', secure($amount), secure($user_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    $wallet_name =$token_name.'_wallet';
             
                    $db->query(sprintf("UPDATE users SET $wallet_name = $wallet_name + %s WHERE user_id = %s", secure($receive_token), secure($user_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    $db->query(sprintf("INSERT INTO crons (user_id, item_id) VALUES (%s, %s)", secure($user_data['user_id'], 'int'), secure($investment_id))) or _error("SQL_ERROR_THROWEN");

                    $redisObject = new RedisClass();
                    $redisPostKey = 'user-' . $user_data['user_id'];
                    $redisObject->deleteValueFromKey($redisPostKey);
                    // cachedUserData($db, $system, $user_data['user_id'],$user_data['active_session_token']);
                
                }
                return true;
            }else{
                return false;
            }
            
        }catch(Exception $e){
            return false;
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
            $fees        = $token_price['data']['sell_fees'];
            $fees_amount = round($amount*$fees/100,5);
            $receive_amount = round($amount-$fees_amount,2);
  
            $result = InvestmentHelper::buySellOrder($params);
            if(isset($result['data']['data']['order_id'])){
           
                $order_id = $result['data']['data']['order_id'];
                $db->query(sprintf("INSERT INTO investment_transactions (user_id, order_id, base_currency, tokens, currency, tnx_type ,amount, receive_amount, recieve_token, fees, status) VALUES (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s)", secure($user_data['user_id'], 'int'), secure($order_id), secure($token_name) ,secure($token_value), secure($token_name), secure($action),secure($amount),secure($receive_amount), secure($token_value), secure($fees), secure('completed') )) or _error("SQL_ERROR_THROWEN");
                $investment_id = $db->insert_id;
                if($investment_id){

                    $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, investment_id, node_type, node_id, amount, type, date,paymentMode) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($user_data['user_id'], 'int'), secure($investment_id), secure('sell_coin'), secure(0, 'int'), secure($receive_amount), secure('in'), secure(date('Y-m-d h:i:m')), secure($token_name.'_wallet'))) or _error("SQL_ERROR_THROWEN");
                    $db->query(sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($receive_amount), secure($user_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    $wallet_name =$token_name.'_wallet';
                   
                    $db->query(sprintf("UPDATE users SET $wallet_name = $wallet_name - %s WHERE user_id = %s", secure($token_value), secure($user_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");

                    $redisObject = new RedisClass();
                    $redisPostKey = 'user-' . $user_data['user_id'];
                    $redisObject->deleteValueFromKey($redisPostKey);
                    // cachedUserData($db, $system, $user_data['user_id'],$user_data['active_session_token']);
                }
                return true;
            }else{
                return false;
            }
            
        }catch(Exception $e){
            return $false;
        }
        
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
        $tokens  =  httpGetCurl('investment/dashboard_detail',$system['investment_api_base_url']);
        $return = [];
        $currency_price = [];
        if(!empty($tokens)){
            foreach($tokens['data'] as $key=>$token){
            
                $return['token_data'][$key]['wallet_name'] = $token['short_name'].'_wallet';
                $return['token_data'][$key]['total_wallet_quote_amount'] = self::convertBaseToQuoteCurrency($token['ticker_data']['buy_price'],$user_data[$token['short_name'].'_wallet']);
                $return['graph'][$token['short_name'].'_kline_data'] =  $token['kline_data']?array_map(function ($ar) {return (double)$ar['close'];}, $token['kline_data']):"";
                $return['series'][$key] = $user_data[$token['short_name'].'_wallet'];
                $return['total_coin'] = $return['total_coin']+$user_data[$token['short_name'].'_wallet'];
                $return['labels'][$key] = strtoupper($token['short_name']);
                $return['token_data'][$key]['buy_price'] =  round($token['ticker_data']['buy_price'],5);
                $return['token_data'][$key]['short_name'] =  $token['short_name'];
                $return['token_data'][$key]['name'] =  $token['name'];
                $return['token_data'][$key]['fluctuation'] =  $token['fluctuation'];
                $currency_price[$token['short_name'].'_price'] = $return['token_data'][$key]['buy_price'];
               
            }
            if($return['total_coin']>0){
                foreach($return['series'] as $key1=>$item){
                    $return['series'][$key1] = round($item*100/$return['total_coin'],2);
                }
            }else{
                $return['series'] = array(0.00000000,0.00000000,0.00000000);
            }
            $return['total_balance'] = self::getBtcBlance($user_data,$currency_price);
        }
        
       
        // echo '<pre>'; print_r($return); die;
        return $return;
   
    }
    
    public static function convertBaseToQuoteCurrency($base_currency_amount,$quote_currency_price){
        $total_quote_currency_amount = ($base_currency_amount>0 && $quote_currency_price>0)?round($base_currency_amount*$quote_currency_price, 2):0;
        return $total_quote_currency_amount;
    }

    public static function getBtcBlance($user_data,$currency_price){
        $total_btc = $user_data['btc_wallet'];
    
        $btc_price =  $currency_price['btc_price'];
        $btc_total_amount = ($total_btc>0)?($total_btc*$btc_price):0;
        // echo '<pre>'; print_r($btc_price['buy_price']); die;
        $total_apl = $user_data['apl_wallet'];
        $apl_price = $total_apl>0?$currency_price['apl_price']:0;
        $apl_total_amount = $total_apl>0?($total_apl*$apl_price):0;

        $total_eth = $user_data['eth_wallet'];
        $eth_price = $total_eth>0?$currency_price['eth_price']:0;
        $eth_total_amount = ($total_eth>0)?($total_eth*$eth_price):0;


        $total['amount']  = round($apl_total_amount+$eth_total_amount+$btc_total_amount,2);
        $total['total_token_btc'] =  $total['amount']>0?round($total['amount']/$btc_price, 5):0;
        // $eth_price =  $total_eth>0?self::get_ticker_price('ETH_USDT'):0;   
        // echo '<pre>'; print_r($total); die;
        return $total;
         
    }
}