<?php

/**
 * ajax -> posts -> filter (posts|comments)
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

try {
	$userGlobal = new UserGlobal();
	// initialize the return array
	$return = array();
	$smarty->assign('userGlobal', $userGlobal);

	switch ($_GET['handle']) {
		case 'posts':
			// get filtered posts
			$_POST['get'] =  empty($_POST['get']) ? 'newsfeed' : $_POST['get'];
			$posts = $userGlobal->global_profile_get_posts(array('get' => $_POST['get'], 'filter' => $_POST['filter'], 'id' => $_POST['id']));
			/* assign variables */
			$smarty->assign('posts', $posts);
			$smarty->assign('_get', $_POST['get']);
			$smarty->assign('_filter', $_POST['filter']);
			$smarty->assign('_id', $_POST['id']);
			/* return */
			$return['posts'] = $smarty->fetch("global-profile/global-profile_ajax.posts.tpl");
			break;

		case 'comments':
			// get filtered comments
			switch ($_POST['get']) {
				case 'post_comments':
					$comments = $userGlobal->global_get_comments($_POST['id'], 0, true, false);
					break;

				case 'post_comments_top':
					$comments = $userGlobal->global_get_comments($_POST['id'], 0, true, false, [], true);
					break;

				case 'photo_comments':
					$comments = $userGlobal->global_get_comments($_POST['id'], 0, false, false);
					break;

				case 'photo_comments_top':
					$comments = $userGlobal->global_get_comments($_POST['id'], 0, false, false, [], true);
					break;
			}
			/* assign variables */
			$smarty->assign('comments', $comments);
			/* return */
			$return['comments'] = $smarty->fetch("ajax.comments.tpl");
			break;
	}

	// return & exit
	return_json($return);
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}
