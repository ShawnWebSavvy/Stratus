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
try {
	$userData = $userGlobal->checkTokenAndGetUserData($_GET);
	$userGlobal->global_sign_out(array('user_id' => $userData['user_id']));
	//print_r($userData);
} catch (Exception $e) {
	return_json(array('error' => true, 'message' => $e->getMessage()));
}
