<?php

function getNewGroups($user_id, $userObj, $redisObject)
{
    $redisGroupKey = 'user-' . $user_id . '-groups';
    //echo $redisGroupKey; die;
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisGroupKey);

    //print_r($isKeyExistOnRedis); die;
    if ($isKeyExistOnRedis == false) {
        /* get user pages */
        $new_groups_data = $userObj->get_groups([
            'suggested' => true,
            'random' => 'true',
            'results' => 5,
        ]);
        $jsonValue = json_encode($new_groups_data);
        $redisObject->setValueWithRedis($redisGroupKey, $jsonValue);
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

function fetchPostDataForTimeline($user_id, $userObj, $redisObject, $system)
{
    $redisPostKey = 'user-' . $user_id . '-posts';
    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisPostKey);
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
        $redisObject->setValueWithRedis($redisPostKey, $jsonValue);
        $getPostsFromRedis = $redisObject->getValueFromKey($redisPostKey);
        $jsonValue = json_decode($getPostsFromRedis, true);
        $posts = $jsonValue;
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

    $isKeyExistOnRedis = $redisObject->isRedisKeyExist($redisPostKey);
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
        $jsonValue = json_encode($_data);
        $redisObject->setValueWithRedis($redisPostKey, $jsonValue);
        $getPostsFromRedis = $redisObject->getValueFromKey($redisPostKey);
        $jsonValueRes = json_decode($getPostsFromRedis, true);
        $response = $jsonValueRes;
    }
       
    } else {
        $getDataFromRedis = $redisObject->getValueFromKey($redisPostKey);
        $jsonValue = json_decode($getDataFromRedis, true);
        $response = $jsonValue;
        //echo "here"; die;
    }



   return $response;
}

?>
