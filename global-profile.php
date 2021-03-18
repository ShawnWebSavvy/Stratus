<?php

/**
 * profile
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

// check username
if (is_empty($_GET['username']) || !valid_username($_GET['username'])) {
	_error(404);
}

try {
	$userGlobal = new UserGlobal();
	// [1] get main profile info
	$profile_query = sprintf("SELECT users.*, picture_photo.source as user_picture_full, picture_photo_post.privacy as user_picture_privacy, cover_photo.source as user_cover_full, cover_photo_post.privacy as cover_photo_privacy, packages.name as package_name, packages.color as package_color FROM users LEFT JOIN global_posts_photos as picture_photo ON users.global_user_picture_id = picture_photo.photo_id LEFT JOIN global_posts as picture_photo_post ON picture_photo.post_id = picture_photo_post.post_id LEFT JOIN global_posts_photos as cover_photo ON users.global_user_cover_id = cover_photo.photo_id LEFT JOIN global_posts as cover_photo_post ON cover_photo.post_id = cover_photo_post.post_id LEFT JOIN packages ON users.user_subscribed = '1' AND users.user_package = packages.package_id WHERE users.user_name = %s", secure($_GET['username']));
	$get_profile = $db->query($profile_query) or _error("SQL_ERROR_THROWEN");
	if ($get_profile->num_rows == 0) {
		_error(404);
	}
	$profile = $get_profile->fetch_assoc();

	/* check if banned by the system */
	if ($userGlobal->banned($profile['user_id'])) {
		_error(404);
	}
	/* check if blocked by the viewer */
	if ($userGlobal->blocked($profile['user_id'])) {
		_error(404);
	}

	/*---- global profile datat --*/
	$myquery = sprintf("SELECT * FROM global_profile WHERE user_id = %s", secure($profile['user_id'], 'int'));
	$get_user1 = $db->query($myquery) or _error("SQL_ERROR_THROWEN");

	// $get_user1 = $db->query($userQuery1) or _error("SQL_ERROR_THROWEN");
	if ($get_user1->num_rows > 0) {
		$data1 = $get_user1->fetch_assoc();
		// echo "<pre>";print_r($this->_data1); exit;

		$profile = array_replace($profile, $profile, $data1);
	} else {
		$profile['user_firstname'] = '';
		$profile['user_lastname'] = '';
		$profile['user_biography'] = '';
	}

	if ($profile['user_firstname'] == "") {
		//_error(404);
	}
	/* check username case */
	if (strtolower($_GET['username']) == strtolower($profile['user_name']) && $_GET['username'] != $profile['user_name']) {
		redirect('/' . $profile['user_name']);
	}
	/* get profile picture */
	//$profile['user_picture_default'] = ($profile['global_user_picture'])? false : true;
	//$profile['user_picture'] = get_picture($profile['user_picture'], $profile['user_gender']);

	$profile['global_user_picture'] = get_picture($profile['global_user_picture'], $profile['user_gender']);
	//	$checkImage = image_exist($profile['global_user_picture']);
	if ($system['s3_enabled']) {
		$system['system_uploads'] = $system['system_uploads_url'];
	}
	//	if ($checkImage != 200) {
	//		$profile['global_user_picture'] = $system['system_uploads'] . '/' . $profile['user_picture_full'];
	//	}

	$profile['global_user_picture'] = $system['system_url'] . '/includes/wallet-api/image-exist-api.php?userPicture=' . $profile['global_user_picture'] . '&userPictureFull=' . $system['system_uploads'] . '/' . $profile['user_picture_full'] . '&type=1';

	$profile['user_picture'] = $profile['global_user_picture'];
	$profile['user_picture_full'] = ($profile['user_picture_full']) ? $system['system_uploads'] . '/' . $profile['user_picture_full'] : $profile['user_picture_full'];

	$profile['user_picture_lightbox'] = $userGlobal->check_privacy($profile['user_picture_privacy'], $profile['user_id']);

	if ($profile['global_user_picture'] == "https://cdn1.stratus.co/uploads/") {
		$profile['global_user_picture'] = $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
	}

	if ($profile['user_picture'] == "https://cdn1.stratus.co/uploads/") {
		$profile['user_picture'] = $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
	}

	/* get profile cover */
	//$profile['user_cover_default'] = ($profile['user_cover'])? false : true;
	//$profile['user_cover'] = ($profile['user_cover'])? $system['system_uploads'].'/'.$profile['user_cover'] : $profile['user_cover'];

	$profile['global_user_cover'] = ($profile['global_user_cover']) ? $system['system_uploads'] . '/' . $profile['global_user_cover'] : $profile['global_user_cover'];

	$profile['user_cover_full'] = ($profile['user_cover_full']) ? $system['system_uploads'] . '/' . $profile['user_cover_full'] : $profile['user_cover_full'];
	$profile['user_cover_lightbox'] = $userGlobal->check_privacy($profile['cover_photo_privacy'], $profile['user_id']);
	/* get profile background */
	$profile['user_profile_background'] = ($profile['user_profile_background']) ? $system['system_uploads'] . '/' . $profile['user_profile_background'] : $profile['user_profile_background'];
	/* get the connection &  mutual friends */
	if ($userGlobal->_logged_in && $profile['user_id'] != $userGlobal->_data['user_id']) {
		/* get the connection */
		$profile['we_friends'] = (in_array($profile['user_id'], $userGlobal->_data['friends_ids'])) ? true : false;
		$profile['he_request'] = (in_array($profile['user_id'], $userGlobal->_data['friend_requests_ids'])) ? true : false;
		$profile['i_request'] = (in_array($profile['user_id'], $userGlobal->_data['friend_requests_sent_ids'])) ? true : false;
		$profile['i_follow'] = (in_array($profile['user_id'], $userGlobal->_data['followings_ids'])) ? true : false;
		$profile['friendship_declined'] = $userGlobal->friendship_declined($profile['user_id']);
		$profile['i_poked'] = $userGlobal->poked($profile['user_id']);
		/* get mutual friends */
		$profile['mutual_friends_count'] = $userGlobal->get_mutual_friends_count($profile['user_id']);
		$profile['mutual_friends'] = $userGlobal->get_mutual_friends($profile['user_id']);
	}

	// [2] get view content
	switch ($_GET['view']) {
		case '':
			/* profile completion */
			if ($profile['user_id'] === $userGlobal->_data['user_id']) {
				$profile['profile_completion'] = 100;
				/* [1] check profile picture */
				if ($profile['user_picture_default']) {
					$profile['profile_completion'] -= 12.5;
				}
				/* [2] check profile cover */
				if ($profile['user_cover_default']) {
					$profile['profile_completion'] -= 12.5;
				}
				/* [3] check biography */
				if (!$profile['user_biography']) {
					$profile['profile_completion'] -= 12.5;
				}
				/* [4] check birthdate */
				if (!$profile['user_birthdate']) {
					$profile['profile_completion'] -= 12.5;
				}
				/* [5] check relationship */
				if (!$profile['user_relationship']) {
					$profile['profile_completion'] -= 12.5;
				}
				/* [6] check work */
				if (!$profile['user_work_title'] || !$profile['user_work_place']) {
					$profile['profile_completion'] -= 12.5;
				}
				/* [7] check location */
				if (!$profile['user_current_city'] || !$profile['user_hometown']) {
					$profile['profile_completion'] -= 12.5;
				}
				/* [8] check education */
				if (!$profile['user_edu_major'] || !$profile['user_edu_school']) {
					$profile['profile_completion'] -= 12.5;
				}
			}
			/* get followers count */
			$profile['followers_count'] = count($userGlobal->get_followers_ids($profile['user_id']));
			/* get followers */
			if ($profile['followers_count'] > 0) {
				$profile['followers'] = $userGlobal->get_followers($profile['user_id']);
			}

			/* get followings count */
			$profile['followings_count'] = count($userGlobal->get_followings_ids($profile['user_id']));
			/* get followings */
			if ($profile['followings_count'] > 0) {
				$profile['followings'] = $userGlobal->get_followings($profile['user_id']);
			}

			/* get custom fields */
			$smarty->assign('custom_fields', $userGlobal->get_custom_fields(array("for" => "user", "get" => "profile", "node_id" => $profile['user_id'])));

			/* gifts system */
			if ($system['gifts_enabled']) {
				/* get gifts */
				$gifts = $userGlobal->get_gifts();
				/* assign variables */
				$smarty->assign('gifts', $gifts);

				/* get gift */
				if (isset($_GET['gift']) && is_numeric($_GET['gift'])) {
					$gift = $userGlobal->get_gift($_GET['gift']);
					/* assign variables */
					$smarty->assign('gift', $gift);
				}
			}

			/* get friends */
			$profile['friends'] = $userGlobal->get_friends($profile['user_id']);
			if (count($profile['friends']) > 0) {
				$profile['friends_count'] = count($userGlobal->get_friends_ids($profile['user_id']));
			}

			/* get photos */
			$profile['photos'] = $userGlobal->global_get_photos($profile['user_id']);

			/* get pinned post */
			$pinned_post = $userGlobal->global_profile_get_post($profile['user_pinned_post']);
			$smarty->assign('pinned_post', $pinned_post);

			/* prepare publisher */
			$smarty->assign('feelings', get_feelings());
			$smarty->assign('feelings_types', get_feelings_types());
			if ($system['colored_posts_enabled']) {
				$smarty->assign('colored_patterns', $userGlobal->get_posts_colored_patterns());
			}

			/* get posts */
			$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $profile['user_id']), $showData = true);
			//echo "<pre>";print_r($posts); exit;
			/* assign variables */
			$smarty->assign('posts', $posts);
			$smarty->assign('posts_count', count($posts));
			$smarty->assign('subactive_page', 'globalhub_profile');
			break;

		case 'friends':
			/* get friends */
			$profile['friends'] = $userGlobal->get_friends($profile['user_id']);
			if (count($profile['friends']) > 0) {
				$profile['friends_count'] = count($userGlobal->get_friends_ids($profile['user_id']));
			}
			break;

		case 'followers':
			/* get followers count */
			$profile['followers_count'] = count($userGlobal->get_followers_ids($profile['user_id']));
			/* get followers */
			if ($profile['followers_count'] > 0) {
				$profile['followers'] = $userGlobal->get_followers($profile['user_id']);
			}
			/* get followings count */
			$profile['followings_count'] = count($userGlobal->get_followings_ids($profile['user_id']));
			/* get followings */
			if ($profile['followings_count'] > 0) {
				$profile['followings'] = $userGlobal->get_followings($profile['user_id']);
			}
			$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $profile['user_id']));
			$smarty->assign('posts_count', count($posts));
			$smarty->assign('subactive_page', 'globalhub_followers');
			break;

		case 'followings':
			/* get followings count */
			$profile['followings_count'] = count($userGlobal->get_followings_ids($profile['user_id']));
			/* get followings */
			if ($profile['followings_count'] > 0) {
				$profile['followings'] = $userGlobal->get_followings($profile['user_id']);
			}

			/* get followers count */
			$profile['followers_count'] = count($userGlobal->get_followers_ids($profile['user_id']));
			/* get followers */
			if ($profile['followers_count'] > 0) {
				$profile['followers'] = $userGlobal->get_followers($profile['user_id']);
			}

			/* get posts */
			$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $profile['user_id']));
			//echo "<pre>";print_r($posts); exit;
			/* assign variables */
			//$smarty->assign('posts', $posts);
			$smarty->assign('posts_count', count($posts));

			$smarty->assign('subactive_page', 'globalhub_profile');

			break;

		case 'photos':
			/* get photos */
			$profile['photos'] = $userGlobal->global_get_photos($profile['user_id']);

			/* get posts */
			$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $profile['user_id']));
			//echo "<pre>";print_r($posts); exit;
			/* assign variables */
			//$smarty->assign('posts', $posts);
			$smarty->assign('posts_count', count($posts));
			$smarty->assign('subactive_page', 'globalhub_profile');

			break;

		case 'albums':

			/* get albums */
			$profile['albums'] = $userGlobal->global_get_albums($profile['user_id'], $type = 'user', $offset = 0);
			// echo "<pre>";
			// print_r($userGlobal->_data['user_id']);
			// print_r($profile);
			// exit;
			/* get posts */
			$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $profile['user_id']));
			// echo "<pre>";print_r(count($posts)); exit;
			/* assign variables */
			$smarty->assign('profile', $posts);
			$smarty->assign('posts_count', count($posts));
			$smarty->assign('subactive_page', 'globalhub_profile');

			break;

		case 'album':
			/* get album */
			$album = $userGlobal->global_get_album($_GET['id']);
			if (!$album || $album['in_group'] || $album['user_type'] == "page" || ($album['user_type'] == "user" && $album['user_id'] != $profile['user_id'])) {
				_error(404);
			}
				// echo "<pre>";
			// print_r($userGlobal->_data['user_id']);
			// print_r($profile);
			// exit;
			/* assign variables */
			$smarty->assign('album', $album);

			/* get posts */
			$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $profile['user_id']));

			$smarty->assign('posts_count', count($posts));
			$smarty->assign('subactive_page', 'globalhub_profile');

			break;

		case 'videos':
			/* get videos */
			$profile['videos'] = $userGlobal->get_videos($profile['user_id']);
			$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $profile['user_id']));

			$smarty->assign('posts_count', count($posts));
			$smarty->assign('subactive_page', 'globalhub_profile');

			break;

		case 'likes':
			/* check if pages disabled */
			if (!$system['pages_enabled']) {
				_error(404);
			}

			/* get pages */
			$profile['pages'] = $userGlobal->get_pages(array('user_id' => $profile['user_id']));
			$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $profile['user_id']));

			$smarty->assign('posts_count', count($posts));
			$smarty->assign('subactive_page', 'globalhub_profile');

			break;

		case 'groups':
			/* check if groups disabled */
			if (!$system['groups_enabled']) {
				_error(404);
			}

			/* get groups */
			$profile['groups'] = $userGlobal->get_groups(array('user_id' => $profile['user_id']));
			break;

		case 'events':
			/* check if events disabled */
			if (!$system['events_enabled']) {
				_error(404);
			}

			/* get events */
			$profile['events'] = $userGlobal->get_events(array('user_id' => $profile['user_id']));
			break;

		default:
			_error(404);
			break;
	}

	// [3] profile visit notification
	if ($_GET['view'] == "" && $userGlobal->_logged_in && $system['profile_notification_enabled']) {
		$userGlobal->post_notification(array('to_user_id' => $profile['user_id'], 'action' => 'profile_visit', 'hub' => "GlobalHub"));
	}

	// recent rearches
	if (isset($_GET['ref']) && $_GET['ref'] == "qs") {
		$userGlobal->set_search_log($profile['user_id'], 'global_profile');
	}

	//Custom Code
	// get pro members & pages
	if ($system['packages_enabled']) {
		// get pro members
		$pro_members = $userGlobal->get_pro_members();
		/* assign variables */
		$smarty->assign('pro_members', $pro_members);
	}

	// get trending hashtags
	if ($system['trending_hashtags_enabled']) {
		$trending_hashtags = $userGlobal->get_trending_hashtags("GlobalHub");
		/* assign variables */
		$smarty->assign('trending_hashtags', $trending_hashtags);
	}

	// get suggested peopel
	$new_people = $userGlobal->get_new_people(0, true, "GlobalHub");
	/* assign variables */
	$smarty->assign('new_people', $new_people);
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

if ($profile['user_firstname'] != "") {
	// page header
	page_header($profile['user_firstname'] . " " . $profile['user_lastname'], $profile['user_biography'], $profile['user_picture']);
} else {
	// page header
	page_header($system['system_title']);
}

// assign variables
$smarty->assign('profile', $profile);
$smarty->assign('view', $_GET['view']);
$smarty->assign('userGlobal', $userGlobal);
$smarty->assign('active_page', 'GlobalHub');
// page footer
page_footer("global-profile/global-profile");
