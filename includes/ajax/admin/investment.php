<?php

/**
 * ajax -> admin -> investments
 * 
 * @package Sngine
 * @author Zamblek
 */

set_time_limit(0); /* unlimited max execution time */

// fetch bootstrap
require('../../../bootstrap.php');
require('../../investment-helper.php');
// check AJAX Request
is_ajax();

// check admin|moderator permission
if ($user->_is_admin || $user->_is_subAdmin) {
	modal("MESSAGE", __("System Message"), __("You don't have the right permission to access this"));
}

// handle users
try {
	// echo'<pre>';print_r($_POST);die;
	switch ($_GET['do']) {
		case 'edit_exchange':
			/* valid inputs */
			if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
				_error(400);
			}
            
            	/* valid inputs */
			if (is_empty($_POST['markup_price']) || !is_numeric($_POST['markup_price']) || $_POST['markup_price'] < 0) {
				throw new Exception(__("You must enter valid mark up price"));
            }
            
            if (is_empty($_POST['markdown_price']) || !is_numeric($_POST['markdown_price']) || $_POST['markup_price'] < 0) {
				throw new Exception(__("You must enter valid mark down price"));
            }
            
            if (is_empty($_POST['buy_fees']) || !is_numeric($_POST['buy_fees']) || $_POST['buy_fees'] < 0) {
				throw new Exception(__("You must enter valid fees"));
			}
			if (is_empty($_POST['sell_fees']) || !is_numeric($_POST['sell_fees']) || $_POST['sell_fees'] < 0) {
				throw new Exception(__("You must enter valid fees"));
            }
            $params['is_active'] = 1;
            
            if($_POST['status']=='on'){
                $params['is_active'] = 1;
            }
            $params['markup'] = $_POST['markup_price'];
            $params['markdown'] = $_POST['markdown_price'];
			$params['buy_fees'] = $_POST['buy_fees'];
			$params['sell_fees'] = $_POST['sell_fees'];
			$params['trade_pair'] = $_POST['trade'];
			$params['exchangeId'] = $_POST['exchange_id'];
			$params['referral_calc'] = $_POST['referral_calc'];
			$params['referral_bonus'] = $_POST['referral_bonus'];
			$params['referral_extend_bonus'] = json_encode($_POST['referral_extend_bonus']);
			// echo'<pre>';print_r($params) ;die;
			$checkStoreDetails  = httpPostCurl('investment/admin/settings/save_settings',$system['investment_api_base_url'],$params);
			// $checkStoreDetails  = httpPostCurl('investment/admin/settings/save_settings','localhost:3018/',$params);
            if (!isset($checkStoreDetails['error'])) {
				return_json(array('success' => true, 'message' =>$checkStoreDetails['message']));
			}
			/* return */
			break;
		case 'updateCoin':
			// $params['markup'] = $_POST['markup_price'];
            // $params['markdown'] = $_POST['markdown_price'];
			$params['tradePair'] = $_POST['trade_pair'];
			$params['exchangeId'] = $_POST['exchange_id'];
			
			$detail = InvestmentHelper::getAdminSettingDetail('investment/admin/settings/fee/',$params);
			
			$return['bitmart_price'] = round($detail['price'],5);
			$return['stratus_buy_price'] = round($detail['price']+$detail['price']*$_POST['markup_price']/100,5);
			$return['stratus_sell_price'] = round((($detail['price'])-(($detail['price']*$_POST['markdown_price'])/100)),5);
			// return $return;
			return_json( array('data' => $return) );
			break;
		default:
			_error(400);
			break;
	}
} catch (Exception $e) {
	die($e);
	return_json(array('error' => true, 'message' => $e->getMessage()));
}
