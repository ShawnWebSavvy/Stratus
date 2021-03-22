<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
mysqli_report(MYSQLI_REPORT_ALL);
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


      //  print_r($_POST); die;

        if(isset($_POST['email'])){

          $check_user = $db->query(sprintf("SELECT user_id as id, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
          $check_user= $check_user->fetch_assoc();
          if($check_user['count'] < 1){
            returnResponse(false,402,"Invalid user");

          }else{
            $transcation_result= array();            
            $user_id = $check_user['id'];
            mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
            // $wallet_query = $db->query(sprintf("SELECT  * FROM users WHERE user_id = %s", secure($_POST['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            $wallet_query = $db->query(sprintf("SELECT  * FROM users WHERE user_email = %s", secure(  $_POST['email']))) or _error("SQL_ERROR_THROWEN");
            $get_transactions = $db->query(sprintf("SELECT  amount as amount, node_type as node_type, date as transdate  FROM ads_users_wallet_transactions LEFT JOIN users ON ads_users_wallet_transactions.node_type='user' AND ads_users_wallet_transactions.node_id = users.user_id WHERE ads_users_wallet_transactions.user_id = %s ORDER BY ads_users_wallet_transactions.transaction_id DESC", secure($user_id, 'int')));
         
            if ($get_transactions->num_rows > 0) {
              $transcation_result= $get_transactions->fetch_all();
              $details= array();
              for($t=0;$t<count($transcation_result);$t++)
              {
                $details[]= array(
                  'amount'=>$transcation_result[$t][0],
                  'date'=>$transcation_result[$t][2],
                  'status'=>'Done',
                  'payment_method'=>'stripe'
                );    
              }
           }
           
            $result= $wallet_query->fetch_assoc();
            if(!empty($result)){
              $user_details = array(
                "user_id"=> $result['user_id'],
                "user_name"=> $result['user_name'],
               "user_email"=> $result['user_email'],
                "user_affiliate_balance"=> $result['user_affiliate_balance'],
                "user_wallet_balance"=> $result['user_wallet_balance'],
                "user_points"=> $result['user_points'],
                "transactions"=> $details,

              );
             
              returnResponse(true,200,"Success",$user_details);
            }else{
              returnResponse(false,300,"Something went wrong");

            }
          }
        }else{
          returnResponse(true,300,"parameters missing");
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


function updateWAlletBalanceFunction($token){
  try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $db, $system, $date;

        $checkToken = checkHeaders($token);

        if($checkToken == 402){
          returnResponse(false,402,"Access token missing");
        }elseif($checkToken == 400){
          returnResponse(false,402,"Invalid access token provided");
        }else{

            if(isset($_POST['email']) && isset($_POST['price'])){
              $check_user = $db->query(sprintf("SELECT user_id as id, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
              $check_user= $check_user->fetch_assoc();

            //  print_r($check_user); die;

              if($check_user['count'] < 1){
                returnResponse(false,402,"Invalid user");

              }else{
                $query =   $db->query(sprintf('UPDATE users SET user_wallet_balance = IF(user_wallet_balance-%1$s<=0,0,user_wallet_balance-%1$s) WHERE user_id = %2$s', secure($_POST['price']), secure($check_user['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                if($query == true){
                  /* log this transaction */
                  //  wallet_transaction_logs($_POST['id'], 'videohub_package_payment', 0, $_POST['price'], 'out');

                  $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, date, platformType) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($check_user['id'], 'int'), secure('videohub_package_payment'), secure(0, 'int'), secure($_POST['price']), secure('out'),secure($date),secure('videohub'))) or _error("SQL_ERROR_THROWEN");

                  returnResponse(true,200,"Success");
                }else{
                  returnResponse(true,300,"Something went wrong");

                }
              }
            }else{
              returnResponse(true,300,"parameters missing");
            }


        }

    }
    else{
      returnResponse(false,402,"Invalid request");
    }

  }catch (Exception $e) {
    //echo $e->getMessage();
    returnResponse(false,300,$e->getMessage());
  }
}
