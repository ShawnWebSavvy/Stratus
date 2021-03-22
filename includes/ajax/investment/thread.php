<?php
/**
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
    // die($_POST['order_action_type']);
    
	switch ($_POST['order_action_type']) {
        case 'get_all_tokens_rate':
            $_details = InvestmentHelper::update_all_token_price($user->_data);
            $return['buy_details'] =$_details['buy'];
            $return['sell_details'] =$_details['sell'];
            $return['wallet_coins'] =$_details['wallet'];
            $return['usd_wallet_amount'] =round($user->_data['user_wallet_balance'],2);
            // echo '<pre>'; print_r($return); die;
            return_json($return);
            break;
        case 'update_dashboard':
            $_details = InvestmentHelper::getDashboardDate($user->_data);
            return_json($_details);
            break;
        break;
        default:
            session_start();
            $_SESSION['order_action_type']=$_POST['order_action_type'];
            $_SESSION['coin']=$_POST['coin'];
            return_json(true);
            break;

    }    
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}

?>