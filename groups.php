<?php
/**
 * groups
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');

// groups enabled
if(!$system['groups_enabled']) {
	_error(404);
}

// user access
user_access();

try {

	// get view content
	switch ($_GET['view']) {
		case '':
			// page header
			page_header(__("Discover Groups"));
			
			// get new groups
			$groups = $user->get_groups(array('suggested' => true));
			/* assign variables */
			$smarty->assign('groups', $groups);
			$smarty->assign('get', "suggested_groups");
			break;
		
		case 'joined':
			// page header
			page_header(__("Joined Groups"));
			
			// get joined groups
			$groups = $user->get_groups( array('user_id' => $user->_data['user_id']) );
			/* assign variables */
			$smarty->assign('groups', $groups);
			$smarty->assign('get', "joined_groups");
			break;

		case 'manage':
			// page header
			page_header(__("Your Groups"));
			
			// get managed groups
			$groups = $user->get_groups();
			/* assign variables */
			$smarty->assign('groups', $groups);
			$smarty->assign('get', "groups");
			break;

		default:
			_error(404);
			break;
	}
	/* assign variables */
	$smarty->assign('view', $_GET['view']);

	// get custom fields
	$smarty->assign('custom_fields', $user->get_custom_fields( array("for" => "group") ));

	// get groups categories
	$categories = $user->get_groups_categories();
	/* assign variables */
	$smarty->assign('categories', $categories);

	// get suggested peopel
		$new_people = $user->get_new_people(0, true);
		/* assign variables */
		$smarty->assign('new_people', $new_people);
		
		$smarty->assign('active_page', 'LocalHub');
		$smarty->assign('subactive_page', 'groups');
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("groups");

?>