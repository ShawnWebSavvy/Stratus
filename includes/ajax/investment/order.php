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

    // initialize the return array
    $return = array();
    $params = array();
   
	switch ($_POST['do']) {

        case 'buy':
            // echo'<pre>'; print_r($_POST['token_name']); die;
            $token_price = InvestmentHelper::get_ticker_price(strtoupper($_POST['token_name']));
            
            $_POST['token_value'] = sprintf('%.5f',round($_POST['amount']/$token_price['data']['buy_price'], 5));
            $token_price['data']['buy_price'] = round($token_price['data']['buy_price'],5);
            $fees = sprintf('%.5f',round(($_POST['token_value']*$token_price['data']['buy_fees'])/100, 5));

            $receive_amount = sprintf('%.5f',$_POST['token_value']-$fees);
            $smarty->assign('fees',$fees);
            $smarty->assign('receive_amount',$receive_amount);
            $smarty->assign('action', $_POST['do']);
            $smarty->assign('token_name', $_POST['token_name']);
            $smarty->assign('token_value', $_POST['token_value']);
            $smarty->assign('amount', $_POST['amount']);
            $smarty->assign('per_coin_price', $_POST['per_coin_price']);
            
            if((double)$_POST['amount']<=(double)$user->_data['user_wallet_balance']){
                $return['initiate'] = $smarty->fetch("investment/confirmModal.tpl");
                $_SESSION['amount']         = $_POST['amount'];
                $_SESSION['token_name']     = $_POST['token_name'];
                $_SESSION['token_value']    = $_POST['token_value'];
                $_SESSION['action']         = $_POST['do'];
                $_SESSION['receive_amount'] = $receive_amount;
                $_SESSION['fees_token']     = $fees;
                $_SESSION['fees']           = $token_price['data']['buy_fees'];
                $_SESSION['time']           = time();
            }else{
                $return['failed'] = $smarty->fetch("investment/top_up.tpl");
            }
            break;
        case 'sell':
            $token_price = InvestmentHelper::get_ticker_price(strtoupper($_POST['token_name']));
            $token_price['data']['sell_price'] = round($token_price['data']['sell_price'],5);
            // die($_POST['amount'])
            $_POST['amount'] = round($_POST['token_value']*$token_price['data']['sell_price'], 2);
            $fees= round(($_POST['amount']*$token_price['data']['sell_fees'])/100, 2);
            $token_price['data']['amount'] = round($token_price['data']['sub_total']-$token_price['data']['total_fees'],2);

            $receive_amount = $_POST['amount']-$fees;
            $smarty->assign('fees',$fees);
            $smarty->assign('receive_amount',$receive_amount);
            $smarty->assign('action', $_POST['do']);
            $smarty->assign('token_name', $_POST['token_name']);
            $smarty->assign('token_value', $_POST['token_value']);
            $smarty->assign('amount', $_POST['amount']);
            $smarty->assign('per_coin_price', $_POST['per_coin_price']);
            if((double)$_POST['token_value']<=(double)$user->_data[$_POST['token_name'].'_wallet']){
                
                $return['initiate'] = $smarty->fetch("investment/confirmModal.tpl");
                $_SESSION['amount']         = $_POST['amount'];
                $_SESSION['token_name']     = $_POST['token_name'];
                $_SESSION['token_value']    = $_POST['token_value'];
                $_SESSION['action']         = $_POST['do'];
                $_SESSION['receive_amount']     = $receive_amount;
                $_SESSION['fees']           = $token_price['data']['sell_fees'];
                $_SESSION['time']           = time();
            }else{
                $return['failed'] = $smarty->fetch("investment/top_up.tpl");
            }
            break;
        case 'complete':
            if($_POST['action']=='buy'){
                $last_action  =  $_SESSION['time'];
                $secondsInactive = time() - $last_action;  
                if($_POST['amount']==$_SESSION['amount'] &&
                    $_POST['token_name']==$_SESSION['token_name']
                    && $_POST['action'] == $_SESSION['action']&&
                    $secondsInactive <= 20
                    ){
                        // $_POST['do']          = $_SESSION['action'];

                    if((double)$_POST['amount']<=(double)$user->_data['user_wallet_balance']){
                        $save = InvestmentHelper::savePurchaseTokenOrder($_POST['action'],$_SESSION['token_name'],$_SESSION['token_value'],$_SESSION['amount'],$user->_data,$_SESSION['fees_token'],$_SESSION['fees']);
                        if($save){
                            $return['status'] = 'success';
                            $return['url'] = $system['system_url'].'/investments';
                        }else{
                            _error(404);
                        }
                        
                    }else{
                        $smarty->assign('action', 'buy');
                        $smarty->assign('token_name', $_POST['token_name']);
                        $smarty->assign('token_value', $_POST['token_value']);
                        $smarty->assign('amount', $_POST['amount']);
                        $smarty->assign('per_coin_price', $_POST['per_coin_price']);
                        $return['failed'] = $smarty->fetch("investment/top_up.tpl");
                    }
                }else{
                    $return['status'] = 'session_expired';
                }
                
            }else if($_POST['action']=='sell'){
                // die;
                // die($user->_data[$_POST['token_name'].'_wallet'])
                $last_action  =  $_SESSION['time'];
                $secondsInactive = time() - $last_action;  

                $user_wallet_balance = $user->_data[$_POST['token_name'].'_wallet'];
                if($_POST['amount']==$_SESSION['amount'] &&
                $_POST['token_name']==$_SESSION['token_name']
                && $_POST['action'] == $_SESSION['action']&&
                $secondsInactive <= 20
                ){

                    if((double)$_POST['token_value']<=(double)$user->_data[$_POST['token_name'].'_wallet']){
                        $save = InvestmentHelper::saveSellTokenOrder($_POST['action'],$_SESSION['token_name'],$_SESSION['token_value'],$_SESSION['amount'],$user->_data,$_SESSION['receive_amount'],$_SESSION['fees']);
                        if($save){
                            $return['status'] = 'success';
                            $return['url'] = $system['system_url'].'/investments';
                        }else{
                            _error(404);
                        }
                        
                        
                    }else{
                        $smarty->assign('action', 'sell');
                        $smarty->assign('token_name', $_POST['token_name']);
                        $smarty->assign('token_value', $_POST['token_value']);
                        $smarty->assign('amount', $_POST['amount']);
                        $smarty->assign('per_coin_price', $_POST['per_coin_price']);
                        $return['failed'] = $smarty->fetch("investment/top_up.tpl");
                    }
                }
            }else{
                _error(400);
			    break;
            }
          
            break;
		default:
			_error(400);
			break;
	}

	// return & exit
	return_json($return);

} catch (Exception $e) {
    die($e);
	modal("ERROR", __("Error"), $e->getMessage());
}
?>