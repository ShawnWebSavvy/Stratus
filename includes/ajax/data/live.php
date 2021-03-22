<?php

/**
 * ajax -> data -> live
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

// valid inputs
/* if (last_request || last_message || last_notification) not set */
if (!isset($_POST['last_request']) || !isset($_POST['last_message']) || !isset($_POST['last_notification'])) {
	_error(400);
}
/* if (last_request || last_message || last_notification) not numeric */
if (!is_numeric($_POST['last_request']) || !is_numeric($_POST['last_message']) || !is_numeric($_POST['last_notification'])) {
	_error(400);
}

try {

	// initialize the return array
	$return = array();
	// [1] check for new requests
	$requests = $user->get_friend_requests(0, $_POST['last_request']);
	if (count($requests) > 0) {
		/* assign variables */
		$smarty->assign('requests', $requests);
		/* return */
		$return['requests_count'] = count($requests);
		$return['requests'] = $smarty->fetch("ajax.live.requests.tpl");
	}

	// [2] check for new messgaes
	if ($_POST['last_message'] != $user->_data['user_live_messages_lastid']) {
		$conversations = $user->get_conversations();
		//print_r($conversations); die;
		/* assign variables */
		$smarty->assign('conversations', $conversations);
		/* return */
		$return['conversations_count'] = $user->_data['user_live_messages_counter'];
		$return['conversations'] = $smarty->fetch("ajax.live.conversations.tpl");
		$return['conversations_group'] = $smarty->fetch("ajax.live.conversations_group.tpl");
	}

	// [3] check for new notifications
	$notifications = $user->get_notifications(0, $_POST['last_notification']);
	if (count($notifications) > 0) {
		/* assign variables */
		$smarty->assign('notifications', $notifications);
		/* return */
		$return['notifications_json'] = $notifications;
		$return['notifications_count'] = count($notifications);
		$return['notifications'] = $smarty->fetch("ajax.live.notifications.tpl");
	}

	// [4] check for new posts
	if (isset($_POST['last_post']) && isset($_POST['custom_boosted'])) {
		// print_r('here11111111');
		// die;
		// print_r($_POST);
		// die;

		$boosted_posts = array();
		// get boosted post
		if ($system['packages_enabled']) {
			$boosted_posts = $user->get_boosted_all(array('get' => $_POST['get'], 'filter' => $_POST['filter'], 'id' => $_POST['id'], 'last_post_id' => $_POST['last_post_boosted']));
			$smarty->assign('boosted_posts', $boosted_posts);
		}
		// get posts (newsfeed)
		$posts = $user->get_posts_all(array('get' => $_POST['get'], 'filter' => $_POST['filter'], 'id' => $_POST['id'], 'last_post_id' => $_POST['last_post']));

		//print_r($posts); die;
		if (!empty($boosted_posts)) {
			$posts = array_merge($boosted_posts, $posts);
			//$posts = array_reverse($posts)
		}
		if ($posts) {
			//Redis Block
			// $redisPostKey = 'user-' . $user->_data['user_id'] . '-posts';
			// $redisObject = new RedisClass();
			//  $isKeyExist = $redisObject->isRedisKeyExist($redisPostKey);
			// if($isKeyExist == true){
			// 	$new_response = [];
			// 	//$jsonEncData = json_encode($posts);
			//     	$getPostsFromRedis = $redisObject->getValueFromKey($redisPostKey);
			//     	$jsonValuesRes = json_decode($getPostsFromRedis, true);
			// 		foreach ($posts as $value) {
			// 		  //$jsonValuesRes[] = $value;
			// 		  array_unshift($jsonValuesRes , $value);
			// 		}

			// 		$new_response = json_encode($jsonValuesRes);
			// 	    $redisObject->setValueWithRedis($redisPostKey, $new_response);
			// }
			//RedisBlock
			/* get user pages */
			$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
			$smarty->assign('pages', $pages);
			/* get user pages */
			$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
			/* assign variables */
			$smarty->assign('groups', $groups);
			/* assign variables */
			$smarty->assign('posts', $posts);
			/* return */
			$return['posts'] = $smarty->fetch("ajax.posts.tpl");
		}
	}

	if (isset($_POST['last_post_pinned']) && isset($_POST['custom_pinned'])) {
		/* get followers count */
		$profile['followers_count'] = count($user->get_followers_ids($profile['user_id']));

		/* get custom fields */
		$smarty->assign('custom_fields', $user->get_custom_fields(array("for" => "user", "get" => "profile", "node_id" => $profile['user_id'])));

		/* gifts system */
		if ($system['gifts_enabled']) {
			/* get gifts */
			$gifts = $user->get_gifts();
			/* assign variables */
			$smarty->assign('gifts', $gifts);

			/* get gift */
			if (isset($_GET['gift']) && is_numeric($_GET['gift'])) {
				$gift = $user->get_gift($_GET['gift']);
				/* assign variables */
				$smarty->assign('gift', $gift);
			}
		}

		/* get friends */
		$profile['friends'] = $user->get_friends($profile['user_id']);
		if (count($profile['friends']) > 0) {
			$profile['friends_count'] = count($user->get_friends_ids($profile['user_id']));
		}

		/* get photos */
		$profile['photos'] = $user->get_photos($profile['user_id']);

		/* get pages */
		if ($system['pages_enabled']) {
			$profile['pages'] = $user->get_pages(array('user_id' => $profile['user_id'], 'results' => $system['min_results_even']));
		}

		/* get groups */
		if ($system['groups_enabled']) {
			$profile['groups'] = $user->get_groups(array('user_id' => $profile['user_id'], 'results' => $system['min_results_even']));
		}

		/* get events */
		if ($system['events_enabled']) {
			$profile['events'] = $user->get_events(array('user_id' => $profile['user_id'], 'results' => $system['min_results_even']));
		}

		/* get posts */
		//$posts_unpin = $user->get_posts(array('get' => 'posts_profile', 'id' => $user->_data['user_id']));
		$posts_unpin = $user->get_boosted_all(array('get' => $_POST['get'], 'filter' => $_POST['filter'], 'id' => $profile['user_id'], 'last_post_id' => $_POST['last_post_boosted']));
		$postsUnpin = array();
		$pinnedPost = array();
		$i = 0;
		$k = 0;

		if (empty($posts_unpin)) {
			$posts_unpin = array();
		}

		if (count($posts_unpin) > 0) {
			foreach ($posts_unpin as $post) {
				if ($profile['user_pinned_post'] != $post['post_id']) {
					$postsUnpin[$i] = $post;
					$postsUnpin[$i]['status_post'] = "unpinned_post";
					$i++;
				} else {
					$pinnedPost[$k] = $post;
					$pinnedPost[$k]['status_post'] = "pinned_post";
					$k++;
				}
			}
		}

		if (!empty($pinnedPost)) {
			$posts = array_merge($pinnedPost, $postsUnpin);
			//$posts = array_reverse($posts);
		} else {
			$posts = $postsUnpin;
		}

		/* prepare publisher */
		$smarty->assign('feelings', get_feelings());
		$smarty->assign('feelings_types', get_feelings_types());
		if ($system['colored_posts_enabled']) {
			$smarty->assign('colored_patterns', $user->get_posts_colored_patterns());
		}

		/* get user pages */
		$pages = $user->get_pages(array('managed' => true, 'user_id' => $profile['user_id']));
		$smarty->assign('pages', $pages);
		/* get user pages */
		$groups = $user->get_groups(array('get_all' => true, 'user_id' => $profile['user_id']));
		/* assign variables */
		$smarty->assign('groups', $groups);
		$smarty->assign("userpage", "profile");
		$smarty->assign('posts', $posts);
		/* assign variables */

		/* return */
		$return['posts'] = $smarty->fetch("ajax.posts.tpl");
		return_json($return);
	}

	/*Below COde commented by KK */
	// [4] check for new posts
	if (isset($_POST['last_post']) && !isset($_POST['custom_boosted'])) {
		$posts = $user->get_posts(array('get' => $_POST['get'], 'filter' => $_POST['filter'], 'id' => $_POST['id'], 'last_post_id' => $_POST['last_post']));
		if ($posts && !empty($posts)) {
			/* get user pages */

			$posts = array_reverse($posts);
			// echo '<pre>';print_r($posts);die;

			$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
			$smarty->assign('pages', $pages);
			/* get user pages */
			$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
			/* assign variables */
			$smarty->assign('groups', $groups);
			/* assign variables */
			$smarty->assign('posts', $posts);
			/* return */
			$return['posts'] = $smarty->fetch("ajax.posts.tpl");
		} else {
			$return['posts'] = "";
		}
	}

	// return & exit
	return_json($return);
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}
