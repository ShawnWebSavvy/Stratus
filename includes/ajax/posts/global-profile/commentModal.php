<?php

/**
 * ajax -> posts -> lightbox
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../../bootstrap.php');
require_once('../../../../includes/class-user-global.php');
// check AJAX Request
is_ajax();

// check user logged in
if (!$user->_logged_in) {
	modal('LOGIN');
}
try {
	$userGlobal = new UserGlobal();
	$return = array();
	$post = $userGlobal->global_profile_get_post($_POST['id']);
	//print_r( $post); exit;
	if (!$post) {
		_error(404);
	}
	/* assign variables */
	$smarty->assign('post', $post);
	$smarty->assign('userGlobal', $userGlobal);

	// get ads campaigns
	//$ads_campaigns = $user->ads_campaigns();
	/* assign variables */
	//$smarty->assign('ads_campaigns', $ads_campaigns);

	// get ads
	//$ads = $user->ads('post');
	/* assign variables */
	//$smarty->assign('ads', $ads);

	// get widgets
	//$widgets = $user->widgets('post');
	/* assign variables */
	//$smarty->assign('widgets', $widgets);
	$return['next'] = null;
	$return['prev'] = null;
	$return['lightbox'] = $smarty->fetch("global-profile/commentModal-post-global-profile.tpl");

	// return & exit
	return_json($return);
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}
//page_footer("global-profile/commentModal-post");
