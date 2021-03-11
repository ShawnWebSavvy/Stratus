<?php

class userClass
{

    /**
     * get_friends_ids
     *
     * @param integer $user_id
     * @return array
     */
    public function get_friends_ids($user_id)
    {
        global $db;
        $friends = [];
        $get_friends = $db->query(sprintf('SELECT users.user_id FROM friends INNER JOIN users ON (friends.user_one_id = users.user_id AND friends.user_one_id != %1$s) OR (friends.user_two_id = users.user_id AND friends.user_two_id != %1$s) WHERE status = 1 AND (user_one_id = %1$s OR user_two_id = %1$s)', secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_friends->num_rows > 0) {
            while ($friend = $get_friends->fetch_assoc()) {
                $friends[] = $friend['user_id'];
            }
        }
        return $friends;
    }

    /**
     * get_followings_ids
     *
     * @param integer $user_id
     * @return array
     */
    public function get_followings_ids($user_id)
    {
        global $db;
        $followings = [];
        $get_followings = $db->query(sprintf("SELECT following_id FROM followings WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_followings->num_rows > 0) {
            while ($following = $get_followings->fetch_assoc()) {
                $followings[] = $following['following_id'];
            }
        }
        return $followings;
    }


    /**
     * get_friend_requests_ids
     *
     * @return array
     */
    public function get_friend_requests_ids($user_id)
    {
        global $db;
        $requests = [];
        $get_requests = $db->query(sprintf("SELECT user_one_id FROM friends WHERE status = 0 AND user_two_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_requests->num_rows > 0) {
            while ($request = $get_requests->fetch_assoc()) {
                $requests[] = $request['user_one_id'];
            }
        }
        return $requests;
    }


    /**
     * get_friend_requests_sent_ids
     *
     * @return array
     */
    public function get_friend_requests_sent_ids($user_id)
    {
        global $db;
        $requests = [];
        $get_requests = $db->query(sprintf("SELECT user_two_id FROM friends WHERE status = 0 AND user_one_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_requests->num_rows > 0) {
            while ($request = $get_requests->fetch_assoc()) {
                $requests[] = $request['user_two_id'];
            }
        }
        return $requests;
    }


    /* ------------------------------- */
    /* Modules */
    /* ------------------------------- */

    /**
     * check_module_permission
     *
     * @param string $permission
     * @return boolean
     */
    public function check_module_permission($permission)
    {
        switch ($permission) {
            case 'admins':
                if ($this->_is_admin || $this->_is_moderator) {
                    return true;
                }
                break;

            case 'pro':
                if ($this->_is_admin || $this->_is_moderator || $this->_data['user_subscribed']) {
                    return true;
                }
                break;

            case 'verified':
                if ($this->_is_admin || $this->_is_moderator || $this->_data['user_subscribed'] || $this->_data['user_verified']) {
                    return true;
                }
                break;

            default:
                return true;
                break;
        }
        return false;
    }
}
