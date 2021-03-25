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
          returnResponse(false,300,"parameters missing");
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
                  returnResponse(false,300,"Something went wrong");

                }
              }
            }else{
              returnResponse(false,300,"parameters missing");
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


/**
 * Api to add Credit to wallet
 */

function replenishCreditFunction($token){
  try{
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          global $db, $system, $date;
          $checkToken = checkHeaders($token);
          if($checkToken == 402){
          returnResponse(false,402,"Access token missing");
          }elseif($checkToken == 400){
            returnResponse(false,402,"Invalid access token provided");
          }else{

              if(isset($_POST['email']) && isset($_POST['paymentMethod']) && $_POST['price']){
                    $check_user = $db->query(sprintf("SELECT user_id as id, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
                  $check_user= $check_user->fetch_assoc();

                  if($check_user['count'] < 1){
                    returnResponse(false,402,"Invalid user");

                  }else{
                        switch ($_POST['paymentMethod']) {
                            case 'paypal':
                             returnResponse(true,402,'Feature will come soon');
                            break;
                            case 'stripe':
                                addWalletPointsUsingStripe($check_user['id']);
                            break;
                            default:
                            returnResponse(true,402,'Invalid payment type');
                            break;
                        }
                  }
              }else{
                   returnResponse(false,300,"parameters missing");
              }
          }
     }else{
        returnResponse(false,402,"Invalid request");
     }
  }catch(Exception $e){
       returnResponse(false,400,$e->getMessage());
  }
}


function addWalletPointsUsingStripe($id){

// require_once(ABSPATH.'includes/libs/Stripe/init.php');
//   $stripe = new \Stripe\StripeClient(
//   'sk_test_51IEYaWD19oXaFHIsTj3rdRnMn195R5vOdBfIGTixjwfTxuUm6OjDdRTuXAgR6sTkZQ22LvZCQVj7R9JnJoWpa3xU00O1UMk81L'
// );
// $t = $stripe->tokens->create([
//   'card' => [
//     'number' => '4242424242424242',
//     'exp_month' => 3,
//     'exp_year' => 2022,
//     'cvc' => '314',
//   ],
// ]);

// print_r($t); die;

    if(isset($_POST['email']) && isset($_POST['card_token']) &&  isset($_POST['price'] ) ){
       global $db, $system, $date;

      // echo $system['stripe_mode']; die;
        // process
			require_once(ABSPATH.'includes/libs/Stripe/init.php');
      	$secret_key = ($system['stripe_mode'] == "live")? $system['stripe_live_secret'] : $system['stripe_test_secret'];
      //$secret_key = 'sk_test_51IEYaWD19oXaFHIsTj3rdRnMn195R5vOdBfIGTixjwfTxuUm6OjDdRTuXAgR6sTkZQ22LvZCQVj7R9JnJoWpa3xU00O1UMk81L'; // for testing
			\Stripe\Stripe::setApiKey($secret_key);
			$customer = \Stripe\Customer::create(array(
				 'email' => $_POST['email'],
		        'source' => $_POST['card_token']
		    ));
            
		    $charge   = \Stripe\Charge::create(array(
		        'customer' => $customer->id,
		        'receipt_email' => $_POST['email'],
		        'amount' => $_POST['price']*100,
		        'currency' => $system['system_currency']
		    ));
		    
		    if($charge) {
		    	// update user wallet balance
				$chargeQuery = sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($_POST['price']), secure($id, 'int'));
				$db->query($chargeQuery) or _error("SQL_ERROR_THROWEN");
				/* wallet transaction */
         
          $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, date, platformType) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($id, 'int'), secure('recharge'), secure(0, 'int'), secure($_POST['price'] ), secure('in'), secure($date),secure($_POST['paymentMethod']))) or _error("SQL_ERROR_THROWEN");
			}
			    // return
         returnResponse(true,200,"Wallet balance added successfully");

    }else{
          returnResponse(false,300,"parameters missing");
    }
}


function updatesendmoneyWAlletBalanceFunction(){
  try 
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       global $db, $system, $date;
      mysqli_report (MYSQLI_REPORT_OFF);
       
      if(isset($_POST['user_email']) && isset($_POST['reciver_email']) && isset($_POST['price']) )
      {
        
        $amount= $_POST['price'];
          $check_user = $db->query(sprintf("SELECT user_id as id, user_wallet_balance as user_wallet_balance, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['user_email']))) or _error("SQL_ERROR_THROWEN");
          $check_user= $check_user->fetch_assoc();
          $user_id =   $check_user['id'];
        
           $reciver_user = $db->query(sprintf("SELECT user_id as id, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['reciver_email']))) or _error("SQL_ERROR_THROWEN");
          $reciver_user= $reciver_user->fetch_assoc();
          $reciver_id =   $reciver_user['id'];

          if ($check_user['user_wallet_balance'] < $amount) {
            //throw new Exception(__("Your current wallet balance is") . " <strong>" . $system['system_currency_symbol'] . $check_user['user_wallet_balance'] . "</strong>, " . __("Recharge your wallet to continue"));

            returnResponse(false,400,"Your current wallet balance is ". $system['system_currency_symbol']."".$check_user['user_wallet_balance'] ." Recharge your wallet to continue");

        }
        else {
        $db->query(sprintf('UPDATE users SET user_wallet_balance = IF(user_wallet_balance-%1$s<=0,0,user_wallet_balance-%1$s) WHERE user_id = %2$s', secure($amount), secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");

        $db->query(sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($amount), secure($reciver_id, 'int'))) or _error("SQL_ERROR_THROWEN");

         $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, paymentMode, date) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($user_id, 'int'), secure('user'), secure($reciver_id, 'int'), secure($amount), secure('out'), secure('wallet'), secure($date))) or _error("SQL_ERROR_THROWEN");
        

        $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, paymentMode, date) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($reciver_id, 'int'), secure('user'), secure($user_id, 'int'), secure($amount), secure('in'), secure('wallet'), secure($date))) or _error("SQL_ERROR_THROWEN");        

          returnResponse(true,200,"Success");
       
        }
      }
        else {
           returnResponse(false,300,"parameters missing");
         }
      
     }
       
       else {
         returnResponse(false,300,"Something went wrong");
         }
       
     }
     catch(Exception $e){
         returnResponse(false,400,$e->getMessage());
      }
}


function getAllTransactionsFunction(){
  try 
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       global $db, $system, $date;
      mysqli_report (MYSQLI_REPORT_OFF);
      if(isset($_POST['email']))
      {
         $check_user = $db->query(sprintf("SELECT user_id as id, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
              $check_user= $check_user->fetch_assoc();

          $user_id = $check_user['id'];

        $get_transactions = $db->query(sprintf("SELECT ads_users_wallet_transactions.*, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.user_picture FROM ads_users_wallet_transactions LEFT JOIN users ON ads_users_wallet_transactions.node_type='user' AND ads_users_wallet_transactions.node_id = users.user_id WHERE ads_users_wallet_transactions.user_id = %s ORDER BY ads_users_wallet_transactions.transaction_id DESC", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_transactions->num_rows > 0) {
           $result= $get_transactions->fetch_all();
              returnResponse(true,200,"Success",$result);
            
          }
          else {
              returnResponse(false,402,"Transactions history is empty" );
          }
       
        }

        else {
           returnResponse(false,300,"parameters missing");
         }
      
     }
       
       else {
         returnResponse(false,300,"Something went wrong");
         }

     }
     catch(Exception $e){
         returnResponse(false,400,$e->getMessage());
      }
}
