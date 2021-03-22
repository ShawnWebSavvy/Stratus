<?php

/**
 * index
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');
require_once('includes/class-user-global.php');

try {

	// check user logged in
	if (!$user->_logged_in) {

		// page header
		page_header(__("Welcome to") . ' ' . $system['system_title']);

		// get custom fields
		$smarty->assign('custom_fields', $user->get_custom_fields());
	} else {

		// user access
		user_access();
		$userGlobal = new UserGlobal();
		// get view content
		switch ($_GET['view']) {
			case '':
				// page header
				page_header($system['system_title']);
				// echo "<pre>";
				// print_r($userGlobal);
				// die;
				// get stories
				if ($system['stories_enabled']) {
					$smarty->assign('stories', $userGlobal->get_stories());
					$smarty->assign('has_story', $userGlobal->get_my_story());
				}
				//echo "<pre>";print_r($user->get_stories()); exit;
				// prepare publisher
				$smarty->assign('feelings', get_feelings());
				$smarty->assign('feelings_types', get_feelings_types());
				if ($system['colored_posts_enabled']) {
					$smarty->assign('colored_patterns', $user->get_posts_colored_patterns());
				}

				// check daytime messages
				$daytime_msg_enabled = (isset($_COOKIE['dt_msg'])) ? false : $system['daytime_msg_enabled'];
				$smarty->assign('daytime_msg_enabled', $daytime_msg_enabled);

				// get boosted post
				if ($system['packages_enabled']) {
					$boosted_post = $userGlobal->get_boosted_post();
					$smarty->assign('boosted_post', $boosted_post);
				}

				// get posts (newsfeed)
				$posts = $userGlobal->global_profile_get_posts();
				// echo "<pre>";print_r($posts); exit;
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'popular':
				// check if popular posts enabled
				if (!$system['popular_posts_enabled']) {
					_error(404);
				}

				// page header
				page_header(__("Popular Posts"));

				// get posts (popular)
				$posts = $userGlobal->global_profile_get_posts(array('get' => 'popular'));
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'discover':
				// check if discover posts enabled
				if (!$system['discover_posts_enabled']) {
					_error(404);
				}

				// page header
				page_header(__("Discover Posts"));

				// get posts (discover)
				$posts = $userGlobal->global_profile_get_posts(array('get' => 'discover'));
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'articles':
				// check if blogs enabled
				if (!$system['blogs_enabled']) {
					_error(404);
				}

				// check blogs permission
				if (!$userGlobal->_data['can_write_articles']) {
					_error(404);
				}

				// page header
				page_header(__("My Articles"));

				// get posts (articles)
				$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $user->_data['user_id'], 'filter' => 'article'));
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'products':
				// check if market enabled
				if (!$system['market_enabled']) {
					_error(404);
				}

				// check market permission
				if (!$userGlobal->_data['can_sell_products']) {
					_error(404);
				}

				// page header
				page_header(__("My Products"));

				// get posts (products)
				$posts = $userGlobal->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $user->_data['user_id'], 'filter' => 'product'));
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'saved':
				// page header
				page_header(__("Saved Posts"));

				// get posts (saved)
				$posts = $userGlobal->global_profile_get_posts(array('get' => 'saved'));
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'memories':
				// page header
				page_header(__("Memories"));

				// get posts (memories)
				$posts = $userGlobal->global_profile_get_posts(array('get' => 'memories'));
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'boosted_posts':
				// check if packages enabled
				if (!$system['packages_enabled']) {
					error(404);
				}

				// page header
				page_header(__("Boosted Posts"));

				// get posts (boosted)
				$posts = $userGlobal->global_profile_get_posts(array('get' => 'boosted'));
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'boosted_pages':
				// check if packages enabled
				if (!$system['packages_enabled']) {
					error(404);
				}

				// check if pages enabled
				if (!$system['pages_enabled']) {
					error(404);
				}

				// page header
				page_header(__("Boosted Pages"));

				// get pages (boosted)
				// $boosted_pages = $userGlobal->global_profile_get_pages(array('boosted' => true));
				// /* assign variables */
				// $smarty->assign('boosted_pages', $boosted_pages);
				break;

			default:
				_error(404);
				break;
		}
		/* assign variables */
		$smarty->assign('view', $_GET['view']);

		// get pro members & pages
		if ($system['packages_enabled']) {
			// get pro members
			$pro_members = $userGlobal->get_pro_members();
			/* assign variables */
			$smarty->assign('pro_members', $pro_members);
		}

		// get trending hashtags
		if ($system['trending_hashtags_enabled']) {
			$trending_hashtags = $userGlobal->get_trending_hashtags("GlobalHub");
			/* assign variables */
			$smarty->assign('trending_hashtags', $trending_hashtags);
		}

		// get suggested peopel
		$new_people = $userGlobal->get_new_people(0, true, "GlobalHub");
		/* assign variables */
		$smarty->assign('new_people', $new_people);


		// // get widgets
		// $widgets = $user->widgets('home');
		// /* assign variables */
		// $smarty->assign('widgets', $widgets);
		$smarty->assign('userGlobal', $userGlobal);
		$smarty->assign('active_page', 'GlobalHub');
		$smarty->assign('subactive_page', 'globalhub_timeline');
	}
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("global-profile/global-profile-timeline");
