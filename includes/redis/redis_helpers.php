<?php
require_once(ABSPATH . 'includes/users_functions.php');

function getNewGroups($user_id, $userObj, $redisObject)
{
    $redisGroupKey = 'user-' . $user_id . '-groups';
    //echo $redisGroupKey; die;
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisGroupKey);
    // $redisObject->deleteValueFromKey($redisGroupKey);
    $expirationTime =  $redisObject->checkRedisObjectTimeToLive($redisGroupKey);
    //  print_r($expirationTime);
    // print_r($isKeyExistOnRedis); die;
    if ($isKeyExistOnRedis == false && $expirationTime == -2) {

        /* get user pages */
        $new_groups_data = $userObj->get_groups([
            'suggested' => true,
            'random' => 'true',
            'results' => 5,
        ]);
        $jsonValue = json_encode($new_groups_data);
        $redisObject->setValueWithExpireInRedis($redisGroupKey, 300, $jsonValue);
        $getValuesFromRedis = $redisObject->getValueFromKey($redisGroupKey);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $new_groups = $jsonValue;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($redisGroupKey);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $new_groups = $jsonValue;
    }

    return $new_groups;
}

function getEventsLists($user_id, $userObj, $redisObject)
{
    $redisGroupKey = 'user-' . $user_id . '-events';
    //echo $redisGroupKey; die;
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisGroupKey);

    //print_r($isKeyExistOnRedis); die;
    if ($isKeyExistOnRedis == false) {
        /* get user pages */
        $data = $userObj->get_events([
            'suggested' => true,
            'random' => 'true',
            'results' => 5,
        ]);
        $jsonValue = json_encode($data);
        // print_r($jsonValue);die;
        $redisObject->setValueWithRedis($redisGroupKey, $jsonValue);
        $getValuesFromRedis = $redisObject->getValueFromKey($redisGroupKey);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($redisGroupKey);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    }

    return $response;
}

function getSuggestedPages($user_id, $userObj, $redisObject)
{
    $redisGroupKey = 'user-' . $user_id . '-pages';
    //echo $redisGroupKey; die;
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisGroupKey);

    //print_r($isKeyExistOnRedis); die;
    if ($isKeyExistOnRedis == false) {
        /* get user pages */
        $data = $userObj->get_pages([
            'suggested' => true,
            'random' => 'true',
            'results' => 5,
        ]);
        $jsonValue = json_encode($data);
        $redisObject->setValueWithExpireInRedis($redisGroupKey, 300, $jsonValue);
        $getValuesFromRedis = $redisObject->getValueFromKey($redisGroupKey);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($redisGroupKey);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    }

    return $response;
}

function getSuggestedPeoples($user_id, $userObj, $redisObject)
{
    $redisGroupKey = 'user-' . $user_id . '-people-suggest';
    //echo $redisGroupKey; die;
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisGroupKey);

    //print_r($isKeyExistOnRedis); die;
    if ($isKeyExistOnRedis == false) {
        /* get user pages */
        $data = $userObj->get_new_people(0, true);
        $jsonValue = json_encode($data);
        $redisObject->setValueWithExpireInRedis($redisGroupKey, 300, $jsonValue);
        $getValuesFromRedis = $redisObject->getValueFromKey($redisGroupKey);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($redisGroupKey);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    }

    return $response;
}

function fetchPostDataForTimeline($user_id, $userObj, $redisObject, $system)
{
    $redisPostKey = 'user-' . $user_id . '-posts';
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisPostKey);

    //  print_r($isKeyExistOnRedis); die;
    if ($isKeyExistOnRedis == false) {
        /* get user pages */
        $boosted_posts = [];
        // get boosted post
        if ($system['packages_enabled']) {
            $boosted_posts = $userObj->get_boosted_all();
        }
        // get posts (newsfeed)
        $postsdata = $userObj->get_posts_all();


        if (!empty($boosted_posts)) {
            $postsdata = array_merge($boosted_posts, $postsdata);
        }
        $jsonValue = json_encode($postsdata);
        //$redisObject->setValueWithRedis($redisPostKey, $jsonValue);
        $redisObject->setValueWithExpireInRedis($redisPostKey, 3600, $jsonValue);
        $getPostsFromRedis = $redisObject->getValueFromKey($redisPostKey);
        $jsonValue_ = json_decode($getPostsFromRedis, true);
        $posts = $jsonValue_;
    } else {
        $getPostsFromRedis = $redisObject->getValueFromKey($redisPostKey);
        $jsonValue = json_decode($getPostsFromRedis, true);
        $posts = $jsonValue;
    }

    return $posts;
}

function cachedUserData($db, $system, $user_id, $user_token)
{
    $redisObject = new RedisClass();
    $response = [];
    $redisPostKey = 'user-' . $user_id;
    $userClassObject = new userClass();
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisPostKey);

    // $redisObject->deleteValueFromKey($redisPostKey);
    //print_r($isKeyExistOnRedis);
    //die;
    if ($isKeyExistOnRedis == false) {
        /* get user pages */
        $userQuery = sprintf(
            "SELECT users.*, users_sessions.*, posts_photos.source as user_picture_full, packages.*,country.country_name as user_country_name FROM users INNER JOIN users_sessions ON users.user_id = users_sessions.user_id LEFT JOIN posts_photos ON users.user_picture_id = posts_photos.photo_id LEFT JOIN packages ON users.user_subscribed = '1' AND users.user_package = packages.package_id left join system_countries as country on country.country_id = users.user_country  WHERE users_sessions.user_id = %s AND users_sessions.session_token = %s",
            secure($user_id, 'int'),
            secure($user_token)
        );
        ($get_user = $db->query($userQuery)) or _error("SQL_ERROR_THROWEN");
        if ($get_user->num_rows > 0) {
            $_data = $get_user->fetch_assoc();

            if ($system['unusual_login_enabled']) {

                if ($_data['user_browser'] != get_user_browser() || $_data['user_os'] != get_user_os() || $_data['user_ip'] != get_user_ip()) {
                    return;
                }
            }

            /* active session */
            $_data['active_session_id'] = $_data['session_id'];
            $_data['active_session_token'] = $_data['session_token'];
            /* get user picture */
            $_data['user_picture_default'] = ($_data['user_picture']) ? false : true;
            $_data['user_picture_raw'] = $_data['user_picture'];
            $_data['user_picture'] = get_picture($_data['user_picture'], $_data['user_gender']);
            $_data['user_picture_full'] = ($_data['user_picture_full']) ? $_data['user_picture_full'] : $_data['user_picture_full'];

            $_data['user_picture'] = $system['system_url'] . '/includes/wallet-api/image-exist-api.php?userPicture=' . $_data['user_picture'] . '&userPictureFull=' . $_data['user_picture_full'] . '&type=1';

            /* get all friends ids */
            $_data['friends_ids'] = $userClassObject->get_friends_ids($_data['user_id']);
            /* get all followings ids */
            $_data['followings_ids'] = $userClassObject->get_followings_ids($_data['user_id']);
            /* get all friend requests ids */
            $_data['friend_requests_ids'] = $userClassObject->get_friend_requests_ids($_data['user_id']);
            /* get all friend requests sent ids */
            $_data['friend_requests_sent_ids'] = $userClassObject->get_friend_requests_sent_ids($_data['user_id']);
            $_data['can_boost_posts'] = false;
            $_data['can_boost_pages'] = false;

            if ($system['packages_enabled'] && (isset($_data['_is_admin']) || $_data['user_subscribed'])) {
                if ($_data['_is_admin'] || ($_data['boost_posts_enabled'] && ($_data['user_boosted_posts'] < $_data['boost_posts']))) {
                    $_data['can_boost_posts'] = true;
                }
                if ($_data['_is_admin'] || ($_data['boost_pages_enabled'] && ($_data['user_boosted_pages'] < $_data['boost_pages']))) {
                    $_data['can_boost_pages'] = true;
                }
            }

            /* check pages permission */
            if ($system['pages_enabled']) {
                $_data['can_create_pages'] = $userClassObject->check_module_permission($system['pages_permission']);
            }
            /* check groups permission */
            if ($system['groups_enabled']) {
                $_data['can_create_groups'] = $userClassObject->check_module_permission($system['groups_permission']);
            }
            /* check events permission */
            if ($system['events_enabled']) {
                $_data['can_create_events'] = $userClassObject->check_module_permission($system['events_permission']);
            }
            /* check blogs permission */
            if ($system['blogs_enabled']) {
                $_data['can_write_articles'] = $userClassObject->check_module_permission($system['blogs_permission']);
            }
            /* check market permission */
            if ($system['market_enabled']) {
                $_data['can_sell_products'] = $userClassObject->check_module_permission($system['market_permission']);
            }
            /* check forums permission */
            if ($system['forums_enabled']) {
                $_data['can_use_forums'] = $userClassObject->check_module_permission($system['forums_permission']);
            }
            /* check movies permission */
            if ($system['movies_enabled']) {
                $_data['can_watch_movies'] = $userClassObject->check_module_permission($system['movies_permission']);
            }
            /* check games permission */
            if ($system['games_enabled']) {
                $_data['can_play_games'] = $userClassObject->check_module_permission($system['games_permission']);
            }
            /* check games permission */
            if ($system['live_enabled']) {
                $_data['can_go_live'] = $userClassObject->check_module_permission($system['live_permission']);
            }
            $jsonValue = json_encode($_data);
            $redisObject->setValueWithRedis($redisPostKey, $jsonValue);
            $getPostsFromRedis = $redisObject->getValueFromKey($redisPostKey);
            $jsonValueRes = json_decode($getPostsFromRedis, true);
            $response = $jsonValueRes;

            // $redisPostKey = 'user-' . $user_id . '-posts';
            // $redisObject->deleteValueFromKey($redisPostKey);
            // fetchPostDataForTimeline($user_id, $userClassObject, $redisObject, $system);
        }
    } else {
        $getDataFromRedis = $redisObject->getValueFromKey($redisPostKey);
        $jsonValue = json_decode($getDataFromRedis, true);
        $response = $jsonValue;
    }


    return $response;
}

function fetchAndSetDataOnPostReaction($system, $userObj, $redisObject, $redisPostKey)
{
    $boosted_posts = [];
    // get boosted post
    if ($system['packages_enabled']) {
        $boosted_posts = $userObj->get_boosted_all();
    }
    $postsdata = $userObj->get_posts_all();
    if (!empty($boosted_posts)) {
        $postsdata = array_merge($boosted_posts, $postsdata);
    }
    $jsonValue = json_encode($postsdata);
    $redisObject->setValueWithRedis($redisPostKey, $jsonValue);
}

function getFeelings($user_id, $redisObject)
{
    $rediskeyname = 'user-' . $user_id . '-getfeelings';
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($rediskeyname);

    if ($isKeyExistOnRedis == false) {
        /* get feelings */
        $feelingsData = get_feelings();
        $jsonValue = json_encode($feelingsData);
        $redisObject->setValueWithRedis($rediskeyname, $jsonValue);
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $feelingsData = $jsonValue;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $feelingsData = $jsonValue;
    }
    return $feelingsData;
}

function getFeelingTypes($user_id, $redisObject)
{
    $rediskeyname = 'user-' . $user_id . '-getfeelingsTypes';
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($rediskeyname);

    if ($isKeyExistOnRedis == false) {
        /* get feelingtypes */
        $feelingsTypes = get_feelings_types();
        $jsonValue = json_encode($feelingsTypes);
        $redisObject->setValueWithRedis($rediskeyname, $jsonValue);
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $feelingsTypes = $jsonValue;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $feelingsTypes = $jsonValue;
    }
    return $feelingsTypes;
}

function getMyStory($user_id, $userObj, $redisObject)
{
    $rediskeyname = 'user-' . $user_id . '-getmystory';
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($rediskeyname);

    if ($isKeyExistOnRedis == false) {
        /* get my stories */
        $data = $userObj->get_my_story();
        $jsonValue = json_encode($data);
        $redisObject->setValueWithRedis($rediskeyname, $jsonValue);
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    }
    return $response;
}

function getAllStories($user_id, $userObj, $redisObject)
{
    $rediskeyname = 'user-' . $user_id . '-getotherstory';
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($rediskeyname);

    if ($isKeyExistOnRedis == false) {
        /* get user stories */
        $data = $userObj->get_stories();
        $jsonValue = json_encode($data);
        $redisObject->setValueWithRedis($rediskeyname, $jsonValue);
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    }
    return $response;
}

function syncProfilePagePostsWithRedis($user_id, $user, $profile, $redisObject)
{
    if ($user->_data['user_id'] == $profile['user_id']) {
        $rediskeyname = 'profile-posts-' . $profile['user_id'];
    } else {
        $rediskeyname = 'profile-posts-others-' . $profile['user_id'];
    }

    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($rediskeyname);

    // $redisObject->deleteValueFromKey($rediskeyname);
    // print_r($isKeyExistOnRedis); die;
    if ($isKeyExistOnRedis == false) {

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

        $jsonValue = json_encode($posts);
        $redisObject->setValueWithRedis($rediskeyname, $jsonValue);
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    }
    // echo "<pre>";
    // print_r($response);
    // die;
    return $response;
}


function usersProfilePhotosSection($user_id, $user, $redisObject, $type)
{

    if ($type == 'photos') {
        $rediskeyname = 'profile-photos-' . $user_id;
        $isKeyExistOnRedis = $redisObject->isRedisKeyExist($rediskeyname);
        //      $redisObject->deleteValueFromKey($rediskeyname);
        //  print_r($isKeyExistOnRedis); die;
        if ($isKeyExistOnRedis == false) {
            $data =  $user->get_photos($user_id);
            $jsonValue = json_encode($data);
            $redisObject->setValueWithRedis($rediskeyname, $jsonValue);
            $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
            $jsonValue = json_decode($getValuesFromRedis, true);
            $response = $jsonValue;
        } else {
            $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
            $jsonValue = json_decode($getValuesFromRedis, true);
            $response = $jsonValue;
        }
    } elseif ($type == "albums") {
        $rediskeyname = 'profile-albums-' . $user_id;
        // print_r($rediskeyname); die;
        $isKeyExistOnRedis = $redisObject->isRedisKeyExist($rediskeyname);
        //          $redisObject->deleteValueFromKey($rediskeyname);
        //  print_r($isKeyExistOnRedis); die;
        if ($isKeyExistOnRedis == false) {
            $data =  $user->get_albums($user_id);
            $jsonValue = json_encode($data);
            $redisObject->setValueWithRedis($rediskeyname, $jsonValue);
            $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
            $jsonValue = json_decode($getValuesFromRedis, true);
            $response = $jsonValue;
        } else {
            $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
            $jsonValue = json_decode($getValuesFromRedis, true);
            $response = $jsonValue;
        }
    }

    return $response;
}

function getAllFriends($user, $offset = 0, $get_all = true)
{
    $redisObject = new RedisClass();
    $rediskeyname = 'user-' . $user->_data['user_id'] . '-friends-list';
    // $redisObject->deleteValueFromKey($rediskeyname);
    // die;
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($rediskeyname);

    if ($isKeyExistOnRedis == false) {
        $data = $user->get_friends($user->_data['user_id'], $offset = 0, $get_all = true);
        $jsonValue = json_encode($data);
        $redisObject->setValueWithRedis($rediskeyname, $jsonValue);
        $response = $data;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    }
    return $response;
}

function get_blogs_categories($user)
{
    $redisObject = new RedisClass();
    $rediskeyname = 'getallbloglist';
    // $redisObject->deleteValueFromKey($rediskeyname);
    // die;
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($rediskeyname);

    if ($isKeyExistOnRedis == false) {
        $data = $user->get_blogs_categories();
        $jsonValue = json_encode($data);
        $redisObject->setValueWithRedis($rediskeyname, $jsonValue);
        $response = $data;
    } else {
        $getValuesFromRedis = $redisObject->getValueFromKey($rediskeyname);
        $jsonValue = json_decode($getValuesFromRedis, true);
        $response = $jsonValue;
    }
    return $response;
}



function quick_find_a(&$array, $property, $value_to_find, &$first_index)
{
    $l = 0;
    $r = count($array) - 1;
    $m = 0;
    while ($l <= $r) {
        $m = floor(($l + $r) / 2);
        if ($array[$m]->{$property} < $value_to_find) {
            $l = $m + 1;
        } else if ($array[$m]->{$property} > $value_to_find) {
            $r = $m - 1;
        } else {
            $first_index = $m;
            return $array[$m];
        }
    }
    return FALSE;
}

function searchSubArray($array, $key, $value)
{
    foreach ($array as $subarray) {
        if (isset($subarray[$key]) && $subarray[$key] == $value)
            return $subarray;
    }
}

function removeElementWithValue($array, $key, $value)
{
    foreach ($array as $subKey => $subArray) {
        if ($subArray[$key] == $value) {
            unset($array[$subKey]);
        }
    }
    $array = array_values($array);
    return $array;
}

function updateReactions($system, $user, $redisObject, $post_id, $authorId)
{
    $redisPostKey = 'user-' . $user->_data['user_id'] . '-posts';
    fetchAndSetDataOnPostReaction($system, $user, $redisObject, $redisPostKey);

    /* Get Curent user Post Array */
    $redisTimelinekey = 'user-' . $user->_data['user_id'] . '-posts';
    $getDataFromRedis = $redisObject->getValueFromKey($redisTimelinekey);
    $jsonValue = json_decode($getDataFromRedis, true);
    $arrayforrepalce = [];
    if (count($jsonValue) > 0) {
        $arrayforrepalce  = searchSubArray($jsonValue, 'post_id', $post_id);
    }

    $redisprofilePost = 'profile-posts-' . $authorId;
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisprofilePost);
    if ($isKeyExistOnRedis) {
        $isKeyExistOnRedis = $redisObject->deleteValueFromKey($redisprofilePost);
        // $getDataFromRedis = $redisObject->getValueFromKey($redisprofilePost);
        // $jsonValues = json_decode($getDataFromRedis, true);
        // if (count($jsonValues) > 0 && count($arrayforrepalce) > 0) {
        //     $ab = 0;
        //     foreach ($jsonValues as $valuess) {
        //         if ($jsonValues[$ab]['post_id'] === $post_id) {
        //             $jsonValues[$ab]['reactions'] = $arrayforrepalce['reactions'];
        //             $jsonValues[$ab]["reaction_like_count"] = $arrayforrepalce['reaction_like_count'];
        //             $jsonValues[$ab]["reaction_love_count"] = $arrayforrepalce['reaction_love_count'];
        //             $jsonValues[$ab]["reaction_haha_count"] = $arrayforrepalce['reaction_haha_count'];
        //             $jsonValues[$ab]["reaction_yay_count"] = $arrayforrepalce['reaction_yay_count'];
        //             $jsonValues[$ab]["reaction_wow_count"] = $arrayforrepalce['reaction_wow_count'];
        //             $jsonValues[$ab]["reaction_sad_count"] = $arrayforrepalce['reaction_sad_count'];
        //             $jsonValues[$ab]["reaction_angry_count"] = $arrayforrepalce['reaction_angry_count'];
        //             $jsonValues[$ab]["reactions_total_count"] = $arrayforrepalce['reactions_total_count'];
        //             $jsonValues[$ab]["pinned"] = $arrayforrepalce['pinned'];
        //             $jsonValues[$ab]["comments_disabled"] = $arrayforrepalce['comments_disabled'];
        //             $jsonValues[$ab]["shares"] = $arrayforrepalce['shares'];
        //             $jsonValues[$ab]["is_hidden"] = $arrayforrepalce['is_hidden'];
        //             $jsonValues[$ab]["boosted"] = $arrayforrepalce['boosted'];
        //             $jsonValues[$ab]["comments"] = $arrayforrepalce['comments'];
        //             $jsonValues[$ab]["is_hidden"] = $arrayforrepalce['is_hidden'];
        //             if ($arrayforrepalce['pinned']) {
        //                 $jsonValues[$ab]["status_post"] = 'pinned_post';
        //             } else {
        //                 $jsonValues[$ab]["status_post"] = 'unpinned_post';
        //             }
        //         }
        //         $ab++;
        //     }
        //     $data = json_encode($jsonValues);
        //     $redisObject->setValueWithRedis($redisprofilePost, $data);
        // }
    }
    /* Get Friend List and Updated Redis */
    $idList = $user->get_friends_ids($authorId);
    $followId = $user->get_followings_ids($authorId);
    if ($user->_data['user_id'] !== $authorId) {
        array_push($idList, $authorId);
    }
    $friendsList = array_unique(array_merge($followId, $idList));

    foreach ($friendsList as $ids) {
        $redisTimelinekey = 'user-' . $ids . '-posts'; //'profile-posts-' . $ids;
        $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisTimelinekey);
        if ($isKeyExistOnRedis) {
            $isKeyExistOnRedis = $redisObject->deleteValueFromKey($redisTimelinekey);
            // $getDataFromRedis = $redisObject->getValueFromKey($redisTimelinekey);
            // $jsonValue = json_decode($getDataFromRedis, true);
            // if (count($jsonValue) > 0 && count($arrayforrepalce) > 0) {
            //     $i = 0;
            //     foreach ($jsonValue as $values) {
            //         if ($jsonValue[$i]['post_id'] === $post_id) {
            //             $jsonValue[$i]['reactions'] = $arrayforrepalce['reactions'];
            //             $jsonValue[$i]["reaction_like_count"] = $arrayforrepalce['reaction_like_count'];
            //             $jsonValue[$i]["reaction_love_count"] = $arrayforrepalce['reaction_love_count'];
            //             $jsonValue[$i]["reaction_haha_count"] = $arrayforrepalce['reaction_haha_count'];
            //             $jsonValue[$i]["reaction_yay_count"] = $arrayforrepalce['reaction_yay_count'];
            //             $jsonValue[$i]["reaction_wow_count"] = $arrayforrepalce['reaction_wow_count'];
            //             $jsonValue[$i]["reaction_sad_count"] = $arrayforrepalce['reaction_sad_count'];
            //             $jsonValue[$i]["reaction_angry_count"] = $arrayforrepalce['reaction_angry_count'];
            //             $jsonValue[$i]["reactions_total_count"] = $arrayforrepalce['reactions_total_count'];
            //             $jsonValue[$i]["pinned"] = $arrayforrepalce['pinned'];
            //             $jsonValue[$i]["comments_disabled"] = $arrayforrepalce['comments_disabled'];
            //             $jsonValue[$i]["shares"] = $arrayforrepalce['shares'];
            //             $jsonValue[$i]["is_hidden"] = $arrayforrepalce['is_hidden'];
            //             $jsonValue[$i]["boosted"] = $arrayforrepalce['boosted'];
            //             $jsonValue[$i]["comments"] = $arrayforrepalce['comments'];
            //             $jsonValue[$i]["is_hidden"] = $arrayforrepalce['is_hidden'];
            //             if ($arrayforrepalce['pinned']) {
            //                 $jsonValue[$i]["status_post"] = 'pinned_post';
            //             } else {
            //                 $jsonValue[$i]["status_post"] = 'unpinned_post';
            //             }
            //         }
            //         $i++;
            //     }
            //     $data = json_encode($jsonValue);
            //     $redisObject->setValueWithRedis($redisTimelinekey, $data);
            // }
        }
    }
}
