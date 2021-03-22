<?php

/**
 * ajax -> posts -> reaction
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
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
	_error(400);
}

try {
	$userGlobal = new UserGlobal();
	// initialize the return array
	$return = array();

	switch ($_POST['do']) {
		case 'delete_post':
			// delete post
			$refresh = $userGlobal->delete_post($_POST['id']);
			//if ($refresh) {
			/* return */
			if ($refresh) {
				$return['refresh'] ="delete_single_post";
			}
			// $return['refresh'] = true;
			//}
			break;
			/*
		case 'approve_post':
			// approve post
			$userGlobal->approve_post($_POST['id']);
			break;

		case 'sold_post':
			// sold post
			$userGlobal->sold_post($_POST['id']);
			break;

		case 'unsold_post':
			// unsold post
			$userGlobal->unsold_post($_POST['id']);
			break;

		case 'save_post':
			// save post
			$userGlobal->global_save_post($_POST['id']);
			break;

		case 'unsave_post':
			// unsave post
			$userGlobal->global_unsave_post($_POST['id']);
			break;

		case 'boost_post':
			// boost post
			$userGlobal->global_boost_post($_POST['id']);
			break;

			/*case 'unboost_post':
			// unboost post
			$userGlobal->unboost_post($_POST['id']);
			break;

		case 'pin_post':
			// pin post
			$userGlobal->global_pin_post($_POST['id']);
			break;

		case 'unpin_post':
			// unpin post
			$userGlobal->unpin_post($_POST['id']);
			break;
*/
		case 'react_post':
			// react post
			$userGlobal->global_react_post($_POST['id'], $_POST['reaction']);
			break;

		case 'unreact_post':
			// unreact post
			$userGlobal->global_unreact_post($_POST['id'], $_POST['reaction']);
			break;

		case 'react_photo':
			// react photo
			$userGlobal->global_react_photo($_POST['id'], $_POST['reaction']);
			break;

			/*case 'unreact_photo':
			// unreact photo
			$userGlobal->unreact_photo($_POST['id'], $_POST['reaction']);
			break;

		case 'hide_post':
			// hide post
			$userGlobal->hide_post($_POST['id']);
			break;

		case 'unhide_post':
			// unhide post
			$userGlobal->unhide_post($_POST['id']);
			break;

		case 'allow_post':
			// allow post on timelinw
			$userGlobal->allow_post($_POST['id']);
			break;

		case 'disallow_post':
			// disallow post from timeline
			$userGlobal->disallow_post($_POST['id']);
			break;

	
*/
		case 'disable_comments':
			// disable post comments
			$userGlobal->disable_post_comments($_POST['id']);
			break;

		case 'enable_comments':
			// enable post comments
			$userGlobal->enable_post_comments($_POST['id']);
			break;
		case 'delete_comment':
			// delete comment
			$userGlobal->global_delete_comment($_POST['id']);
			break;

		case 'react_comment':
			// react comment
			$userGlobal->global_react_comment($_POST['id'], $_POST['reaction']);
			break;

		case 'unreact_comment':
			// unreact comment
			$userGlobal->global_unreact_comment($_POST['id'], $_POST['reaction']);
			break;

		case 'add_vote':
			// add vote
			//$userGlobal->add_vote($_POST['id']);
			break;

		case 'delete_vote':
			// delete vote
			//$userGlobal->delete_vote($_POST['id']);
			break;

		case 'change_vote':
			// valid inputs
			if (!isset($_POST['checked_id']) || !is_numeric($_POST['checked_id'])) {
				_error(400);
			}

			// change vote
			$user->change_vote($_POST['id'], $_POST['checked_id']);
			break;

		case 'hide_announcement':
			$user->hide_announcement($_POST['id']);
			break;

		case 'hide_daytime_message':
			// hide daytime message
			$secured = (get_system_protocol() == "https") ? true : false;
			$expire = time() + 21600; /* expire after 6 hours */
			setcookie('dt_msg', 'true', $expire, '/', "", $secured, true);
			break;

		case 'update_video_views':
			// update media views (video)
			$user->update_media_views('video', $_POST['id']);
			break;

		case 'update_audio_views':
			// update media views (audio)
			$user->update_media_views('audio', $_POST['id']);
			break;

		case 'bookmark_post':
			$res = $userGlobal->bookmark_post($_POST['id']);
			if ($res == 1) {
				modal("SUCCESS", __("Already exist"), "Post already exist in bookmarks list");
			} else {
				modal("SUCCESS", __("Success"), "Post added in bookmarks list");
			}
			break;

		case 'bookmark_post_remove':
			$userGlobal->bookmark_post_remove($_POST['id']);
			modal("SUCCESS", __("Removed"), "Post removed in bookmarks list");
			break;
	}

	// return & exit
	return_json($return);
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}
