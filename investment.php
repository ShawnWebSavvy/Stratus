<?php


// fetch bootloader
require('bootloader.php');
require_once('./includes/investment-helper.php');
// live enabled
if(!$system['investment_module_status']) {
	_error(404);
}
try {

    // user access
    user_access();
    // echo '<pre>'; print_r($user->_data);die;
    $smarty->assign('active_page', 'Investment');
    $smarty->assign('user_data',$user->_data);

    switch ($_GET['view']) {
        case '':
            $lat_transactions = $user->investment_latest_transactions();
          
            $allTokens = InvestmentHelper::getDashboardDate($user->_data);
            //   echo '<pre>'; print_r($allTokens); die;
            // $get_balance_btc = InvestmentHelper::getBtcBlance($user->_data);
            $smarty->assign('allTokens', $allTokens['token_data']);
            $smarty->assign('graphData', $allTokens['graph']);
            $smarty->assign('lat_transactions', $lat_transactions);
            $smarty->assign('series', $allTokens['series']);
            $smarty->assign('labels', $allTokens['labels']);
            page_header('Investment');
            page_footer("investment/index");
        break;
        case 'coin_buy_sell':
            page_header('Buy/Sell');
            $smarty->assign('min_tnx_amnt','0.001');
            $smarty->assign('max_tnx_amnt','20000');
            if(isset($_SESSION['order_action_type']) && isset($_SESSION['coin'])) {
                $smarty->assign('order_action_type', $_SESSION['order_action_type']);
                $smarty->assign('set_active_coin', $_SESSION['coin']);
                unset($_SESSION['order_action_type']);
                unset($_SESSION['coin']);
			}else{
                $smarty->assign('order_action_type','Buy');
                $smarty->assign('set_active_coin','btc');
            }
            $_details = InvestmentHelper::get_all_token_price();
            $lat_transactions = $user->investment_latest_transactions();
            // echo '<pre>'; print_r($lat_transactions); die;
            $smarty->assign('lat_transactions', $lat_transactions);
            $smarty->assign('_buy_details',$_details['buy']);
            $smarty->assign('_sell_details', $_details['sell']);
            $smarty->assign('token_details', $_details['token']);
            page_footer("investment/buy_sell");
        break;
        case 'investment_activities':
            // get wallet transactions
            $all_transactions = $user->investment_get_transactions();
           
            //  echo '<pre>'; print_r($all_transactions); die;
			/* assign variables */
            $smarty->assign('all_transactions', $all_transactions);

            page_header('Investment Activities');
            page_footer("investment/activity");
        break;
        default:
            _error(404);
            break;
    }
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}


?>