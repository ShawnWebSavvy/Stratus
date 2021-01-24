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
    if($_POST['order_action_type']=='get_all_tokens_rate'){
        $_details = InvestmentHelper::update_all_token_price();
        $return['buy_details'] =$_details['buy'];
        $return['sell_details'] =$_details['sell'];
        return_json($return);
    }else{
        session_start();
        $_SESSION['order_action_type']=$_POST['order_action_type'];
        $_SESSION['coin']=$_POST['coin'];
        return_json(true);
    }
   
    
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}

?>