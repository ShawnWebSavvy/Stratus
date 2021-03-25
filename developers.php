<?php
/**
 * developers
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');

// developers (apps & share plugin) enabled
if(!$system['developers_apps_enabled'] && !$system['developers_share_enabled']) {
    _error(404);
}

// user access
user_access();

try {

	// get view content
	switch ($_GET['view']) {
		case '':
			// check if developers (apps) enabled
			if(!$system['developers_apps_enabled']) {
			    _error(404);
			}

			// page header
			page_header($system['system_title']." ".__("for Developers"));
			break;

		case 'apps':
			// check if developers (apps) enabled
			if(!$system['developers_apps_enabled']) {
			    _error(404);
			}

			// page header
			page_header(__("My Apps"));

			// get apps
			$apps = $user->get_apps();
			/* assign variables */
			$smarty->assign('apps', $apps);
			break;

		case 'new':
			// check if developers (apps) enabled
			if(!$system['developers_apps_enabled']) {
			    _error(404);
			}

			// page header
			page_header(__("Create New App"));

			// get apps categories
			$categories = $user->get_apps_categories();
			/* assign variables */
			$smarty->assign('categories', $categories);
			break;

		case 'edit':
			// check if developers (apps) enabled
			if(!$system['developers_apps_enabled']) {
			    _error(404);
			}

			// page header
			page_header(__("Edit App"));

			// get apps categories
			$categories = $user->get_apps_categories();
			/* assign variables */
			$smarty->assign('categories', $categories);

			// get app
			$app = $user->get_app($_GET['app_auth_id']);
			if(!$app)  {
				_error(404);
			}
			/* check permission */
			if(!($user->_data['user_group'] < 3 || $user->_data['user_id'] == $app['app_user_id'])) {
	            _error(404);
	        }
			/* assign variables */
			$smarty->assign('app', $app);
			break;

		case 'share':
			// check if developers (share plugin) enabled
			if(!$system['developers_share_enabled']) {
			    _error(404);
			}

			// page header
			page_header(__("Share Plugin"));
			break;

		default:
			_error(404);
			break;
	}
	/* assign variables */
	$smarty->assign('view', $_GET['view']);

	// get suggested peopel
	$new_people = $user->get_new_people(0, true);
	/* assign variables */
	$smarty->assign('new_people', $new_people);
		
	$smarty->assign('active_page', 'LocalHub');
	$smarty->assign('subactive_page', 'pages');
	
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("developers");

?>