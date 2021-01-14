<?php

$BENCHMARK = True;
$BENCHMARK = False;
$TIME_START = microtime(true);
$LAST_TIME = microtime(true);
$TIMES = array("START" => 0);

// fetch bootloader
require('bootloader.php');

$TIMES["BEFORE QUERY"] = microtime(true) - $LAST_TIME; $LAST_TIME = microtime(true);
	$get_profile = $db->query(sprintf("SELECT users.*, picture_photo.source as user_picture_full, picture_photo_post.privacy as user_picture_privacy, cover_photo.source as user_cover_full, cover_photo_post.privacy as cover_photo_privacy, packages.name as package_name, packages.color as package_color FROM users LEFT JOIN posts_photos as picture_photo ON users.user_picture_id = picture_photo.photo_id LEFT JOIN posts as picture_photo_post ON picture_photo.post_id = picture_photo_post.post_id LEFT JOIN posts_photos as cover_photo ON users.user_cover_id = cover_photo.photo_id LEFT JOIN posts as cover_photo_post ON cover_photo.post_id = cover_photo_post.post_id LEFT JOIN packages ON users.user_subscribed = '1' AND users.user_package = packages.package_id WHERE users.user_name = %s", secure($_GET['username']))) or _error("SQL_ERROR_THROWEN");
	if ($get_profile->num_rows == 0) {
		_error(404);
	}
$TIMES["BEFORE GET PROFILE"] = microtime(true) - $LAST_TIME; $LAST_TIME = microtime(true);
	$profile = $get_profile->fetch_assoc();
			// get friends 
			$profile['friends'] = $user->get_friends($profile['user_id']);
			if (count($profile['friends']) > 0) {
				$profile['friends_count'] = count($user->get_friends_ids($profile['user_id']));
			}
			
//--------------------------------------------------------------------------------
if ($BENCHMARK) {
	echo "<pre>";
	$TIME_TOTAL = microtime(true) - $TIME_START;
	echo "TIME_TOTAL: " . $TIME_TOTAL . "\n";
	$TIME_SUM = 0;
	foreach ($TIMES as $key => $value) {
		echo $key . ": " . $value . "\n";
		$TIME_SUM += $value;
	}
	echo "TIME_SUM: " . $TIME_SUM;
	echo "done"; die();
}
			$smarty->assign('friends', $profile['friends']);
			$smarty->assign('profile', $profile);

page_footer("NEW_profile.ajax.friends");
