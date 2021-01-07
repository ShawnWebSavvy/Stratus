<?php
/**
 * notifications
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');

// user access
user_access();

// page header
page_header(__("Notifications"));

try {
	// reset live counters
	$user->live_counters_reset('notifications');

	// get ads campaigns
	$ads_campaigns = $user->ads_campaigns();
	/* assign variables */
	$smarty->assign('ads_campaigns', $ads_campaigns);

	// get ads
	$ads = $user->ads('notifications');
	/* assign variables */
	$smarty->assign('ads', $ads);

	// get widgets
	$widgets = $user->widgets('notifications');
	/* assign variables */
	$smarty->assign('widgets', $widgets);

     // get suggested peopel
		$new_people = $user->get_new_people(0, true);
		/* assign variables */
		$smarty->assign('new_people', $new_people);
		
	if(isset($_GET['parm'])){
		$smarty->assign('blackNav', $_GET['parm']);
	}
		
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("notifications");

?>