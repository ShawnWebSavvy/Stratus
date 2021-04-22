<?php
require('bootstrap.php');
if (!empty($_POST["pay_nows"])) {
    require_once 'includes/AuthorizeNetPayment.php';
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
            echo json_encode(array("message"=>$param_value_array, "response"=>$reponseType));
            exit;
        }
        else
        {
            $authCode = "";
            $paymentResponse = $tresponse->getErrors()[0]->getErrorText();
            $reponseType = "error";
            $message = "Charge Credit Card ERROR :  Invalid response\n";
            echo json_encode(array("message"=>$paymentResponse, "response"=>$reponseType));
            exit;
        }
        
        
        // print "<PRE>";
        // print_r($transactionId);
        // print_r($responseCode);
        // print_r($paymentStatus);
        // print "</PRE>";

        
        // print "<PRE>";
        // print_r($param_value_array);
        
        //$query = "INSERT INTO tbl_authorizenet_payment (transaction_id, auth_code, response_code, amount, payment_status, payment_response) values (?, ?, ?, ?, ?, ?)";
        // $id = $dbController->insert($query, $param_type, $param_value_array);
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
    $message= "Charge Credit Card Null response returned";
    echo json_encode(array("message"=>$message, "response"=>$reponseType));
    exit;
}
?>