<?php
/**
 * post
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');

// user access
if(!$system['system_public']) {
	user_access();
}
//echo $_GET['post_id']; die;
// valid inputs
if(!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
	_error(404);
}
$smarty->assign('active_page', 'LocalHub');

try {

	// get post
	$post = $user->get_post($_GET['post_id']);
	//	echo "<pre>"; print_r($post);die();
	if($post['post_type'] == 'product'){
		$smarty->assign('actPage', 'product');
		$pages = $user->get_pages(array('managed' => true, 'user_id' => $user->_data['user_id']));
		$smarty->assign('pages', $pages);

		$groups = $user->get_groups(array('get_all' => true, 'user_id' => $user->_data['user_id']));

		/* assign variables */
		$smarty->assign('groups', $groups);
		/* assign variables */
		$smarty->assign('posts', $posts);
		$smarty->assign('active_page', 'MarketHub');

	}
	if(!$post)  {
		_error(404);
	}
	/* assign variables */
	$smarty->assign('post', $post);

	// get ads campaigns
	$ads_campaigns = $user->ads_campaigns();
	/* assign variables */
	$smarty->assign('ads_campaigns', $ads_campaigns);

	// get ads
	$ads = $user->ads('post');
	/* assign variables */
	$smarty->assign('ads', $ads);

	// get widgets
	$widgets = $user->widgets('post');
	/* assign variables */
	$smarty->assign('widgets', $widgets);
	
   // get suggested peopel
   $new_people = $user->get_new_people(0, true);
   /* assign variables */
   $smarty->assign('new_people', $new_people);
   // get market categories
	$categories = $user->get_market_categories();
	/* assign variables */
	$smarty->assign('market_categories', $categories);
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}
// echo "<pre>"; print_r($smarty); die;
// page header
page_header($post['og_title'], $post['og_description'], $post['og_image']);

// page footer
page_footer("post");

?>