<?php

/**
 * ajax -> posts -> share
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../../bootstrap.php');
require_once('../../../../includes/class-user-global.php');
// check AJAX Request
is_ajax();

// user access
user_access(true);

// valid inputs
if (!isset($_POST['post_id']) || !is_numeric($_POST['post_id'])) {
	_error(400);
}

try {
	$userGlobal = new UserGlobal();
	// initialize the return array
	$return = array();

	switch ($_POST['do']) {
		case 'retweet':
			// publish
			$userdata = $userGlobal->retweet($_POST['post_id'], $_POST['do']);

			// return
			modal("SUCCESS", __("Success"),  __("This Post has been Reposted succesfully on your profile"));
			break;

		case 'undoRetweet':
			// prepare publisher
			/* get post */
			$post = $userGlobal->retweet($_POST['post_id'], $_POST['do']);
			if (!$post) {
				_error(404);
			}
			//modal("SUCCESS", __("Success"),  __("Post Undo Retweeted"));
			break;

		default:
			_error(400);
			break;
	}

	// return & exit
	return_json($return);
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}
