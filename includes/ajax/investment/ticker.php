<?php
/**
 * ajax -> live -> reaction
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');
require_once('../../investment-helper.php');

// check AJAX Request
is_ajax();

// user access
user_access(true);

try {
    if (is_empty($_POST['token']) || is_empty($_POST['token'])) {
        throw new Exception(__("You must select any currency"));
    }
    $token_price = InvestmentHelper::get_ticker_price($_POST['token']);
    // echo '<pre>'; print_r($token_price); die;       
    $token_price['data']['buy_price'] = round($token_price['data']['buy_price'],5);
    $token_price['data']['sell_price'] = round($token_price['data']['sell_price'],5);
    switch($_POST['action']){
        case 'buy':
            $fees        = $token_price['data']['buy_fees'];
            if(!empty($_POST['type'])&&$_POST['type']=="coin"){
                $token_price['data']['amount'] = round($_POST['total_tokens']*$token_price['data']['buy_price'], 2);
                $token_price['data']['sub_total'] = round($_POST['total_tokens']*$token_price['data']['buy_price'], 2);
                $token_price['data']['total_fees'] = round($_POST['total_tokens']*$fees/100, 5).' '.$_POST['token'];
                // $token_price['data']['selling_sub_total'] = number_format((double)$_POST['token']*(double)$token_price['data']['selling_fees'], 5, '.', '');
                // echo '<pre>'; print_r($token_price); die;
            }else{
                $token_price['data']['tokens'] = round($_POST['amount']/$token_price['data']['buy_price'], 5);
                $token_price['data']['sub_total'] = $_POST['amount'];
                $token_price['data']['total_fees'] = round($token_price['data']['tokens']*$fees/100, 5).' '.$_POST['token'];
            }
            break;
        case 'sell':
            $fees        = $token_price['data']['sell_fees'];
            if(!empty($_POST['type'])&&$_POST['type']=="coin"){
                
                $token_price['data']['sub_total'] = round($_POST['total_tokens']*$token_price['data']['sell_price'], 2);
                $token_price['data']['total_fees'] = round($token_price['data']['sub_total']*$fees/100, 2);
                $token_price['data']['amount'] = round($token_price['data']['sub_total']-$token_price['data']['total_fees'],2);
                // $token_price['data']['selling_sub_total'] = number_format((double)$_POST['token']*(double)$token_price['data']['selling_fees'], 5, '.', '');
                // echo '<pre>'; print_r($token_price); die;
            }else{
                $token_price['data']['tokens'] = round($_POST['amount']/$token_price['data']['sell_price'], 5);
                $token_price['data']['sub_total'] = $_POST['amount'];
                $token_price['data']['total_fees'] = '$'.round($_POST['amount']*$fees/100, 2);
                $token_price['data']['amount'] = $_POST['amount']-round($_POST['amount']*$fees/100, 2);
            }
            break;
    }
 
    return_json($token_price);
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}

?>