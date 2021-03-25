<?php

/**
 * blogs
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');

// blogs enabled
if (!$system['blogs_enabled']) {
	_error(404);
}

// user access
if (!$system['system_public']) {
	user_access();
}

try {
	$smarty->assign('active_page', 'BlogHub');

	// get view content
	switch ($_GET['view']) {
		case '':
			// page header
			page_header(__("Blogs"));

			// get articles
			$articles = $user->get_articles();
			/* assign variables */
			$smarty->assign('articles', $articles);
			break;

		case 'category':
			// page header
			page_header(__("Blogs"));

			// get articles
			$articles = $user->get_articles(array("category" => $_GET['category_id']));
			/* assign variables */
			$smarty->assign('category_id', $_GET['category_id']);
			$smarty->assign('articles', $articles);

			// get latest articles
			$latest_articles = $user->get_articles(array('random' => "true", 'results' => 5));
			/* assign variables */
			$smarty->assign('latest_articles', $latest_articles);

			// get ads
			$ads = $user->ads('article');
			/* assign variables */
			$smarty->assign('ads', $ads);

			// get widgets
			$widgets = $user->widgets('article');
			/* assign variables */
			$smarty->assign('widgets', $widgets);
			break;

		case 'article':
			// get article
			$article = $user->get_post($_GET['post_id']);
			if (!$article) {
				_error(404);
			}
			/* assign variables */
			$smarty->assign('article', $article);

			// page header
			page_header($article['og_title'], $article['og_description'], $article['og_image']);

			// get latest articles
			$latest_articles = $user->get_articles(array('random' => "true", 'results' => 5));
			/* assign variables */
			$smarty->assign('latest_articles', $latest_articles);

			// update views counter
			$user->update_article_views($article['article']['article_id']);

			// get ads
			$ads = $user->ads('article');
			/* assign variables */
			$smarty->assign('ads', $ads);

			// get widgets
			$widgets = $user->widgets('article');
			/* assign variables */
			$smarty->assign('widgets', $widgets);
			break;

		case 'edit':
			// user access
			user_access();

			// check blogs permission
			if (!$user->_data['can_write_articles']) {
				_error(404);
			}

			// page header
			page_header(__("Edit Article"));

			// get article
			$article = $user->get_post($_GET['post_id']);
			if (!$article) {
				_error(404);
			}
			/* assign variables */
			$smarty->assign('article', $article);
			break;

		case 'new':
			// user access
			user_access();

			// check blogs permission
			if (!$user->_data['can_write_articles']) {
				_error(404);
			}

			// page header
			page_header(__("Write New Article"));
			break;

		default:
			_error(404);
			break;
	}
	/* assign variables */
	$smarty->assign('view', $_GET['view']);

	// get blogs categories
	$blogs_categories = $user->get_blogs_categories();
	/* assign variables */
	$smarty->assign('blogs_categories', $blogs_categories);
	// get suggested peopel
	$new_people = $user->get_new_people(0, true);
	/* assign variables */
	$smarty->assign('new_people', $new_people);
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("blogs");
