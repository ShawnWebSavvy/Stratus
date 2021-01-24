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
            $smarty->assign('action', $_POST['do']);
            $smarty->assign('token_name', $_POST['token_name']);
            $smarty->assign('token_value', $_POST['token_value']);
            $smarty->assign('amount', $_POST['amount']);
            $smarty->assign('per_coin_price', $_POST['per_coin_price']);
            
            if((double)$_POST['amount']<=(double)$user->_data['user_wallet_balance']){
                $return['initiate'] = $smarty->fetch("investment/confirmModal.tpl");
            }else{
                $return['failed'] = $smarty->fetch("investment/top_up.tpl");
            }
            break;
        case 'sell':
                $smarty->assign('action', $_POST['do']);
                $smarty->assign('token_name', $_POST['token_name']);
                $smarty->assign('token_value', $_POST['token_value']);
                $smarty->assign('amount', $_POST['amount']);
                $smarty->assign('per_coin_price', $_POST['per_coin_price']);
            if((double)$_POST['token_value']<=(double)$user->_data[$_POST['token_name'].'_wallet']){
                
                $return['initiate'] = $smarty->fetch("investment/confirmModal.tpl");
            }else{
                $return['failed'] = $smarty->fetch("investment/top_up.tpl");
            }
            break;
        case 'complete':
            if($_POST['action']=='buy'){
                if((double)$_POST['amount']<=(double)$user->_data['user_wallet_balance']){
                    $save = InvestmentHelper::savePurchaseTokenOrder($_POST['action'],$_POST['token_name'],$_POST['token_value'],$_POST['amount'],$user->_data);
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
            }else if($_POST['action']=='sell'){
                // die;
                // die($user->_data[$_POST['token_name'].'_wallet'])
                $user_wallet_balance = $user->_data[$_POST['token_name'].'_wallet'];
                if((double)$_POST['token_value']<=(double)$user->_data[$_POST['token_name'].'_wallet']){
                    $save = InvestmentHelper::saveSellTokenOrder($_POST['action'],$_POST['token_name'],$_POST['token_value'],$_POST['amount'],$user->_data);
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
                    die($_POST['per_coin_price']);
                    $smarty->assign('per_coin_price', $_POST['per_coin_price']);
                    $return['failed'] = $smarty->fetch("investment/top_up.tpl");
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
	modal("ERROR", __("Error"), $e->getMessage());
}
?>