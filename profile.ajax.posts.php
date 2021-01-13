<?php

// fetch bootloader
require('bootloader.php');

	$get_profile = $db->query(sprintf("SELECT users.*, picture_photo.source as user_picture_full, picture_photo_post.privacy as user_picture_privacy, cover_photo.source as user_cover_full, cover_photo_post.privacy as cover_photo_privacy, packages.name as package_name, packages.color as package_color FROM users LEFT JOIN posts_photos as picture_photo ON users.user_picture_id = picture_photo.photo_id LEFT JOIN posts as picture_photo_post ON picture_photo.post_id = picture_photo_post.post_id LEFT JOIN posts_photos as cover_photo ON users.user_cover_id = cover_photo.photo_id LEFT JOIN posts as cover_photo_post ON cover_photo.post_id = cover_photo_post.post_id LEFT JOIN packages ON users.user_subscribed = '1' AND users.user_package = packages.package_id WHERE users.user_name = %s", secure($_GET['username']))) or _error("SQL_ERROR_THROWEN");
	if ($get_profile->num_rows == 0) {
		_error(404);
	}
	$profile = $get_profile->fetch_assoc();
			// get posts 
			$posts_unpin = $user->get_posts(array('get' => 'posts_profile', 'id' => $profile['user_id']));
			$postsUnpin = array();
			$pinnedPost = array();
			$i = 0;
			$k = 0;
			foreach ($posts_unpin as $post) {
				if ($profile['user_pinned_post'] != $post['post_id']) {
					$postsUnpin[$i] = $post;
					$postsUnpin[$i]['status_post'] = "unpinned_post";
					$i++;
				} else {
					$pinnedPost[$k] = $post;
					$pinnedPost[$k]['status_post'] = "pinned_post";
					$k++;
				}
			}

			if (!empty($pinnedPost)) {
				$posts = array_merge($pinnedPost, $postsUnpin);
				//$posts = array_reverse($posts)
			} else {
				$posts = $postsUnpin;
			}
			// echo "<pre>";
			// print_r($posts);
			// die;

			// prepare publisher 
			$smarty->assign('feelings', get_feelings());
			$smarty->assign('feelings_types', get_feelings_types());
			if ($system['colored_posts_enabled']) {
				$smarty->assign('colored_patterns', $user->get_posts_colored_patterns());
			}
			$smarty->assign('posts', $posts);
			$smarty->assign('_id', $profile["user_id"]);
			$smarty->assign('_get', "posts_profile");

page_footer("_posts");
