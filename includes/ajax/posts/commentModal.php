<?php

/**
 * ajax -> posts -> lightbox
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
try {
	$return = array();
	$post = $user->get_post($_POST['id']);
	if (!$post) {
		_error(404);
	}
	/* assign variables */
	$smarty->assign('post', $post);

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
	/* get user pages */
	$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
	$smarty->assign('pages', $pages);
	/* get user pages */
	$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
	/* assign variables */
	$smarty->assign('groups', $groups);

	$return['next'] = null;
	$return['prev'] = null;
	$return['lightbox'] = $smarty->fetch("commentModal-post.tpl");

	// return & exit
	return_json($return);
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}
//page_footer("global-profile/commentModal-post");
