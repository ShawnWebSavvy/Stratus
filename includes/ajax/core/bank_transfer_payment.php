<?php
require('../../../bootstrap.php');
// check AJAX Request
is_ajax();

// user access
user_access(true);

$error = false;
if (
    empty($_POST["bank_name"]) || 
    empty($_POST["acc_number"]) || 
    empty($_POST["acc_name"]) || 
    empty($_POST["swift_code"]) || 
    empty($_POST["country"])
) {
    $error = true;
    $reponseType = "error";
    $message = "All fields are mandatory.";
    echo json_encode(array("message"=>$message, "response"=>$reponseType));
    exit;

}
if (!empty($_POST["bank_name"])) {
    if(strlen($_POST['bank_name']) < 3 ){
        $error = true;
        echo json_encode(array("message"=>"Bank name should have at least 3 characters.", "response"=>"error"));
        exit;
    }
    if(!preg_match('/^[a-z0-9 ]+$/i', trim($_POST["bank_name"]))){
        $error = 1;
        echo json_encode(array("message"=>"Bank name can only have alphabets and numbers.", "response"=>"error"));
        exit;
    }
}

if(!empty($_POST['acc_number'])){
    if(preg_match('/^[0-9]+$', trim($_POST["acc_number"])) ) {
        $error = true;
        echo json_encode(array("message"=>"Account number should contain numbers only.", "response"=>"error"));
        exit;
    }if(strlen($_POST['acc_number']) < 8){
        $error = true;
        echo json_encode(array("message"=>"Account number should have at least 8 digits.", "response"=>"error"));
        exit;
    }
}

if (!empty($_POST["acc_name"])) {
    if(strlen($_POST['acc_name']) < 3 ){
        $error = true;
        echo json_encode(array("message"=>"Account name should have at least 3 characters.", "response"=>"error"));
        exit;
    }
    if(!preg_match('/^[a-z0-9 ]+$/i', trim($_POST["acc_name"]))){
        $error = true;
        echo json_encode(array("message"=>"Account name can only have alphabets and numbers.", "response"=>"error"));
        exit;
    }
}

if(!empty($_POST['swift_code'])){
    if(preg_match('/^[0-9]+$', trim($_POST["swift_code"])) ) {
        $error = true;
        echo json_encode(array("message"=>"Swift Code should contain numbers only.", "response"=>"error"));
        exit;
    }if(strlen($_POST['swift_code']) != 9 ){
        $error = true;
        echo json_encode(array("message"=>"Swift Code should have only 9 digits.", "response"=>"error"));
        exit;
    }
}

if (($error == false)) {

    $bank_withdrawl_transactions = sprintf("SELECT * FROM bank_withdrawl_transactions WHERE user_id = %s and status = %s", secure($user->_data['user_id'], 'int'), secure(0, 'int'));
    $get_rows = $db->query($bank_withdrawl_transactions) or _error("SQL_ERROR_THROWEN");
    if ($get_rows->num_rows > 0) {
        echo json_encode(array("message"=>"You have already sent request. You cannot make another request at now", "response"=>"error"));
        exit;
    }
    if($_SESSION['bank_withdrawl'] > $user->_data['user_wallet_balance']){
        echo json_encode(array("message"=>"Your are requesting more amount than you have in wallet", "response"=>"error"));
        exit;
    }else{ 
        if(isset($_POST["saveBank"])){
            $_POST["saveBank"] = 1;
            $bank_withdrawl = sprintf("SELECT * FROM bank_withdrawl WHERE user_id = %s", secure($user->_data['user_id'], 'int'));
            $get_rows = $db->query($bank_withdrawl) or _error("SQL_ERROR_THROWEN");
            if ($get_rows->num_rows > 0) {
                $db->query(sprintf("UPDATE bank_withdrawl SET bank_name = %s, acc_number = %s, acc_name = %s, swift_code = %s, country = %s, saved = %s WHERE user_id = %s", secure($_POST["bank_name"]), secure($_POST["acc_number"]), secure($_POST["acc_name"]), secure($_POST["swift_code"]), secure($_POST["country"]), secure($_POST["saveBank"], 'int'), secure($user->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            }else{
                $db->query(sprintf("INSERT INTO bank_withdrawl (`user_id`, `bank_name`, `acc_number`, `acc_name`, `swift_code`, `country`, `saved`) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($user->_data['user_id'], 'int'), secure($_POST["bank_name"]), secure($_POST["acc_number"]), secure($_POST["acc_name"]), secure($_POST["swift_code"]), secure($_POST["country"]), secure($_POST["saveBank"], 'int'))) or _error("SQL_ERROR_THROWEN");
            }
        }
 
        $addTrans = sprintf("INSERT INTO `bank_withdrawl_transactions`( `user_id`, `bank_name`, `acc_number`, `acc_name`, `swift_code`, `country`, `amount`) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($user->_data['user_id'], 'int'), secure($_POST["bank_name"]), secure($_POST["acc_number"]), secure($_POST["acc_name"]), secure($_POST["swift_code"]), secure($_POST["country"]), secure($_SESSION['bank_withdrawl']));
        $db->query($addTrans) or _error("SQL_ERROR_THROWEN");
        
        $chargeQuerys = sprintf("DELETE FROM `locked_balance` WHERE user_id = %s", secure($user->_data['user_id'], 'int'));
        $db->query($chargeQuerys) or _error("SQL_ERROR_THROWEN");

        $chargeQuery = sprintf("INSERT INTO `locked_balance`( `user_id`, `locked_balance`) VALUES (%s, %s)", secure($user->_data['user_id'], 'int'), secure($_SESSION['bank_withdrawl'], 'int'));
        $db->query($chargeQuery) or _error("SQL_ERROR_THROWEN");
        // $chargeQuery = sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance - %s WHERE user_id = %s", secure($_SESSION['bank_withdrawl']), secure($user->_data['user_id'], 'int'));
        // $db->query($chargeQuery) or _error("SQL_ERROR_THROWEN");

        // $user->wallet_set_transaction($user->_data['user_id'], 'bank_withdrawal', 0, $_SESSION['bank_withdrawl'], 'out');

        echo json_encode(array("message"=>"Your Request is submit and under review. We have locked your ".$_SESSION['bank_withdrawl']." balance.", "response"=>"success"));
        exit;
    }
}
?>