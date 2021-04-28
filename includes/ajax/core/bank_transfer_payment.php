<?php
require('../../../bootstrap.php');
// check AJAX Request
is_ajax();

// user access
user_access(true);
if (!empty($_POST["bank_name"])) {
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
    
    echo json_encode(array("message"=>"Your Request is submit and under review", "response"=>"success"));
    exit;
    
        
}else{
    $reponseType = "error";
    $message = "Bank Details are invalid!";
    echo json_encode(array("message"=>$message, "response"=>$reponseType));
    exit;
}
?>