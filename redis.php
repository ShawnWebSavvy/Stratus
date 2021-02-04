<?php
class RedisClass
{
    private $redis;

    function __construct()
    {
        if ($this->redis === NULL) {
            try {
                $this->redis = new Redis();
                $this->redis->connect('172.31.24.194', 6379);
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
            return $redisObj->get($key);
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
            // deleting the value from redis
            return $redisObj->keys("*");
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
        }
    }
}
