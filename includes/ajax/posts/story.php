<?php
/**
 * ajax -> posts -> story
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');
require_once('../../../includes/class-user.php');
$user = new User();
// check AJAX Request
is_ajax();

// user access
user_access(true);

// check if stories enabled
if(!$system['stories_enabled']) {
	modal("MESSAGE", __("Error"), __("This feature has been disabled by the admin"));
}


try {

	// initialize the return array
	$return = array();

	switch ($_REQUEST['do']) {
		case 'publish':
			// valid inputs
			// if(!isset($_POST['photos']) && !isset($_POST['videos'])) {
			// 	_error(400);
			// }
			/* filter photos */
			$photos = array();
			if(isset($_POST['photos'])) {
				$_POST['photos'] = json_decode($_POST['photos']);
				if(is_object($_POST['photos'])) {
					/* filter the photos */
					foreach($_POST['photos'] as $photo) {
						$photos[] = (array) $photo;
					}
				}
			}
			/* filter videos */
			$videos = array();
			if(isset($_POST['videos'])) {
				$_POST['videos'] = json_decode($_POST['videos']);
				if(is_object($_POST['videos'])) {
					/* filter the videos */
					foreach($_POST['videos'] as $video) {
						$videos[] = $video;
					}
				}
			}
			// if(count($photos) == 0 && count($videos) == 0) {
			// 	_error(400);
			// }

			// post story
			$user->post_story($_POST['message'], $photos, $videos);

			// return
			$return['callback'] = "window.location.reload();";
			break;

		case 'create':
			// prepare publisher
			$return['story_publisher'] = $smarty->fetch("ajax.story.publisher.tpl");
			$return['callback'] = "$('#modal').modal('show'); $('.modal-content:last').html(response.story_publisher);";
			break;

		case 'delete':
			// delete story
			$user->delete_my_story();
			break;
		case 'getstory':
				// delete story
			$storyid= $_POST['storyId'];
			$itemid= $_POST['itemid'];
			$story_user_id= $_POST['story_user_id'];
			$hubtype = $_POST['hubtype'];
			
			$viewcount = $user->getstory($storyid,$itemid,$story_user_id,$hubtype);
			$return['total_view'] = $viewcount;
			break;
		case 'storyviewcount':
			$storyid= $_POST['storyId'];
			$userID= $_POST['userID'];
			$itemid = $_POST['itemid'];
			$hubtype = $_POST['hubtype'];
			$user->storyviewcount($storyid,$userID,$itemid,$hubtype);	
			break;
		
		default:
			_error(400);
			break;
	}

	// return & exit
	return_json($return);

} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}

?>