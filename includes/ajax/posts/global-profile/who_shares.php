<?php
/**
 * ajax -> posts -> who shares
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
if(!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
	_error(400);
}

try {

    $userGlobal = new UserGlobal();
	// initialize the return array
	$return = array();

	// get shares
	$posts = $userGlobal->who_shares($_GET['post_id']);
	/* assign variables */
	$smarty->assign('posts', $posts);
	$smarty->assign('id', $_GET['post_id']);
	/* return */
	$return['template'] = $smarty->fetch("ajax.who_shares.tpl");
	$return['callback'] = "$('#modal').modal('show'); $('.modal-content:last').html(response.template);";

	// return & exit
	return_json($return);

} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}


?>