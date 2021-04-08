<?php
/**
 * ajax -> users -> image crop
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();

// user access
user_access(true);

// validate inputs
if(!isset($_POST['id']) || !is_numeric($_POST['id'])) {
	_error(403);
}
if(!isset($_POST['x']) || !is_numeric($_POST['x'])) {
	_error(403);
}
if(!isset($_POST['y']) || !is_numeric($_POST['y'])) {
	_error(403);
}
if(!isset($_POST['height']) || !is_numeric($_POST['height'])) {
	_error(403);
}
if(!isset($_POST['width']) || !is_numeric($_POST['width'])) {
	_error(403);
}



$save_file_name = !empty($_POST['save_file_name']) ? $_POST['save_file_name'] : null;
$image_blured = !empty($_POST['image_blured']) ? $_POST['image_blured'] : 0;


try {

    switch ($_POST['handle']) {
        case 'user':
            if($save_file_name){
               
               
                /* check for profile pictures album */
                if (!$user->_data['user_album_pictures']) {
                   /* create new profile pictures album */
                   $db->query(sprintf("INSERT INTO posts_photos_albums (user_id, user_type, title, privacy) VALUES (%s, 'user', 'Profile Pictures', 'public')", secure($user->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                   $user->_data['user_album_pictures'] = $db->insert_id;
                   /* update user profile picture album id */
                   $db->query(sprintf("UPDATE users SET user_album_pictures = %s WHERE user_id = %s", secure($user->_data['user_album_pictures'], 'int'), secure($user->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
               }
               /* insert updated profile picture post */
               $db->query(sprintf("INSERT INTO posts (user_id, user_type, post_type, time, privacy) VALUES (%s, 'user', 'profile_picture', %s, 'public')", secure($user->_data['user_id'], 'int'), secure($date))) or _error("SQL_ERROR_THROWEN");
               $post_id = $db->insert_id;
               /* insert new profile picture to album */
               $db->query(sprintf("INSERT INTO posts_photos (post_id, album_id, source, blur) VALUES (%s, %s, %s, %s)", secure($post_id, 'int'), secure($user->_data['user_album_pictures'], 'int'), secure($save_file_name), secure($image_blured))) or _error("SQL_ERROR_THROWEN");
               $photo_id = $db->insert_id;
               /* delete old cropped picture from uploads folder */
               delete_uploads_file($user->_data['user_picture_raw']);
               /* update user profile picture */
               $db->query(sprintf("UPDATE users SET user_picture = %s, user_picture_id = %s WHERE user_id = %s", secure($save_file_name), secure($photo_id, 'int'), secure($user->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
               
               /*Update Users Profile in RDM */
               $redisObject = new RedisClass();
               $redisPostKey = 'user-' . $user->_data['user_id'];
               $redisObject->deleteValueFromKey($redisPostKey);
               cachedUserData($db, $system, $user->_data['user_id'], $user->_data['active_session_token']);
               $redisPostProfileKey = 'profile-posts-' . $user->_data['user_id'];
               $redisObject->deleteValueFromKey($redisPostProfileKey);
             
               $redisPostKey = 'user-' . $user->_data['user_id'] . '-posts';
               $redisStorykey = 'user-' . $user->_data['user_id'] . '-getotherstory';

               $redisObject->deleteValueFromKey($redisPostKey);
               $redisObject->deleteValueFromKey($redisStorykey);
               
               fetchAndSetDataOnPostReaction($system, $user, $redisObject, $redisPostKey);

            }
            // crop user profile picture
			/* get full picture */
			$get_picture = $db->query(sprintf("SELECT posts_photos.source FROM users INNER JOIN posts_photos ON users.user_picture_id = posts_photos.photo_id WHERE users.user_id = %s", secure($user->_data['user_id'], 'int') )) or _error("SQL_ERROR_THROWEN");
			if($get_picture->num_rows == 0) {
				_error(403);
			}
			$picture = $get_picture->fetch_assoc();
            $full_picture = $picture['source'];
            /* prepare update query */
            $_POST['id'] = $user->_data['user_id'];
            $table_name = "users";
            $table_picture_field = "user_picture";
            $table_id_field = "user_id";
			break;

        case 'page':
            if($save_file_name){

             /* check if page id is set */
             if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
               /* delete the uploaded image & return error 403 */
               unlink($path);
               _error(403);
           }
           /* check the page */
           $get_page = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s", secure($_POST['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
           if ($get_page->num_rows == 0) {
               /* delete the uploaded image & return error 403 */
               unlink($path);
               _error(403);
           }
           $page = $get_page->fetch_assoc();
           /* check if the user is the page admin */
           if (!$user->check_page_adminship($user->_data['user_id'], $page['page_id'])) {
               /* delete the uploaded image & return error 403 */
               unlink($path);
               _error(403);
           }
           /* check for page pictures album */
           if (!$page['page_album_pictures']) {
               /* create new page pictures album */
               $db->query(sprintf("INSERT INTO posts_photos_albums (user_id, user_type, title, privacy) VALUES (%s, 'page', 'Profile Pictures', 'public')", secure($page['page_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
               $page['page_album_pictures'] = $db->insert_id;
               /* update page profile picture album id */
               $db->query(sprintf("UPDATE pages SET page_album_pictures = %s WHERE page_id = %s", secure($page['page_album_pictures'], 'int'), secure($page['page_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
           }
           /* insert updated page picture post */
           $db->query(sprintf("INSERT INTO posts (user_id, user_type, post_type, time, privacy) VALUES (%s, 'page', 'page_picture', %s, 'public')", secure($page['page_id'], 'int'), secure($date))) or _error("SQL_ERROR_THROWEN");
           $post_id = $db->insert_id;
           /* insert new page picture to album */
           $db->query(sprintf("INSERT INTO posts_photos (post_id, album_id, source, blur) VALUES (%s, %s, %s, %s)", secure($post_id, 'int'), secure($page['page_album_pictures'], 'int'), secure($save_file_name), secure($image_blured))) or _error("SQL_ERROR_THROWEN");
           $photo_id = $db->insert_id;
           /* delete old cropped picture from uploads folder */
           delete_uploads_file($page['page_picture']);
           /* update page picture */
           $db->query(sprintf("UPDATE pages SET page_picture = %s, page_picture_id = %s WHERE page_id = %s", secure($save_file_name), secure($photo_id, 'int'), secure($page['page_id'], 'int'))) or _error("SQL_ERROR_THROWEN");


            }


            // crop page profile picture
            /* check the page & get full picture */
            $get_page = $db->query(sprintf("SELECT posts_photos.source FROM pages INNER JOIN posts_photos ON pages.page_picture_id = posts_photos.photo_id WHERE pages.page_id = %s", secure($_POST['id'], 'int') )) or _error("SQL_ERROR_THROWEN");
            if($get_page->num_rows == 0) {
                _error(403);
            }
            $page = $get_page->fetch_assoc();
            /* check if the user is the page admin */
            if(!$user->check_page_adminship($user->_data['user_id'], $_POST['id'])) {
                _error(403);
            }
            $full_picture = $page['source'];
            /* prepare update query */
            $table_name = "pages";
            $table_picture_field = "page_picture";
            $table_id_field = "page_id";
            break;

        case 'group':
            if($save_file_name){

                    /* check if group id is set */
                    if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
                        /* delete the uploaded image & return error 403 */
                        unlink($path);
                        _error(403);
                    }
                    /* check the group */
                    $get_group = $db->query(sprintf("SELECT * FROM `groups` WHERE group_id = %s", secure($_POST['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($get_group->num_rows == 0) {
                        /* delete the uploaded image & return error 403 */
                        unlink($path);
                        _error(403);
                    }
                    $group = $get_group->fetch_assoc();
                    /* check if the user is the group admin */
                    if (!$user->check_group_adminship($user->_data['user_id'], $group['group_id'])) {
                        /* delete the uploaded image & return error 403 */
                        unlink($path);
                        _error(403);
                    }
                    /* check for group pictures album */
                    if (!$group['group_album_pictures']) {
                        /* create new group pictures album */
                        $db->query(sprintf("INSERT INTO posts_photos_albums (user_id, user_type, in_group, group_id, title, privacy) VALUES (%s, 'user', '1', %s, 'Profile Pictures', 'public')", secure($user->_data['user_id'], 'int'), secure($group['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                        $group['group_album_pictures'] = $db->insert_id;
                        /* update group profile picture album id */
                        $db->query(sprintf("UPDATE `groups` SET group_album_pictures = %s WHERE group_id = %s", secure($group['group_album_pictures'], 'int'), secure($group['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    }
                    /* insert updated group picture post */
                    $db->query(sprintf("INSERT INTO posts (user_id, user_type, post_type, in_group, group_id, time, privacy) VALUES (%s, 'user', 'group_picture', '1', %s, %s, 'custom')", secure($user->_data['user_id'], 'int'), secure($group['group_id'], 'int'), secure($date))) or _error("SQL_ERROR_THROWEN");
                    $post_id = $db->insert_id;
                    /* insert new group picture to album */
                    $db->query(sprintf("INSERT INTO posts_photos (post_id, album_id, source, blur) VALUES (%s, %s, %s, %s)", secure($post_id, 'int'), secure($group['group_album_pictures'], 'int'), secure($save_file_name), secure($image_blured))) or _error("SQL_ERROR_THROWEN");
                    $photo_id = $db->insert_id;
                    /* delete old cropped picture from uploads folder */
                    delete_uploads_file($group['group_picture']);
                    /* update group picture */
                    $db->query(sprintf("UPDATE `groups` SET group_picture = %s, group_picture_id = %s WHERE group_id = %s", secure($save_file_name), secure($photo_id, 'int'), secure($group['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    
            }
            // crop group profile picture
            /* check the group & get full picture */
            $get_group = $db->query(sprintf("SELECT posts_photos.source FROM `groups` INNER JOIN posts_photos ON `groups`.group_picture_id = posts_photos.photo_id WHERE `groups`.group_id = %s", secure($_POST['id'], 'int') )) or _error("SQL_ERROR_THROWEN");
            if($get_group->num_rows == 0) {
                _error(403);
            }
            $group = $get_group->fetch_assoc();
            /* check if the user is the group admin */
            if(!$user->check_group_adminship($user->_data['user_id'], $_POST['id'])) {
                _error(403);
            }
            $full_picture = $group['source'];
            /* prepare update query */
            $table_name = "groups";
            $table_picture_field = "group_picture";
            $table_id_field = "group_id";
            break;

		default:
			_error(400);
			break;
	}

    // save profile picture
    if($system['s3_enabled'] || $system['digitalocean_enabled'] || $system['ftp_enabled']) {
        $image_url = $system['system_uploads'].'/'.$full_picture;
    } else {
        $image_url = ABSPATH.$system['uploads_directory'].'/'.$full_picture;
    }
    $image_name = save_picture_from_url($image_url, true);

    // update profile picture
    $db->query(sprintf("UPDATE %s SET %s = %s WHERE %s = %s", $table_name, $table_picture_field, secure($image_name), $table_id_field, secure($_POST['id'], 'int') )) or _error("SQL_ERROR_THROWEN");

	// return & exit
    return_json();

} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}

?>