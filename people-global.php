<?php

/**
 * friend_requests
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');
require_once('includes/class-user-global.php');
// user access
user_access();

try {
	$userGlobal = new UserGlobal();
	// get view content
	switch ($_GET['view']) {
		case '':
			// page header
			page_header(__("Discover People"));

			// get new people
			// $people = $userGlobal->get_new_people();
			// $smarty->assign('people', $people);

			$new_people = $userGlobal->get_new_people(0, true, "GlobalHub");
			$smarty->assign('people', $new_people);
			break;

		case 'find':
			// page header
			page_header(__("Find People"));

			// valid inputs
			if (!isset($_POST['submit'])) {
				redirect('/people-global');
			}

			// search users
			$people = $userGlobal->search_users($_POST['distance_value'], $_POST['query'], $_POST['gender'], $_POST['relationship'], $_POST['status']);
			$smarty->assign('people', $people);
			if ($_POST['distance_value']) {
				$smarty->assign('distance_value', $_POST['distance_value']);
			} else {
				$smarty->assign('distance_value', 5000);
			}
			$smarty->assign('keyword', $_POST['query']);
			$smarty->assign('gender', $_POST['gender']);
			$smarty->assign('relationship', $_POST['relationship']);
			$smarty->assign('status', $_POST['status']);
			break;

		case 'friend_requests':
			// page header
			page_header(__("Friend Requests"));
			break;

		case 'sent_requests':
			// page header
			page_header(__("Friend Requests Sent"));
			break;

		default:
			_error(404);
			break;
	}
	/* assign variables */
	$smarty->assign('view', $_GET['view']);

	// get friend requests sent 
	$userGlobal->_data['friend_requests_sent'] = $userGlobal->get_friend_requests_sent();
	$userGlobal->_data['friends'] = $userGlobal->get_friends($userGlobal->_data['user_id']);

	// // get ads campaigns
	// $ads_campaigns = $user->ads_campaigns();
	// /* assign variables */
	// $smarty->assign('ads_campaigns', $ads_campaigns);

	// // get ads
	// $ads = $user->ads('people');
	// /* assign variables */
	// $smarty->assign('ads', $ads);

	// // get widgets
	// $widgets = $user->widgets('people');
	// /* assign variables */
	// $smarty->assign('widgets', $widgets);
	$smarty->assign('userGlobal', $userGlobal);
	$smarty->assign('active_page', 'GlobalHub');
	$smarty->assign('subactive_page', 'friends_global');
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("global-profile/people");
