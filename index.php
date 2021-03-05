<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
/**
 * index
 *
 * @package Sngine
 * @author Zamblek
 */

//$start_time = microtime(TRUE);

// fetch bootloader
require('bootloader.php');

//$end_time = microtime(TRUE);

//echo $end_time - $start_time; die;

try {
	if (!$user->_logged_in) {

		// page header
		page_header(__("Welcome to") . ' ' . $system['system_title']);
		$_SESSION['logged_in_datetime'] = date("d M Y H:i:s");

		// get custom fields
		$smarty->assign('before_login', $_SESSION['logged_in_datetime']);
		$smarty->assign('custom_fields', $user->get_custom_fields());
	} else {
		$redisObject = new RedisClass();
		// user access
		user_access();
		$smarty->assign('active_page', 'LocalHub');
		// get view content
		switch ($_GET['view']) {
			case '':
				// page header
				page_header($system['system_title']);

				// get stories
				if ($system['stories_enabled']) {
					$get_stories = getMyStory($user->_data['user_id'], $user, $redisObject, $system);
					$getAllStories = getAllStories($user->_data['user_id'], $user, $redisObject, $system);
					$smarty->assign('stories', $getAllStories);
					$smarty->assign('has_story', $get_stories);
				}

				$feelings = getFeelings($user->_data['user_id'], $redisObject, $system);
				$feelingTypes = getFeelingTypes($user->_data['user_id'], $redisObject, $system);

				// prepare publisher
				$smarty->assign('feelings', $feelings);
				$smarty->assign('feelings_types', $feelingTypes);
				if ($system['colored_posts_enabled']) {
					$smarty->assign('colored_patterns', $user->get_posts_colored_patterns());
				}

				// check daytime messages
				$daytime_msg_enabled = (isset($_COOKIE['dt_msg'])) ? false : $system['daytime_msg_enabled'];
				$smarty->assign('daytime_msg_enabled', $daytime_msg_enabled);

				$posts = fetchPostDataForTimeline($user->_data['user_id'], $user, $redisObject, $system);

				//echo "<pre>";print_r($posts);die;
				/* get user pages */
				$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
				$smarty->assign('pages', $pages);

				$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));

				/* assign variables */
				$smarty->assign('groups', $groups);
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
				$posts = $user->get_posts(array('get' => 'popular'));
				/* assign variables */
				$smarty->assign('posts', $posts);

				/* get user pages */
				$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
				$smarty->assign('pages', $pages);
				/* get user pages */
				$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
				/* assign variables */
				$smarty->assign('groups', $groups);

				break;

			case 'discover':
				// check if discover posts enabled
				if (!$system['discover_posts_enabled']) {
					_error(404);
				}

				// page header
				page_header(__("Discover Posts"));

				// get posts (discover)
				$posts = $user->get_posts(array('get' => 'discover'));
				/* assign variables */
				$smarty->assign('posts', $posts);

				/* get user pages */
				$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
				$smarty->assign('pages', $pages);
				/* get user pages */
				$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
				/* assign variables */
				$smarty->assign('groups', $groups);
				break;

			case 'articles':
				$smarty->assign('active_page', 'BlogHub');

				// check if blogs enabled
				if (!$system['blogs_enabled']) {
					_error(404);
				}

				// check blogs permission
				if (!$user->_data['can_write_articles']) {
					_error(404);
				}

				// page header
				page_header(__("My Articles"));

				// get posts (articles)
				$posts = $user->get_posts(array('get' => 'posts_profile', 'id' => $user->_data['user_id'], 'filter' => 'article'));
				/* assign variables */
				$smarty->assign('posts', $posts);

				/* get user pages */
				$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
				$smarty->assign('pages', $pages);
				/* get user pages */
				$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
				/* assign variables */
				$smarty->assign('groups', $groups);
				break;

			case 'products':
				$smarty->assign('active_page', 'MarketHub');

				// check if market enabled
				if (!$system['market_enabled']) {
					_error(404);
				}

				// check market permission
				if (!$user->_data['can_sell_products']) {
					_error(404);
				}

				// page header
				page_header(__("My Products"));



				// get posts (products)
				$posts = $user->get_posts(array('get' => 'posts_profile', 'id' => $user->_data['user_id'], 'filter' => 'product'));
				/* assign variables */
				$smarty->assign('posts', $posts);
				/* get user pages */
				$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
				$smarty->assign('pages', $pages);
				/* get user pages */
				$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
				/* assign variables */
				$smarty->assign('groups', $groups);
				break;

			case 'saved':
				// page header
				page_header(__("Saved Posts"));

				// get posts (saved)
				$posts = $user->get_posts(array('get' => 'saved'));
				/* assign variables */
				$smarty->assign('posts', $posts);

				/* get user pages */
				$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
				$smarty->assign('pages', $pages);
				/* get user pages */
				$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
				/* assign variables */
				$smarty->assign('groups', $groups);
				break;

			case 'memories':
				// page header
				page_header(__("Memories"));

				// get posts (memories)
				$posts = $user->get_posts(array('get' => 'memories'));
				/* assign variables */
				$smarty->assign('posts', $posts);

				/* get user pages */
				$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
				$smarty->assign('pages', $pages);
				/* get user pages */
				$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
				/* assign variables */
				$smarty->assign('groups', $groups);
				$smarty->assign('subactive_page', 'memories');

				break;

			case 'boosted_posts':
				// check if packages enabled
				if (!$system['packages_enabled']) {
					_error(404);
				}

				// page header
				page_header(__("Boosted Posts"));

				// get posts (boosted)
				$posts = $user->get_posts(array('get' => 'boosted'));
				/* assign variables */
				$smarty->assign('posts', $posts);

				/* get user pages */
				$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
				$smarty->assign('pages', $pages);
				/* get user pages */
				$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
				/* assign variables */
				$smarty->assign('groups', $groups);
				break;

			case 'boosted_pages':
				// check if packages enabled
				if (!$system['packages_enabled']) {
					_error(404);
				}

				// check if pages enabled
				if (!$system['pages_enabled']) {
					_error(404);
				}

				// page header
				page_header(__("Boosted Pages"));

				// get pages (boosted)
				$boosted_pages = $user->get_pages(array('boosted' => true));
				/* assign variables */
				$smarty->assign('boosted_pages', $boosted_pages);

				/* get user pages */
				$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
				$smarty->assign('pages', $pages);
				/* get user pages */
				$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));
				/* assign variables */
				$smarty->assign('groups', $groups);

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
			$pro_members = $user->get_pro_members();
			/* assign variables */
			$smarty->assign('pro_members', $pro_members);
			// get promoted pages
			if ($system['pages_enabled']) {
				$promoted_pages = $user->get_pages(array('promoted' => true));
				/* assign variables */
				$smarty->assign('promoted_pages', $promoted_pages);
			}
		}

		// get trending hashtags
		if ($system['trending_hashtags_enabled']) {
			$trending_hashtags = $user->get_trending_hashtags("LocalHub");
			/* assign variables */
			$smarty->assign('trending_hashtags', $trending_hashtags);
		}

		// get suggested peopel
		//$new_people = $user->get_new_people(0, true);
		$new_people = getSuggestedPeoples($user->_data['user_id'], $user, $redisObject);
		/* assign variables */
		$smarty->assign('new_people', $new_people);

		// get suggested pages
		if ($system['pages_enabled']) {
			// $new_pages = $user->get_pages(array('suggested' => true, 'random' => 'true', 'results' => 5));
			/* assign variables */
			$new_pages = getSuggestedPages($user->_data['user_id'], $user, $redisObject);
			$smarty->assign('new_pages', $new_pages);
		}

		// get suggested groups
		if ($system['groups_enabled']) {

			//Block for redis
			$new_groups = getNewGroups($user->_data['user_id'], $user, $redisObject);
			/* assign variables */
			$smarty->assign('new_groups', $new_groups);
		}

		// get suggested events
		if ($system['events_enabled']) {
			// $new_events = $user->get_events(array('suggested' => true, 'random' => 'true', 'results' => 5));
			//events from redis
			$new_events = getEventsLists($user->_data['user_id'], $user, $redisObject);
			/* assign variables */
			$smarty->assign('new_events', $new_events);
		}

		// get announcements
		$announcements = $user->announcements();
		/* assign variables */
		$smarty->assign('announcements', $announcements);

		// get ads campaigns
		$ads_campaigns = $user->ads_campaigns();
		/* assign variables */
		$smarty->assign('ads_campaigns', $ads_campaigns);

		// get ads
		$ads = $user->ads('home');
		/* assign variables */
		$smarty->assign('ads', $ads);

		// get widgets
		$widgets = $user->widgets('home');
		/* assign variables */
		$smarty->assign('widgets', $widgets);
	}
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("index");
$smarty->assign('page', "market");
