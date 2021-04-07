<?php
require('bootloader.php');
include_once("inc/startServer.php");
// user access
user_access(true);
// page header

//error_reporting(E_ALL);

page_header(__("chat"));

try {

	// check the view
	$view = (!isset($_GET['view']))? 'chat' : 'new';

	// get view content
	if($view == 'chat') {

		if (!isset($_GET['cid'])) {
			if($user->_data['conversations']) {
				$conversation = $user->_data['conversations'][0];
				$conversation['messages'] = $user->get_conversation_messages($conversation['conversation_id']);
			}
		} else {
			/* check cid is valid */
			if(is_empty($_GET['cid']) || !is_numeric($_GET['cid'])) {
				_error(404);
			}
			$conversation = $user->get_conversation($_GET['cid']);
			$conversation['messages'] = $user->get_conversation_messages($conversation['conversation_id']);
		}
		// assign variables
		//echo "<pre>"; print_r($conversation); die(" hiii");
		$smarty->assign('conversation', $conversation);

	} elseif ($view == 'new') {

		/* get recipient */
		if(isset($_GET['uid'])) {
			$get_recipient = $db->query(sprintf("SELECT user_id, CONCAT(users.user_firstname,' ',users.user_lastname) as user_fullname FROM users WHERE user_id = %s", secure($_GET['uid'], 'int') )) or _error("SQL_ERROR_THROWEN");
			if($get_recipient->num_rows > 0) {
				$recipient = $get_recipient->fetch_assoc();
				/* assign variables */
				$smarty->assign('recipient', $recipient);
			}
		}
		
	}
	/* assign variables */
	$smarty->assign('view', $view);
	$smarty->assign('active_page', 'LocalHub');
	$smarty->assign('subactive_page', 'chat');

} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}
//$smarty->assign('view', $view);
$smarty->assign('active_page', 'LocalHub');
$smarty->assign('subactive_page', 'chat');
page_footer("chat");
?>