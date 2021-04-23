<?php
require('../../../bootstrap.php');
// check AJAX Request
is_ajax();

// user access
user_access(true);
if (!empty($_POST["card-number"])) {
    require_once '../../../includes/AuthorizeNetPayment.php';
    $authorizeNetPayment = new AuthorizeNetPayment();
    
    $response = $authorizeNetPayment->chargeCreditCard($_POST);
    if ($response != null)
    {
        $tresponse = $response->getTransactionResponse();
        
        if (($tresponse != null) && ($tresponse->getResponseCode()=="1"))
        {
            $authCode = $tresponse->getAuthCode();
            $paymentResponse = $tresponse->getMessages()[0]->getDescription();
            $reponseType = "success";
            $message = "This transaction has been approved. <br/> Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() .  " <br/>Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
            $transactionId = $tresponse->getTransId();
            $responseCode = $tresponse->getResponseCode();
            $paymentStatus = $authorizeNetPayment->responseText[$tresponse->getResponseCode()];
            $param_value_array = array(
                $transactionId,
                $authCode,
                $responseCode,
                $_SESSION['wallet_pay_to_user'],
                $paymentStatus,
                $paymentResponse
            );

            if($paymentStatus === "Approved"){
                global $db, $system;
                $chargeQuery = sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($_SESSION['wallet_pay_to_user']), secure($user->_data['user_id'], 'int'));
                $db->query($chargeQuery) or _error("SQL_ERROR_THROWEN");

                $user->wallet_set_transaction($user->_data['user_id'], 'recharge', 0, $_SESSION['wallet_pay_to_user'], 'in');

                
                $db->query(sprintf("INSERT INTO authorize_transfer (`user_id`, `transactions_id`, `auth_code`, `response_code`, `amount_paid`, `payment_status`, `payment_response`) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($user->_data['user_id'], 'int'), secure($transactionId), secure($authCode), secure($responseCode), secure($_SESSION['wallet_pay_to_user']), secure($paymentStatus), secure($paymentResponse))) or _error("SQL_ERROR_THROWEN");
                
                $redisObject = new RedisClass();
                $redisPostKey = 'user-' . $user->_data['user_id'];
                $redisObject->deleteValueFromKey($redisPostKey);
            }

            echo json_encode(array("message"=>$paymentResponse, "response"=>$reponseType));
            exit;
        }
        else
        {
            $authCode = "";
            if($tresponse->getErrors() != null)
            {
              //echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
              $paymentResponse = $tresponse->getErrors()[0]->getErrorText();            
            }else{
                $paymentResponse = "Something went Wrong!!";
            }
            $paymentResponse = $tresponse->getErrors()[0]->getErrorText();
            $reponseType = "error";
            $message = "Charge Credit Card ERROR :  Invalid response\n";
            echo json_encode(array("message"=>$paymentResponse, "response"=>$reponseType));
            exit;
        }
    }
    else
    {
        $reponseType = "error";
        $message= "Charge Credit Card Null response returned";
        echo json_encode(array("message"=>$message, "response"=>$reponseType));
        exit;
    }
}else{
    $reponseType = "error";
    $message= "No Credit Card Details Found";
    echo json_encode(array("message"=>$message, "response"=>$reponseType));
    exit;
}
?>