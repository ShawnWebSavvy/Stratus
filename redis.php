<?php
class RedisClass
{
    private $redis;

    function __construct()
    {
        if ($this->redis === NULL) {
            try {
                $this->redis = new Redis();
                $this->redis->connect('127.0.0.1', 6379);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    function getValueFromKey($key)
    {
        try {
            $redisObj = $this->redis;
            // getting the value from redis
            $data  = $redisObj->get($key);
            $emptyJson = json_encode(array());
            $return = (!empty($data)) ? $data : $emptyJson;
            return $return;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function setValueWithRedis($key, $data)
    {
        try {
            $redisObj = $this->redis;
            // setting the value in redis
            $redisObj->set($key, $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function deleteValueFromKey($key)
    {
        try {
            $redisObj = $this->redis;
            // deleting the value from redis
            $redisObj->del($key);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function getStoredKeys()
    {
        try {
            $redisObj = $this->redis;
            return $redisObj->keys("*");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function getStoredKeysbyID($keyId)
    {
        try {
            $redisObj = $this->redis;
            return $redisObj->keys($keyId);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function deleteUserData($array)
    {
        try {
            $redisObj = $this->redis;
            // deleting the value from redis
            foreach ($array as $key) {
                $this->deleteValueFromKey($key);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function isRedisKeyExist($key)
    {
        try {
            $redisObj = $this->redis;
            return  $redisObj->exists($key) ?  true : false;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function checkRedisObjectTimeToLive($key)
    {
        try {
            $redisObj = $this->redis;
            $exp_time = $redisObj->ttl($key);
            return ($exp_time) ? $exp_time : false;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    function setValueWithExpireInRedis($key, $ttl, $data)
    {
        try {
            $redisObj = $this->redis;
            // setting the value in redis
            $redisObj->setex($key, $ttl, $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



      function scanValues($cursor, $pattern)
    {
        try {
            $redisObj = $this->redis;
            // setting the value in redis
           return  $redisObj->scan($cursor, 'match', $pattern);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
