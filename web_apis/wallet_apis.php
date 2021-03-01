<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');
function getWalletBalance($token){
try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $db, $system;

           
        $checkToken = checkHeaders($token);

        if($checkToken == 402){
            returnResponse(false,402,"Access token missing");
        }elseif($checkToken == 400){
            returnResponse(false,402,"Invalid access token provided");
        }else{
            // $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s", secure($_POST['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
             $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s", secure($_POST['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
             $check_user= $check_user->fetch_assoc();
             if($check_user['count'] < 1){
                    returnResponse(false,402,"Invalid user");

             }else{
                    $wallet_query = $db->query(sprintf("SELECT  * FROM users WHERE user_id = %s", secure($_POST['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    $result= $wallet_query->fetch_assoc();
                    if(!empty($result)){
                        returnResponse(true,200,"Success",$result);
                    }else{
                         returnResponse(false,300,"Something went wrong");

                    }
             }
            
        }

    }
    else{
            returnResponse(false,402,"Invalid request");
    }

}catch (Exception $e) {
  
    returnResponse(false,300,$e->getMessage());
}
}
