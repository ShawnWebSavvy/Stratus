<<<<<<< HEAD
<?php 
class RedisClass {
    private $redis;

    function __construct() {
        if ($this->redis===NULL){ 
            try {
            $this->redis = new Redis();
            $this->redis->connect('127.0.0.1', 6379);
            }catch(Exception $e) {
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
=======
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
>>>>>>> 98f6d48aa9eb3f9672cb8e5b79ad124f6057c8dd
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
<<<<<<< HEAD


    function setValueWithRedis($key, $data, $ttl)
=======
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
>>>>>>> 98f6d48aa9eb3f9672cb8e5b79ad124f6057c8dd
    {
        try {
            $redisObj = $this->redis;
            // setting the value in redis
<<<<<<< HEAD
            $redisObj->setex($key, $ttl, $data);
=======
            $redisObj->set($key, $data);
>>>>>>> 98f6d48aa9eb3f9672cb8e5b79ad124f6057c8dd
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

<<<<<<< HEAD

=======
>>>>>>> 98f6d48aa9eb3f9672cb8e5b79ad124f6057c8dd
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

<<<<<<< HEAD

=======
>>>>>>> 98f6d48aa9eb3f9672cb8e5b79ad124f6057c8dd
    function getStoredKeys()
    {
        try {
            $redisObj = $this->redis;
<<<<<<< HEAD
            // deleting the value from redis
        return $redisObj->keys("*"); 
=======
            return $redisObj->keys("*");
>>>>>>> 98f6d48aa9eb3f9672cb8e5b79ad124f6057c8dd
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
<<<<<<< HEAD
}

?>
=======

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
}
>>>>>>> 98f6d48aa9eb3f9672cb8e5b79ad124f6057c8dd
