<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);   

/**
 * ajax -> core -> contact
 * 
 * @package Stratus
 * @author Zamblek
 */

// fetch bootstrap
require('../../bootstrap.php');

// check AJAX Request
//is_ajax();

try {
  //echo "dddd".$_GET['token']; 
  //print_r($_POST);
  $userGlobal->globalLogin($_POST);
  // switch ($_POST['transactionType']) {
  //     case 'addMoney':
  //       $userGlobal->whitelableWallet($_POST);
  //       break;
  //     case 'withdrawalMoney':
  //       $userGlobal->whitelableWallet($_POST);
  //       break;
  //     case 'getWalletDataAndbalance':
  //       $userGlobal->getWalletDataAndbalance($_POST);
  //       break;
  //     default:
  //         throw new Exception(__("You must fill in all of the fields 31"));
  //         break;
  // }

  // //print_r($_POST); exit;
  // $user->whitelableWallet($_POST);

} catch (Exception $e) {
  return_json(array('error' => true, 'message' => $e->getMessage()));
}
