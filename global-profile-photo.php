<?php

/**
 * photo
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

// valid inputs
if (!isset($_GET['photo_id']) || !is_numeric($_GET['photo_id'])) {
	_error(404);
}

try {
	$userGlobal = new UserGlobal();
	// get photo
	$photo =  $userGlobal->global_get_photo($_GET['photo_id'], true);
	if (!$photo) {
		_error(404);
	}
	/* assign variables */
	$smarty->assign('photo', $photo);
	$smarty->assign('userGlobal', $userGlobal);
	// // get ads campaigns
	// $ads_campaigns = $user->ads_campaigns();
	// /* assign variables */
	// $smarty->assign('ads_campaigns', $ads_campaigns);

	// // get ads
	// $ads = $user->ads('photo');
	// /* assign variables */
	// $smarty->assign('ads', $ads);

	// // get widgets
	// $widgets = $user->widgets('photo');
	// /* assign variables */
	// $smarty->assign('widgets', $widgets);
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page header
page_header($photo['og_title'], $photo['og_description'], $photo['og_image']);

// page footer
page_footer("global-profile/global-profile-photo");
