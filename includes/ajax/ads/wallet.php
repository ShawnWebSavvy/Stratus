<?php
/**
 * ajax -> ads -> wallet
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();

// user access
user_access(true);

try {

	switch ($_REQUEST['do']) {
		case 'wallet_transfer':
			// process
			$user->wallet_transfer($_POST['send_to_id'], $_POST['amount']);
			
			// return
			return_json( array('callback' => 'window.location = site_path + "/wallet?transfer_succeed"') );
		break;
		
		case 'wallet_transfer_to_bank':
			// process
			if(!isset($_POST['transaction_id']) || empty($_POST['transaction_id'])){
				return_json( array('messages' => "Transaction Id is Required", 'responseType' => "error") );
			}
			if(isset($_POST['request_id']) && $_POST['request_id'] > 0){
				$message = $user->bank_transfer($_POST, 'approve');

				return_json( array('messages' => $message, 'responseType' => "success") );
			}else{
				return_json( array('messages' => "Something went Wrong!", 'responseType' => "error") );
			}

		break;

		case 'wallet_transfer_to_bank_disapprove':
			// process
			if(!isset($_POST['comments']) || empty($_POST['comments'])){
				return_json( array('messages' => "Please add Some Comments", 'responseType' => "error") );
			}
			if(isset($_POST['request_id']) && $_POST['request_id'] > 0){
				$message = $user->bank_transfer($_POST, 'disapprove');
				return_json( array('messages' => $message, 'responseType' => "success") );
			}else{
				return_json( array('messages' => "Something went Wrong!", 'responseType' => "error") );
			}

		break;
		case 'bank_withdrawl':
			// valid inputs 
			if(!isset($_POST['amount']) || !is_numeric($_POST['amount'])) {
				throw new Exception(__("Enter valid amount of money for example '50'"));
			}
			$_SESSION['bank_withdrawl'] = $_POST['amount'];

			$row = [];
			$bank_withdrawl = sprintf("SELECT * FROM bank_withdrawl WHERE user_id = %s", secure($user->_data['user_id'], 'int'));
            $get_rows = $db->query($bank_withdrawl) or _error("SQL_ERROR_THROWEN");
			if ($get_rows->num_rows > 0) {
				$row = $get_rows->fetch_assoc();
				$bank_name = $row['bank_name'];
				$acc_number = $row['acc_number'];
				$acc_name = $row['acc_name'];
				$swift_code = $row['swift_code'];
				$country = $row['country'];
			}else{
				$bank_name = "";
				$acc_number = "";
				$acc_name = "";
				$swift_code = "";
				$country = "";
			}
			// return
			modal("#bankPayment", "{'bank_name': '".$bank_name."', 'acc_number':'".$acc_number."', 'acc_name':'".$acc_name."', 'swift_code': '".$swift_code."', 'country': '".$country."'}");
		break;

		case 'wallet_replenish':
			// valid inputs 
			if(!isset($_POST['amount']) || !is_numeric($_POST['amount'])) {
				throw new Exception(__("Enter valid amount of money for example '50'"));
			}
			//calculate percentage
			$percentage = 100 + $system['stripe_commision'];
            $new_amount = ($percentage / 100) * $_POST['amount'];
            $fee_amount = $new_amount - $_POST['amount'];
			$_SESSION['wallet_pay_to_user'] = $_POST['amount'];
			// return
			modal("#payment", "{'handle': 'wallet', 'new_amount':'".number_format((float)$new_amount, 2, '.', '')."', 'fee_amount':'".number_format((float)$fee_amount, 2, '.', '')."', 'price': '".$_POST['amount']."'}");
		break;

		case 'wallet_withdraw_affiliates':
			// process
			$user->wallet_withdraw_affiliates($_POST['amount']);
			
			// return
			return_json( array('callback' => 'window.location = site_path + "/wallet?withdraw_affiliates_succeed"') );
		break;

		case 'wallet_withdraw_points':
			// process
			$user->wallet_withdraw_points($_POST['amount']);
			
			// return
			return_json( array('callback' => 'window.location = site_path + "/wallet?withdraw_points_succeed"') );
		break;

		case 'wallet_package_payment':
			// process
			$user->wallet_package_payment($_POST['package_id']);
			
			// return
			return_json( array('callback' => 'window.location = site_path + "/wallet?package_payment_succeed"') );
		break;

		default:
			_error(400);
			break;
	}
	
} catch (Exception $e) {
	return_json( array('error' => true, 'message' => $e->getMessage()) );
}

?>