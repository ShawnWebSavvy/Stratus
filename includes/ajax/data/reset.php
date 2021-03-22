<?php

/**
 * ajax -> data -> reset
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();

// check user logged in
if (!$user->_logged_in) {
	modal('LOGIN');
}
if (!$_POST['page']) {
	require('../../../includes/class-user-global.php');
}
// valid inputs
if (!isset($_POST['reset']) || !in_array($_POST['reset'], array('friend_requests', 'messages', 'notifications'))) {
	_error(400);
}

try {

	// reset live counters
	if (isset($_POST['page'])) {
		$user->live_counters_reset($_POST['reset']);
	} else {
		$userGlobal = new UserGlobal();
		$userGlobal->live_counters_reset($_POST['reset']);
	}

	// return & exist
	return_json();
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}
