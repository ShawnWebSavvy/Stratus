<?php

/**
 * post
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');
require_once('includes/class-user-global.php');
// user access
if (!$system['system_public']) {
	user_access();
}

// valid inputs
if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
	_error(404);
}

try {
	$userGlobal = new UserGlobal();
	// get post
	$post = $userGlobal->global_profile_get_post($_GET['post_id']);
	if(!empty($post)){
		$post['childPostData'] = $userGlobal->global_profile_get_child_post($post['post_id'], true, true);
		if ($post['childPostData']) {
			$post['childPostExists'] = true;
		} else {
			$post['childPostExists'] = false;
		}
	}
	
	if (!$post) {
		_error(404);
	}
	/* assign variables */
	$smarty->assign('post', $post);


	// get suggested peopel
	$new_people = $userGlobal->get_new_people(0,  true, "GlobalHub");
	/* assign variables */
	$smarty->assign('new_people', $new_people);
	$smarty->assign('userGlobal', $userGlobal);
	$smarty->assign('active_page', 'GlobalHub');
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page header
page_header($post['og_title'], $post['og_description'], $post['og_image']);

// page footer
page_footer("global-profile/global-profile-post");
