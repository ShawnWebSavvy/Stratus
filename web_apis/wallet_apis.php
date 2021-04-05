<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
mysqli_report(MYSQLI_REPORT_ALL);
function getWalletBalance($token){
  try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db, $system,$date;


      $checkToken = checkHeaders($token);

      if($checkToken == 402){
        returnResponse(false,402,"Access token missing");
      }elseif($checkToken == 400){
        returnResponse(false,402,"Invalid access token provided");
      }else{
      //  print_r($_POST); die;
        if(isset($_POST['email'])){
            //  $apiResponseNew  =  (new User())->httpGetCurl('/users/whitelabel/get-user-info/' . $_POST['email']);
            //      $apiResponse = $apiResponseNew;
            // print_r($apiResponse); die;
          // $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s", secure($_POST['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
          // $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s", secure($_POST['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
          $check_user= $check_user->fetch_assoc();
          if($check_user['count'] < 1){

            //returnResponse(false,402,"Invalid user");

            // check if user exist on knox
                 $apiResponseNew  =  (new User())->httpGetCurl('/users/whitelabel/get-user-info/' . $_POST['email']);
                 $apiResponse = $apiResponseNew;

                 if (array_key_exists('userId', $apiResponse)) {
                      $knox_user_id = $apiResponse['userId'];
                      $email = $apiResponse['email'];
                      $hash = $apiResponse['hash'];
                      $user_email_verified = 1;
                      $user_activated = 1;
                       $db->query(sprintf("INSERT INTO users (user_name,user_email,user_password, user_firstname,user_lastname,user_gender,user_registered,knox_user_id,user_email_verified,user_activated) VALUES (%s,%s,%s,%s, %s,%s,%s,%s,%s,%s)", secure($email), secure($email), secure($hash), secure(''), secure(''), secure('other'), secure($date), secure($knox_user_id), $user_email_verified, $user_activated)) or _error("SQL_ERROR_THROWEN");
                        $getUserData = (new User())->checkUserAndGetData($email);
                      $emailArray = explode("@", $email);
                      $userName = $emailArray[0] . $getUserData['user_id'];
                      $db->query(sprintf("UPDATE users SET user_name =%s WHERE user_email = %s", secure($userName), secure($email))) or _error("SQL_ERROR_THROWEN");

                      $wallet_query = $db->query(sprintf("SELECT  * FROM users WHERE user_email = %s", secure(  $_POST['email']))) or _error("SQL_ERROR_THROWEN");
                        $result= $wallet_query->fetch_assoc();
                        if(!empty($result)){
                          $user_details = array(
                            "user_id"=> $result['user_id'],
                            "user_name"=> $result['user_name'],
                          "user_email"=> $result['user_email'],
                            "user_affiliate_balance"=> $result['user_affiliate_balance'],
                            "user_wallet_balance"=> $result['user_wallet_balance'],
                            "user_points"=> $result['user_points'],

                          );
                          returnResponse(true,200,"Success",$user_details);
                        }else{
                          returnResponse(false,300,"Something went wrong");

                        }
                  } else {
                     returnResponse(false,402,"Invalid user, doesn't belong to any account");
                  }

            //check if user exist on knox END

          }else{
            // $wallet_query = $db->query(sprintf("SELECT  * FROM users WHERE user_id = %s", secure($_POST['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            $wallet_query = $db->query(sprintf("SELECT  * FROM users WHERE user_email = %s", secure(  $_POST['email']))) or _error("SQL_ERROR_THROWEN");

            $result= $wallet_query->fetch_assoc();
            if(!empty($result)){
              $user_details = array(
                "user_id"=> $result['user_id'],
                "user_name"=> $result['user_name'],
               "user_email"=> $result['user_email'],
                "user_affiliate_balance"=> $result['user_affiliate_balance'],
                "user_wallet_balance"=> $result['user_wallet_balance'],
                "user_points"=> $result['user_points'],

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


function updateWAlletBalanceFunction($token)
{
  try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db, $system, $date;

      $checkToken = checkHeaders($token);

      if ($checkToken == 402) {
        returnResponse(false, 402, "Access token missing");
      } elseif ($checkToken == 400) {
        returnResponse(false, 402, "Invalid access token provided");
      } else {

        if (isset($_POST['email']) && isset($_POST['price'])) {
          $check_user = $db->query(sprintf("SELECT user_id as id, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
          $check_user = $check_user->fetch_assoc();

          //  print_r($check_user); die;

          if ($check_user['count'] < 1) {
            returnResponse(false, 402, "Invalid user");
          } else {
            $query =   $db->query(sprintf('UPDATE users SET user_wallet_balance = IF(user_wallet_balance-%1$s<=0,0,user_wallet_balance-%1$s) WHERE user_id = %2$s', secure($_POST['price']), secure($check_user['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($query == true) {
              /* log this transaction */
              //  wallet_transaction_logs($_POST['id'], 'videohub_package_payment', 0, $_POST['price'], 'out');
              if(isset($_POST['type']) && $_POST['type'] == "video_purchase"){
                $packageType = "video_purchase";
              }else{
                $packageType = "videohub_package_payment";
              }
              $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, date, platformType, paymentMode) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($check_user['id'], 'int'), secure($packageType), secure(0, 'int'), secure($_POST['price']), secure('out'), secure($date), secure('videohub', 'string'), secure('wallet', 'string'))) or _error("SQL_ERROR_THROWEN");

              returnResponse(true, 200, "Success");
            } else {
              returnResponse(false, 300, "Something went wrong");
            }
          }
        } else {
          returnResponse(false, 300, "parameters missing");
        }
      }
    } else {
      returnResponse(false, 402, "Invalid request");
    }
  } catch (Exception $e) {
    //echo $e->getMessage();
    returnResponse(false, 300, $e->getMessage());
  }
}


/**
 * Api to add Credit to wallet
 */

function replenishCreditFunction($token)
{
  try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db, $system, $date;
      $checkToken = checkHeaders($token);
      if ($checkToken == 402) {
        returnResponse(false, 402, "Access token missing");
      } elseif ($checkToken == 400) {
        returnResponse(false, 402, "Invalid access token provided");
      } else {

        if (isset($_POST['email']) && isset($_POST['paymentMethod']) && $_POST['price']) {
          $check_user = $db->query(sprintf("SELECT user_id as id, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
          $check_user = $check_user->fetch_assoc();

          if ($check_user['count'] < 1) {
            returnResponse(false, 402, "Invalid user");
          } else {
            switch ($_POST['paymentMethod']) {
              case 'paypal':
                returnResponse(true, 402, 'Feature will come soon');
                break;
              case 'stripe':
                addWalletPointsUsingStripe($check_user['id']);
                break;
              default:
                returnResponse(true, 402, 'Invalid payment type');
                break;
            }
          }
        } else {
          returnResponse(false, 300, "parameters missing");
        }
      }
    } else {
      returnResponse(false, 402, "Invalid request");
    }
  } catch (Exception $e) {
    returnResponse(false, 400, $e->getMessage());
  }
}

function addWalletPointsVideo()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $db, $date;
    mysqli_report(MYSQLI_REPORT_OFF);
    if(!isset($_POST['amount'])) {
      returnResponse(false, 401, "Insufficient Amount");
      die;
    }
    if($_POST['amount'] < 1) {
      returnResponse(false, 401, "Insufficient Amount");
      die;
    }
    if(!isset($_POST['email'])) {
      returnResponse(false, 401, "User Details are Missing");
      die;
    }else{
      $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
      $check_user = $check_user->fetch_assoc();
      if ($check_user['count'] < 1) {
        returnResponse(false, 402, "Invalid user");
      } else {
        $check_query = $db->query(sprintf("SELECT * FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
        $result = $check_query->fetch_assoc();
        $id = $result['user_id'];
        $chargeQuery = sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($_POST['amount']), secure($id, 'int'));
        $db->query($chargeQuery) or _error("SQL_ERROR_THROWEN");
        /* wallet transaction */
        $transc = sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, date, platformType, paymentMode) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($id, 'int'), secure('withdraw_points', 'string'), secure($id, 'int'), secure($_POST['amount']), secure('in'), secure($date), secure('TubeNow', 'string'), secure('wallet', 'string'));
        $db->query($transc) or _error("SQL_ERROR_THROWEN");
        returnResponse(true, 200, "Wallet balance added successfully");
      }
      // return
      
    }
  } else {
    returnResponse(false, 300, "parameters missing");
  }
}

function addWalletPointsUsingStripe($id)
{

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

  if (isset($_POST['email']) && isset($_POST['card_token']) &&  isset($_POST['price'])) {
    global $db, $system, $date;

    // echo $system['stripe_mode']; die;
    // process
    require_once(ABSPATH . 'includes/libs/Stripe/init.php');
    $secret_key = ($system['stripe_mode'] == "live") ? $system['stripe_live_secret'] : $system['stripe_test_secret'];
    //$secret_key = 'sk_test_51IEYaWD19oXaFHIsTj3rdRnMn195R5vOdBfIGTixjwfTxuUm6OjDdRTuXAgR6sTkZQ22LvZCQVj7R9JnJoWpa3xU00O1UMk81L'; // for testing
    \Stripe\Stripe::setApiKey($secret_key);
    $customer = \Stripe\Customer::create(array(
      'email' => $_POST['email'],
      'source' => $_POST['card_token']
    ));

    $charge   = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'receipt_email' => $_POST['email'],
      'amount' => $_POST['price'] * 100,
      'currency' => $system['system_currency']
    ));

    if ($charge) {
      // update user wallet balance
      $chargeQuery = sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($_POST['price']), secure($id, 'int'));
      $db->query($chargeQuery) or _error("SQL_ERROR_THROWEN");
      /* wallet transaction */

      $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, date, platformType) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($id, 'int'), secure('recharge'), secure(0, 'int'), secure($_POST['price']), secure('in'), secure($date), secure($_POST['paymentMethod']))) or _error("SQL_ERROR_THROWEN");
    }
    // return
    returnResponse(true, 200, "Wallet balance added successfully");
  } else {
    returnResponse(false, 300, "parameters missing");
  }
}


function updatesendmoneyWAlletBalanceFunction()
{
  try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db, $system, $date;
      mysqli_report(MYSQLI_REPORT_OFF);

      if (isset($_POST['user_email']) && isset($_POST['reciver_email']) && isset($_POST['price'])) {

        $amount = $_POST['price'];
        $check_user = $db->query(sprintf("SELECT user_id as id, user_wallet_balance as user_wallet_balance, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['user_email']))) or _error("SQL_ERROR_THROWEN");
        $check_user = $check_user->fetch_assoc();
        $user_id =   $check_user['id'];
        if (!is_numeric($amount) ) {
          returnResponse(false, 400, "Invalid Amount.");
          die;
        }
        if ($amount < 1) {
          returnResponse(false, 400, "Invalid Amount.");
          die;
        }
        $reciver_user = $db->query(sprintf("SELECT user_id as id, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['reciver_email']))) or _error("SQL_ERROR_THROWEN");
        $reciver_user = $reciver_user->fetch_assoc();
        $reciver_id =   $reciver_user['id'];

        if ($check_user['user_wallet_balance'] < $amount) {
          //throw new Exception(__("Your current wallet balance is") . " <strong>" . $system['system_currency_symbol'] . $check_user['user_wallet_balance'] . "</strong>, " . __("Recharge your wallet to continue"));

          returnResponse(false, 400, "Your current wallet balance is " . $system['system_currency_symbol'] . "" . $check_user['user_wallet_balance'] . " Recharge your wallet to continue");
        } else {
          $db->query(sprintf('UPDATE users SET user_wallet_balance = IF(user_wallet_balance-%1$s<=0,0,user_wallet_balance-%1$s) WHERE user_id = %2$s', secure($amount), secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");

          $db->query(sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($amount), secure($reciver_id, 'int'))) or _error("SQL_ERROR_THROWEN");

          $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, paymentMode, date) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($user_id, 'int'), secure('user'), secure($reciver_id, 'int'), secure($amount), secure('out'), secure('wallet'), secure($date))) or _error("SQL_ERROR_THROWEN");


          $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, paymentMode, date) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($reciver_id, 'int'), secure('user'), secure($user_id, 'int'), secure($amount), secure('in'), secure('wallet'), secure($date))) or _error("SQL_ERROR_THROWEN");

          returnResponse(true, 200, "Success");
        }
      } else {
        returnResponse(false, 300, "parameters missing");
      }
    } else {
      returnResponse(false, 300, "Something went wrong");
    }
  } catch (Exception $e) {
    returnResponse(false, 400, $e->getMessage());
  }
}


function getAllTransactionsFunction()
{
  try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db, $system, $date;
      mysqli_report(MYSQLI_REPORT_OFF);
      if (isset($_POST['email'])) {
        $check_user = $db->query(sprintf("SELECT user_id as id, COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
        $check_user = $check_user->fetch_assoc();

        $user_id = $check_user['id'];
        if(!isset($_POST['offset']) || $_POST['offset'] == ""){
          $_POST['offset'] = 0;
        }
        //Add Pagiantion
        $transactions = [];
        $coin_full_name = array('btc'=>'Bitcoin','eth'=>'Ethereum','apl','Apollo');
        $query = sprintf("SELECT ads_users_wallet_transactions.*, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.user_picture FROM ads_users_wallet_transactions LEFT JOIN users ON ads_users_wallet_transactions.node_type='user' AND ads_users_wallet_transactions.node_id = users.user_id WHERE ads_users_wallet_transactions.user_id = %s ORDER BY ads_users_wallet_transactions.transaction_id DESC Limit ".$_POST['offset'].",10", secure($user_id, 'int'));
        $get_transactions = $db->query($query) or _error("SQL_ERROR_THROWEN");
        if ($get_transactions->num_rows > 0) {
          while ($transaction = $get_transactions->fetch_assoc()) {
              // print_r($transaction); die;
              if(!empty($transaction['currency'])&&($transaction['tnx_type']=='buy'||$transaction['tnx_type']=='sell')){
                  $transaction['currency_detail'] = (($transaction['tnx_type']=='buy')?'Buy ':'Sell ').$coin_full_name[$transaction['currency']];
              }
              if ($transaction['node_type'] == "user") {
                  $transaction['user_picture'] = get_picture($transaction['user_picture'], $transaction['user_gender']);
              }
              $transactions[] = $transaction;
          }
          returnResponse(true, 200, "Success", $transactions);
        } else {
          returnResponse(false, 402, "Transactions history is empty");
        }
      } else {
        returnResponse(false, 300, "parameters missing");
      }
    } else {
      returnResponse(false, 300, "Something went wrong");
    }
  } catch (Exception $e) {
    returnResponse(false, 400, $e->getMessage());
  }
}

function listUsersFunction()
{
  try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db, $system, $date;
      mysqli_report(MYSQLI_REPORT_OFF);
      if(!isset($_POST['email'])) {
        returnResponse(false, 401, "Email is Missing");
        die;
      }
        $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
        $check_user = $check_user->fetch_assoc();
      if ($check_user['count'] < 1) {
        returnResponse(false, 402, "Invalid user");
      } else {
        $check_query = $db->query(sprintf("SELECT  * FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
        $result = $check_query->fetch_assoc();
      if(!isset($_POST['type']) || !in_array($_POST['type'], array("single", "tags"))) {
        returnResponse(false, 401, "Type not Mentioned");
      }else if(!isset($_POST['query'])) {
        returnResponse(false, 401, "Query Parameter Missing");
      }else if($_POST['type'] == "tags" && !isset($_POST['skipped_ids'])) {
        returnResponse(false, 400, "Type Missing");
      }else{
        if(isset($_POST['skipped_ids'])) {
          $_POST['skipped_ids'] = json_decode($_POST['skipped_ids']);
          if(!is_array($_POST['skipped_ids'])) {
            returnResponse(false, 400, "Parameter Not passed Properly");
          }
          /* skipped_ids must contain numeric values only */
          $_POST['skipped_ids'] = array_filter($_POST['skipped_ids'], 'is_numeric');
        }else{
          $_POST['skipped_ids'] = [];
        }
        $user = new User();
        $return = array();
        $return['type'] = $_POST['type'];
        $return['users'] = [];
        // get users
        $users = $user->get_users_api($_POST['query'], $result['user_id'], $_POST['skipped_ids']);
        if(count($users) > 0) {
          $return['users'] = $users;
        }
        returnResponse(true, 200, "Success", $return);
      }
    }
    } else {
      returnResponse(false, 300, "Something went wrong");
    }
  } catch (Exception $e) {
    returnResponse(false, 400, $e->getMessage());
  }
}

function walletTransferFunction()
{
  try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db, $system, $date;
      mysqli_report(MYSQLI_REPORT_OFF);
      if(!isset($_POST['amount'])) {
        returnResponse(false, 401, "Amount is Missing");
        die;
      }
      if($_POST['amount'] < 1) {
        returnResponse(false, 401, "Amount is Missing");
        die;
      }
      if(!isset($_POST['send_to_id'])) {
        returnResponse(false, 401, "Receiver User is Missing");
        die;
      }
      if($_POST['send_to_id'] < 1) {
        returnResponse(false, 401, "Receiver User is Missing");
        die;
      }
      if(!isset($_POST['email'])) {
        returnResponse(false, 401, "Email is Missing");
        die;
      }else{
        $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
        $check_user = $check_user->fetch_assoc();
      if ($check_user['count'] < 1) {
        returnResponse(false, 402, "Invalid user");
      } else {
        $check_query = $db->query(sprintf("SELECT * FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
        $result = $check_query->fetch_assoc();
        if($_POST['amount'] > $result['user_wallet_balance']){
          returnResponse(false, 401, "Not Enough Money");
        }else if($_POST['send_to_id'] > 0){
          $check_users = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s", secure($_POST['send_to_id']))) or _error("SQL_ERROR_THROWEN");
          $check_usersVa = $check_users->fetch_assoc();
          if ($check_usersVa['count'] < 1) {
            returnResponse(false, 402, "Selected User Not Found");
          }else{
            $user = new User();
            $return = array();
            $return['response'] = [];
            // get users
            $walletResponse = $user->wallet_transfer_api($_POST['send_to_id'], $result, $_POST['amount']);
            returnResponse(true, 200, "Success", true);
          }
        }
      }
      }
      
    } else {
      returnResponse(false, 300, "Something went wrong");
    }
  } catch (Exception $e) {
    returnResponse(false, 400, $e->getMessage());
  }
}

function withdrawAffiliatesFunction()
{
  try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db, $system, $date;
      mysqli_report(MYSQLI_REPORT_OFF);
      if(!isset($_POST['amount'])) {
        returnResponse(false, 401, "Insufficient Amount");
        die;
      }
      if($_POST['amount'] < 1) {
        returnResponse(false, 401, "Insufficient Amount");
        die;
      }
      if(!isset($_POST['email'])) {
        returnResponse(false, 401, "User Details are Missing");
        die;
      }else{
        $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
        $check_user = $check_user->fetch_assoc();
      if ($check_user['count'] < 1) {
        returnResponse(false, 402, "Invalid user");
      } else {
        $user = new User();
        $amount = $_POST['amount'];
        $check_query = $db->query(sprintf("SELECT * FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
        $result = $check_query->fetch_assoc();
        $user_id = $result['user_id'];
        /* increase target user wallet balance */
        $queryS = sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($amount), secure($user_id, 'int'));
        $db->query($queryS) or _error("SQL_ERROR_THROWEN");
        /* wallet transaction */
        $user->wallet_set_transaction($user_id, 'user', $user_id, $amount, 'in' ,'TubeNow');
        returnResponse(true, 200, "Success", true);
      }
      }
      
    } else {
      returnResponse(false, 300, "Something went wrong");
    }
  } catch (Exception $e) {
    returnResponse(false, 400, $e->getMessage());
  }
}

/**
 * Function to update password on knox & stratus
 * @ email:
 */
function sendResetPasswordKeyFunction($token)
{
    try{
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          global $db, $system, $date;

          $checkToken = checkHeaders($token);

          if ($checkToken == 402) {
            returnResponse(false, 402, "Access token missing");
          } elseif ($checkToken == 400) {
            returnResponse(false, 402, "Invalid access token provided");
          } else {
                    if(isset($_POST['email'])){
                        $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
                        $check_user= $check_user->fetch_assoc();
                        if($check_user['count'] < 1){

                          returnResponse(false,402,"Invalid user");

                        }
                        else{
                                $email = $_POST['email'];
                                $getUserData = getUserDataByEmail($email);
                                $knox_user_id = 0;
                                if (is_array($getUserData) == 1 && array_key_exists('knox_user_id', $getUserData) && isset($getUserData['knox_user_id'])) {
                                  $knox_user_id = $getUserData['knox_user_id'];

                                    if ($knox_user_id == "" || $knox_user_id == "0") {
                                        $apiResponseNew  =  httpGetCurlMethod('/users/whitelabel/get-user-info/' . $email);
                                        if (array_key_exists('userId', $apiResponseNew)) {
                                          $knox_user_id = $apiResponseNew['userId'];
                                        } else {
                                          returnResponse(false, 402, "Please Contact Administrator. Something went wrong with your Email");
                                        }
                                      }
                                      /* generate reset key */
                                      $reset_key = get_hash_key(6);
                                      /* update user */
                                      $db->query(sprintf("UPDATE users SET user_reset_key = %s, user_reseted = '1', knox_user_id = %s WHERE user_email = %s", secure($reset_key), secure($knox_user_id), secure($email))) or _error("SQL_ERROR_THROWEN");
                                      /* prepare reset email */
                                      $subject = __("Forget password activation key!");
                                      $body = get_email_template("forget_password_platforms", $subject, ["email" => $email, "reset_key" => $reset_key]);

                                      /* send email */
                                      if (!_email($email, $subject, $body['html'], $body['plain'])) {
                                        returnResponse(false, 402, "Activation key email could not be sent!");
                                      }
                                       //$details = getUserDataByEmail($email);
                                       $details = ["email" => $email , "reset_token" => $reset_key];
                                      returnResponse(true, 200, "Success", $details);

                                } else if (!is_array($getUserData) == 1) {
                                  $userInfoApiResponse = httpGetCurlMethod('/users/whitelabel/get-user-info/' . $email);
                                  // print_r($userInfoApiResponse);
                                  // die;
                                  if (is_array($userInfoApiResponse) == 1 && array_key_exists('data', $userInfoApiResponse) && (is_empty($userInfoApiResponse['data']) || $userInfoApiResponse['data'] == 0)) {
                                    returnResponse(false, 402, "Sorry it looks like email doesn't belong to any account");
                                  }
                                }else{
                                      returnResponse(false,300,"someting went wrong.");
                                }
                        }
                    }
                    else{
                        returnResponse(false,300,"parameters missing");
                    }
          }
      }
      else{
           returnResponse(false,402,"Invalid request");
      }
    }
    catch(Exception $e){
        returnResponse(false,300,$e->getMessage());
    }
} //End of function



/**
 * Function to reset Password
 * @Params : email, token , new_password
 */

function updatePasswordByKeyFunction($token){
  try{
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               global $db, $system, $date;

          $checkToken = checkHeaders($token);

          if ($checkToken == 402) {
            returnResponse(false, 402, "Access token missing");
          } elseif ($checkToken == 400) {
            returnResponse(false, 402, "Invalid access token provided");
          } else {
               if(isset($_POST['email']) && isset($_POST['token']) &&  isset($_POST['new_password'])){
                        $email = $_POST['email'];
                        $reset_key = $_POST['token'];
                        $password = $_POST['new_password'];
                        $check_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_email = %s", secure($_POST['email']))) or _error("SQL_ERROR_THROWEN");
                        $check_user= $check_user->fetch_assoc();
                        if($check_user['count'] < 1){

                          returnResponse(false,402,"Invalid user");

                        }
                        else{
                              /* check reset key */
                              $check_key = $db->query(sprintf("SELECT * FROM users WHERE user_email = %s AND user_reset_key = %s AND user_reseted = '1'", secure($email), secure($reset_key))) or _error("SQL_ERROR_THROWEN");
                              $check_key =  $check_key->fetch_assoc();
                             // print_r($check_key); die;
                             // if (!is_array($check_key) == 1 && count($check_key) == 0) {
                              if (empty($check_key)) {
                                  returnResponse(false,402,"Invalid code, please try again");
                                  exit();
                              }
                              /* check password length */
                              if (strlen($password) < 6) {
                                   returnResponse(false,402,"Your password must be at least 6 characters long. Please try another");
                                    exit();
                              }
                              $knox_user_id = $check_key["knox_user_id"];
                              $apiResponse  =  httpPostCurlMethod("/users/whitelabel/update-password", array("password" => $password, "userId" => $knox_user_id));

                              if (is_array($apiResponse) && array_key_exists('hash', $apiResponse)) {
                                $hash = $apiResponse['hash'];
                                $db->query(sprintf("UPDATE users SET user_password = %s, user_reseted = '0' WHERE user_email = %s", secure($hash), secure($email))) or _error("SQL_ERROR_THROWEN");
                                    $details = ["email" => $email , "password" => $hash];
                                    returnResponse(true,200,"Success", $details);
                              } else {
                                returnResponse(false,402,"Something went wrong");
                              }

                        }
                    }
                    else{
                        returnResponse(false,300,"parameters missing");
                    }

          }
      }
      else{
          returnResponse(false,402,"Invalid request");
      }
  }
  catch(Exception $e){
        returnResponse(false,300,$e->getMessage());
  }
}