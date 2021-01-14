<?php

/**
 * friend_requests
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');

// user access
user_access();

try {

	// get view content
	switch ($_GET['view']) {
		case '':
			// page header
			page_header(__("Discover People"));

			// get new people
			$people = $user->get_new_people();
			$smarty->assign('people', $people);
			break;

		case 'find':
			// page header
			page_header(__("Find People"));

			// valid inputs
			if (!isset($_POST['submit'])) {
				redirect('/people');
			}

			// search users 
			$people = $user->search_users($_POST['distance_value'], $_POST['query'], $_POST['gender'], $_POST['relationship'], $_POST['status']);
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
	$user->_data['friend_requests_sent'] = $user->get_friend_requests_sent();
	$user->_data['friends'] = $user->get_friends($user->_data['user_id']);
	// get ads campaigns
	$ads_campaigns = $user->ads_campaigns();
	/* assign variables */
	$smarty->assign('ads_campaigns', $ads_campaigns);

	// get ads
	$ads = $user->ads('people');
	/* assign variables */
	$smarty->assign('ads', $ads);

	// get widgets
	$widgets = $user->widgets('people');
	/* assign variables */
	$smarty->assign('widgets', $widgets);

	$smarty->assign('active_page', 'LocalHub');
	$smarty->assign('subactive_page', 'friends');
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("people");
