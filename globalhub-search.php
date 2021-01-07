<?php

/**
 * search
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

try {
	$smarty->assign('active_page', 'GlobalHub');
	$userGlobal = new UserGlobal();
	// search
	if (isset($_GET['query'])) {
		/* get results */
		$results = $userGlobal->global_search($_GET['query']);
		/* assign variables */
		$smarty->assign('query', $_GET['query']);
		$smarty->assign('results', $results);
		$smarty->assign('results_num', count($results));
	}

	// get suggested peopel
	$new_people = $userGlobal->get_new_people(0, true, "GlobalHub");
	/* assign variables */
	$smarty->assign('new_people', $new_people);
	$smarty->assign('userGlobal', $userGlobal);
	//echo "<pre>";print_r($results); exit;
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page header
page_header($system['system_title'] . ' - ' . __("Search"));

// page footer
page_footer("global-profile/search");
