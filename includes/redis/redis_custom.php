<?php
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
