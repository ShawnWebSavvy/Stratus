<?php

/**
 * events
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');

// events enabled
if (!$system['events_enabled']) {
	_error(404);
}

// user access
user_access();

try {

	// get view content
	switch ($_GET['view']) {
		case '':
			// page header
			page_header(__("Discover Events"));

			// get new events
			$events = $user->get_events(array('suggested' => true));
			/* assign variables */
			$smarty->assign('events', $events);
			$smarty->assign('get', "suggested_events");
			break;

		case 'going':
			// page header
			page_header(__("Going Events"));

			// get going events
			$events = $user->get_events(array('filter' => 'going'));
			/* assign variables */
			$smarty->assign('events', $events);
			$smarty->assign('get', "going_events");
			break;

		case 'interested':
			// page header
			page_header(__("Interested Events"));

			// get interested events
			$events = $user->get_events(array('filter' => 'interested'));
			/* assign variables */
			$smarty->assign('events', $events);
			$smarty->assign('get', "interested_events");
			break;

		case 'invited':
			// page header
			page_header(__("Invited Events"));

			// get invited events
			$events = $user->get_events(array('filter' => 'invited'));
			/* assign variables */
			$smarty->assign('events', $events);
			$smarty->assign('get', "invited_events");
			break;

		case 'manage':
			// page header
			page_header(__("Your Events"));

			// get events
			$events = $user->get_events();
			/* assign variables */
			$smarty->assign('events', $events);
			$smarty->assign('get', "events");
			break;

		default:
			_error(404);
			break;
	}
	/* assign variables */
	$smarty->assign('view', $_GET['view']);

	// get custom fields
	$smarty->assign('custom_fields', $user->get_custom_fields(array("for" => "event")));

	// get events categories
	$categories = $user->get_events_categories();
	/* assign variables */
	$smarty->assign('categories', $categories);



	/* assign variables */
	$smarty->assign('view', $_GET['view']);
	// get suggested peopel
	$new_people = $user->get_new_people(0, true);
	/* assign variables */
	$smarty->assign('new_people', $new_people);

	$smarty->assign('active_page', 'LocalHub');
	$smarty->assign('subactive_page', 'events');
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("events");
