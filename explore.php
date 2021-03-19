<?php

/**
 * pages
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
    $userGlobal = new UserGlobal();
    if ($system['trending_hashtags_enabled']) {
        $trending_hashtags = $user->get_trending_hashtags("GlobalHub");
        $smarty->assign('trending_hashtags', $trending_hashtags);
    }
    if ($_GET['view'] == "foryou") {
        $trendingPosts = $userGlobal->get_posts_trending(false);
        $smarty->assign('trendingPosts', $trendingPosts);
    } elseif ($_GET['view'] == "trending") {
        // get trending hashtags
        if ($system['trending_hashtags_enabled']) {
            $trending_hashtags_posts = $userGlobal->get_trending_hashtags_posts("GlobalHub");
            /* assign variables */
            $smarty->assign('trendingPosts', $trending_hashtags_posts);
        }
    } elseif ($_GET['view'] == "users") {
        if ($_GET['search']) {
            // valid inputs
            if (!isset($_POST['submit'])) {
                redirect('/people');
            }
            // search users 
            $people_search = $user->search_users_global($_POST['distance_value'], $_POST['query'], $_POST['gender'], $_POST['relationship'], $_POST['status']);
            $smarty->assign('view', 'explore_friends');
            $smarty->assign('showExplore', 'users');
            //$new_people = $user->get_new_people(0, true, "GlobalHub");
            $smarty->assign('people', $people_search);
            if (count($people_search) < 1) {
                $smarty->assign('noFriends', 'users');
            }
        } else {
            $smarty->assign('view', 'explore_friends');
            $smarty->assign('showExplore', 'users');
            $new_people = $user->get_new_people(0, true, "GlobalHub");
            $smarty->assign('people', $new_people);
            if (count($new_people) < 1) {
                $smarty->assign('noFriends', 'users');
            }
        }
    } else {
        $results = $userGlobal->global_search($_GET['view']);
        $smarty->assign('trendingPosts', $results['posts']);
    }


    // echo $_GET['view'];
    // die;
    $smarty->assign('userGlobal', $userGlobal);
    $smarty->assign('active_page', 'GlobalHub');
    $smarty->assign('subactive_page', 'explore');
} catch (Exception $e) {
    _error(__("Error"), $e->getMessage());
}
page_header("Global " . ucwords($_GET['view']), ucwords($_GET['view']), "");
$smarty->assign('view', $_GET['view']);
// page footer
page_footer("global-profile/explore");
