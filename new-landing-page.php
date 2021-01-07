<?php
/**
 * sign
 *
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');

switch ($_GET['do']) {
	case 'conv':
		// check user logged in
		// if($user->_logged_in) {
		//     redirect();
		// }

//echo  "afa"; die;


		// page header
		page_header($system['system_title']." &rsaquo; ".__("Convenience"));

		// get custom fields
		$smarty->assign('custom_fields', $user->get_custom_fields());

		// assign varible
		$smarty->assign('do', $_GET['do']);

		// page footer
		page_footer("convenience");
		break;

	case 'dataPriv':

		// page header
		page_header($system['system_title']." &rsaquo; ".__("Data Privacy"));

		// get custom fields
		$smarty->assign('custom_fields', $user->get_custom_fields());

		// assign varible
		$smarty->assign('do', $_GET['do']);

		// page footer
		page_footer("data-privacy");
		break;

	case 'fraud':
	// page header
	page_header($system['system_title']." &rsaquo; ".__("Fraud Leaksy"));

	// get custom fields
	$smarty->assign('custom_fields', $user->get_custom_fields());

	// assign varible
	$smarty->assign('do', $_GET['do']);

	// page footer
	page_footer("fraud-leaks");
	break;

	case 'bullies':
	// page header
	page_header($system['system_title']." &rsaquo; ".__("Anonymous Bullies"));

	// get custom fields
	$smarty->assign('custom_fields', $user->get_custom_fields());

	// assign varible
	$smarty->assign('do', $_GET['do']);

	// page footer
	page_footer("anonymous-bullies");
	break;

	case 'monetization':
		// page header
		page_header($system['system_title']." &rsaquo; ".__("Monetization"));
	
		// get custom fields
		$smarty->assign('custom_fields', $user->get_custom_fields());
	
		// assign varible
		$smarty->assign('do', $_GET['do']);
	
		// page footer
		page_footer("monetization");
	break;

	case 'censor':
	// page header
	page_header($system['system_title']." &rsaquo; ".__("Censorship"));

	// get custom fields
	$smarty->assign('custom_fields', $user->get_custom_fields());

	// assign varible
	$smarty->assign('do', $_GET['do']);

	// page footer
	page_footer("censorship");
	break;

	case 'checkers':


		// page header
		page_header($system['system_title']." &rsaquo; ".__("Independent Fact Checkers"));

		// page footer
		page_footer("independent-fact-checkers");
		break;

	default:
		_error(404);
		break;
}

?>
