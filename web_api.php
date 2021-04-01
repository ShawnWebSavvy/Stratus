<?php
//require('bootstrap.php');
require('bootloader.php');

require('web_apis/api_helper.php');
require('web_apis/wallet_apis.php');
//API-KEY:VGhpc0lzbXl3ZWJhcGlzODg1Mjg=
$token = "ThisIsmywebapis88528";
if(isset($_GET['endpoint'])){
    $endpoint = $_GET['endpoint'];
}else{
    $response = ["status" =>false,"code"=> 402, "msg" =>"Invalid endpoint"];
    echo json_encode($response);
}

switch ($endpoint) {
    case 'getWalletBalance':
        getWalletBalance($token);
    break;

    case 'updateWalletBalance':
        updateWAlletBalanceFunction($token);
    break;

    case 'addCredit':
        replenishCreditFunction($token);
    break;

    case 'updateSendmoney':
        updatesendmoneyWAlletBalanceFunction();
    break;

    case 'getAllTransactions':
        getAllTransactionsFunction();
    break;

    case 'walletTransfer':
        walletTransferFunction();
    break;

    case 'listUsers':
        listUsersFunction();
    break;

    case 'pointsupdate':
        addWalletPointsVideo();
    break;

    case 'withdrawAffiliates':
        withdrawAffiliatesFunction();
    break;

    case 'sendResetPasswordKey':
        sendResetPasswordKeyFunction($token);
    break;

    case 'updatePasswordByKey':
        updatePasswordByKeyFunction($token);
    break;

    default:
        returnResponse(false,402,"Invalid Endpoint");
}



?>
