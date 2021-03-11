<?php
//require_once("class-user.php");
/**
 * class -> user
 * 
 * @package Sngine
 * @author Zamblek
 */
class UserGlobal
{
    public $_logged_in = false;
    public $_is_admin = false;
    public $_is_moderator = false;
    public $_data = [];

    private $_cookie_user_id = "c_user";
    private $_cookie_user_token = "xs";
    private $_cookie_user_referrer = "ref";


    /* ------------------------------- */
    /* __construct */
    /* ------------------------------- */

    /**
     * __construct
     * 
     * @return void
     */

    public function __construct()
    {
        global $db, $system;
        if ($system['s3_enabled']) {
            $system['system_uploads'] = $system['system_uploads_url'];
        }
        if (isset($_COOKIE[$this->_cookie_user_id]) && isset($_COOKIE[$this->_cookie_user_token])) {
            $userQuery = sprintf("SELECT users.*, users_sessions.*, posts_photos.source as user_picture_full, packages.*,country.country_name as user_country_name FROM users INNER JOIN users_sessions ON users.user_id = users_sessions.user_id LEFT JOIN global_posts_photos as posts_photos ON users.global_user_picture_id = posts_photos.photo_id LEFT JOIN packages ON users.user_subscribed = '1' AND users.user_package = packages.package_id left join system_countries as country on country.country_id = users.user_country  WHERE users_sessions.user_id = %s AND users_sessions.session_token = %s", secure($_COOKIE[$this->_cookie_user_id], 'int'), secure($_COOKIE[$this->_cookie_user_token]));

            $get_user = $db->query($userQuery) or _error("SQL_ERROR_THROWEN");
            if ($get_user->num_rows > 0) {
                $this->_data = $get_user->fetch_assoc();
                $this->_data['user_picture'] = $this->_data['global_user_picture'];

                /* check unusual login */
                if ($system['unusual_login_enabled']) {
                    if ($this->_data['user_browser'] != get_user_browser() || $this->_data['user_os'] != get_user_os() || $this->_data['user_ip'] != get_user_ip()) {
                        return;
                    }
                }
                /*---- global profile datat --*/
                $get_user1 = $db->query(sprintf("SELECT * FROM global_profile WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                // $get_user1 = $db->query($userQuery1) or _error("SQL_ERROR_THROWEN");
                if ($get_user1->num_rows > 0) {
                    $this->_data1 = $get_user1->fetch_assoc();
                    // echo "<pre>";print_r($this->_data1); exit;

                    $this->_data = array_replace($this->_data, $this->_data, $this->_data1);
                }

                // echo "<pre>"; print_r($this->_data); exit;
                /*--- global profile end -- */


                $this->_logged_in = true;
                $this->_is_admin = ($this->_data['user_group'] == 1) ? true : false;
                $this->_is_moderator = ($this->_data['user_group'] == 2) ? true : false;
                /* update user language */
                if ($system['current_language'] != $this->_data['user_language']) {
                    $db->query(sprintf("UPDATE users SET user_language = %s WHERE user_id = %s", secure($system['current_language']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                /* update user last seen */
                $db->query(sprintf("UPDATE users SET user_last_seen = NOW() WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* active session */
                $this->_data['active_session_id'] = $this->_data['session_id'];
                $this->_data['active_session_token'] = $this->_data['session_token'];
                /* get user picture */
                $this->_data['user_picture_default'] = ($this->_data['global_user_picture']) ? false : true;
                //echo $this->_data['global_user_picture']; exit;
                $this->_data['user_picture_raw'] = $this->_data['global_user_picture'];
                $this->_data['user_picture'] = get_picture($this->_data['global_user_picture'], $this->_data['user_gender']);
                $this->_data['global_user_picture'] = $this->_data['user_picture'];
                $this->_data['user_picture_full'] = ($this->_data['user_picture_full']) ? $system['system_uploads'] . '/' . $this->_data['user_picture_full'] : $this->_data['user_picture_full'];

                // if ($this->_data['user_picture'] == "") {
                //     $this->_data['user_picture'] = $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
                // }
                // if ($this->_data['global_user_picture'] == "") {
                //     $this->_data['global_user_picture'] = $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
                // }
                // if ($this->_data['user_picture_full'] == "") {
                //     $this->_data['user_picture_full'] = 'content/themes/default/images/user_defoult_img.jpg';
                // }
                $this->_data['global_user_picture'] = $system['system_url'] . '/' . 'includes/wallet-api/image-exist-api.php?userPicture=' . $this->_data['global_user_picture'] . '&userPictureFull=' . $system['system_uploads'] . '/' . $this->_data['user_picture_full'] . '&type=1';

                /* get all friends ids */
                $this->_data['friends_ids'] = $this->get_friends_ids($this->_data['user_id']);
                /* get all followings ids */
                $this->_data['followings_ids'] = $this->get_followings_ids($this->_data['user_id']);
                /* get all friend requests ids */
                $this->_data['friend_requests_ids'] = $this->get_friend_requests_ids();
                /* get all friend requests sent ids */
                $this->_data['friend_requests_sent_ids'] = $this->get_friend_requests_sent_ids();
                /* check boost permission */
                $this->_data['can_boost_posts'] = false;
                $this->_data['can_boost_pages'] = false;
                if ($system['packages_enabled'] && ($this->_is_admin || $this->_data['user_subscribed'])) {
                    if ($this->_is_admin || ($this->_data['boost_posts_enabled'] && ($this->_data['user_boosted_posts'] < $this->_data['boost_posts']))) {
                        $this->_data['can_boost_posts'] = true;
                    }
                    if ($this->_is_admin || ($this->_data['boost_pages_enabled'] && ($this->_data['user_boosted_pages'] < $this->_data['boost_pages']))) {
                        $this->_data['can_boost_pages'] = true;
                    }
                }
                /* check pages permission */
                if ($system['pages_enabled']) {
                    $this->_data['can_create_pages'] = $this->check_module_permission($system['pages_permission']);
                }
                /* check groups permission */
                if ($system['groups_enabled']) {
                    $this->_data['can_create_groups'] = $this->check_module_permission($system['groups_permission']);
                }
                /* check events permission */
                if ($system['events_enabled']) {
                    $this->_data['can_create_events'] = $this->check_module_permission($system['events_permission']);
                }
                /* check blogs permission */
                if ($system['blogs_enabled']) {
                    $this->_data['can_write_articles'] = $this->check_module_permission($system['blogs_permission']);
                }
                /* check market permission */
                if ($system['market_enabled']) {
                    $this->_data['can_sell_products'] = $this->check_module_permission($system['market_permission']);
                }
                /* check forums permission */
                if ($system['forums_enabled']) {
                    $this->_data['can_use_forums'] = $this->check_module_permission($system['forums_permission']);
                }
                /* check movies permission */
                if ($system['movies_enabled']) {
                    $this->_data['can_watch_movies'] = $this->check_module_permission($system['movies_permission']);
                }
                /* check games permission */
                if ($system['games_enabled']) {
                    $this->_data['can_play_games'] = $this->check_module_permission($system['games_permission']);
                }
            }
        }
    }

    public function check_privacy($privacy, $author_id)
    {
        if ($privacy == 'public') {
            return true;
        }
        if ($this->_logged_in) {
            /* check if the viewer is the system admin */
            if ($this->_data['user_group'] < 3) {
                return true;
            }
            /* check if the viewer is the target */
            if ($author_id == $this->_data['user_id']) {
                return true;
            }
            /* check if the viewer and the target are friends */
            if ($privacy == 'friends' && in_array($author_id, $this->_data['friends_ids'])) {
                return true;
            }
        }
        return false;
    }
    /**
     * blocked
     * 
     * @param integer $user_id
     * @return boolean
     */
    public function blocked($user_id)
    {
        global $db;
        /* bypass the block if the viewer is admin or moderator  */
        if ($this->_data['user_group'] < 3) {
            return false;
        }
        /* check if there is any blocking between the viewer & the target */
        if ($this->_logged_in) {
            $check = $db->query(sprintf('SELECT COUNT(*) as count FROM users_blocks WHERE (user_id = %1$s AND blocked_id = %2$s) OR (user_id = %2$s AND blocked_id = %1$s)', secure($this->_data['user_id'], 'int'),  secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check->fetch_assoc()['count'] > 0) {
                return true;
            }
        }
        return false;
    }

    /* ------------------------------- */
    /* Modules */
    /* ------------------------------- */


    private function _get_hidden_posts($user_id)
    {
        global $db;
        $hidden_posts = [];
        $get_hidden_posts = $db->query(sprintf("SELECT post_id FROM global_posts_hidden WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_hidden_posts->num_rows > 0) {
            while ($hidden_post = $get_hidden_posts->fetch_assoc()) {
                $hidden_posts[] = $hidden_post['post_id'];
            }
        }
        return $hidden_posts;
    }


    /**
     * post_mentions
     * 
     * @param string $text
     * @param integer $node_url
     * @param string $node_type
     * @param string $notify_id
     * @param array $excluded_ids
     * @return void
     */
    public function post_mentions($text, $node_url, $node_type = 'post', $notify_id = '', $excluded_ids = array())
    {
        global $db;
        $where_query = "";
        if ($excluded_ids) {
            $excluded_list = implode(',', $excluded_ids);
            $where_query = " user_id NOT IN ($excluded_list) AND ";
        }
        $done = [];
        if (preg_match_all('/\[([a-zA-Z0-9._]+)\]/', $text, $matches)) {
            foreach ($matches[1] as $username) {
                if ($this->_data['user_name'] != $username && !in_array($username, $done)) {
                    $get_user = $db->query(sprintf("SELECT user_id FROM users WHERE " . $where_query . " user_name = %s", secure($username))) or _error("SQL_ERROR_THROWEN");
                    if ($get_user->num_rows > 0) {
                        $_user = $get_user->fetch_assoc();
                        $this->post_notification(array('to_user_id' => $_user['user_id'], 'action' => 'mention', 'node_type' => $node_type, 'node_url' => $node_url, 'notify_id' => $notify_id, 'hub' => "GlobalHub"));
                        $done[] = $username;
                    }
                }
            }
        }
    }


    /**
     * post_notification
     * 
     * @param integer $to_user_id
     * @param string $action
     * @param string $node_type
     * @param string $node_url
     * @param string $notify_id
     * @return void
     */
    public function post_notification($args = [])
    {
        global $db, $date, $system, $control_panel;
        if (!isset($control_panel)) {
            $control_panel['url'] = ($this->_is_admin) ? "admincp" : "modcp";
        }
        /* initialize arguments */
        $to_user_id = !isset($args['to_user_id']) ? _error(400) : $args['to_user_id'];
        $from_user_id = !isset($args['from_user_id']) ? $this->_data['user_id'] : $args['from_user_id'];
        $action = !isset($args['action']) ? _error(400) : $args['action'];
        $node_type = !isset($args['node_type']) ? '' : $args['node_type'];
        $node_url = !isset($args['node_url']) ? '' : $args['node_url'];
        $notify_id = !isset($args['notify_id']) ? '' : $args['notify_id'];
        $hub = !isset($args['hub']) ? '' : $args['hub'];
        /* if the viewer is the target */
        if ($this->_data['user_id'] == $to_user_id) {
            return;
        }
        /* get receiver user */
        $get_receiver = $db->query(sprintf("SELECT user_firstname, user_lastname, user_email, email_friend_requests, email_post_likes, email_post_comments, email_post_shares, email_mentions, email_profile_visits, email_wall_posts, onesignal_user_id, user_language FROM users WHERE user_id = %s", secure($to_user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_receiver->num_rows == 0) {
            return;
        }
        if ($system['email_notifications'] || $system['onesignal_notification_enabled']) {
            /* prepare receiver */
            $receiver = $get_receiver->fetch_assoc();
        }
        /* insert notification */
        $db->query(sprintf("INSERT INTO notifications (to_user_id, from_user_id, action, node_type, node_url, notify_id, hub, time) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($to_user_id, 'int'), secure($from_user_id, 'int'), secure($action), secure($node_type), secure($node_url), secure($notify_id), secure($hub), secure($date))) or _error("SQL_ERROR_THROWEN");
        /* update notifications counter +1 */
        $db->query(sprintf("UPDATE users SET user_live_notifications_counter = user_live_notifications_counter + 1 WHERE user_id = %s", secure($to_user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* email notifications */
        if ($system['email_notifications']) {
            /* prepare notification notify_id */
            $notify_id = ($notify_id) ? "?notify_id=" . $notify_id : "";
            /* prepare notification node_url */
            if (strpos($node_url, "-[guid=]") !== false) {
                /* Note: GUID in node_url to make the notification record unique */
                $node_url = explode("-[guid=]", $node_url)[0];
            }
            /* parse notification */
            switch ($action) {
                case 'friend_add':
                    if ($system['email_friend_requests'] && $receiver['email_friend_requests']) {
                        $notification['url'] = $system['system_url'] . '/' . $node_url;
                        $notification['message'] = __("sent you a friend request");
                    }
                    break;

                case 'friend_accept':
                    if ($system['email_friend_requests'] && $receiver['email_friend_requests']) {
                        $notification['url'] = $system['system_url'] . '/' . $node_url;
                        $notification['message'] = __("accepted your friend request");
                    }
                    break;

                case 'react_like':
                case 'react_love':
                case 'react_haha':
                case 'react_yay':
                case 'react_wow':
                case 'react_sad':
                case 'react_angry':
                    if ($system['email_post_likes'] && $receiver['email_post_likes']) {
                        if ($node_type == "post") {
                            $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url;
                            $notification['message'] = __("reacted to your post");
                        } elseif ($node_type == "photo") {
                            $notification['url'] = $system['system_url'] . '/photos/' . $node_url;
                            $notification['message'] = __("reacted to your photo");
                        } elseif ($node_type == "post_comment") {
                            $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                            $notification['message'] = __("reacted to your comment");
                        } elseif ($node_type == "photo_comment") {
                            $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                            $notification['message'] = __("reacted to your comment");
                        } elseif ($node_type == "post_reply") {
                            $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                            $notification['message'] = __("reacted to your reply");
                        } elseif ($node_type == "photo_reply") {
                            $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                            $notification['message'] = __("reacted to your reply");
                        }
                    }
                    break;

                case 'comment':
                    if ($system['email_post_comments'] && $receiver['email_post_comments']) {
                        if ($node_type == "post") {
                            $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                            $notification['message'] = __("commented on your post");
                        } elseif ($node_type == "photo") {
                            $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                            $notification['message'] = __("commented on your photo");
                        }
                    }
                    break;

                case 'reply':
                    if ($system['email_post_comments'] && $receiver['email_post_comments']) {
                        if ($node_type == "post") {
                            $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                        } elseif ($node_type == "photo") {
                            $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                        }
                        $notification['message'] = __("replied to your comment");
                    }
                    break;

                case 'share':
                    if ($system['email_post_shares'] && $receiver['email_post_shares']) {
                        $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url;
                        $notification['message'] = __("shared your post");
                    }
                    break;

                case 'mention':
                    if ($system['email_mentions'] && $receiver['email_mentions']) {
                        switch ($node_type) {
                            case 'post':
                                $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url;
                                $notification['message'] = __("mentioned you in a post");
                                break;

                            case 'comment_post':
                                $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                                $notification['message'] = __("mentioned you in a comment");
                                break;

                            case 'comment_photo':
                                $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                                $notification['message'] = __("mentioned you in a comment");
                                break;

                            case 'reply_post':
                                $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                                $notification['message'] = __("mentioned you in a reply");
                                break;

                            case 'reply_photo':
                                $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                                $notification['message'] = __("mentioned you in a reply");
                                break;
                        }
                    }
                    break;

                case 'profile_visit':
                    // if ($system['email_profile_visits'] && $receiver['email_profile_visits']) {
                    //     $notification['url'] = $system['system_url'] . '/' . $this->_data['user_name'];
                    //     $notification['message'] = __("visited your profile");
                    // }
                    // break;

                case 'wall':
                    if ($system['email_wall_posts'] && $receiver['email_wall_posts']) {
                        $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url;
                        $notification['message'] = __("posted on your wall");
                    }
                    break;

                default:
                    return;
                    break;
            }
            /* prepare notification email */
            if ($notification['message']) {
                $subject = __("New notification from") . " " . $system['system_title'];
                $body = get_email_template("notification_email", $subject, ["receiver" => $receiver, "notification" => $notification]);
                /* send email */
                _email($receiver['user_email'], $subject, $body['html'], $body['plain']);
            }
        }
        /* onesignal push notifications */
        if ($system['onesignal_notification_enabled'] && $receiver['onesignal_user_id']) {
            /* set notification language to receiver's language */
            T_setlocale(LC_MESSAGES, $receiver['user_language']);
            /* prepare notification notify_id */
            $notify_id = ($notify_id) ? "?notify_id=" . $notify_id : "";
            /* prepare notification node_url */
            if (strpos($node_url, "-[guid=]") !== false) {
                /* Note: GUID in node_url to make the notification record unique */
                $node_url = explode("-[guid=]", $node_url)[0];
            }
            /* parse notification */
            switch ($action) {
                case 'friend_add':
                    $notification['url'] = $system['system_url'] . '/' . $node_url;
                    $notification['message'] = __("sent you a friend request");
                    break;

                case 'friend_accept':
                    $notification['url'] = $system['system_url'] . '/' . $node_url;
                    $notification['message'] = __("accepted your friend request");
                    break;

                case 'follow':
                    $notification['url'] = $system['system_url'] . '/' . $node_url;
                    $notification['message'] = __("now following you");
                    break;

                case 'poke':
                    $notification['url'] = $system['system_url'] . '/' . $node_url;
                    $notification['message'] = __("poked you");
                    break;

                case 'gift':
                    $notification['url'] = $system['system_url'] . '/' . $this->_data['user_name'] . '?gift=' . $node_url;
                    $notification['message'] = __("Sent you a gift");
                    break;

                case 'react_like':
                case 'react_love':
                case 'react_haha':
                case 'react_yay':
                case 'react_wow':
                case 'react_sad':
                case 'react_angry':
                    if ($node_type == "post") {
                        $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url;
                        $notification['message'] = __("reacted to your post");
                    } elseif ($node_type == "photo") {
                        $notification['url'] = $system['system_url'] . '/photos/' . $node_url;
                        $notification['message'] = __("reacted to your photo");
                    } elseif ($node_type == "post_comment") {
                        $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                        $notification['message'] = __("reacted to your comment");
                    } elseif ($node_type == "photo_comment") {
                        $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                        $notification['message'] = __("reacted to your comment");
                    } elseif ($node_type == "post_reply") {
                        $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                        $notification['message'] = __("reacted to your reply");
                    } elseif ($node_type == "photo_reply") {
                        $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                        $notification['message'] = __("reacted to your reply");
                    }
                    break;

                case 'comment':
                    if ($node_type == "post") {
                        $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                        $notification['message'] = __("commented on your post");
                    } elseif ($node_type == "photo") {
                        $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                        $notification['message'] = __("commented on your photo");
                    }
                    break;

                case 'reply':
                    if ($node_type == "post") {
                        $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                    } elseif ($node_type == "photo") {
                        $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                    }
                    $notification['message'] = __("replied to your comment");
                    break;

                case 'share':
                    $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url;
                    $notification['message'] = __("shared your post");
                    break;

                case 'vote':
                    $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url;
                    $notification['message'] = __("voted on your poll");
                    break;

                case 'mention':
                    switch ($node_type) {
                        case 'post':
                            $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url;
                            $notification['message'] = __("mentioned you in a post");
                            break;

                        case 'comment_post':
                            $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                            $notification['message'] = __("mentioned you in a comment");
                            break;

                        case 'comment_photo':
                            $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                            $notification['message'] = __("mentioned you in a comment");
                            break;

                        case 'reply_post':
                            $notification['url'] = $system['system_url'] . '/global-profile-posts/' . $node_url . $notify_id;
                            $notification['message'] = __("mentioned you in a reply");
                            break;

                        case 'reply_photo':
                            $notification['url'] = $system['system_url'] . '/photos/' . $node_url . $notify_id;
                            $notification['message'] = __("mentioned you in a reply");
                            break;
                    }
                    break;

                case 'profile_visit':
                    // $notification['url'] = $system['system_url'] . '/' . $this->_data['user_name'];
                    // $notification['message'] = __("visited your profile");
                    // break;

                case 'wall':
                    $notification['url'] = $system['system_url'] . '/posglobal-profile-poststs/' . $node_url;
                    $notification['message'] = __("posted on your wall");
                    break;

                case 'page_invitation':
                    $notification['url'] = $system['system_url'] . '/pages/' . $node_url;
                    $notification['message'] = __("invite you to like a page") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "'";
                    break;

                case 'page_admin_addation':
                    $notification['url'] = $system['system_url'] . '/pages/' . $node_url;
                    $notification['message'] = __("added you as admin to") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "' " . __("page");
                    break;

                case 'group_join':
                    $notification['url'] = $system['system_url'] . '/groups/' . $node_url . '/settings/requests';
                    $notification['message'] = __("asked to join your group") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "'";
                    break;

                case 'group_add':
                    $notification['url'] = $system['system_url'] . '/groups/' . $node_url;
                    $notification['message'] = __("added you to") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "' " . __("group");
                    break;

                case 'group_accept':
                    $notification['url'] = $system['system_url'] . '/groups/' . $node_url;
                    $notification['message'] = __("accepted your request to join") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "' " . __("group");
                    break;

                case 'group_admin_addation':
                    $notification['url'] = $system['system_url'] . '/groups/' . $node_url;
                    $notification['message'] = __("added you as admin to") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "' " . __("group");
                    break;

                case 'group_post_pending':
                    $notification['url'] = $system['system_url'] . '/groups/' . $node_url . '?pending';
                    $notification['message'] = __("added pending post in your group") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "'";
                    break;

                case 'group_post_approval':
                    $notification['url'] = $system['system_url'] . '/groups/' . $node_url;
                    $notification['message'] = __("approved your your pending post in group") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "'";
                    break;

                case 'event_invitation':
                    $notification['url'] = $system['system_url'] . '/events/' . $node_url;
                    $notification['message'] = __("invite you to join an event") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "'";
                    break;

                case 'event_post_pending':
                    $notification['url'] = $system['system_url'] . '/events/' . $node_url . '?pending';
                    $notification['message'] = __("added pending post in your event") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "'";
                    break;

                case 'event_post_approval':
                    $notification['url'] = $system['system_url'] . '/events/' . $node_url;
                    $notification['message'] = __("approved your your pending post in event") . " '" . html_entity_decode($node_type, ENT_QUOTES) . "'";
                    break;

                case 'forum_reply':
                    $notification['url'] = $system['system_url'] . '/forums/thread/' . $node_url;
                    $notification['message'] = __("replied to your thread");
                    break;

                case 'money_sent':
                    $notification['url'] = $system['system_url'] . '/wallet';
                    $notification['message'] = __("sent you ") . $system['system_currency_symbol'] . $node_type;
                    break;

                case 'coinpayments_complete':
                    $notification['url'] = $system['system_url'] . '/settings/coinpayments';
                    $notification['message'] = __("Your CoinPayments transaction complete successfully");
                    break;

                case 'bank_transfer':
                    $notification['url'] = $system['system_url'] . '/' . $control_panel['url'] . '/bank';
                    $notification['message'] = __("Sent new bank transfer");
                    break;

                case 'bank_transfer_approved':
                    $notification['url'] = $system['system_url'] . '/settings/bank';
                    $notification['message'] = __("Approved your bank transfer");
                    break;

                case 'bank_transfer_declined':
                    $notification['url'] = $system['system_url'] . '/settings/bank';
                    $notification['message'] = __("Declined your bank transfer");
                    break;

                case 'affiliates_withdrawal':
                    $notification['url'] = $system['system_url'] . '/' . $control_panel['url'] . '/affiliates/payments';
                    $notification['message'] = __("Sent new affiliates withdrawal request");
                    break;

                case 'affiliates_withdrawal_approved':
                    $notification['url'] = $system['system_url'] . '/settings/affiliates/payments';
                    $notification['message'] = __("Approved your affiliates withdrawal request");
                    break;

                case 'affiliates_withdrawal_declined':
                    $notification['url'] = $system['system_url'] . '/settings/affiliates/payments';
                    $notification['message'] = __("Declined your affiliates withdrawal request");
                    break;

                case 'points_withdrawal':
                    $notification['url'] = $system['system_url'] . '/' . $control_panel['url'] . '/points/payments';
                    $notification['message'] = __("Sent new points withdrawal request");
                    break;

                case 'points_withdrawal_approved':
                    $notification['url'] = $system['system_url'] . '/settings/points/payments';
                    $notification['message'] = __("Approved your points withdrawal request");
                    break;

                case 'points_withdrawal_declined':
                    $notification['url'] = $system['system_url'] . '/settings/points/payments';
                    $notification['message'] = __("Declined your points withdrawal request");
                    break;

                case 'report':
                    $notification['url'] = $system['system_url'] . '/' . $control_panel['url'] . '/reports';
                    $notification['message'] = __("reported new content");
                    break;

                case 'verification_request':
                    $notification['url'] = $system['system_url'] . '/' . $control_panel['url'] . '/verification';
                    $notification['message'] = __("sent new verification request");
                    break;
            }
            /* prepare message */
            $notification['full_message'] = html_entity_decode($this->_data['user_firstname'], ENT_QUOTES) . " " . html_entity_decode($this->_data['user_lastname'], ENT_QUOTES) . " " . html_entity_decode($notification['message'], ENT_QUOTES);
            onesignal_notification($receiver['onesignal_user_id'], $notification);
        }
    }

    /**
     * parse
     * 
     * @param array $args
     * @return string
     */
    private function _parse($args = [])
    {

        /* validate arguments */
        $text = $args['text'];
        $decode_urls = !isset($args['decode_urls']) ? true : $args['decode_urls'];
        $decode_emoji = !isset($args['decode_emoji']) ? true : $args['decode_emoji'];
        $decode_stickers = !isset($args['decode_stickers']) ? true : $args['decode_stickers'];
        $decode_mentions = !isset($args['decode_mentions']) ? true : $args['decode_mentions'];
        $decode_hashtags = !isset($args['decode_hashtags']) ? true : $args['decode_hashtags'];
        $trending_hashtags = !isset($args['trending_hashtags']) ? false : $args['trending_hashtags'];
        $post_id = !isset($args['post_id']) ? null : $args['post_id'];
        $nl2br = !isset($args['nl2br']) ? true : $args['nl2br'];
        /* decode urls */
        if ($decode_urls) {
            $text = decode_urls($text);
        }
        /* decode emoji */
        if ($decode_emoji) {
            $text = $this->decode_emoji($text);
        }
        /* decode stickers */
        if ($decode_stickers) {
            $text = $this->decode_stickers($text);
        }
        /* decode @mention */
        if ($decode_mentions) {
            $text = $this->decode_mention($text);
        }

        /* decode #hashtag */
        if ($decode_hashtags) {
            $text = $this->decode_hashtags($text, $trending_hashtags, $post_id);
        }

        /* censored words */
        $text = censored_words($text);
        /* nl2br */
        if ($nl2br) {
            $text = nl2br($text);
        }
        return $text;
    }


    /**
     * decode_hashtags
     * 
     * @param string $text
     * @param boolean $trending_hashtags
     * @param integer $post_id
     * @return string
     */
    function decode_hashtags($text, $trending_hashtags, $post_id)
    {
        $pattern = '/(\s|^)((#|\x{ff03}){1}([0-9_\p{L}&;]*[_\p{L}&;][0-9_\p{L}&;]*))/u';

        $text = preg_replace_callback($pattern, function ($matches) use ($trending_hashtags, $post_id) {
            global $system, $db, $date;

            if ($trending_hashtags) {

                $get_hashtag = $db->query(sprintf("SELECT hashtag_id FROM hashtags WHERE hashtag = %s", secure($matches[4]))) or _error("SQL_ERROR_THROWEN");
                if ($get_hashtag->num_rows == 0) {
                    /* insert the new hashtag */
                    $db->query(sprintf("INSERT INTO hashtags (hashtag) VALUES (%s)", secure($matches[4]))) or _error("SQL_ERROR_THROWEN");
                    $hashtag_id = $db->insert_id;
                } else {
                    $hashtag_id = $get_hashtag->fetch_assoc()['hashtag_id'];
                }
                $postHubType = 'GlobalHub';
                /* connect hashtag with the post */
                $db->query(sprintf(
                    "INSERT INTO hashtags_posts (post_id, hashtag_id,postHubType,created_at) VALUES (%s,%s,%s,%s)",
                    secure($post_id, 'int'),
                    secure($hashtag_id, 'int'),
                    secure($postHubType),
                    secure($date)
                ));
            }
            return $matches[1] . '<a href="' . $system['system_url'] . '/globalhub-search/hashtag/' . $matches[4] . '">' . $matches[2] . '</a>';
        }, $text);
        return $text;
    }

    /**
     * get_posts_colored_patterns
     * 
     * @return array
     */
    public function get_posts_colored_patterns()
    {
        global $db;
        $patterns = [];
        $get_patterns = $db->query("SELECT * FROM posts_colored_patterns") or _error("SQL_ERROR_THROWEN");
        if ($get_patterns->num_rows > 0) {
            while ($pattern = $get_patterns->fetch_assoc()) {
                $patterns[] = $pattern;
            }
        }
        return $patterns;
    }


    /**
     * get_posts_colored_pattern
     * 
     * @param integer $pattern_id
     * @return array
     */
    public function get_posts_colored_pattern($pattern_id)
    {
        global $db;
        $get_pattern = $db->query(sprintf("SELECT * FROM posts_colored_patterns WHERE pattern_id = %s", secure($pattern_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_pattern->num_rows == 0) {
            return 0;
        }
        return $get_pattern->fetch_assoc();
    }


    /* ------------------------------- */
    /* Points System */
    /* ------------------------------- */

    /**
     * points_balance
     * 
     * @param string $type
     * @param integer $user_id
     * @param string $node_type
     * @param integer $node_id
     * @return void
     */
    public function points_balance($type, $user_id, $node_type, $node_id = null)
    {
        global $db, $system;
        /* check if points enabled */
        if (!$system['points_enabled']) {
            return;
        }
        switch ($node_type) {
            case 'post':
                $points_per_node = $system['points_per_post'];
                break;

            case 'comment':
                $points_per_node = $system['points_per_comment'];
                break;

            case 'posts_reactions':
            case 'posts_photos_reactions':
            case 'posts_comments_reactions':
                $points_per_node = $system['points_per_reaction'];
                break;
        }
        switch ($type) {
            case 'add':
                /* check user daily limits */
                if ($this->get_remaining_points($user_id) == 0) {
                    return;
                }
                /* add points */
                $db->query(sprintf("UPDATE users SET user_points = user_points + %s WHERE user_id = %s", secure($points_per_node, 'int'), secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update the node as earned */
                switch ($node_type) {
                    case 'post':
                        $db->query(sprintf("UPDATE posts SET points_earned = '1' WHERE post_id = %s", secure($node_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                        break;

                    case 'comment':
                        $db->query(sprintf("UPDATE posts_comments SET points_earned = '1' WHERE comment_id = %s", secure($node_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                        break;

                    case 'posts_reactions':
                        $db->query(sprintf("UPDATE posts_reactions SET points_earned = '1' WHERE id = %s", secure($node_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                        break;

                    case 'posts_photos_reactions':
                        $db->query(sprintf("UPDATE posts_photos_reactions SET points_earned = '1' WHERE id = %s", secure($node_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                        break;

                    case 'posts_comments_reactions':
                        $db->query(sprintf("UPDATE posts_comments_reactions SET points_earned = '1' WHERE id = %s", secure($node_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                        break;
                }
                break;

            case 'delete':
                /* delete points */
                $db->query(sprintf('UPDATE users SET user_points = IF(user_points-%1$s<=0,0,user_points-%1$s) WHERE user_id = %2$s', secure($points_per_node, 'int'), secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;
        }
    }


    /**
     * get_remaining_points
     * 
     * @param integer $user_id
     * @return integer
     */
    public function get_remaining_points($user_id)
    {
        global $db, $system;
        /* posts */
        $get_posts = $db->query(sprintf("SELECT COUNT(*) as count FROM posts WHERE points_earned = '1' AND posts.time >= DATE_SUB(NOW(),INTERVAL 1 DAY) AND user_id = %s AND user_type = 'user'", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        $total_posts_points = $get_posts->fetch_assoc()['count'] * $system['points_per_post'];
        /* comments */
        $get_comments = $db->query(sprintf("SELECT COUNT(*) as count FROM posts_comments WHERE points_earned = '1' AND posts_comments.time >= DATE_SUB(NOW(),INTERVAL 1 DAY) AND user_id = %s AND user_type = 'user'", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        $total_comments_points = $get_comments->fetch_assoc()['count'] * $system['points_per_comment'];
        /* reactions */
        $total_reactions_points = 0;
        $get_reactions_posts = $db->query(sprintf("SELECT COUNT(*) as count FROM posts_reactions WHERE points_earned = '1' AND posts_reactions.reaction_time >= DATE_SUB(NOW(),INTERVAL 1 DAY) AND user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        $total_reactions_points += $get_reactions_posts->fetch_assoc()['count'];
        $get_reactions_photos = $db->query(sprintf("SELECT COUNT(*) as count FROM posts_photos_reactions WHERE points_earned = '1' AND posts_photos_reactions.reaction_time >= DATE_SUB(NOW(),INTERVAL 1 DAY) AND user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        $total_reactions_points += $get_reactions_photos->fetch_assoc()['count'];
        $get_reactions_comments = $db->query(sprintf("SELECT COUNT(*) as count FROM posts_comments_reactions WHERE points_earned = '1' AND posts_comments_reactions.reaction_time >= DATE_SUB(NOW(),INTERVAL 1 DAY) AND user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        $total_reactions_points += $get_reactions_comments->fetch_assoc()['count'];
        $total_reactions_points *= $system['points_per_reaction'];
        /* total daily points*/
        $total_daily_points = $total_posts_points + $total_comments_points + $total_reactions_points;
        /* total daily limit */
        $total_daily_limit = ($system['packages_enabled'] && $this->_data['user_subscribed']) ? $system['points_limit_pro'] : $system['points_limit_user'];
        /* return remaining points */
        $remaining_points = $total_daily_limit - $total_daily_points;
        return ($remaining_points > 0) ? $remaining_points : 0;
    }

    /**
     * decode_mention
     * 
     * @param string $text
     * @return string
     */
    function decode_mention($text)
    {
        global $user;
        $text = preg_replace_callback('/\[([a-z0-9._]+)\]/i', array($this, 'get_mentions'), $text);
        return $text;
    }




    /**
     * get_mentions
     * 
     * @param array $matches
     * @return string
     */
    public function get_mentions($matches)
    {
        global $db;
        $get_user = $db->query(sprintf("SELECT user_id, user_name, user_firstname, user_lastname FROM users WHERE user_name = %s", secure($matches[1]))) or _error("SQL_ERROR_THROWEN");
        if ($get_user->num_rows > 0) {
            $user = $get_user->fetch_assoc();
            $replacement = popover($user['user_id'], $user['user_name'], $user['user_firstname'] . " " . $user['user_lastname']);
        } else {
            $replacement = $matches[0];
        }
        return $replacement;
    }


    /**
     * decode_emoji
     * 
     * @param string $text
     * @return string
     */
    public function decode_emoji($text)
    {
        global $db;
        $get_emojis = $db->query("SELECT * FROM emojis") or _error("SQL_ERROR_THROWEN");
        if ($get_emojis->num_rows > 0) {
            while ($emoji = $get_emojis->fetch_assoc()) {
                $replacement = '<i class="twa twa-' . $emoji['class'] . '"></i>';
                $pattern = preg_quote($emoji['pattern'], '/');
                $text = preg_replace('/(^|\s)' . $pattern . '/', $replacement, $text);
            }
        }
        return $text;
    }


    /**
     * decode_stickers
     * 
     * @param string $text
     * @return string
     */
    public function decode_stickers($text)
    {
        global $db, $system;
        $get_stickers = $db->query("SELECT * FROM stickers") or _error("SQL_ERROR_THROWEN");
        if ($get_stickers->num_rows > 0) {
            while ($sticker = $get_stickers->fetch_assoc()) {
                $replacement = '<img class="" src="' . $system['system_uploads'] . '/' . $sticker['image'] . '"></i>';
                $text = preg_replace('/(^|\s):STK-' . $sticker['sticker_id'] . ':/', $replacement, $text);
            }
        }
        return $text;
    }


    /**
     * check_event_adminship
     * 
     * @param integer $user_id
     * @param integer $event_id
     * @return boolean
     */
    public function check_event_adminship($user_id, $event_id)
    {
        global $db;
        if ($this->_logged_in) {
            $check = $db->query(sprintf("SELECT COUNT(*) as count FROM `events` WHERE event_admin = %s AND event_id = %s", secure($user_id, 'int'), secure($event_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check->fetch_assoc()['count'] > 0) {
                return true;
            }
        }
        return false;
    }



    /**
     * check_page_adminship
     * 
     * @param integer $user_id
     * @param integer $page_id
     * @return boolean
     */
    public function check_page_adminship($user_id, $page_id)
    {
        if ($this->_logged_in) {
            /* get page admins ids */
            $page_admins_ids = $this->get_page_admins_ids($page_id);
            if (in_array($user_id, $page_admins_ids)) {
                return true;
            }
        }
        return false;
    }

    /**
     * get_page_admins_ids
     * 
     * @param integer $page_id
     * @return array
     */
    public function get_page_admins_ids($page_id)
    {
        global $db;
        $admins = [];
        $get_admins = $db->query(sprintf("SELECT user_id FROM pages_admins WHERE page_id = %s", secure($page_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_admins->num_rows > 0) {
            while ($admin = $get_admins->fetch_assoc()) {
                $admins[] = $admin['user_id'];
            }
        }
        return $admins;
    }

    /**
     * check_group_adminship
     * 
     * @param integer $user_id
     * @param integer $group_id
     * @return boolean
     */
    public function check_group_adminship($user_id, $group_id)
    {
        if ($this->_logged_in) {
            /* get group admins ids */
            $group_admins_ids = $this->get_group_admins_ids($group_id);
            if (in_array($user_id, $group_admins_ids)) {
                return true;
            }
        }
        return false;
    }

    /**
     * get_group_admins_ids
     * 
     * @param integer $group_id
     * @return array
     */
    public function get_group_admins_ids($group_id)
    {
        global $db;
        $admins = [];
        $get_admins = $db->query(sprintf("SELECT user_id FROM groups_admins WHERE group_id = %s", secure($group_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_admins->num_rows > 0) {
            while ($admin = $get_admins->fetch_assoc()) {
                $admins[] = $admin['user_id'];
            }
        }
        return $admins;
    }

    /**
     * _set_authentication_cookies
     * 
     * @param integer $user_id
     * @param boolean $remember
     * @param string $path
     * @return void
     */
    private function _set_authentication_cookies($user_id, $remember = false, $path = '/')
    {
        global $db, $system, $date;
        /* generate new token */
        $session_token = get_hash_token();
        /* secured cookies */
        $secured = (get_system_protocol() == "https") ? true : false;
        /* set authentication cookies */
        if ($remember) {
            $expire = time() + 2592000;
            setcookie($this->_cookie_user_id, $user_id, $expire, $path, "", $secured, true);
            setcookie($this->_cookie_user_token, $session_token, $expire, $path, "", $secured, true);
        } else {
            setcookie($this->_cookie_user_id, $user_id, 0, $path, "", $secured, true);
            setcookie($this->_cookie_user_token, $session_token, 0, $path, "", $secured, true);
        }
        /* check brute-force attack detection */
        if ($system['brute_force_detection_enabled']) {
            $db->query(sprintf("UPDATE users SET user_failed_login_count = 0 WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        }
        /* insert user token */
        $db->query(sprintf("INSERT INTO users_sessions (session_token, session_date, user_id, user_browser, user_os, user_ip) VALUES (%s, %s, %s, %s, %s, %s)", secure($session_token), secure($date), secure($user_id, 'int'), secure(get_user_browser()), secure(get_user_os()), secure(get_user_ip()))) or _error("SQL_ERROR_THROWEN");
    }

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
     * get_friend_requests_ids
     * 
     * @return array
     */
    public function get_friend_requests_ids()
    {
        global $db;
        $requests = [];
        $get_requests = $db->query(sprintf("SELECT user_one_id FROM friends WHERE status = 0 AND user_two_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
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
    public function get_friend_requests_sent_ids()
    {
        global $db;
        $requests = [];
        $get_requests = $db->query(sprintf("SELECT user_two_id FROM friends WHERE status = 0 AND user_one_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_requests->num_rows > 0) {
            while ($request = $get_requests->fetch_assoc()) {
                $requests[] = $request['user_two_id'];
            }
        }
        return $requests;
    }

    /**
     * search_users
     * 
     * @param string $distance
     * @param string $keyword
     * @param string $gender
     * @param string $relationship
     * @param string $status
     * @return array
     */
    public function search_users($distance, $keyword, $gender, $relationship, $status)
    {
        global $db, $system;
        $results = [];
        $offset *= $system['max_results'];
        // validation
        /* validate distance */
        $unit = 6371;
        $distance = ($distance && is_numeric($distance) && $distance > 0) ? $distance : 25;
        /* validate gender */
        if (!in_array($gender, array('any', 'male', 'female', 'other'))) {
            return $results;
        }
        /* validate relationship */
        if (!in_array($relationship, array('any', 'single', 'relationship', 'married', "complicated", 'separated', 'divorced', 'widowed'))) {
            return $results;
        }
        /* validate status */
        if (!in_array($status, array('any', 'online', 'offline'))) {
            return $results;
        }
        // prepare where statement
        $where = "";
        /* merge (friends, followings, friend requests & friend requests sent) and get the unique ids  */
        $old_people_ids = array_unique(array_merge($this->_data['friends_ids'], $this->_data['followings_ids'], $this->_data['friend_requests_ids'], $this->_data['friend_requests_sent_ids']));
        /* add the viewer to this list */
        $old_people_ids[] = $this->_data['user_id'];
        /* make a list from old people */
        $old_people_ids_list = implode(',', $old_people_ids);
        $where .= sprintf("WHERE user_banned = '0' AND user_id NOT IN (%s)", $old_people_ids_list);
        if ($system['activation_enabled']) {
            $where .= " AND user_activated = '1'";
        }
        /* keyword */
        if ($keyword) {
            $where .= sprintf(' AND (user_name LIKE %1$s OR user_firstname LIKE %1$s OR user_lastname LIKE %1$s OR CONCAT(user_firstname,  " ", user_lastname) LIKE %1$s)', secure($keyword, 'search'));
        }
        /* gender */
        if ($gender != "any") {
            $where .= " AND users.user_gender = '$gender'";
        }
        /* relationship */
        if ($relationship != "any") {
            $where .= " AND users.user_relationship = '$relationship'";
        }
        /* status */
        if ($status != "any") {
            if ($status == "online") {
                $where .= sprintf(" AND user_last_seen >= SUBTIME(NOW(), SEC_TO_TIME(%s))", secure($system['offline_time'], 'int', false));
            } else {
                $where .= sprintf(" AND user_last_seen < SUBTIME(NOW(), SEC_TO_TIME(%s))", secure($system['offline_time'], 'int', false));
            }
        }
        /* get users */
        $query = sprintf("SELECT *, (%s * acos(cos(radians(%s)) * cos(radians(user_latitude)) * cos(radians(user_longitude) - radians(%s)) + sin(radians(%s)) * sin(radians(user_latitude))) ) AS distance FROM users ", secure($unit, 'int'), secure($this->_data['user_latitude']), secure($this->_data['user_longitude']), secure($this->_data['user_latitude']));
        $query .= $where;
        $query .= sprintf(" HAVING distance < %s ORDER BY distance ASC LIMIT %s", secure($distance, 'int'), secure($system['max_results'], 'int', false));
        $get_users = $db->query($query) or _error("SQL_ERROR_THROWEN");
        if ($get_users->num_rows > 0) {
            while ($user = $get_users->fetch_assoc()) {
                $user['user_picture'] = get_picture($user['user_picture'], $user['user_gender']);
                /* get the connection between the viewer & the target */
                $user['connection'] = $this->connection($user['user_id']);
                $results[] = $user;
            }
        }
        return $results;
    }

    /**
     * get_friend_requests_sent
     * 
     * @param integer $offset
     * @return array
     */
    public function get_friend_requests_sent($offset = 0)
    {
        global $db, $system;
        $requests = [];
        $offset *= $system['max_results'];
        $get_requests = $db->query(sprintf("SELECT friends.user_two_id as user_id, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.user_picture FROM friends INNER JOIN users ON friends.user_two_id = users.user_id WHERE friends.status = 0 AND friends.user_one_id = %s LIMIT %s, %s", secure($this->_data['user_id'], 'int'), secure($offset, 'int', false), secure($system['max_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
        if ($get_requests->num_rows > 0) {
            while ($request = $get_requests->fetch_assoc()) {
                $request['user_picture'] = get_picture($request['user_picture'], $request['user_gender']);
                $request['mutual_friends_count'] = $this->get_mutual_friends_count($request['user_id']);
                $requests[] = $request;
            }
        }
        return $requests;
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
        $get_followings = $db->query(sprintf("SELECT following_id FROM global_followings WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_followings->num_rows > 0) {
            while ($following = $get_followings->fetch_assoc()) {
                $followings[] = $following['following_id'];
            }
        }
        return $followings;
    }

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




    public function httpGetCurl($apiUrl)
    {
        //ini_set('display_errors', 1);
        //ini_set('display_startup_errors', 1);
        //error_reporting(E_ALL);
        $baseUrl  = API_BASE_URL;
        $url      = $baseUrl . $apiUrl;
        $curlInit = curl_init();
        curl_setopt($curlInit, CURLOPT_URL, $url);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch,CURLOPT_HEADER, false); 
        $curlResponse = curl_exec($curlInit);
        $curlResponse =  json_decode($curlResponse, true);
        curl_close($curlInit);
        return $curlResponse;
    }

    public function httpPostCurl($apiUrl, $params)
    {
        //ini_set('display_errors', 1);
        //ini_set('display_startup_errors', 1);
        //error_reporting(E_ALL);
        // $baseUrl  = 'https://ws.stage-apollo.xyz/api';

        $baseUrl  = API_BASE_URL;
        $url      = $baseUrl . $apiUrl;
        $curlInit = curl_init();

        //$postData = array("email"=>"anurag.gupta@antiersolutions.com","password"=>"qwerty@123");
        $postData = json_encode($params);
        curl_setopt($curlInit, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curlInit, CURLOPT_URL, $url);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlInit, CURLOPT_HEADER, false);
        curl_setopt($curlInit, CURLOPT_POSTFIELDS, $postData);

        $curlResponse = curl_exec($curlInit);
        $curlResponse =  json_decode($curlResponse, true);
        curl_close($curlInit);
        // print_r($curlResponse); die("hiiiiii");
        return $curlResponse;
    }

    /**
     * _check_ip
     * 
     * @return void
     */
    private function _check_ip()
    {
        global $db, $system;
        if ($system['max_accounts'] > 0) {
            $check = $db->query(sprintf("SELECT user_ip, COUNT(*) FROM users_sessions WHERE user_ip = %s GROUP BY user_id", secure(get_user_ip()))) or _error("SQL_ERROR_THROWEN");
            if ($check->num_rows >= $system['max_accounts']) {
                throw new Exception(__("You have reached the maximum number of account for your IP"));
            }
        }
    }

    /**
     * check_username
     * 
     * @param string $username
     * @param string $type
     * @param boolean $return_info
     * @return boolean|array
     */
    public function check_username($username, $type = 'user', $return_info = false)
    {
        global $db;
        /* check if banned by the system */
        $check_banned = $db->query(sprintf("SELECT COUNT(*) as count FROM blacklist WHERE node_type = 'username' AND node_value = %s", secure($username))) or _error("SQL_ERROR_THROWEN");
        if ($check_banned->fetch_assoc()['count'] > 0) {
            throw new Exception(__("Sorry but this username") . " <strong>" . $username . "</strong> " . __("is not allowed in our system"));
        }
        /* check type (user|page|group) */
        switch ($type) {
            case 'page':
                $query = $db->query(sprintf("SELECT * FROM pages WHERE page_name = %s", secure($username))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'group':
                $query = $db->query(sprintf("SELECT * FROM `groups` WHERE group_name = %s", secure($username))) or _error("SQL_ERROR_THROWEN");
                break;

            default:
                $query = $db->query(sprintf("SELECT * FROM users WHERE user_name = %s", secure($username))) or _error("SQL_ERROR_THROWEN");
                break;
        }
        if ($query->num_rows > 0) {
            if ($return_info) {
                $info = $query->fetch_assoc();
                return $info;
            }
            return true;
        }
        return false;
    }

    /**
     * check_email
     * 
     * @param string $email
     * @param boolean $return_info
     * @return boolean|array
     * 
     */
    public function check_email($email, $return_info = false)
    {
        global $db;
        /* check if banned by the system */
        $email_domain = explode('@', $email)[1];
        $check_banned = $db->query(sprintf("SELECT COUNT(*) as count FROM blacklist WHERE node_type = 'email' AND node_value = %s", secure(explode('@', $email)[1]))) or _error("SQL_ERROR_THROWEN");
        if ($check_banned->fetch_assoc()['count'] > 0) {
            throw new Exception(__("Sorry but this provider") . " <strong>" . $email_domain . "</strong> " . __("is not allowed in our system"));
        }
        $query = $db->query(sprintf("SELECT * FROM users WHERE user_email = %s", secure($email))) or _error("SQL_ERROR_THROWEN");
        if ($query->num_rows > 0) {
            if ($return_info) {
                $info = $query->fetch_assoc();
                return $info;
            }
            return true;
        }
        return false;
    }


    /**
     * check_phone
     * 
     * @param string $phone
     * @return boolean
     * 
     */
    public function check_phone($phone)
    {
        global $db;
        $query = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_phone = %s", secure($phone))) or _error("SQL_ERROR_THROWEN");
        if ($query->fetch_assoc()['count'] > 0) {
            return true;
        }
        return false;
    }

    /**
     * set_custom_fields
     * 
     * @param array $input_fields
     * @param string $for
     * @param string $set
     * @param integer $node_id
     * @return void|array
     */
    public function set_custom_fields($input_fields, $for = "user", $set = "registration", $node_id = null)
    {
        global $db, $system;
        $custom_fields = [];
        /* prepare "for" [user|page|group|event] - default -> user */
        if (!in_array($for, array('user', 'page', 'group', 'event'))) {
            _error(400);
        }
        /* prepare "set" [registration|settings] - default -> registration */
        if (!in_array($set, array('registration', 'settings'))) {
            _error(400);
        }
        /* prepare where_query */
        $where_query = " AND field_for = '" . $for . "'";
        if ($set == "registration") {
            $where_query .= " AND in_registration = '1'";
        }
        /* get & set input_fields */
        $prefix = "fld_";
        $prefix_len = strlen($prefix);
        foreach ($input_fields as $key => $value) {
            if (strpos($key, $prefix) === false) {
                continue;
            }
            $field_id = substr($key, $prefix_len);
            $get_field = $db->query(sprintf("SELECT * FROM custom_fields WHERE field_id = %s" . $where_query, secure($field_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($get_field->num_rows == 0) {
                continue;
            }
            $field = $get_field->fetch_assoc();
            /* valid field */
            if ($field['mandatory']) {
                if ($field['type'] != "selectbox" && is_empty($value)) {
                    throw new Exception(__("You must enter") . " " . $field['label']);
                }
                if ($field['type'] == "selectbox" && $value == "none") {
                    throw new Exception(__("You must select") . " " . $field['label']);
                }
            }
            if (strlen($value) > $field['length']) {
                throw new Exception(__("The maximum value for") . " " . $field['label'] . " " . __("is") . " " . $field['length']);
            }
            /* (insert|update) node custom fields */
            if ($set == "registration") {
                /* insert query */
                $custom_fields[$field['field_id']] = $value;
            } else {
                /* valid node_id */
                if ($node_id == null) {
                    _error(400);
                }
                $insert_field = $db->query(sprintf("INSERT INTO custom_fields_values (value, field_id, node_id, node_type) VALUES (%s, %s, %s, %s)", secure($value), secure($field['field_id'], 'int'), secure($node_id, 'int'), secure($for)));
                if (!$insert_field) {
                    /* update if already exist */
                    $db->query(sprintf("UPDATE custom_fields_values SET value = %s WHERE field_id = %s AND node_id = %s AND node_type = %s", secure($value), secure($field['field_id'], 'int'), secure($node_id, 'int'), secure($for))) or _error("SQL_ERROR_THROWEN");
                }
            }
        }
        if ($set == "registration") {
            return $custom_fields;
        }
        return;
    }

    /* ------------------------------- */
    /* [Tools] Auto Connect */
    /* ------------------------------- */

    /**
     * auto_friend
     * 
     * @param integer $user_id
     * @return void
     */
    public function auto_friend($user_id)
    {
        global $db, $system;
        if (!isset($user_id) || !$system['auto_friend'] || is_empty($system['auto_friend_users'])) {
            return;
        }
        /* make a list from target friends */
        $auto_friend_users_array = json_decode(html_entity_decode($system['auto_friend_users']), true);
        if (count($auto_friend_users_array) == 0) {
            return;
        }
        foreach ($auto_friend_users_array as $_user) {
            if (is_numeric($_user['id'])) {
                $auto_friend_users_ids[] = $_user['id'];
            }
        }
        if (count($auto_friend_users_ids) == 0) {
            return;
        }
        $auto_friend_users = implode(',', $auto_friend_users_ids);
        /* get the user_id of each new friend */
        $get_auto_friends = $db->query("SELECT user_id FROM users WHERE user_id IN ($auto_friend_users)");
        if ($get_auto_friends->num_rows > 0) {
            while ($auto_friend = $get_auto_friends->fetch_assoc()) {
                /* add friend */
                $db->query(sprintf("INSERT INTO friends (user_one_id, user_two_id, status) VALUES (%s, %s, '1')", secure($user_id, 'int'),  secure($auto_friend['user_id'], 'int')));
                /* follow */
                $db->query(sprintf("INSERT INTO global_followings (user_id, following_id) VALUES (%s, %s)", secure($user_id, 'int'),  secure($auto_friend['user_id'], 'int')));
            }
        }
    }



    /**
     * check_invitation_code
     * 
     * @param string $code
     * @return boolean
     * 
     */
    public function check_invitation_code($code)
    {
        global $db;
        $query = $db->query(sprintf("SELECT COUNT(*) as count FROM invitation_codes WHERE code = %s AND valid = '1'", secure($code))) or _error("SQL_ERROR_THROWEN");
        if ($query->fetch_assoc()['count'] > 0) {
            return true;
        }
        return false;
    }
    /**
     * auto_follow
     * 
     * @param integer $user_id
     * @return void
     */
    public function auto_follow($user_id)
    {
        global $db, $system;
        if (!isset($user_id) || !$system['auto_follow'] || is_empty($system['auto_follow_users'])) {
            return;
        }
        /* make a list from target followings */
        $auto_follow_users_array = json_decode(html_entity_decode($system['auto_follow_users']), true);
        if (count($auto_follow_users_array) == 0) {
            return;
        }
        foreach ($auto_follow_users_array as $_user) {
            if (is_numeric($_user['id'])) {
                $auto_follow_users_ids[] = $_user['id'];
            }
        }
        if (count($auto_follow_users_ids) == 0) {
            return;
        }
        $auto_follow_users = implode(',', $auto_follow_users_ids);
        /* get the user_id of each new following */
        $get_auto_followings = $db->query("SELECT user_id FROM users WHERE user_id IN ($auto_follow_users)");
        if ($get_auto_followings->num_rows > 0) {
            while ($auto_following = $get_auto_followings->fetch_assoc()) {
                /* follow */
                $db->query(sprintf("INSERT INTO global_followings (user_id, following_id) VALUES (%s, %s)", secure($user_id, 'int'),  secure($auto_following['user_id'], 'int')));
            }
        }
    }


    /**
     * auto_like
     * 
     * @param integer $user_id
     * @return void
     */
    public function auto_like($user_id)
    {
        global $db, $system;
        if (!isset($user_id) || !$system['auto_like'] || is_empty($system['auto_like_pages'])) {
            return;
        }
        /* make a list from target pages */
        $auto_like_pages_array = json_decode(html_entity_decode($system['auto_like_pages']), true);
        if (count($auto_like_pages_array) == 0) {
            return;
        }
        foreach ($auto_like_pages_array as $_page) {
            if (is_numeric($_page['id'])) {
                $auto_like_pages_ids[] = $_page['id'];
            }
        }
        if (count($auto_like_pages_ids) == 0) {
            return;
        }
        $auto_like_pages = implode(',', $auto_like_pages_ids);
        /* get the page_id of each new like */
        $get_auto_like = $db->query("SELECT page_id FROM pages WHERE page_id IN ($auto_like_pages)");
        if ($get_auto_like->num_rows > 0) {
            while ($auto_like = $get_auto_like->fetch_assoc()) {
                /* like */
                $db->query(sprintf("INSERT INTO pages_likes (user_id, page_id) VALUES (%s, %s)", secure($user_id, 'int'),  secure($auto_like['page_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update likes counter +1 */
                $db->query(sprintf("UPDATE pages SET page_likes = page_likes + 1  WHERE page_id = %s", secure($auto_like['page_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            }
        }
    }


    /**
     * auto_join
     * 
     * @param integer $user_id
     * @return void
     */
    public function auto_join($user_id)
    {
        global $db, $system;
        if (!isset($user_id) || !$system['auto_join'] || is_empty($system['auto_join_groups'])) {
            return;
        }
        /* make a list from target groups */
        $auto_join_groups_array = json_decode(html_entity_decode($system['auto_join_groups']), true);
        if (count($auto_join_groups_array) == 0) {
            return;
        }
        foreach ($auto_join_groups_array as $_group) {
            if (is_numeric($_group['id'])) {
                $auto_join_groups_ids[] = $_group['id'];
            }
        }
        if (count($auto_join_groups_ids) == 0) {
            return;
        }
        $auto_join_groups = implode(',', $auto_join_groups_ids);
        /* get the group_id of each new join */
        $get_auto_join = $db->query("SELECT group_id FROM `groups` WHERE group_id IN ($auto_join_groups)");
        if ($get_auto_join->num_rows > 0) {
            while ($auto_join = $get_auto_join->fetch_assoc()) {
                /* join */
                $db->query(sprintf("INSERT INTO groups_members (user_id, group_id, approved) VALUES (%s, %s, '1')", secure($user_id, 'int'),  secure($auto_join['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update members counter +1 */
                $db->query(sprintf("UPDATE `groups` SET group_members = group_members + 1  WHERE group_id = %s", secure($auto_join['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            }
        }
    }

    public function checkUserAndGetData($userEmail)
    {
        global $db;
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        $query = $db->query(sprintf("SELECT * FROM users WHERE user_email = %s", secure($userEmail))) or _error("SQL_ERROR_THROWEN");
        $info = $query->fetch_assoc(); //echo "hhhh";print_r($info);
        return $info;
    }

    /**
     * sign_in
     * 
     * @param string $username_email
     * @param string $password
     * @param boolean $remember
     * 
     * @return void
     */
    public function sign_in($username_email, $password, $remember = false)
    {
        global $db, $system, $date;
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        $newsletter_agree = '0'; //(isset($args['newsletter_agree']))? '1' : '0';

        /* valid inputs */
        $username_email = trim($username_email);
        if (is_empty($username_email) || is_empty($password)) {
            throw new Exception(__("You must fill in all of the fields"));
        }
        /* check if username or email */
        if (valid_email($username_email)) {
            $user = $this->checkUserAndGetData($username_email);
            $field = "user_email";
        } else {
            throw new Exception(__("Please enter a valid email address or username"));
        }
        $loginApiResponse  =  $this->httpPostCurl('/users/whitelabel/login', array("email" => $username_email, "password" => $password));
        if (!isset($loginApiResponse['token'])) {
            throw new Exception(_($loginApiResponse['message']));
        }
        $userToken  = $loginApiResponse['token'];
        if (is_array($loginApiResponse) && count($loginApiResponse) > 0 && array_key_exists('email', $loginApiResponse) && array_key_exists('hash', $loginApiResponse) && is_array($user) && count($user) > 0) {
            $updateQuery = sprintf("UPDATE users SET  user_password = %s,knox_user_id=%s,globalToken =%s WHERE user_id = %s", secure($loginApiResponse['hash']), secure($loginApiResponse['userId']), secure($userToken), secure($user['user_id'], 'int'));
            $db->query($updateQuery) or _error("SQL_ERROR_THROWEN");
        } else {
            if (is_array($loginApiResponse) && count($loginApiResponse) > 0 && array_key_exists('message', $loginApiResponse) && array_key_exists('data', $loginApiResponse)) {
                if (is_array($user) && count($user)) {
                    $apiResponse  =  $this->httpPostCurl('/users/whitelabel/register', array("email" => $username_email, "password" => $password));
                    if (is_array($apiResponse) && array_key_exists('hash', $apiResponse)) {
                        $passwordhash = $apiResponse['hash'];
                        $knox_user_id = $apiResponse['userId'];

                        $db->query(sprintf("UPDATE users SET user_password = %s,user_id= %s ,globalToken =%s WHERE user_email = %s", secure($passwordhash), secure($knox_user_id), secure($userToken), secure($username_email))) or _error("SQL_ERROR_THROWEN");
                    } else {
                        throw new Exception("<p><strong>" . __(" Please re-enter your password") . "</strong></p><p>" . __("The password you entered is incorrect") . ". " . __("If you forgot your password?") . " <a href='" . $system['system_url'] . "/reset'>" . __("Request a new one") . "</a></p>");
                    }
                } else { //echo "13078";
                    //print_r($loginApiResponse);exit;
                    throw new Exception(_($loginApiResponse['message']));
                }
            } elseif (!is_array($user)) { //echo "13082";
                if (is_array($loginApiResponse) && array_key_exists('userId', $loginApiResponse)) {
                    $knox_user_id = $loginApiResponse['userId'];
                    $user_email_verified = 1;
                    $user_activated = 1;
                } else {
                    $knox_user_id = null;
                    $user_email_verified = 0;
                    $user_activated = 0;
                }
                $emailArray = explode("@", $username_email);
                $user_started = 1;
                //echo $emailArray[0];print_r($emailArray); exit;
                $insertQueryL = sprintf("INSERT INTO users (user_name, user_email,user_password, user_firstname, user_lastname,user_registered,user_privacy_newsletter,knox_user_id,user_email_verified,user_activated,user_started) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s,%s)", secure($username_email), secure($username_email), secure($loginApiResponse['hash']), secure($emailArray[0]), secure(''), secure($date), secure($newsletter_agree), secure($knox_user_id), secure($user_email_verified), secure($user_activated), secure($user_started));

                $db->query($insertQueryL) or _error("SQL_ERROR_THROWEN");
                $user = $this->checkUserAndGetData($username_email);

                $username = $emailArray[0] . $user['user_id'];
                $db->query(sprintf("UPDATE users SET  user_name = %s ,globalToken =%s WHERE user_email = %s", secure($username), secure($userToken), secure($username_email))) or _error("SQL_ERROR_THROWEN");
                //exit;
            } else {
                throw new Exception("<p><strong>" . __("Please re-enter your password") . "</strong></p><p>" . __("The password you entered is incorrect") . ". " . __("If you forgot your password?") . " <a href='" . $system['system_url'] . "/reset'>" . __("Request a new one") . "</a></p>");
            }
        }

        if ($user['user_two_factor_enabled']) {
            /* system two-factor disabled */
            if (!$system['two_factor_enabled']) {
                $this->disable_two_factor_authentication($user['user_id']);
                goto set_authentication_cookies;
            }
            /* system two-factor method != user two-factor method */
            if ($system['two_factor_type'] != $user['user_two_factor_type']) {
                $this->disable_two_factor_authentication($user['user_id']);
                goto set_authentication_cookies;
            }
            switch ($system['two_factor_type']) {
                case 'email':
                    /* system two-factor method = email but user email not verified */
                    if (!$user['user_email_verified']) {
                        $this->disable_two_factor_authentication($user['user_id']);
                        goto set_authentication_cookies;
                    }
                    /* generate two-factor key */
                    $two_factor_key = get_hash_key(6);
                    /* update user two factor key */
                    $db->query(sprintf("UPDATE users SET user_two_factor_key = %s WHERE user_id = %s", secure($two_factor_key), secure($user['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    /* prepare method name */
                    $method = __("Email");
                    /* prepare activation email */
                    $subject = $system['system_title'] . " " . __("Two-Factor Authentication Token");
                    $body  = __("Hi") . " " . ucwords($user['first_name'] . " " . $user['last_name']) . ",";
                    $body .= "\r\n\r\n" . __("To complete the sign-in process, please use the following 6-digit key:");
                    $body .= "\r\n\r\n" . __("Two-factor authentication key") . ": " . $two_factor_key;
                    $body .= "\r\n\r" . $system['system_title'] . " " . __("Team");
                    /* send email */
                    if (!_email($user['user_email'], $subject, $body)) {
                        throw new Exception(__("Two-factor authentication email could not be sent"));
                    }
                    break;

                case 'sms':
                    /* system two-factor method = sms but not user phone not verified */
                    if (!$user['user_phone_verified']) {
                        $this->disable_two_factor_authentication($user['user_id']);
                        goto set_authentication_cookies;
                    }
                    /* generate two-factor key */
                    $two_factor_key = get_hash_key(6);
                    /* update user two factor key */
                    $db->query(sprintf("UPDATE users SET user_two_factor_key = %s WHERE user_id = %s", secure($two_factor_key), secure($user['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    /* prepare method name */
                    $method = __("Phone");
                    /* prepare activation SMS */
                    $message  = $system['system_title'] . " " . __("Two-factor authentication key") . ": " . $two_factor_key;
                    /* send SMS */
                    if (!sms_send($user['user_phone'], $message)) {
                        throw new Exception(__("Two-factor authentication SMS could not be sent"));
                    }
                    break;

                case 'google':
                    /* prepare method name */
                    $method = __("Google Authenticator app");
                    break;
            }
            modal("#two-factor-authentication", "{user_id: '" . $user['user_id'] . "', remember: '" . $remember . "', method: '" . $method . "'}");
        }
        /* set authentication cookies */
        set_authentication_cookies:
        $this->_set_authentication_cookies($user['user_id'], $remember);
    }

    /**
     * sign_up
     * 
     * @param array $args
     * @return void
     */
    public function sign_up($args = [])
    {
        global $db, $system, $date;
        /* check invitation code */
        if (!$system['registration_enabled'] && $system['invitation_enabled']) {
            if (!$this->check_invitation_code($args['invitation_code'])) {
                throw new Exception(__("The invitation code you entered is invalid or expired"));
            }
        }
        /* check IP */
        $this->_check_ip();
        if (is_empty($args['first_name']) || is_empty($args['last_name']) || is_empty($args['username']) || is_empty($args['password'])) {
            throw new Exception(__("You must fill in all of the fields"));
        }
        if (!valid_username($args['username'])) {
            throw new Exception(__("Please enter a valid username (a-z0-9_.) with minimum 3 characters long"));
        }
        if (reserved_username($args['username'])) {
            throw new Exception(__("You can't use") . " <strong>" . $args['username'] . "</strong> " . __("as username"));
        }
        if ($this->check_username($args['username'])) {
            throw new Exception(__("Sorry, it looks like") . " <strong>" . $args['username'] . "</strong> " . __("belongs to an existing account"));
        }
        if (!valid_email($args['email'])) {
            throw new Exception(__("Please enter a valid email address"));
        }

        if ($system['activation_enabled'] && $system['activation_type'] == "sms") {
            if (is_empty($args['phone'])) {
                throw new Exception(__("Please enter a valid phone number"));
            }
            if ($this->check_phone($args['phone'])) {
                throw new Exception(__("Sorry, it looks like") . " <strong>" . $args['phone'] . "</strong> " . __("belongs to an existing account"));
            }
        } else {
            $args['phone'] = 'null';
        }
        if (strlen($args['password']) < 6) {
            throw new Exception(__("Your password must be at least 6 characters long. Please try another"));
        }
        if (!valid_name($args['first_name'])) {
            throw new Exception(__("Your first name contains invalid characters"));
        }
        if (!valid_name_no_numbers($args['first_name'])) {
            throw new Exception(__("Your first name contains invalid numbers"));
        }
        if (strlen($args['first_name']) < 3) {
            throw new Exception(__("Your first name must be at least 3 characters long. Please try another"));
        }
        if (!valid_name($args['last_name'])) {
            throw new Exception(__("Your last name contains invalid characters"));
        }
        if (strlen($args['last_name']) < 3) {
            throw new Exception(__("Your last name must be at least 3 characters long. Please try another"));
        }
        if (!valid_name_no_numbers($args['last_name'])) {
            throw new Exception(__("Your last name contains invalid numbers"));
        }
        // if (!in_array($args['gender'], array('male', 'female', 'other'))) {
        //     throw new Exception(__("Please select a valid gender"));
        // }
        /* check age restriction */
        if ($system['age_restriction']) {
            if (!in_array($args['birth_month'], range(1, 12))) {
                throw new Exception(__("Please select a valid birth month"));
            }
            if (!in_array($args['birth_day'], range(1, 31))) {
                throw new Exception(__("Please select a valid birth day"));
            }
            if (!in_array($args['birth_year'], range(1905, 2017))) {
                throw new Exception(__("Please select a valid birth year"));
            }
            if (date("Y") - $args['birth_year'] < $system['minimum_age']) {
                throw new Exception(__("Sorry, You must be") . " <strong>" . $system['minimum_age'] . "</strong> " . __("years old to register"));
            }
            $args['birth_date'] = $args['birth_year'] . '-' . $args['birth_month'] . '-' . $args['birth_day'];
        } else {
            $args['birth_date'] = 'null';
        }
        /* set custom fields */
        $custom_fields = $this->set_custom_fields($args);
        /* check reCAPTCHA */
        if ($system['reCAPTCHA_enabled']) {
            require_once(ABSPATH . 'includes/libs/ReCaptcha/autoload.php');
            $recaptcha = new \ReCaptcha\ReCaptcha($system['reCAPTCHA_secret_key']);
            $resp = $recaptcha->verify($args['g-recaptcha-response'], get_user_ip());
            if (!$resp->isSuccess()) {
                throw new Exception(__("The security check is incorrect. Please try again"));
            }
        }
        /* check newsletter agreement */
        $newsletter_agree = (isset($args['newsletter_agree'])) ? '1' : '0';
        /* check privacy agreement */
        if (!isset($args['privacy_agree'])) {
            throw new Exception(__("You must read and agree to our terms and privacy policy"));
        }

        $apiResponse  =  $this->httpPostCurl('/users/whitelabel/register', array("email" => $args['email'], "password" => $args['password']));
        // print_r($apiResponse); exit;
        $checkEmailExists  = $this->check_email($args['email']);
        if (array_key_exists('data', $apiResponse) && ($apiResponse['data'] == 1) && $checkEmailExists) {
            throw new Exception(__("Sorry, it looks like") . " <strong>" . $args['email'] . "</strong> " . __("belongs to an existing account"));
        } elseif (array_key_exists('userId', $apiResponse) && $checkEmailExists) {
            throw new Exception(__("Sorry, it looks like") . " <strong>" . $args['email'] . "</strong> " . __("belongs to an existing account"));
        } elseif (array_key_exists('data', $apiResponse) && array_key_exists('message', $apiResponse) && ($apiResponse['message'] == 'Email already exist in our system.')) {

            $apiResponseNew  =  $this->httpGetCurl('/users/whitelabel/get-user-info/' . $args['email']);
            $apiResponse = $apiResponseNew;
        }
        //echo "here"; print_r($apiResponse); exit;
        if ($checkEmailExists) {
            throw new Exception(__("Sorry, it looks like") . " <strong>" . $args['email'] . "</strong> " . __("belongs to an existing account"));
        }

        if (array_key_exists('userId', $apiResponse)) {
            $knox_user_id = $apiResponse['userId'];
            $user_email_verified = 1;
            $user_activated = 1;
        } else {
            $knox_user_id = null;
            $user_email_verified = 0;
            $user_activated = 0;
        }

        //echo "here"; print_r($apiResponse); exit;

        /* generate verification code */
        $email_verification_code = ($system['activation_enabled'] && $system['activation_type'] == "email") ? get_hash_token() : 'null';
        $phone_verification_code = ($system['activation_enabled'] && $system['activation_type'] == "sms") ? get_hash_key(6, true) : 'null';
        /* register user */
        $userToken  = $apiResponse['token'];
        $user_started = 1;
        if ($knox_user_id != "") {
            $sqlQuery = sprintf("INSERT INTO users (user_name, user_email, user_phone, user_password, user_firstname, user_lastname, user_gender, user_birthdate, user_registered, user_email_verification_code, user_phone_verification_code, user_privacy_newsletter,knox_user_id,user_email_verified,user_activated,globalToken,user_started,global_user_album_pictures) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,%s,%s)", secure($args['username']), secure($args['email']), secure($args['phone']), secure(_password_hash($args['password'])), secure(ucwords($args['first_name'])), secure(ucwords($args['last_name'])), secure($args['gender']), secure($args['birth_date']), secure($date), secure($email_verification_code), secure($phone_verification_code), secure($newsletter_agree), secure($knox_user_id), secure($user_email_verified), secure($user_activated), secure($userToken), secure($user_started), '0');
            $db->query($sqlQuery) or _error("SQL_ERROR_THROWEN");
            /* get user_id */
            $user_id    = $db->insert_id;
        } else {
            throw new Exception(__("Something Went Wrong!! Please try again"));
        }
        //$userToken  = $this->generateUserToken(array("userId"=>$user_id),10);

        /* insert custom fields values */
        if ($custom_fields) {
            foreach ($custom_fields as $field_id => $value) {
                $db->query(sprintf("INSERT INTO custom_fields_values (value, field_id, node_id, node_type) VALUES (%s, %s, %s, 'user')", secure($value), secure($field_id, 'int'), secure($user_id, 'int')));
            }
        }
        /* send activation */
        if ($system['activation_enabled']) {
            if ($system['activation_type'] == "email") {
                /* prepare activation email */
                $subject = __("Just one more step to get started on") . " " . $system['system_title'];
                $body = get_email_template("activation_email", $subject, ["first_name" => $args['first_name'], "last_name" => $args['last_name'], "email_verification_code" => $email_verification_code]);
                /* send email */
                if (!_email($args['email'], $subject, $body['html'], $body['plain'])) {
                    throw new Exception(__("Activation email could not be sent") . ", " . __("But you can login now"));
                }
            } else {
                /* prepare activation SMS */
                $message  = $system['system_title'] . " " . __("Activation Code") . ": " . $phone_verification_code;
                /* send SMS */
                if (!sms_send($args['phone'], $message)) {
                    throw new Exception(__("Activation SMS could not be sent") . ", " . __("But you can login now"));
                }
            }
        } else {
            /* affiliates system (as activation disabled) */
            $this->process_affiliates("registration", $user_id);
        }
        /* update invitation code */
        if (!$system['registration_enabled'] && $system['invitation_enabled']) {
            $this->update_invitation_code($args['invitation_code']);
        }
        /* auto connect */
        $this->auto_friend($user_id);
        $this->auto_follow($user_id);
        $this->auto_like($user_id);
        $this->auto_join($user_id);
        /* set authentication cookies */
        $this->_set_authentication_cookies($user_id);
    }

    /**
     * update_invitation_code
     * 
     * @param string $code
     * @return void
     */
    public function update_invitation_code($code)
    {
        global $db;
        $db->query(sprintf("UPDATE invitation_codes SET valid = '0' WHERE code = %s", secure($code))) or _error("SQL_ERROR_THROWEN");
    }

    /**
     * affiliates_balance
     * 
     * @param string $type
     * @param integer $referee_id
     * @param integer $referrer_id
     * @param integer $package_price
     * @return void
     */
    private function process_affiliates($type, $referee_id, $referrer_id = null, $package_price = null)
    {
        global $db, $system;
        if (!$system['affiliates_enabled'] || $system['affiliate_type'] != $type || !isset($_COOKIE[$this->_cookie_user_referrer])) {
            return;
        }
        $get_referrer = $db->query(sprintf("SELECT user_id FROM users WHERE user_name = %s", secure($_COOKIE[$this->_cookie_user_referrer]))) or _error("SQL_ERROR_THROWEN");
        if ($get_referrer->num_rows == 0) {
            return;
        }
        $referrer = $get_referrer->fetch_assoc();
        /* secure affiliates system */
        /* [1] $referrer['user_id'] == $referee_id (prevent new user to refer himself be set cookie manually) */
        /* [2] $referrer['user_id'] == $referrer_id (prevent already referred user to earn money every time user activate his email/phone or buy new package) */
        if ($referrer['user_id'] == $referee_id || $referrer['user_id'] == $referrer_id) {
            return;
        }
        /* set balance */
        if ($system['affiliate_payment_type'] == "percentage" && $system['affiliate_type'] == "packages") {
            $balance = ($package_price * $system['affiliates_percentage']) / 100;
        } else {
            $balance = $system['affiliates_per_user'];
        }
        /* update referrer */
        $db->query(sprintf("UPDATE users SET user_affiliate_balance = user_affiliate_balance + %s WHERE user_id = %s", secure($balance), secure($referrer['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        /* update referee */
        $db->query(sprintf("UPDATE users SET user_referrer_id = %s WHERE user_id = %s", secure($referrer['user_id'], 'int'), secure($referee_id, 'int'))) or _error("SQL_ERROR_THROWEN");
    }

    /* ------------------------------- */
    /* Password */
    /* ------------------------------- */

    /**
     * forget_password
     * 
     * @param string $email
     * @param string $recaptcha_response
     * @return void
     */
    public function forget_password($email, $recaptcha_response)
    {
        global $db, $system, $date;
        if (!valid_email($email)) {
            throw new Exception(__("Please enter a valid email address"));
        }
        if (!$this->check_email($email)) {
            throw new Exception(__("Sorry, it looks like") . " " . $email . " " . __("doesn't belong to any account"));
        }
        $getUserData = $this->checkUserAndGetData($email);
        $knox_user_id = 0;
        if (is_array($getUserData) == 1 && array_key_exists('knox_user_id', $getUserData) && isset($getUserData['knox_user_id'])) {
            //echo  $getUserData['knox_user_id'];
            $knox_user_id = $getUserData['knox_user_id'];
        } else if (!is_array($getUserData) == 1) {
            $userInfoApiResponse = $this->httpGetCurl('/users/whitelabel/get-user-info/' . $email);
            //print_r($knox_user_id); exit;
            if (is_array($userInfoApiResponse) == 1 && array_key_exists('data', $userInfoApiResponse) && (is_empty($userInfoApiResponse['data']) || $userInfoApiResponse['data'] == 0)) {
                throw new Exception(__("Sorry, it looks like") . " " . $email . " " . __("doesn't belong to any account"));
            } else {
                //echo "date".$date;
                $hash = $userInfoApiResponse['hash'];
                $knox_user_id = $userInfoApiResponse['userId']; // || 'sss';
                $user_email_verified = 1;
                $user_activated = 1;
                //print_r($userInfoApiResponse);
                $db->query(sprintf("INSERT INTO users (user_name,user_email,user_password, user_firstname,user_lastname,user_gender,user_registered,knox_user_id,user_email_verified,user_activated) VALUES (%s,%s,%s,%s, %s,%s,%s,%s,%s,%s)", secure($email), secure($email), secure($hash), secure(''), secure(''), secure('other'), secure($date), secure($knox_user_id), $user_email_verified, $user_activated)) or _error("SQL_ERROR_THROWEN");
                $getUserData = $this->checkUserAndGetData($email);
                $emailArray = explode("@", $email);
                $userName = $emailArray[0] . $getUserData['user_id'];
                $db->query(sprintf("UPDATE users SET user_name =%s WHERE user_email = %s", secure($userName), secure($email))) or _error("SQL_ERROR_THROWEN");
            }
        }
        /* check reCAPTCHA */
        if ($system['reCAPTCHA_enabled']) {
            require_once(ABSPATH . 'includes/libs/ReCaptcha/autoload.php');
            $recaptcha = new \ReCaptcha\ReCaptcha($system['reCAPTCHA_secret_key']);
            $resp = $recaptcha->verify($recaptcha_response, get_user_ip());
            if (!$resp->isSuccess()) {
                throw new Exception(__("The security check is incorrect. Please try again"));
            }
        }
        if ($knox_user_id == "" || $knox_user_id == "0") {
            $apiResponseNew  =  $this->httpGetCurl('/users/whitelabel/get-user-info/' . $email);
            if (array_key_exists('userId', $apiResponseNew)) {
                $knox_user_id = $apiResponseNew['userId'];
            } else {
                throw new Exception(__("Please Contact Administrator. Something went wrong with your Email"));
            }
        }
        /* generate reset key */
        $reset_key = get_hash_key(6);
        /* update user */
        $db->query(sprintf("UPDATE users SET user_reset_key = %s, user_reseted = '1', knox_user_id = %s WHERE user_email = %s", secure($reset_key), secure($knox_user_id), secure($email))) or _error("SQL_ERROR_THROWEN");
        /* send reset email */
        /* prepare reset email */
        $subject = __("Forget password activation key!");
        $body = get_email_template("forget_password_email", $subject, ["email" => $email, "reset_key" => $reset_key]);
        /* send email */
        if (!_email($email, $subject, $body['html'], $body['plain'])) {
            throw new Exception(__("Activation key email could not be sent!"));
        }
    }


    /**
     * forget_password_confirm
     * 
     * @param string $email
     * @param string $reset_key
     * @return void
     */
    public function forget_password_confirm($email, $reset_key)
    {
        global $db;
        if (!valid_email($email)) {
            throw new Exception(__("Invalid email, please try again"));
        }
        /* check reset key */
        $check_key = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_email = %s AND user_reset_key = %s AND user_reseted = '1'", secure($email), secure($reset_key))) or _error("SQL_ERROR_THROWEN");
        if ($check_key->fetch_assoc()['count'] == 0) {
            throw new Exception(__("Invalid code, please try again"));
        }
    }


    /**
     * forget_password_reset
     * 
     * @param string $email
     * @param string $reset_key
     * @param string $password
     * @param string $confirm
     * @return void
     */
    public function forget_password_reset($email, $reset_key, $password, $confirm)
    {
        global $db;
        if (!valid_email($email)) {
            throw new Exception(__("Invalid email, please try again"));
        }
        /* check reset key */
        $check_key = $db->query(sprintf("SELECT * FROM users WHERE user_email = %s AND user_reset_key = %s AND user_reseted = '1'", secure($email), secure($reset_key))) or _error("SQL_ERROR_THROWEN");
        $check_key =  $check_key->fetch_assoc();
        //print_r($check_key); 
        if (!is_array($check_key) == 1 && count($check_key) == 0) {
            throw new Exception(__("Invalid code, please try again"));
        }
        $knox_user_id = $check_key['knox_user_id'];
        /* check password length */
        if (strlen($password) < 6) {
            throw new Exception(__("Your password must be at least 6 characters long. Please try another"));
        }
        /* check password confirm */
        if ($password !== $confirm) {
            throw new Exception(__("Your passwords do not match. Please try another"));
        }
        $apiResponse  =  $this->httpPostCurl('/users/whitelabel/update-password', array("password" => $password, "userId" => $knox_user_id));
        if (is_array($apiResponse) && array_key_exists('hash', $apiResponse)) {
            $hash = $apiResponse['hash'];
            $db->query(sprintf("UPDATE users SET user_password = %s, user_reseted = '0' WHERE user_email = %s", secure($hash), secure($email))) or _error("SQL_ERROR_THROWEN");
        } else {
            throw new Exception(__("Something Went Wrong!!"));
        }
        /* update user password */
        //$db->query(sprintf("UPDATE users SET user_password = %s, user_reseted = '0' WHERE user_email = %s", secure(_password_hash($password)), secure($email) )) or _error("SQL_ERROR_THROWEN");

    }

    public function settings($edit, $args)
    {
        global $db, $system;
        switch ($edit) {
            case 'account':
                /* validate email */
                if ($args['email'] != $this->_data['user_email']) {
                    $this->activation_email_reset($args['email']);
                }
                /* validate phone */
                if (isset($args['phone']) && $args['phone'] != $this->_data['user_phone']) {
                    $this->activation_phone_reset($args['phone']);
                }
                /* validate username */
                if (strtolower($args['username']) != strtolower($this->_data['user_name'])) {
                    if (!valid_username($args['username'])) {
                        throw new Exception(__("Please enter a valid username (a-z0-9_.) with minimum 3 characters long"));
                    }
                    if (reserved_username($args['username'])) {
                        throw new Exception(__("You can't use") . " <strong>" . $args['username'] . "</strong> " . __("as username"));
                    }
                    if ($this->check_username($args['username'])) {
                        throw new Exception(__("Sorry, it looks like") . " <strong>" . $args['username'] . "</strong> " . __("belongs to an existing account"));
                    }
                    /* update user */
                    $db->query(sprintf("UPDATE users SET user_name = %s WHERE user_id = %s", secure($args['username']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                break;

            case 'basic':
                /* validate firstname */
                if (is_empty($args['firstname'])) {
                    throw new Exception(__("You must enter first name"));
                }
                if (!valid_name($args['firstname'])) {
                    throw new Exception(__("First name contains invalid characters"));
                }
                if (strlen($args['firstname']) < 3) {
                    throw new Exception(__("First name must be at least 3 characters long. Please try another"));
                }
                /* validate lastname */
                if (is_empty($args['lastname'])) {
                    throw new Exception(__("You must enter last name"));
                }
                if (!valid_name($args['lastname'])) {
                    throw new Exception(__("Last name contains invalid characters"));
                }
                if (strlen($args['lastname']) < 3) {
                    throw new Exception(__("Last name must be at least 3 characters long. Please try another"));
                }
                /* validate gender */
                if (!in_array($args['gender'], array('male', 'female', 'other'))) {
                    throw new Exception(__("Please select a valid gender"));
                }
                /* validate country */
                if ($args['country'] == "none") {
                    throw new Exception(__("You must select valid country"));
                } else {
                    $check_country = $db->query(sprintf("SELECT COUNT(*) as count FROM system_countries WHERE country_id = %s", secure($args['country'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($check_country->fetch_assoc()['count'] == 0) {
                        throw new Exception(__("You must select valid country"));
                    }
                }
                /* validate birthdate */
                if ($args['birth_month'] == "none" && $args['birth_day'] == "none" && $args['birth_year'] == "none") {
                    $args['birth_date'] = 'null';
                } else {
                    if (!in_array($args['birth_month'], range(1, 12))) {
                        throw new Exception(__("Please select a valid birth month"));
                    }
                    if (!in_array($args['birth_day'], range(1, 31))) {
                        throw new Exception(__("Please select a valid birth day"));
                    }
                    if (!in_array($args['birth_year'], range(1905, 2015))) {
                        throw new Exception(__("Please select a valid birth year"));
                    }
                    $args['birth_date'] = $args['birth_year'] . '-' . $args['birth_month'] . '-' . $args['birth_day'];
                }
                /* validate relationship */
                if ($args['relationship'] == "none") {
                    $args['relationship'] = 'null';
                } else {
                    $relationships = array('single', 'relationship', 'married', "complicated", 'separated', 'divorced', 'widowed');
                    if (!in_array($args['relationship'], $relationships)) {
                        throw new Exception(__("Please select a valid relationship"));
                    }
                }
                /* validate website */
                if (!is_empty($args['website'])) {
                    if (!valid_url($args['website'])) {
                        throw new Exception(__("Please enter a valid website"));
                    }
                } else {
                    $args['website'] = 'null';
                }
                /* set custom fields */
                $this->set_custom_fields($args, "user", "settings", $this->_data['user_id']);
                /* update user */
                $db->query(sprintf("UPDATE users SET user_firstname = %s, user_lastname = %s, user_gender = %s, user_country = %s, user_birthdate = %s, user_relationship = %s, user_biography = %s, user_website = %s WHERE user_id = %s", secure($args['firstname']), secure($args['lastname']), secure($args['gender']), secure($args['country'], 'int'), secure($args['birth_date']), secure($args['relationship']), secure($args['biography']), secure($args['website']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'work':
                /* validate work website */
                if (!is_empty($args['work_url'])) {
                    if (!valid_url($args['work_url'])) {
                        throw new Exception(__("Please enter a valid work website"));
                    }
                } else {
                    $args['work_url'] = 'null';
                }
                /* set custom fields */
                $this->set_custom_fields($args, "user", "settings", $this->_data['user_id']);
                /* update user */
                $db->query(sprintf("UPDATE users SET user_work_title = %s, user_work_place = %s, user_work_url = %s WHERE user_id = %s", secure($args['work_title']), secure($args['work_place']), secure($args['work_url']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'location':
                /* set custom fields */
                $this->set_custom_fields($args, "user", "settings", $this->_data['user_id']);
                /* update user */
                $db->query(sprintf("UPDATE users SET user_current_city = %s, user_hometown = %s WHERE user_id = %s", secure($args['city']), secure($args['hometown']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'education':
                /* set custom fields */
                $this->set_custom_fields($args, "user", "settings", $this->_data['user_id']);
                /* update user */
                $db->query(sprintf("UPDATE users SET user_edu_major = %s, user_edu_school = %s, user_edu_class = %s WHERE user_id = %s", secure($args['edu_major']), secure($args['edu_school']), secure($args['edu_class']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'other':
                /* set custom fields */
                $this->set_custom_fields($args, "user", "settings", $this->_data['user_id']);
                break;

            case 'social':
                /* validate facebook */
                if (!is_empty($args['facebook']) && !valid_url($args['facebook'])) {
                    throw new Exception(__("Please enter a valid Facebook Profile URL"));
                }
                /* validate twitter */
                if (!is_empty($args['twitter']) && !valid_url($args['twitter'])) {
                    throw new Exception(__("Please enter a valid Twitter Profile URL"));
                }
                /* validate youtube */
                if (!is_empty($args['youtube']) && !valid_url($args['youtube'])) {
                    throw new Exception(__("Please enter a valid YouTube Profile URL"));
                }
                /* validate instagram */
                if (!is_empty($args['instagram']) && !valid_url($args['instagram'])) {
                    throw new Exception(__("Please enter a valid Instagram Profile URL"));
                }
                /* validate linkedin */
                if (!is_empty($args['linkedin']) && !valid_url($args['linkedin'])) {
                    throw new Exception(__("Please enter a valid Linkedin Profile URL"));
                }
                /* validate vkontakte */
                if (!is_empty($args['vkontakte']) && !valid_url($args['vkontakte'])) {
                    throw new Exception(__("Please enter a valid Vkontakte Profile URL"));
                }
                /* update user */
                $db->query(sprintf("UPDATE users SET user_social_facebook = %s, user_social_twitter = %s, user_social_youtube = %s, user_social_instagram = %s, user_social_linkedin = %s, user_social_vkontakte = %s WHERE user_id = %s", secure($args['facebook']), secure($args['twitter']), secure($args['youtube']), secure($args['instagram']), secure($args['linkedin']), secure($args['vkontakte']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'design':
                /* check if profile background enabled */
                if (!$system['system_profile_background_enabled']) {
                    throw new Exception(__("This feature has been disabled by the admin"));
                }
                /* update user */
                $db->query(sprintf("UPDATE users SET user_profile_background = %s WHERE user_id = %s", secure($args['user_profile_background']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'password_old':
                /* validate all fields */
                if (is_empty($args['current']) || is_empty($args['new']) || is_empty($args['confirm'])) {
                    throw new Exception(__("You must fill in all of the fields"));
                }
                /* validate current password (MD5 check for versions < v2.5) */
                if (md5($args['current']) != $this->_data['user_password'] && !password_verify($args['current'], $this->_data['user_password'])) {
                    throw new Exception(__("Your current password is incorrect"));
                }
                /* validate new password */
                if ($args['new'] != $args['confirm']) {
                    throw new Exception(__("Your passwords do not match"));
                }
                if (strlen($args['new']) < 6) {
                    throw new Exception(__("Password must be at least 6 characters long. Please try another"));
                }
                /* update user */
                $db->query(sprintf("UPDATE users SET user_password = %s WHERE user_id = %s", secure(_password_hash($args['new'])), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'password':
                /* validate all fields */
                if (is_empty($args['current']) || is_empty($args['new']) || is_empty($args['confirm'])) {
                    throw new Exception(__("You must fill in all of the fields"));
                }

                if (strlen($args['new']) < 6) {
                    throw new Exception(__("Password must be at least 6 characters long. Please try another"));
                }

                if (array_key_exists('knox_user_id', $this->_data)) {
                    $knox_user_id = $this->_data['knox_user_id'];
                }

                $changePasswordApiResponse  =  $this->httpPostCurl('/users/whitelabel/change-password', array("oldPassword" => $_POST['current'], "newPassword" => $_POST['new'], "userId" => $knox_user_id));

                if (array_key_exists('message', $changePasswordApiResponse)) {
                    if ($changePasswordApiResponse['message'] == 'You entered a wrong password') {
                        throw new Exception(__("Your current password is incorrect"));
                    } else if (array_key_exists('hash', $changePasswordApiResponse) && $changePasswordApiResponse['message'] == 'Password has been reset.') {
                        $passwordhash = $changePasswordApiResponse['hash'];
                        $db->query(sprintf("UPDATE users SET user_password = %s WHERE user_id = %s", secure($passwordhash), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    } else {
                        throw new Exception(__("Your current password is incorrect"));
                    }
                } else {
                    throw new Exception(__("Your current password is incorrect"));
                }

                break;

            case 'two-factor':
                if ($system['two_factor_type'] != $args['type']) {
                    _error(400);
                }
                /* prepare */
                $args['two_factor_enabled'] = (isset($args['two_factor_enabled'])) ? '1' : '0';
                switch ($system['two_factor_type']) {
                    case 'email':
                        if ($args['two_factor_enabled'] && !$this->_data['user_email_verified']) {
                            throw new Exception(__("Two-Factor Authentication can't be enabled till you verify your email address"));
                        }
                        break;

                    case 'sms':
                        if ($args['two_factor_enabled'] && !$this->_data['user_phone']) {
                            throw new Exception(__("Two-Factor Authentication can't be enabled till you enter your phone number"));
                        }
                        if ($args['two_factor_enabled'] && !$this->_data['user_phone_verified']) {
                            throw new Exception(__("Two-Factor Authentication can't be enabled till you verify your phone number"));
                        }
                        break;

                    case 'google':
                        if (isset($args['gcode'])) {
                            /* Google Authenticator */
                            require_once(ABSPATH . 'includes/libs/GoogleAuthenticator/GoogleAuthenticator.php');
                            $ga = new PHPGangsta_GoogleAuthenticator();
                            /* verify code */
                            if (!$ga->verifyCode($this->_data['user_two_factor_gsecret'], $args['gcode'])) {
                                throw new Exception(__("Invalid code, Try again or try to scan your QR code again"));
                            }
                            $args['two_factor_enabled'] = '1';
                        }
                        break;
                }
                /* update user */
                $db->query(sprintf("UPDATE users SET user_two_factor_enabled = %s, user_two_factor_type = %s WHERE user_id = %s", secure($args['two_factor_enabled']), secure($system['two_factor_type']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'privacy':
                /* prepare */
                $args['privacy_chat'] = (isset($args['privacy_chat'])) ? '1' : '0';
                $args['privacy_newsletter'] = (isset($args['privacy_newsletter'])) ? '1' : '0';
                $privacy = array('me', 'friends', 'public');
                if (!in_array($args['privacy_wall'], $privacy) || !in_array($args['privacy_birthdate'], $privacy) || !in_array($args['privacy_relationship'], $privacy) || !in_array($args['privacy_basic'], $privacy) || !in_array($args['privacy_work'], $privacy) || !in_array($args['privacy_location'], $privacy) || !in_array($args['privacy_education'], $privacy) || !in_array($args['privacy_other'], $privacy) || !in_array($args['privacy_friends'], $privacy) || !in_array($args['privacy_photos'], $privacy) || !in_array($args['privacy_pages'], $privacy) || !in_array($args['privacy_groups'], $privacy) || !in_array($args['privacy_events'], $privacy)) {
                    _error(400);
                }
                if ($system['pokes_enabled']) {
                    if (!in_array($args['privacy_poke'], $privacy)) {
                        _error(400);
                    }
                    $poke_statement = sprintf("user_privacy_poke = %s, ", secure($args['privacy_poke']));
                }
                if ($system['gifts_enabled']) {
                    if (!in_array($args['privacy_gifts'], $privacy)) {
                        _error(400);
                    }
                    $gifts_statement = sprintf("user_privacy_gifts = %s, ", secure($args['privacy_gifts']));
                }
                /* update user */
                $db->query(sprintf("UPDATE users SET user_chat_enabled = %s, user_privacy_newsletter = %s, " . $poke_statement . $gifts_statement . " user_privacy_wall = %s, user_privacy_birthdate = %s, user_privacy_relationship = %s, user_privacy_basic = %s, user_privacy_work = %s, user_privacy_location = %s, user_privacy_education = %s, user_privacy_other = %s, user_privacy_friends = %s, user_privacy_photos = %s, user_privacy_pages = %s, user_privacy_groups = %s, user_privacy_events = %s WHERE user_id = %s", secure($args['privacy_chat']), secure($args['privacy_newsletter']), secure($args['privacy_wall']), secure($args['privacy_birthdate']), secure($args['privacy_relationship']), secure($args['privacy_basic']), secure($args['privacy_work']), secure($args['privacy_location']), secure($args['privacy_education']), secure($args['privacy_other']), secure($args['privacy_friends']), secure($args['privacy_photos']), secure($args['privacy_pages']), secure($args['privacy_groups']), secure($args['privacy_events']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'notifications':
                /* prepare */
                $args['chat_sound'] = (isset($args['chat_sound'])) ? '1' : '0';
                $args['notifications_sound'] = (isset($args['notifications_sound'])) ? '1' : '0';
                $args['email_post_likes'] = (isset($args['email_post_likes'])) ? '1' : '0';
                $args['email_post_comments'] = (isset($args['email_post_comments'])) ? '1' : '0';
                $args['email_post_shares'] = (isset($args['email_post_shares'])) ? '1' : '0';
                $args['email_wall_posts'] = (isset($args['email_wall_posts'])) ? '1' : '0';
                $args['email_mentions'] = (isset($args['email_mentions'])) ? '1' : '0';
                $args['email_profile_visits'] = (isset($args['email_profile_visits'])) ? '1' : '0';
                $args['email_friend_requests'] = (isset($args['email_friend_requests'])) ? '1' : '0';
                /* update user */
                $db->query(sprintf("UPDATE users SET chat_sound = %s, notifications_sound = %s, email_post_likes = %s, email_post_comments = %s, email_post_shares = %s, email_wall_posts = %s, email_mentions = %s, email_profile_visits = %s, email_friend_requests = %s WHERE user_id = %s", secure($args['chat_sound']), secure($args['notifications_sound']), secure($args['email_post_likes']), secure($args['email_post_comments']), secure($args['email_post_shares']), secure($args['email_wall_posts']), secure($args['email_mentions']), secure($args['email_profile_visits']), secure($args['email_friend_requests']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'notifications_sound':
                /* prepare */
                $args['notifications_sound'] = ($args['notifications_sound'] == 0) ? 0 : 1;
                /* update user */
                $db->query(sprintf("UPDATE users SET notifications_sound = %s WHERE user_id = %s", secure($args['notifications_sound']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'chat':
                /* prepare */
                $args['privacy_chat'] = ($args['privacy_chat'] == 0) ? 0 : 1;
                /* update user */
                $db->query(sprintf("UPDATE users SET user_chat_enabled = %s WHERE user_id = %s", secure($args['privacy_chat']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'started':
                /* validate country */
                if ($args['country'] == "none") {
                    throw new Exception(__("You must select valid country"));
                } else {
                    $check_country = $db->query(sprintf("SELECT COUNT(*) as count FROM system_countries WHERE country_id = %s", secure($args['country'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($check_country->fetch_assoc()['count'] == 0) {
                        throw new Exception(__("You must select valid country"));
                    }
                }
                /* validate work website */
                if (!is_empty($args['work_url'])) {
                    if (!valid_url($args['work_url'])) {
                        throw new Exception(__("Please enter a valid work website"));
                    }
                } else {
                    $args['work_url'] = 'null';
                }
                /* update user */
                $db->query(sprintf("UPDATE users SET user_country = %s, user_work_title = %s, user_work_place = %s, user_work_url = %s, user_current_city = %s, user_hometown = %s, user_edu_major = %s, user_edu_school = %s, user_edu_class = %s WHERE user_id = %s", secure($args['country'], 'int'), secure($args['work_title']), secure($args['work_place']), secure($args['work_url']), secure($args['city']), secure($args['hometown']), secure($args['edu_major']), secure($args['edu_school']), secure($args['edu_class']), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;
        }
    }

    /**
     * wallet_set_transaction
     * 
     * @param integer $user_id
     * @param string $node_type
     * @param integer $node_id
     * @param integer $amount
     * @param string $type
     * @return void
     */

    public function wallet_set_transaction($user_id, $node_type, $node_id, $amount, $type, $platformType = "sngine")
    {
        global $db, $system, $date;
        $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, node_type, node_id, amount, type, date,platformType) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($user_id, 'int'), secure($node_type), secure($node_id, 'int'), secure($amount), secure($type), secure($date), secure($platformType))) or _error("SQL_ERROR_THROWEN");
    }

    public function whitelableWallet($args = [])
    {
        global $db, $system, $date;
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


        /* check if ads enabled */
        if (is_empty($args['email']) || is_empty($args['amount']) || is_empty($args['transactionType']) || is_empty($args['userId']) || is_empty($args['hash']) || is_empty($args['name']) || is_empty($args['platformType'])) {
            throw new Exception(__("You must fill in all of the fields"));
        }

        if (!$system['ads_enabled']) {
            throw new Exception(__("This feature has been disabled by the admin"));
        }
        if (is_empty($args['amount']) || !is_numeric($args['amount']) || $args['amount'] <= 0) {
            throw new Exception(__("You must enter valid amount of money"));
        }

        //echo "here";
        if (valid_email($args['email'])) {
            $user = $this->checkUserAndGetData($args['email']);
            if (is_array($user) && count($user) > 0 && array_key_exists('knox_user_id', $user)) {
                $userExists = true;
            }
            if (!$userExists) {
                $knox_user_id = $args['userId'];
                $user_email_verified = 1;
                $user_activated = 1;
                $newsletter_agree = 0;


                $db->query(sprintf("INSERT INTO users (user_name, user_email,user_password, user_firstname, user_registered,user_privacy_newsletter,knox_user_id,user_email_verified,user_activated) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)", secure($args['email']), secure($args['email']), secure($args['hash']), secure($args['name']), secure($date), secure($newsletter_agree), secure($knox_user_id), secure($user_email_verified), secure($user_activated))) or _error("SQL_ERROR_THROWEN");
                $user = $this->checkUserAndGetData($args['email']);
            }
            if ($args['transactionType'] == 'addMoney') {
                $walletSetTransaction  = $this->wallet_set_transaction($user['user_id'], 'recharge', '0', $args['amount'], 'in', $args['platformType']);
                $db->query(sprintf("UPDATE users SET user_wallet_balance = user_wallet_balance + %s WHERE user_id = %s", secure($args['amount']), secure($user['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                echo json_encode(array('message' => 'success', 'data' => true));
            } else if ($args['transactionType'] == 'withdrawalMoney') {
                if ($user['user_wallet_balance'] < $args['amount']) {
                    throw new Exception(__("Your current wallet balance is") . " " . $system['system_currency_symbol'] . $user['user_wallet_balance'] . "," . __("Recharge your wallet to continue"));
                }
                $walletSetTransaction  = $this->wallet_set_transaction($user['user_id'], 'recharge', '0', $args['amount'], 'out', $args['platformType']);
                $db->query(sprintf('UPDATE users SET user_wallet_balance = IF(user_wallet_balance-%1$s<=0,0,user_wallet_balance-%1$s) WHERE user_id = %2$s', secure($args['amount']), secure($user['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                $user = $this->checkUserAndGetData($args['email']);
                echo json_encode(array('message' => 'success', 'data' => true, 'userWallet_balance' => $user['user_wallet_balance']));
            }
        } else {
            throw new Exception(__("Please enter a valid email address"));
        }
    }

    public function getWalletDataAndbalance($args = [])
    {
        global $db, $system, $date;
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $userExists = false;
        /* check if ads enabled */

        if (is_empty($args['email']) || is_empty($args['transactionType']) || is_empty($args['userId']) || is_empty($args['hash']) || is_empty($args['name']) || is_empty($args['skip']) || is_empty($args['limit'])) {
            throw new Exception(__("You must fill in all of the fields"));
        }

        if (!$system['ads_enabled']) {
            throw new Exception(__("This feature has been disabled by the admin"));
        }

        if (valid_email($args['email'])) {
            $user = $this->checkUserAndGetData($args['email']);
            if (is_array($user) && count($user) > 0 && array_key_exists('knox_user_id', $user)) {
                $userExists = true;
            }
            if (!$userExists) {
                $knox_user_id = $args['userId'];
                $user_email_verified = 1;
                $user_activated = 1;
                $newsletter_agree = 0;

                $db->query(sprintf("INSERT INTO users (user_name, user_email,user_password, user_firstname, user_registered,user_privacy_newsletter,knox_user_id,user_email_verified,user_activated) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)", secure($args['email']), secure($args['email']), secure($args['hash']), secure($args['name']), secure($date), secure($newsletter_agree), secure($knox_user_id), secure($user_email_verified), secure($user_activated))) or _error("SQL_ERROR_THROWEN");
                $user = $this->checkUserAndGetData($args['email']);
            }
            $transactions = [];
            if ($args['datalisting'] == 1) { //echo "hre";
                $getQ = sprintf("SELECT ads_users_wallet_transactions.*, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.user_picture FROM ads_users_wallet_transactions LEFT JOIN users ON ads_users_wallet_transactions.node_type='user' AND ads_users_wallet_transactions.node_id = users.user_id WHERE ads_users_wallet_transactions.user_id = %s ORDER BY ads_users_wallet_transactions.transaction_id DESC limit " . $args['skip'] . "," . $args['limit'], secure($user['user_id'], 'int'));
                $getQ1 = sprintf("SELECT count(transaction_id) as totalData FROM ads_users_wallet_transactions LEFT JOIN users ON ads_users_wallet_transactions.node_type='user' AND ads_users_wallet_transactions.node_id = users.user_id WHERE ads_users_wallet_transactions.user_id = %s ORDER BY ads_users_wallet_transactions.transaction_id DESC", secure($user['user_id'], 'int'));
                $countQ = $db->query($getQ1) or _error("SQL_ERROR_THROWEN");
                $countResult = $countQ->fetch_assoc();
                $get_transactions = $db->query($getQ) or _error("SQL_ERROR_THROWEN");
                if ($get_transactions->num_rows > 0) {
                    while ($transaction = $get_transactions->fetch_assoc()) {
                        // if($transaction['node_type'] == "user") {
                        //     $transaction['user_picture'] = get_picture($transaction['user_picture'], $transaction['user_gender']);
                        // }
                        $transactions[] = $transaction;
                    }
                }
            }
            $user_wallet_balance = $user['user_wallet_balance'];
            if ($args['datalisting'] == 1) {
                $finalResponse = array("data" => true, "message" => "success", "userWallet_balance" => $user_wallet_balance, "totalRecords" => $countResult['totalData'], "transactionlist" => $transactions);
            } else {
                $finalResponse = array("data" => true, "message" => "success", "userWallet_balance" => $user_wallet_balance, "totalRecords" => 0, "transactionlist" => []);
            }
            echo json_encode($finalResponse);
        } else {
            throw new Exception(__("There is some thing went wrong"));
        }
    }
    function globalLogin($paramsData = [])
    {
        global $db;
        $queryResult = $db->query(sprintf("SELECT * FROM users WHERE globalToken = %s", secure($paramsData['token']))) or _error("SQL_ERROR_THROWEN");
        $check_key = $queryResult->fetch_assoc();;
        if (is_array($check_key) && count($check_key) > 0) {
            //"user_id"=> $check_key['user_id'],
            echo json_encode(array("status" => 200, "message" => "success", "userId" => $check_key['knox_user_id'], "user_email" => $check_key['user_email'], "hash" => $check_key['user_password'], "token" => $check_key['globalToken']));
        } else {
            echo json_encode(array("status" => 400, "message" => "Token is invalid", "token" => $paramsData['token']));
        }
    }

    function generateUserToken($dataArray = [], $stringLength = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $stringLength; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        $randomString = $dataArray['userId'] . $randomString . time();
        return  $randomString;
    }

    function setpostParentId($parentId, $postIdArray)
    {
        global $db, $date;
        $postIdArray1  =  implode(',', $postIdArray);
        $query = "UPDATE global_posts SET parentId = " . $parentId . " WHERE post_id  in ( " . $postIdArray1 . ")";
        $db->query($query) or _error("SQL_ERROR_THROWEN");
        return true;
    }

    public function global_profile_get_child_post($post_id, $get_comments = true, $pass_privacy_check = false)
    {
        //  echo "".$post_id; exit;
        global $db, $system;
        $childPostArray = [];
        $postFinalQuery = sprintf("SELECT * FROM global_posts as posts  where parentId =" . $post_id . " order by post_id desc");
        
        $get_posts = $db->query($postFinalQuery) or _error("SQL_ERROR_THROWEN");
        if ($get_posts->num_rows > 0) {
            while ($childpost = $get_posts->fetch_assoc()) {
                $getpost = $this->global_profile_get_post($childpost['post_id'], true, true);

                if ($getpost) {
                    $childPostArray[] = $getpost;
                }
            }
        }
        return $childPostArray;
    }



    public function global_publisher($args = [])
    {
        global $db, $system, $date;

        /* check max posts/hour limit */
        if ($system['max_posts_hour'] > 0 && $this->_data['user_group'] >= 3) {
            $check_limit = $db->query(sprintf("SELECT COUNT(*) as count FROM global_posts as posts WHERE posts.time >= DATE_SUB(NOW(),INTERVAL 1 HOUR) AND user_id = %s AND user_type = 'user'", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check_limit->fetch_assoc()['count'] >= $system['max_posts_hour']) {
                modal("MESSAGE", __("Maximum Limit Reached"), __("You have reached the maximum limit of posts/hour, please try again later"));
            }
        }

        /* check post max length */
        if ($system['max_post_length'] > 0 && $this->_data['user_group'] >= 3) {
            if (strlen($args['message']) >= $system['max_post_length']) {
                modal("MESSAGE", __("Text Length Limit Reached"), __("Your message characters length is over the allowed limit") . " (" . $system['max_post_length'] . " " . __("Characters") . ")");
            }
        }

        /* default */
        $post = [];
        $post['user_id'] = $this->_data['user_id'];
        $post['user_type'] = "user";
        $post['in_wall'] = 0;
        $post['wall_id'] = null;
        $post['in_group'] = 0;
        $post['group_id'] = null;
        $post['group_approved'] = 0;
        $post['in_event'] = 0;
        $post['event_id'] = null;
        $post['event_approved'] = 0;

        $post['author_id'] = $this->_data['user_id'];
        /* -- get basic info from global_profile */
        $get_user1 = $db->query(sprintf("SELECT * FROM global_profile WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_user1->num_rows > 0) {
            $this->_data1 = $get_user1->fetch_assoc();
            // echo "<pre>";print_r($this->_data1); exit;

            $this->_data = array_replace($this->_data, $this->_data, $this->_data1);
        }
        /* -- get basic info from global_profile End */

        //  echo "<pre>";print_r($this->_data); exit;

        //$post['post_author_picture'] = $this->_data['global_user_picture'];
        $post['post_author_picture'] = get_picture($this->_data['global_user_picture'], $this->_data['user_gender']);
        //        $checkImage = image_exist($post['post_author_picture']);
        //        if ($checkImage != 200) {
        //            $post['post_author_picture'] = $system['system_uploads'] . '/' . $this->_data['user_picture_full'];
        //        }
        $post['post_author_url'] = $system['system_url'] . '/global-profile.php?username=' . $this->_data['user_name'];

        $post['post_author_picture'] = $system['system_url'] . '/includes/wallet-api/image-exist-api.php?userPicture=' . $post['post_author_picture'] . '&userPictureFull=' . $this->_data['user_picture_full'];

        $post['post_author_name'] = $this->_data['user_firstname'] . " " . $this->_data['user_lastname'];
        $post['post_author_user_name'] = $this->_data['user_name'];
        $post['post_author_verified'] = $this->_data['user_verified'];
        $post['post_author_online'] = false;

        /* check the handle */
        if ($args['handle'] == "user") {
            /* check if system allow wall posts */
            if (!$system['wall_posts_enabled']) {
                _error(400);
            }
            /* check if the user is valid & the viewer can post on his wall */
            $check_user = $db->query(sprintf("SELECT * FROM users WHERE user_id = %s", secure($args['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check_user->num_rows == 0) {
                _error(400);
            }
            $_user = $check_user->fetch_assoc();
            if ($_user['user_privacy_wall'] == 'me' || ($_user['user_privacy_wall'] == 'friends' && !in_array($args['id'], $this->_data['friends_ids']))) {
                _error(400);
            }
            $post['in_wall'] = 1;
            $post['wall_id'] = $args['id'];
            $post['wall_username'] = $_user['user_name'];
            $post['wall_fullname'] = $_user['user_firstname'] . " " . $_user['user_lastname'];
        } elseif ($args['handle'] == "page") {
            /* check if the page is valid */
            $check_page = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s", secure($args['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check_page->num_rows == 0) {
                _error(400);
            }
            $_page = $check_page->fetch_assoc();
            /* check if the viewer is the admin */
            if (!$this->check_page_adminship($this->_data['user_id'], $args['id'])) {
                _error(400);
            }

            $post['user_id'] = $_page['page_id'];
            $post['user_type'] = "page";
            $post['post_author_picture'] = get_picture($_page['page_picture'], "page");

            $post['post_author_url'] = $system['system_url'] . '/pages/' . $_page['page_name'];

            $post['post_author_name'] = $_page['page_title'];
            $post['post_author_verified'] = $this->_data['page_verified'];
        } elseif ($args['handle'] == "group") {
            /* check if the group is valid & the viewer is group member (approved) */
            $check_group = $db->query(sprintf("SELECT `groups`.* FROM `groups` INNER JOIN groups_members ON `groups`.group_id = groups_members.group_id WHERE groups_members.approved = '1' AND groups_members.user_id = %s AND groups_members.group_id = %s", secure($this->_data['user_id'], 'int'), secure($args['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            $_group = $check_group->fetch_assoc();
            $_group['i_admin'] = $this->check_group_adminship($this->_data['user_id'], $_group['group_id']);
            /* check if group publish enabled */
            if (!$_group['group_publish_enabled'] && !$_group['i_admin']) {
                modal("MESSAGE", __("Sorry"), __("Publish posts disabled by admin"));
            }

            $post['in_group'] = 1;
            $post['group_id'] = $args['id'];
            $post['group_approved'] = ($_group['group_publish_approval_enabled'] && !$_group['i_admin']) ? '0' : '1';
        } elseif ($args['handle'] == "event") {
            /* check if the event is valid & the viewer is event member */
            $check_event = $db->query(sprintf("SELECT `events`.* FROM `events` INNER JOIN events_members ON `events`.event_id = events_members.event_id WHERE events_members.user_id = %s AND events_members.event_id = %s", secure($this->_data['user_id'], 'int'), secure($args['id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            $_event = $check_event->fetch_assoc();
            $_event['i_admin'] = $this->check_event_adminship($this->_data['user_id'], $_event['event_id']);
            /* check if event publish enabled */
            if (!$_event['event_publish_enabled'] && !$_event['i_admin']) {
                modal("MESSAGE", __("Sorry"), __("Publish posts disabled by admin"));
            }

            $post['in_event'] = 1;
            $post['event_id'] = $args['id'];
            $post['event_approved'] = ($_event['event_publish_approval_enabled'] && !$_event['i_admin']) ? '0' : '1';
        }

        /* check the user_type */
        if ($post['user_type'] == "user") {
            if ($this->_data['user_chat_enabled']) {
                $post['post_author_online'] = true;
            }
        }
        if (!$system['posts_online_status']) {
            $post['post_author_online'] = false;
        }

        /* prepare post data */
        $post['text'] = $args['message'];
        $post['time'] = $date;
        $post['location'] = (!is_empty($args['location']) && valid_location($args['location'])) ? $args['location'] : '';
        $post['privacy'] = $args['privacy'];
        $post['is_anonymous'] = $args['is_anonymous'];
        $post['reaction_like_count'] = 0;
        $post['reaction_love_count'] = 0;
        $post['reaction_haha_count'] = 0;
        $post['reaction_yay_count'] = 0;
        $post['reaction_wow_count'] = 0;
        $post['reaction_sad_count'] = 0;
        $post['reaction_angry_count'] = 0;
        $post['reactions_total_count'] = 0;
        $post['comments'] = 0;
        $post['shares'] = 0;
        /* post feeling */
        $post['feeling_action'] = '';
        $post['feeling_value'] = '';
        $post['feeling_icon'] = '';
        if (!is_empty($args['feeling_action']) && !is_empty($args['feeling_value'])) {
            if ($args['feeling_action'] != "Feeling") {
                $_feeling_icon = get_feeling_icon($args['feeling_action'], get_feelings());
            } else {
                $_feeling_icon = get_feeling_icon($args['feeling_value'], get_feelings_types());
            }
            if ($_feeling_icon) {
                $post['feeling_action'] = $args['feeling_action'];
                $post['feeling_value'] = $args['feeling_value'];
                $post['feeling_icon'] = $_feeling_icon;
            }
        }

        /* post colored pattern */
        $post['colored_pattern'] = $args['colored_pattern'];

        /* prepare post type */
        if ($args['link']) {
            if ($args['link']->source_type == "link") {
                $post['post_type'] = 'link';
            } else {
                $post['post_type'] = 'media';
            }
        } elseif ($args['poll_options']) {
            $post['post_type'] = 'poll';
        } elseif ($args['product']) {
            $post['post_type'] = 'product';
            $post['privacy'] = "public";
        } elseif ($args['video']) {
            $post['post_type'] = 'video';
        } elseif ($args['audio']) {
            $post['post_type'] = 'audio';
        } elseif ($args['file']) {
            $post['post_type'] = 'file';
        } elseif (count($args['photos']) > 0) {
            if (!is_empty($args['album'])) {
                $post['post_type'] = 'album';
            } else {
                $post['post_type'] = 'photos';
            }
        } else {
            if ($post['location'] != '') {
                $post['post_type'] = 'map';
            } else {
                $post['post_type'] = '';
            }
        }
        if (is_null($post['is_anonymous']) || empty($post['is_anonymous'])) {
            $post['is_anonymous'] = 0;
        }
        /* insert the post */
        $insertQuery = sprintf("INSERT INTO global_posts (user_id, user_type, in_wall, wall_id, in_group, group_id, group_approved, in_event, event_id, event_approved, post_type, colored_pattern, time, location, privacy, text, feeling_action, feeling_value, is_anonymous) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", secure($post['user_id'], 'int'), secure($post['user_type']), secure($post['in_wall'], 'int'), secure($post['wall_id'], 'int'), secure($post['in_group']), secure($post['group_id'], 'int'), secure($post['group_approved']), secure($post['in_event']), secure($post['event_id'], 'int'), secure($post['event_approved']), secure($post['post_type']), secure($post['colored_pattern'], 'int'), secure($post['time']), secure($post['location']), secure($post['privacy']), secure($post['text']), secure($post['feeling_action']), secure($post['feeling_value']), secure($post['is_anonymous'])); //exit;
        $db->query($insertQuery) or _error("SQL_ERROR_THROWEN");
        $post['post_id'] = $db->insert_id;

        switch ($post['post_type']) {
            case 'link':
                $linkInsert = sprintf("INSERT INTO global_posts_links (post_id, source_url, source_host, source_title, source_text, source_thumbnail) VALUES (%s, %s, %s, %s, %s, %s)", secure($post['post_id'], 'int'), secure($args['link']->source_url), secure($args['link']->source_host), secure($args['link']->source_title), secure($args['link']->source_text), secure($args['link']->source_thumbnail));
                $db->query($linkInsert) or _error("SQL_ERROR_THROWEN");
                $post['link']['link_id'] = $db->insert_id;
                $post['link']['post_id'] = $post['post_id'];
                $post['link']['source_url'] = $args['link']->source_url;
                $post['link']['source_host'] = $args['link']->source_host;
                $post['link']['source_title'] = $args['link']->source_title;
                $post['link']['source_text'] = $args['link']->source_text;
                $post['link']['source_thumbnail'] = $args['link']->source_thumbnail;
                break;

            case 'poll':
                /* insert poll */
                $db->query(sprintf("INSERT INTO global_posts_polls (post_id) VALUES (%s)", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                $post['poll']['poll_id'] = $db->insert_id;
                $post['poll']['post_id'] = $post['post_id'];
                $post['poll']['votes'] = '0';
                /* insert poll options */
                foreach ($args['poll_options'] as $option) {
                    $db->query(sprintf("INSERT INTO posts_polls_options (poll_id, text) VALUES (%s, %s)", secure($post['poll']['poll_id'], 'int'), secure($option))) or _error("SQL_ERROR_THROWEN");
                    $poll_option['option_id'] = $db->insert_id;
                    $poll_option['text'] = $option;
                    $poll_option['votes'] = 0;
                    $poll_option['checked'] = false;
                    $post['poll']['options'][] = $poll_option;
                }
                break;

            case 'product':
                $args['product']->location = (!is_empty($args['product']->location) && valid_location($args['product']->location)) ? $args['product']->location : '';
                $db->query(sprintf("INSERT INTO global_posts_products (post_id, name, price, category_id, status, location) VALUES (%s, %s, %s, %s, %s, %s)", secure($post['post_id'], 'int'), secure($args['product']->name), secure($args['product']->price), secure($args['product']->category, 'int'), secure($args['product']->status), secure($args['product']->location))) or _error("SQL_ERROR_THROWEN");
                $post['product']['product_id'] = $db->insert_id;
                $post['product']['post_id'] = $post['post_id'];
                $post['product']['name'] = $args['product']->name;
                $post['product']['price'] = $args['product']->price;
                $post['product']['status'] = $args['product']->status;
                $post['product']['available'] = true;
                /* photos */
                if (count($args['photos']) > 0) {
                    foreach ($args['photos'] as $photo) {
                        $db->query(sprintf("INSERT INTO global_posts_photos (post_id, source, blur) VALUES (%s, %s, %s)", secure($post['post_id'], 'int'), secure($photo['source']), secure($photo['blur']))) or _error("SQL_ERROR_THROWEN");
                        $post_photo['photo_id'] = $db->insert_id;
                        $post_photo['post_id'] = $post['post_id'];
                        $post_photo['source'] = $photo;
                        $post_photo['reaction_like_count'] = 0;
                        $post_photo['reaction_love_count'] = 0;
                        $post_photo['reaction_haha_count'] = 0;
                        $post_photo['reaction_yay_count'] = 0;
                        $post_photo['reaction_wow_count'] = 0;
                        $post_photo['reaction_sad_count'] = 0;
                        $post_photo['reaction_angry_count'] = 0;
                        $post_photo['reactions_total_count'] = 0;
                        $post_photo['comments'] = 0;
                        $post['photos'][] = $post_photo;
                    }
                    $post['photos_num'] = count($post['photos']);
                }
                break;

            case 'video':
                $db->query(sprintf("INSERT INTO global_posts_videos (post_id, source, thumbnail) VALUES (%s, %s, %s)", secure($post['post_id'], 'int'), secure($args['video']->source), secure($args['video_thumbnail']))) or _error("SQL_ERROR_THROWEN");
                $post['video']['video_id'] = $db->insert_id;
                $post['video']['source'] = $args['video']->source;
                $post['video']['thumbnail'] = $args['video_thumbnail'];
                break;

            case 'audio':
                $db->query(sprintf("INSERT INTO global_posts_audios (post_id, source) VALUES (%s, %s)", secure($post['post_id'], 'int'), secure($args['audio']->source))) or _error("SQL_ERROR_THROWEN");
                $post['audio']['audio_id'] = $db->insert_id;
                $post['audio']['source'] = $args['audio']->source;
                break;

            case 'file':
                $db->query(sprintf("INSERT INTO global_posts_files (post_id, source) VALUES (%s, %s)", secure($post['post_id'], 'int'), secure($args['file']->source))) or _error("SQL_ERROR_THROWEN");
                $post['file']['file_id'] = $db->insert_id;
                $post['file']['source'] = $args['file']->source;
                break;

            case 'media':
                $db->query(sprintf("INSERT INTO global_posts_media (post_id, source_url, source_provider, source_type, source_title, source_text, source_html) VALUES (%s, %s, %s, %s, %s, %s, %s)", secure($post['post_id'], 'int'), secure($args['link']->source_url), secure($args['link']->source_provider), secure($args['link']->source_type), secure($args['link']->source_title), secure($args['link']->source_text), secure($args['link']->source_html))) or _error("SQL_ERROR_THROWEN");
                $post['media']['media_id'] = $db->insert_id;
                $post['media']['post_id'] = $post['post_id'];
                $post['media']['source_url'] = $args['link']->source_url;
                $post['media']['source_type'] = $args['link']->source_type;
                $post['media']['source_provider'] = $args['link']->source_provider;
                $post['media']['source_title'] = $args['link']->source_title;
                $post['media']['source_text'] = $args['link']->source_text;
                $post['media']['source_html'] = $args['link']->source_html;
                break;

            case 'photos':
                if ($args['handle'] == "page") {
                    /* check for page timeline album (public by default) */
                    if (!$_page['page_album_timeline']) {
                        /* create new page timeline album */
                        $db->query(sprintf("INSERT INTO global_posts_photos_albums (user_id, user_type, title) VALUES (%s, 'page', 'Timeline Photos')", secure($_page['page_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                        $_page['page_album_timeline'] = $db->insert_id;
                        /* update page */
                        $db->query(sprintf("UPDATE pages SET page_album_timeline = %s WHERE page_id = %s", secure($_page['page_album_timeline'], 'int'), secure($_page['page_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    }
                    $album_id = $_page['page_album_timeline'];
                } elseif ($args['handle'] == "group") {
                    /* check for group timeline album */
                    if (!$_group['group_album_timeline']) {
                        /* create new group timeline album */
                        $db->query(sprintf("INSERT INTO global_posts_photos_albums (user_id, user_type, in_group, group_id, title, privacy) VALUES (%s, %s, %s, %s, 'Timeline Photos', 'custom')", secure($post['user_id'], 'int'), secure($post['user_type']), secure($post['in_group']), secure($post['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                        $_group['group_album_timeline'] = $db->insert_id;
                        /* update group */
                        $db->query(sprintf("UPDATE `groups` SET group_album_timeline = %s WHERE group_id = %s", secure($_group['group_album_timeline'], 'int'), secure($_group['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    }
                    $album_id = $_group['group_album_timeline'];
                } elseif ($args['handle'] == "event") {
                    /* check for event timeline album */
                    if (!$_event['event_album_timeline']) {
                        /* create new event timeline album */
                        $db->query(sprintf("INSERT INTO global_posts_photos_albums (user_id, user_type, in_event, event_id, title, privacy) VALUES (%s, %s, %s, %s, 'Timeline Photos', 'custom')", secure($post['user_id'], 'int'), secure($post['user_type']), secure($post['in_event']), secure($post['event_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                        $_event['event_album_timeline'] = $db->insert_id;
                        /* update event */
                        $db->query(sprintf("UPDATE `events` SET event_album_timeline = %s WHERE event_id = %s", secure($_event['event_album_timeline'], 'int'), secure($_event['event_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    }
                    $album_id = $_event['event_album_timeline'];
                } else {
                    /* check for timeline album */
                    if (!$this->_data['user_album_timeline']) {
                        /* create new timeline album (public by default) */
                        $db->query(sprintf("INSERT INTO global_posts_photos_albums (user_id, user_type, title) VALUES (%s, 'user', 'Timeline Photos')", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                        $this->_data['user_album_timeline'] = $db->insert_id;
                        /* update user */
                        $db->query(sprintf("UPDATE users SET user_album_timeline = %s WHERE user_id = %s", secure($this->_data['user_album_timeline'], 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    }
                    $album_id = $this->_data['user_album_timeline'];
                }
                foreach ($args['photos'] as $photo) {
                    $db->query(sprintf("INSERT INTO global_posts_photos (post_id, album_id, source, blur) VALUES (%s, %s, %s, %s)", secure($post['post_id'], 'int'), secure($album_id, 'int'), secure($photo['source']), secure($photo['blur']))) or _error("SQL_ERROR_THROWEN");
                    $post_photo['photo_id'] = $db->insert_id;
                    $post_photo['post_id'] = $post['post_id'];
                    $post_photo['source'] = $photo['source'];
                    $post_photo['blur'] = $photo['blur'];
                    $post_photo['reaction_like_count'] = 0;
                    $post_photo['reaction_love_count'] = 0;
                    $post_photo['reaction_haha_count'] = 0;
                    $post_photo['reaction_yay_count'] = 0;
                    $post_photo['reaction_wow_count'] = 0;
                    $post_photo['reaction_sad_count'] = 0;
                    $post_photo['reaction_angry_count'] = 0;
                    $post_photo['reactions_total_count'] = 0;
                    $post_photo['comments'] = 0;
                    $post['photos'][] = $post_photo;
                }
                $post['photos_num'] = count($post['photos']);
                break;

            case 'album':
                /* create new album */
                $db->query(sprintf("INSERT INTO global_posts_photos_albums (user_id, user_type, in_group, group_id, in_event, event_id, title, privacy) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($post['user_id'], 'int'), secure($post['user_type']), secure($post['in_group']), secure($post['group_id'], 'int'), secure($post['in_event']), secure($post['event_id'], 'int'), secure($args['album']), secure($post['privacy']))) or _error("SQL_ERROR_THROWEN");
                $album_id = $db->insert_id;
                foreach ($args['photos'] as $photo) {
                    $db->query(sprintf("INSERT INTO global_posts_photos (post_id, album_id, source, blur) VALUES (%s, %s, %s, %s)", secure($post['post_id'], 'int'), secure($album_id, 'int'), secure($photo['source']), secure($photo['blur']))) or _error("SQL_ERROR_THROWEN");
                    $post_photo['photo_id'] = $db->insert_id;
                    $post_photo['post_id'] = $post['post_id'];
                    $post_photo['source'] = $photo['source'];
                    $post_photo['blur'] = $photo['blur'];
                    $post_photo['reaction_like_count'] = 0;
                    $post_photo['reaction_love_count'] = 0;
                    $post_photo['reaction_haha_count'] = 0;
                    $post_photo['reaction_yay_count'] = 0;
                    $post_photo['reaction_wow_count'] = 0;
                    $post_photo['reaction_sad_count'] = 0;
                    $post_photo['reaction_angry_count'] = 0;
                    $post_photo['reactions_total_count'] = 0;
                    $post_photo['comments'] = 0;
                    $post['photos'][] = $post_photo;
                }
                $post['album']['album_id'] = $album_id;
                $post['album']['title'] = $args['album'];
                $post['photos_num'] = count($post['photos']);
                /* get album path */
                if ($post['in_group']) {
                    $post['album']['path'] = 'groups/' . $_group['group_name'];
                } elseif ($post['in_event']) {
                    $post['album']['path'] = 'events/' . $_event['event_id'];
                } elseif ($post['user_type'] == "user") {
                    $post['album']['path'] = $this->_data['user_name'];
                } elseif ($post['user_type'] == "page") {
                    $post['album']['path'] = 'pages/' . $_page['page_name'];
                }
                break;
        }

        /* post mention notifications */
        $this->post_mentions($args['message'], $post['post_id']);

        /* post wall notifications */
        if ($post['in_wall']) {
            $this->post_notification(array('to_user_id' => $post['wall_id'], 'action' => 'wall', 'node_type' => 'post', 'node_url' => $post['post_id'], 'hub' => "GlobalHub"));
        }

        /* post in_group notification */
        if ($post['in_group'] && !$post['group_approved']) {
            /* send notification to group admin */
            $this->post_notification(array('to_user_id' => $_group['group_admin'], 'action' => 'group_post_pending', 'node_type' => $_group['group_title'], 'node_url' => $_group['group_name'] . "-[guid=]" . $post['post_id'], 'hub' => "GlobalHub"));
        }

        /* post in_event notification */
        if ($post['in_event'] && !$post['event_approved']) {
            /* send notification to event admin */
            $this->post_notification(array('to_user_id' => $_event['event_admin'], 'action' => 'event_post_pending', 'hub' => "GlobalHub", 'node_type' => $_event['event_title'], 'node_url' => $_event['event_id'] . "-[guid=]" . $post['post_id']));
        }

        /* parse text */
        $post['text_plain'] = htmlentities($post['text'], ENT_QUOTES, 'utf-8');

        $post['text'] = $this->_parse(["text" => $post['text_plain'], "trending_hashtags" => true, "post_id" => $post['post_id']]);
        //echo "sadasasd==2991".$post['text'] ; exit;
        /* get post colored pattern */
        $post['colored_pattern'] = $this->get_posts_colored_pattern($post['colored_pattern']);

        /* user can manage the post */
        $post['manage_post'] = true;

        /* points balance */
        $this->points_balance("add", $this->_data['user_id'], "post", $post['post_id']);

        // return
        return $post;
    }


    /* ------------------------------- */
    /* Posts */
    /* ------------------------------- */

    /**
     * get_posts
     * 
     * @param array $args
     * @return array
     */
    public function global_profile_get_posts($args = [], $showData = false)
    {
        global $db, $system;
        /* initialize vars */
        $posts = [];
        /* validate arguments */
        $get = !isset($args['get']) ? 'newsfeed' : $args['get'];
        $filter = !isset($args['filter']) ? 'all' : $args['filter'];
        if (!in_array($filter, array('all', '', 'link', 'media', 'photos', 'map', 'product', 'article', 'poll', 'video', 'audio', 'file'))) {
            _error(400);
        }
        $last_post_id = !isset($args['last_post_id']) ? null : $args['last_post_id'];
        if (isset($last_post_id) && !is_numeric($last_post_id)) {
            _error(400);
        }
        $offset = !isset($args['offset']) ? 0 : $args['offset'];
        $offset *= $system['max_results'];
        $get_all = !isset($args['get_all']) ? false : true;
        if (isset($args['query'])) {
            if (is_empty($args['query'])) {
                return $posts;
            } else {
                $query = secure($args['query'], 'search', false);
            }
        }
        /* prepare query */
        $order_query = "ORDER BY posts.post_id DESC";
        $where_query = "";
        /* get posts */
        switch ($get) {
            case 'newsfeed':
                if (!$this->_logged_in && $query) {
                    /* [Case: 1] user not logged in but searhing */
                    $where_query .= "WHERE ("; /* [01] start of public search query clause */
                    $where_query .= "(posts.text LIKE $query)";
                    /* get only public posts [except: group posts & event posts & wall posts] */
                    $where_query .= " AND (posts.in_group = '0' AND posts.in_event = '0' AND posts.in_wall = '0' AND posts.privacy = 'public')";
                    $where_query .= ")"; /* [01] end of public search query clause */
                } else {
                    /* [Case: 2] user logged in whatever searching or not */
                    /* get viewer user's newsfeed */
                    $where_query .= "WHERE ("; /* [02] start of newsfeed without query clause */
                    if ($query) {
                        $where_query .= "("; /* [03] start of newsfeed with query clause */
                    }
                    /* get viewer posts */
                    $me = $this->_data['user_id'];
                    $where_query .= "(posts.user_id = $me AND posts.user_type = 'user')";
                    /* get posts from friends still followed */
                    $friends_ids = array_intersect($this->_data['friends_ids'], $this->_data['followings_ids']);
                    if ($friends_ids) {
                        $friends_list = implode(',', $friends_ids);
                        /* viewer friends posts -> authors */
                        $where_query .= " OR (posts.user_id IN ($friends_list) AND posts.user_type = 'user' AND posts.privacy = 'friends' AND posts.in_group = '0' AND posts.in_event = '0')";
                        /* viewer friends posts -> their wall posts */
                        $where_query .= " OR (posts.in_wall = '1' AND posts.wall_id IN ($friends_list) AND posts.user_type = 'user' AND posts.privacy = 'friends')";
                    }

                    /* get posts from followings */
                    if ($this->_data['followings_ids']) {
                        $followings_list = implode(',', $this->_data['followings_ids']);
                        /* viewer followings posts -> authors */
                        $where_query .= " OR (posts.user_id IN ($followings_list) AND posts.user_type = 'user' AND posts.privacy = 'public' AND posts.in_group = '0' AND posts.in_event = '0')";
                        /* viewer followings posts -> their wall posts */
                        $where_query .= " OR (posts.in_wall = '1' AND posts.wall_id IN ($followings_list) AND posts.user_type = 'user' AND posts.privacy = 'public')";
                    }

                    /* get viewer liked pages posts */
                    $pages_ids = $this->get_pages_ids();
                    if ($pages_ids) {
                        $pages_list = implode(',', $pages_ids);
                        $where_query .= " OR (posts.user_id IN ($pages_list) AND posts.user_type = 'page')";
                    }

                    /* get groups (memberhsip approved only) posts & exclude the viewer posts */
                    $groups_ids = $this->get_groups_ids(true);
                    if ($groups_ids) {
                        $groups_list = implode(',', $groups_ids);
                        $where_query .= " OR (posts.group_id IN ($groups_list) AND posts.in_group = '1' AND posts.group_approved = '1' AND posts.user_id != $me)";
                    }

                    /* get events posts & exclude the viewer posts */
                    $events_ids = $this->get_events_ids();
                    if ($events_ids) {
                        $events_list = implode(',', $events_ids);
                        $where_query .= " OR (posts.event_id IN ($events_list) AND posts.in_event = '1' AND posts.event_approved = '1' AND posts.user_id != $me)";
                    }
                    $where_query .= ")"; /* [02] end of newsfeed without query clause */
                    if ($query) {
                        $where_query .= " AND (posts.text LIKE $query)";

                        $where_query .= ")"; /* [03] end of newsfeed with query clause */

                        $where_query .= " OR ("; /* [04] start of public search query clause */
                        $where_query .= "(posts.text LIKE $query)";
                        /* get only public posts [except: group posts & event posts & wall posts] */
                        $where_query .= " AND (posts.in_group = '0' AND posts.in_event = '0' AND posts.in_wall = '0' AND posts.privacy = 'public')";
                        $where_query .= ")"; /* [04] end of public search query clause */
                    }
                }
                break;

            case 'posts_profile':
                if (isset($args['id']) && !is_numeric($args['id'])) {
                    _error(400);
                }
                $id = $args['id'];
                /* get target user's posts */
                /* check if there is a viewer user */
                if ($this->_logged_in) {
                    /* check if the target user is the viewer */
                    if ($id == $this->_data['user_id']) {
                        /* get all posts */
                        $where_query .= "WHERE (";
                        /* get all target posts */
                        $where_query .= "(posts.user_id = $id AND posts.user_type = 'user')";
                        /* get target wall posts (from others to the target) */
                        $where_query .= " OR (posts.wall_id = $id AND posts.in_wall = '1')";
                        $where_query .= ")";
                    } else {
                        /* check if the viewer & the target user are friends */
                        if (in_array($id, $this->_data['friends_ids'])) {
                            /* Yes they are friends */
                            $where_query .= "WHERE (";
                            /* get all target posts [except: group posts & event posts & hidden posts & anonymous posts] */
                            $where_query .= "(posts.user_id = $id AND posts.user_type = 'user' AND posts.in_group = '0' AND posts.in_event = '0' AND posts.privacy != 'me' AND posts.is_hidden = '0' AND posts.is_anonymous = '0')";
                            /* get target wall posts (from others to the target) [except: hidden posts] */
                            $where_query .= " OR (posts.wall_id = $id AND posts.in_wall = '1' AND posts.is_hidden = '0')";
                            $where_query .= ")";
                        } else {
                            /* No they are not friends */
                            /* get only public posts [except: wall posts (both) & hidden posts &  & anonymous posts] */
                            /* note: we didn't except group posts & event posts as they are not public already */
                            $where_query .= "WHERE (posts.user_id = $id AND posts.user_type = 'user' AND posts.in_wall = '0' AND posts.privacy = 'public' AND posts.is_hidden = '0' AND posts.is_anonymous = '0')";
                        }
                    }
                } else {
                    /* get only public posts [except: wall posts (both) & hidden posts] */
                    /* note: we didn't except group posts & event posts as they are not public already */
                    $where_query .= "WHERE (posts.user_id = $id AND posts.user_type = 'user' AND posts.in_wall = '0' AND posts.privacy = 'public' AND posts.is_hidden = '0' AND posts.is_anonymous = '0')";
                }
                break;

            case 'posts_page':
                if (isset($args['id']) && !is_numeric($args['id'])) {
                    _error(400);
                }
                $id = $args['id'];
                $where_query .= "WHERE (posts.user_id = $id AND posts.user_type = 'page')";
                break;

            case 'posts_group':
                if (isset($args['id']) && !is_numeric($args['id'])) {
                    _error(400);
                }
                $id = $args['id'];
                $where_query .= "WHERE (posts.group_id = $id AND posts.in_group = '1' AND posts.group_approved = '1')";
                break;

            case 'posts_group_pending':
                if (isset($args['id']) && !is_numeric($args['id'])) {
                    _error(400);
                }
                $id = $args['id'];
                $me = $this->_data['user_id'];
                $where_query .= "WHERE (posts.group_id = $id AND posts.in_group = '1' AND posts.group_approved = '0' AND posts.user_id = $me)";
                break;

            case 'posts_group_pending_all':
                if (isset($args['id']) && !is_numeric($args['id'])) {
                    _error(400);
                }
                $id = $args['id'];
                $where_query .= "WHERE (posts.group_id = $id AND posts.in_group = '1' AND posts.group_approved = '0')";
                break;

            case 'posts_event':
                if (isset($args['id']) && !is_numeric($args['id'])) {
                    _error(400);
                }
                $id = $args['id'];
                $where_query .= "WHERE (posts.event_id = $id AND posts.in_event = '1' AND posts.event_approved = '1')";
                break;

            case 'posts_event_pending':
                if (isset($args['id']) && !is_numeric($args['id'])) {
                    _error(400);
                }
                $id = $args['id'];
                $me = $this->_data['user_id'];
                $where_query .= "WHERE (posts.event_id = $id AND posts.in_event = '1' AND posts.event_approved = '0' AND posts.user_id = $me)";
                break;

            case 'posts_event_pending_all':
                if (isset($args['id']) && !is_numeric($args['id'])) {
                    _error(400);
                }
                $id = $args['id'];
                $where_query .= "WHERE (posts.event_id = $id AND posts.in_event = '1' AND posts.event_approved = '0')";
                break;

            case 'popular':
                $where_query .= "WHERE posts.privacy = 'public'"; /* get all popular public posts */
                $order_query = "ORDER BY posts.comments DESC, posts.reaction_like_count DESC, posts.reaction_love_count DESC, posts.reaction_haha_count DESC, posts.reaction_yay_count DESC, posts.reaction_wow_count DESC, posts.reaction_sad_count DESC, posts.reaction_angry_count DESC, posts.shares DESC"; /* order by comments, reactions & shares */
                break;

            case 'discover':
                $where_query .= sprintf("WHERE posts.privacy = 'public' AND !(posts.user_id = %s AND posts.user_type = 'user')", secure($this->_data['user_id'], 'int'));
                /* exclude posts from viewer friends */
                $friends_ids = array_intersect($this->_data['friends_ids'], $this->_data['followings_ids']);
                if ($friends_ids) {
                    $friends_list = implode(',', $friends_ids);
                    /* viewer friends posts -> authors */
                    $where_query .= " AND !(posts.user_id IN ($friends_list) AND posts.user_type = 'user')";
                }
                /* exclude posts from viewer followings */
                if ($this->_data['followings_ids']) {
                    $followings_list = implode(',', $this->_data['followings_ids']);
                    /* viewer followings posts -> authors */
                    $where_query .= " AND !(posts.user_id IN ($followings_list) AND posts.user_type = 'user')";
                }
                /* exclude posts from viewer liked pages */
                $pages_ids = $this->get_pages_ids();
                if ($pages_ids) {
                    $pages_list = implode(',', $pages_ids);
                    $where_query .= " AND !(posts.user_id IN ($pages_list) AND posts.user_type = 'page')";
                }
                /* exclude posts from viewer joined groups*/
                $groups_ids = $this->get_groups_ids(true);
                if ($groups_ids) {
                    $groups_list = implode(',', $groups_ids);
                    $where_query .= " AND !(posts.group_id IN ($groups_list) AND posts.in_group = '1')";
                }
                /* exclude posts from viewer joined events */
                $events_ids = $this->get_events_ids();
                if ($events_ids) {
                    $events_list = implode(',', $events_ids);
                    $where_query .= " AND !(posts.event_id IN ($events_list) AND posts.in_event = '1')";
                }
                break;

            case 'saved':
                $id = $this->_data['user_id'];
                $where_query .= "INNER JOIN posts_saved ON posts.post_id = posts_saved.post_id WHERE (posts_saved.user_id = $id)";
                $order_query = "ORDER BY posts_saved.time DESC"; /* order by saved time not by post_id */
                break;

            case 'memories':
                $id = $this->_data['user_id'];
                $where_query .= "WHERE DATE_FORMAT(date(posts.time),'%m-%d') = DATE_FORMAT(CURDATE(),'%m-%d') AND posts.time < (NOW() - INTERVAL 1 DAY) AND posts.user_id = $id AND posts.user_type = 'user'";
                break;

            case 'boosted':
                $id = $this->_data['user_id'];
                $where_query .= "WHERE (posts.boosted = '1' AND posts.boosted_by = $id)";
                break;
            default:
                _error(400);
                break;
        }
        /* get viewer hidden posts to exclude from results */
        $hidden_posts = $this->_get_hidden_posts($this->_data['user_id']);
        if ($hidden_posts) {
            $hidden_posts_list = implode(',', $hidden_posts);
            $where_query .= " AND (posts.post_id NOT IN ($hidden_posts_list))";
        }

        /* filter posts */
        if ($filter != "all") {
            $where_query .= " AND (posts.post_type = '$filter')";
        }

        $where_query .= " AND parentId=0";
        /* get posts */
        if ($last_post_id != null && $get != 'popular' && $get != 'saved' && $get != 'memories') { /* excluded as not ordered by post_id */
            //$get_posts = $db->query(sprintf("SELECT * FROM (SELECT posts.post_id FROM global_posts as posts ".$where_query.") posts WHERE posts.post_id > %s ORDER BY posts.post_id DESC", secure($last_post_id, 'int') )) or _error("SQL_ERROR_THROWEN");
            $postQuery27 = sprintf("SELECT * FROM (SELECT posts.post_id, posts.time as retweet_time FROM global_posts as posts " . $where_query . ") posts WHERE posts.post_id > %s ORDER BY posts.post_id DESC", secure($last_post_id, 'int'));
        } else {
            $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($system['max_results'], 'int', false)); /* get_all for cases like download user's posts */
            //$get_posts = $db->query("SELECT posts.post_id FROM global_posts ".$where_query." ".$order_query." ".$limit_statement) or _error("SQL_ERROR_THROWEN");
            $postQuery27 = "SELECT posts.post_id, posts.time as retweet_time FROM global_posts as posts " . $where_query . " " . $order_query . " " . $limit_statement;
        }
        $get_posts = $db->query($postQuery27) or _error("SQL_ERROR_THROWEN");
        $allPosts = [];

        if ($get_posts->num_rows > 0) {
            $showData = true;
            $i = 0;
            if ($showData && isset($args['id'])) {
                $sql = "SELECT global_retweet.* FROM global_retweet WHERE user_id = " . $args['id'] . " ORDER BY `global_retweet`.`retweet_time` DESC";
                $getRetweetss = $db->query($sql) or _error("SQL_ERROR_THROWEN");
                while ($newTweet = $getRetweetss->fetch_assoc()) {
                    $allPosts[$i]['post_id'] = $newTweet['post_id'];
                    $allPosts[$i]['retweet_time'] = $newTweet['retweet_time'];
                    $i++;
                }
            }
            // while($post = $get_posts->fetch_assoc()) {
            //     $post = $this->get_post($post['post_id'], true, true);  $full_details = true, $pass_privacy_check = true 
            //     if($post) {
            //         $posts[] = $post;
            //     }
            // }

            $k = $i;
            while ($post = $get_posts->fetch_assoc()) {
                $allPosts[$k]['post_id'] = $post['post_id'];
                $allPosts[$k]['retweet_time'] = $post['retweet_time'];
                $k++;
            }
        }
        if (count($allPosts) > 0) {
            usort($allPosts, function ($a, $b) {
                $dateA = strtotime($a['retweet_time']);
                $dateB = strtotime($b['retweet_time']);
                // ascending ordering, use `<=` for descending
                return $dateA - $dateB;
            });
            $allPosts = array_reverse($allPosts);
        }

        //echo "<pre>";print_r($allPosts);die;
        for ($ik = 0; $ik < count($allPosts); $ik++) {
            $post = $this->global_profile_get_post($allPosts[$ik]['post_id'], true, true);
            $retweetPost = "";

            if ($post) {
                if ($this->_data['user_id']) {
                    if (isset($args['id']) && $args['id'] != $this->_data['user_id']) {
                        $retweetBy = 'SELECT global_retweet.user_id, global_retweet.retweet_time, CONCAT(global_profile.user_firstname, " ",  global_profile.user_lastname) AS user_name_ FROM global_retweet JOIN global_profile ON global_profile.user_id = global_retweet.user_id  WHERE global_retweet.post_id = ' . $allPosts[$ik]['post_id'] . ' and global_retweet.user_id = ' . $args['id'] . ' ORDER BY `global_retweet`.`retweet_time` DESC';
                        //echo $retweetBy;die;
                        $retweetusers = $db->query($retweetBy) or _error("SQL_ERROR_THROWEN");
                        $listedUsers = $retweetusers->fetch_assoc();
                        if (isset($listedUsers['user_id'])) {
                            $retweetPost = $listedUsers['user_name_'] . " ";
                        }
                    } else {

                        $retweetBy = 'SELECT global_retweet.user_id, global_retweet.retweet_time, CONCAT(global_profile.user_firstname, " ",  global_profile.user_lastname) AS user_name_ FROM global_retweet JOIN global_profile ON global_profile.user_id = global_retweet.user_id  WHERE global_retweet.post_id = ' . $allPosts[$ik]['post_id'] . ' and global_retweet.user_id = ' . $this->_data['user_id'] . ' ORDER BY `global_retweet`.`retweet_time` DESC';
                        $retweetusers = $db->query($retweetBy) or _error("SQL_ERROR_THROWEN");
                        $listedUsers = $retweetusers->fetch_assoc();
                        if (isset($listedUsers['user_id'])) {
                            $retweetPost = "You ";
                        }
                    }
                    //$retweetBy = "SELECT user_id, retweet_time FROM global_retweet WHERE post_id = ".$allPosts[$ik]['post_id']." and user_id = ".$this->_data['user_id']." ORDER BY `global_retweet`.`retweet_time` DESC";
                }
                $childPostData = $this->global_profile_get_child_post($allPosts[$ik]['post_id'], true, true);

                if ($childPostData) {
                    $post['retweetPost'] = $retweetPost;
                    $post['childPostExists'] = true;
                    $post['childPostData'] = $childPostData;
                } else {
                    $post['childPostExists'] = false;
                    $post['childPostData'] = [];
                    $post['retweetPost'] = $retweetPost;
                }

                $posts[] = $post;
            }
        }

        return $posts;
    }


    /**
     * get_post
     * 
     * @param integer $post_id
     * @param boolean $get_comments
     * @param boolean $pass_privacy_check
     * @return array
     */
    public function global_profile_get_post($post_id, $get_comments = true, $pass_privacy_check = false)
    {
        global $db, $system;

        $post = $this->global_check_post($post_id, $pass_privacy_check);
        //echo "<pre>"; print_r($post); exit;
        if (!$post) {
            return false;
        }
        $post['user_picture'] = $post['global_user_picture'];
        //echo "<pre>"; print_r($post); exit;
        /* parse text */
        $post['text_plain'] = $post['text'];
        $post['text'] = $this->_parse(["text" => $post['text_plain']]);

        /* og-meta tags */
        $post['og_title'] = ($post['is_anonymous']) ? __("Anonymous") : $post['post_author_name'];
        $post['og_title'] .= ($post['text_plain'] != "") ? " - " . $post['text_plain'] : "";
        $post['og_description'] = $post['text_plain'];
        if ($post['retweet'] > 0) {
            $check = $db->query(sprintf("SELECT* FROM global_retweet WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check->num_rows > 0) {
                $new = $check->fetch_assoc();
            }
        }

        /* post type */
        switch ($post['post_type']) {
            case 'album':
            case 'photos':
            case 'profile_picture':
            case 'profile_cover':
            case 'page_picture':
            case 'page_cover':
            case 'group_picture':
            case 'group_cover':
            case 'event_cover':
                /* get photos */
                $get_photos = $db->query(sprintf("SELECT * FROM global_posts_photos WHERE post_id = %s ORDER BY photo_id ASC", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                $post['photos_num'] = $get_photos->num_rows;
                /* check if photos has been deleted */
                if ($post['photos_num'] == 0) {
                    return false;
                }
                while ($post_photo = $get_photos->fetch_assoc()) {
                    $post['photos'][] = $post_photo;
                }
                if ($post['post_type'] == 'album') {
                    $post['album'] = $this->get_album($post['photos'][0]['album_id'], false);
                    if (!$post['album']) {
                        return false;
                    }
                    /* og-meta tags */
                    $post['og_title'] = $post['album']['title'];
                    $post['og_image'] = $post['album']['cover'];
                } else {
                    /* og-meta tags */
                    $post['og_image'] = $system['system_uploads'] . '/' . $post['photos'][0]['source'];
                }
                break;

            case 'media':
                /* get media */
                $get_media = $db->query(sprintf("SELECT * FROM global_posts_media WHERE post_id = %s", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* check if media has been deleted */
                if ($get_media->num_rows == 0) {
                    return false;
                }
                $post['media'] = $get_media->fetch_assoc();
                break;

            case 'link':
                /* get link */
                $get_link = $db->query(sprintf("SELECT * FROM global_posts_links WHERE post_id = %s", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* check if link has been deleted */
                if ($get_link->num_rows == 0) {
                    return false;
                }
                $post['link'] = $get_link->fetch_assoc();
                break;

            case 'poll':
                /* get poll */
                $get_poll = $db->query(sprintf("SELECT * FROM global_posts_polls WHERE post_id = %s", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* check if video has been deleted */
                if ($get_poll->num_rows == 0) {
                    return false;
                }
                $post['poll'] = $get_poll->fetch_assoc();
                /* get poll options */
                $queryPoll = sprintf("SELECT global_posts_polls_options.option_id, global_posts_polls_options.text FROM global_posts_polls_options WHERE poll_id = %s", secure($post['poll']['poll_id'], 'int'));
                //echo $queryPoll;die;
                $get_poll_options = $db->query($queryPoll) or _error("SQL_ERROR_THROWEN");
                if ($get_poll_options->num_rows == 0) {
                    return false;
                }
                while ($poll_option = $get_poll_options->fetch_assoc()) {
                    /* get option votes */
                    $get_option_votes = $db->query(sprintf("SELECT COUNT(*) as count FROM global_posts_polls_options_users WHERE option_id = %s", secure($poll_option['option_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    $poll_option['votes'] = $get_option_votes->fetch_assoc()['count'];
                    /* check if viewer voted */
                    $poll_option['checked'] = false;
                    if ($this->_logged_in) {
                        $check = $db->query(sprintf("SELECT COUNT(*) as count FROM global_posts_polls_options_users WHERE user_id = %s AND option_id = %s", secure($this->_data['user_id'], 'int'), secure($poll_option['option_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                        if ($check->fetch_assoc()['count'] > 0) {
                            $poll_option['checked'] = true;
                        }
                    }
                    $post['poll']['options'][] = $poll_option;
                }
                break;

            case 'product':
                /* get product */
                $get_product = $db->query(sprintf("SELECT * FROM global_posts_products WHERE post_id = %s", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* check if link has been deleted */
                if ($get_product->num_rows == 0) {
                    return false;
                }
                $post['product'] = $get_product->fetch_assoc();
                /* get photos */
                $get_photos = $db->query(sprintf("SELECT * FROM global_posts_photos WHERE post_id = %s ORDER BY photo_id DESC", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                $post['photos_num'] = $get_photos->num_rows;
                /* check if photos has been deleted */
                if ($post['photos_num'] > 0) {
                    while ($post_photo = $get_photos->fetch_assoc()) {
                        $post['photos'][] = $post_photo;
                    }
                    /* og-meta tags */
                    $post['og_image'] = $system['system_uploads'] . '/' . $post['photos'][0]['source'];
                }
                /* og-meta tags */
                $post['og_title'] = $post['product']['name'];
                break;

            case 'article':
                /* get article */
                $get_article = $db->query(sprintf("SELECT global_posts_articles.*, blogs_categories.category_name FROM posts_articles LEFT JOIN blogs_categories ON posts_articles.category_id = blogs_categories.category_id WHERE posts_articles.post_id = %s", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* check if article has been deleted */
                if ($get_article->num_rows == 0) {
                    return false;
                }
                $post['article'] = $get_article->fetch_assoc();
                $post['article']['category_name'] = ($post['article']['category_name']) ? $post['article']['category_name'] : __("Uncategorized");
                $post['article']['category_url'] = get_url_text(html_entity_decode($post['article']['category_name'], ENT_QUOTES));
                $post['article']['parsed_cover'] = get_picture($post['article']['cover'], 'article');
                $post['article']['title_url'] = get_url_text(html_entity_decode($post['article']['title'], ENT_QUOTES));
                $post['article']['parsed_text'] = htmlspecialchars_decode($post['article']['text'], ENT_QUOTES);
                $post['article']['text_snippet'] = get_snippet_text($post['article']['text']);
                $tags = (!is_empty($post['article']['tags'])) ? explode(',', $post['article']['tags']) : array();
                $post['article']['parsed_tags'] = array_map('get_tag', $tags);
                /* og-meta tags */
                $post['og_title'] = $post['article']['title'];
                $post['og_description'] = $post['article']['text_snippet'];
                $post['og_image'] = $post['article']['parsed_cover'];
                break;

            case 'video':
                /* get video */
                $get_video = $db->query(sprintf("SELECT * FROM global_posts_videos WHERE post_id = %s", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* check if video has been deleted */
                if ($get_video->num_rows == 0) {
                    return false;
                }
                $post['video'] = $get_video->fetch_assoc();
                break;

            case 'audio':
                /* get audio */
                $get_audio = $db->query(sprintf("SELECT * FROM global_posts_audios WHERE post_id = %s", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* check if audio has been deleted */
                if ($get_audio->num_rows == 0) {
                    return false;
                }
                $post['audio'] = $get_audio->fetch_assoc();
                break;

            case 'file':
                /* get file */
                $get_file = $db->query(sprintf("SELECT * FROM global_posts_files WHERE post_id = %s", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* check if file has been deleted */
                if ($get_file->num_rows == 0) {
                    return false;
                }
                $post['file'] = $get_file->fetch_assoc();
                break;

            case 'shared':
                /* get origin post */
                $post['origin'] = $this->global_profile_get_post($post['origin_id'], false);
                /* check if origin post has been deleted */
                if (!$post['origin']) {
                    return false;
                }
                break;

            default:
                /* get colored pattern */
                if ($post['colored_pattern']) {
                    $post['colored_pattern'] = $this->get_posts_colored_pattern($post['colored_pattern']);
                }
                break;
        }

        /* post feeling */
        if (!is_empty($post['feeling_action']) && !is_empty($post['feeling_value'])) {
            if ($post['feeling_action'] != "Feeling") {
                $_feeling_icon = get_feeling_icon($post['feeling_action'], get_feelings());
            } else {
                $_feeling_icon = get_feeling_icon($post['feeling_value'], get_feelings_types());
            }
            if ($_feeling_icon) {
                $post['feeling_icon'] = $_feeling_icon;
            }
        }

        /* get post comments */
        if ($get_comments) {
            if ($post['comments'] > 0) {
                $post['post_comments'] = $this->global_get_comments($post['post_id'], 0, true, true, $post);
            }
        }
        //echo "<pre>"; print_r($post); exit;
        return $post;
    }

    public function global_profile_comment($handle, $node_id, $message, $photo, $voice_note)
    {
        global $db, $system, $date;

        /* check max comments/hour limit */
        if ($system['max_comments_hour'] > 0 && $this->_data['user_group'] >= 3) {
            $check_limit = $db->query(sprintf("SELECT COUNT(*) as count FROM posts_comments WHERE posts_comments.time >= DATE_SUB(NOW(),INTERVAL 1 HOUR) AND user_id = %s AND user_type = 'user'", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check_limit->fetch_assoc()['count'] >= $system['max_comments_hour']) {
                modal("MESSAGE", __("Maximum Limit Reached"), __("You have reached the maximum limit of comments/hour, please try again later"));
            }
        }

        /* check comment max length */
        if ($system['max_comment_length'] > 0 && $this->_data['user_group'] >= 3) {
            if (strlen($message) >= $system['max_comment_length']) {
                modal("MESSAGE", __("Text Length Limit Reached"), __("Your message characters length is over the allowed limit") . " (" . $system['max_comment_length'] . " " . __("Characters") . ")");
            }
        }

        /* default */
        $comment = [];
        $comment['node_id'] = $node_id;
        $comment['node_type'] = $handle;
        $comment['text'] = $message;
        $comment['image'] = $photo;
        $comment['voice_note'] = $voice_note;
        $comment['time'] = $date;
        $comment['reaction_like_count'] = 0;
        $comment['reaction_love_count'] = 0;
        $comment['reaction_haha_count'] = 0;
        $comment['reaction_yay_count'] = 0;
        $comment['reaction_wow_count'] = 0;
        $comment['reaction_sad_count'] = 0;
        $comment['reaction_angry_count'] = 0;
        $comment['reactions_total_count'] = 0;
        $comment['replies'] = 0;

        /* check the handle */
        switch ($handle) {
            case 'post':
                /* (check|get) post */
                $post = $this->global_check_post($node_id, false, false);
                if (!$post) {
                    _error(403);
                }
                break;

            case 'photo':
                /* (check|get) photo */
                $photo = $this->global_get_photo($node_id);
                if (!$photo) {
                    _error(403);
                }
                $post = $photo['post'];
                break;

            case 'comment':
                /* (check|get) comment */
                $parent_comment = $this->global_get_comment($node_id, false);
                if (!$parent_comment) {
                    _error(403);
                }
                $post = $parent_comment['post'];
                break;
        }

        /* check if comments disabled */
        if ($post['comments_disabled']) {
            throw new Exception(__("Comments disabled for this post"));
        }

        /* check if there is any blocking between the viewer & the target */
        if ($this->blocked($post['author_id']) || ($handle == "comment" && $this->blocked($parent_comment['author_id']))) {
            _error(403);
        }

        /* check if the viewer is page admin of the target post */
        if (!$post['is_page_admin']) {
            $comment['user_id'] = $this->_data['user_id'];
            $comment['user_type'] = "user";
            //$comment['author_picture'] = $this->_data['global_user_picture'];
            $comment['author_picture'] = get_picture($this->_data['global_user_picture'],  $this->_data['user_gender']);

            $author_url = $system['system_url'];
            $author_url = $author_url . '/global-profile.php?username=' . $this->_data['user_name'];
            $comment['author_url'] = $author_url;

            $comment['author_user_name'] = $this->_data['user_name'];
            $comment['author_name'] = $this->_data['user_firstname'] . " " . $this->_data['user_lastname'];
            $comment['author_verified'] = $this->_data['user_verified'];
        } else {
            $comment['user_id'] = $post['page_id'];
            $comment['user_type'] = "page";
            $comment['author_picture'] = get_picture($post['page_picture'], "page");

            $comment['author_url'] = $system['system_url'] . '/pages/' . $post['page_name'];
            $comment['author_name'] = $post['page_title'];
            $comment['author_verified'] = $post['page_verified'];
        }

        //echo $comment['author_url']; exit;
        /* insert the comment */

        $insertCommentQ = sprintf("INSERT INTO global_posts_comments (node_id, node_type, user_id, user_type, text, image, voice_note, time) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($comment['node_id'], 'int'), secure($comment['node_type']), secure($comment['user_id'], 'int'), secure($comment['user_type']), secure($comment['text']), secure($comment['image']), secure($comment['voice_note']), secure($comment['time']));

        $db->query($insertCommentQ) or _error("SQL_ERROR_THROWEN");
        $comment['comment_id'] = $db->insert_id;
        /* update (post|photo|comment) (comments|replies) counter */
        switch ($handle) {
            case 'post':
                $db->query(sprintf("UPDATE global_posts SET comments = comments + 1 WHERE post_id = %s", secure($node_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'photo':
                $db->query(sprintf("UPDATE global_posts_photos SET comments = comments + 1 WHERE photo_id = %s", secure($node_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'comment':
                $db->query(sprintf("UPDATE global_posts_comments SET replies = replies + 1 WHERE comment_id = %s", secure($node_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($parent_comment['node_type'] == "post") {
                    $db->query(sprintf("UPDATE global_posts SET comments = comments + 1 WHERE post_id = %s", secure($parent_comment['node_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                } elseif ($parent_comment['node_type'] == "photo") {
                    $db->query(sprintf("UPDATE global_posts_photos SET comments = comments + 1 WHERE photo_id = %s", secure($parent_comment['node_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                break;
        }

        /* post notification */
        if ($handle == "comment") {
            $this->post_notification(array('to_user_id' => $parent_comment['author_id'], 'hub' => "GlobalHub", 'action' => 'reply', 'node_type' => $parent_comment['node_type'], 'node_url' => $parent_comment['node_id'], 'notify_id' => 'comment_' . $comment['comment_id']));
            if ($post['author_id'] != $parent_comment['author_id']) {
                $this->post_notification(array('to_user_id' => $post['author_id'], 'action' => 'comment', 'hub' => "GlobalHub", 'node_type' => $parent_comment['node_type'], 'node_url' => $parent_comment['node_id'], 'notify_id' => 'comment_' . $comment['comment_id']));
            }
        } else {
            $this->post_notification(array('to_user_id' => $post['author_id'], 'action' => 'comment', 'hub' => "GlobalHub", 'node_type' => $handle, 'node_url' => $node_id, 'notify_id' => 'comment_' . $comment['comment_id']));
        }

        /* post mention notifications if any */
        if ($handle == "comment") {
            $this->post_mentions($comment['text'], $parent_comment['node_id'], "reply_" . $parent_comment['node_type'], 'comment_' . $comment['comment_id'], array($post['author_id'], $parent_comment['author_id']));
        } else {
            $this->post_mentions($comment['text'], $node_id, "comment_" . $handle, 'comment_' . $comment['comment_id'], array($post['author_id']));
        }

        /* parse text */
        $comment['text_plain'] = htmlentities($comment['text'], ENT_QUOTES, 'utf-8');
        $comment['text'] = $this->_parse(["text" => $comment['text_plain']]);

        /* check if viewer can manage comment [Edit|Delete] */
        $comment['edit_comment'] = true;
        $comment['delete_comment'] = true;

        /* points balance */
        $this->points_balance("add", $this->_data['user_id'], "comment", $comment['comment_id']);
        $comment['parent_id'] = $node_id;
        $this->save_commentAsPost($comment);
        /* return */
        return $comment;
    }


    /*  sub post Save comment as post */
    public function save_commentAsPost($post)
    {
        $blnk = '';
        $commentId = $post['comment_id'];
        // echo "<pre>"; print_r($post['comment_id']);die;
        global $db;
        /* insert the post */
        $insertQuery = sprintf("INSERT INTO global_posts (user_id, parentId, user_type, wall_id, group_id, event_id, post_type, colored_pattern, time, location, privacy, text, feeling_action, feeling_value) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", secure($post['user_id'], 'int'), secure($post['parent_id'], 'int'), secure($post['user_type']), '0', '0', '0', secure($post['node_type']), '0', secure($post['time']), secure($blnk), secure('public'), secure($post['text']), secure($blnk), secure($blnk)); //exit;
        //    echo $insertQuery; die(" bbbbbbbbb ");
        $db->query($insertQuery) or _error("SQL_ERROR_THROWEN");
        $post['post_id'] = $db->insert_id;
        $post_id = $db->insert_id;
        $query = sprintf("UPDATE global_posts_comments SET comment_post_id = " . $post_id . " WHERE comment_id = %s", secure($commentId, 'int'));
        $db->query($query) or _error("SQL_ERROR_THROWEN");
    }

    /*  sub post Save comment as post */


    /**
     * popover
     * 
     * @param integer $id
     * @param string $type
     * @return array
     */
    public function popover($id, $type)
    { //echo $id."======type========".$type; 
        global $db;
        $profile = [];
        /* check the type to get LEFT JOIN global_profile ON global_profile.user_id = users.user_id */
        if ($type == "user") {
            /* get user info */
            $get_profile = $db->query(sprintf("SELECT * FROM users WHERE user_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($get_profile->num_rows > 0) {
                $profile = $get_profile->fetch_assoc();

                $get_gprofile = $db->query(sprintf("SELECT * FROM global_profile WHERE user_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($get_gprofile->num_rows > 0) {
                    $gprofile = $get_gprofile->fetch_assoc();
                    $profile = array_replace($profile, $profile, $gprofile);
                }
                /* get profile picture */
                $profile['user_picture'] = get_picture($profile['global_user_picture'], $profile['user_gender']);
                /* get followers count */
                $profile['followers_count'] = count($this->get_followers_ids($profile['user_id']));
                /* get mutual friends count between the viewer and the target */
                if ($this->_logged_in && $this->_data['user_id'] != $profile['user_id']) {
                    $profile['mutual_friends_count'] = $this->get_mutual_friends_count($profile['user_id']);
                }
                /* get the connection between the viewer & the target */
                if ($profile['user_id'] != $this->_data['user_id']) {
                    $profile['we_friends'] = (in_array($profile['user_id'], $this->_data['friends_ids'])) ? true : false;
                    $profile['he_request'] = (in_array($profile['user_id'], $this->_data['friend_requests_ids'])) ? true : false;
                    $profile['i_request'] = (in_array($profile['user_id'], $this->_data['friend_requests_sent_ids'])) ? true : false;
                    $profile['i_follow'] = (in_array($profile['user_id'], $this->_data['followings_ids'])) ? true : false;
                }
            }
        } else {
            /* get page info */
            $get_profile = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($get_profile->num_rows > 0) {
                $profile = $get_profile->fetch_assoc();
                $profile['page_picture'] = get_picture($profile['page_picture'], "page");
                /* check if the viewer liked the page */
                $profile['i_like'] = $this->check_page_membership($this->_data['user_id'], $id);
            }
        }
        return $profile;
    }


    private function global_check_post($id, $pass_privacy_check = false, $full_details = true)
    {
        global $db, $system;

        /* get post */
        $get_post = $db->query(sprintf("SELECT posts.*, users.user_id,users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture_id, users.user_cover, users.user_cover_id, users.global_user_picture,users.global_user_cover, users.global_user_cover_id,users.user_verified, users.user_subscribed, users.user_pinned_post, pages.*, `groups`.*, `events`.* FROM global_posts as posts LEFT JOIN users ON posts.user_id = users.user_id AND posts.user_type = 'user' LEFT JOIN pages ON posts.user_id = pages.page_id AND posts.user_type = 'page' LEFT JOIN `groups` ON posts.in_group = '1' AND posts.group_id = `groups`.group_id LEFT JOIN `events` ON posts.in_event = '1' AND posts.event_id = `events`.event_id WHERE NOT (users.user_name <=> NULL AND pages.page_name <=> NULL) AND posts.post_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");

        if ($get_post->num_rows == 0) {
            return false;
        }
        $post = $get_post->fetch_assoc();
        $post['user_picture'] = $post['global_user_picture'];

        /* -- get basic info from global_profile */
        $get_user1 = $db->query(sprintf("SELECT * FROM global_profile WHERE user_id = %s", secure($post['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_user1->num_rows > 0) {
            $data1 = $get_user1->fetch_assoc();

            $post = array_replace($post, $post, $data1);
        }
        /* -- get basic info from global_profile End */

        /* check if the page has been deleted */
        if ($post['user_type'] == "page" && !$post['page_admin']) {
            return false;
        }
        /* check if there is any blocking between the viewer & the post author */
        if ($post['user_type'] == "user" && $this->blocked($post['user_id'])) {
            return false;
        }

        /* get reactions array */
        $post['reactions']['like'] = $post['reaction_like_count'];
        $post['reactions']['love'] = $post['reaction_love_count'];
        $post['reactions']['haha'] = $post['reaction_haha_count'];
        $post['reactions']['yay'] = $post['reaction_yay_count'];
        $post['reactions']['wow'] = $post['reaction_wow_count'];
        $post['reactions']['sad'] = $post['reaction_sad_count'];
        $post['reactions']['angry'] = $post['reaction_angry_count'];
        arsort($post['reactions']);

        /* get total reactions */
        $post['reactions_total_count'] = $post['reaction_like_count'] + $post['reaction_love_count'] + $post['reaction_haha_count'] + $post['reaction_yay_count'] + $post['reaction_wow_count'] + $post['reaction_sad_count'] + $post['reaction_angry_count'];

        /* get the author */
        $post['author_id'] = ($post['user_type'] == "page") ? $post['page_admin'] : $post['user_id'];
        $post['is_page_admin'] = $this->check_page_adminship($this->_data['user_id'], $post['page_id']);
        $post['is_group_admin'] = $this->check_group_adminship($this->_data['user_id'], $post['group_id']);
        $post['is_event_admin'] = $this->check_event_adminship($this->_data['user_id'], $post['event_id']);
        $post['post_author_online'] = false;
        /* check the post author type */
        if ($post['user_type'] == "user") {
            /* user */
            if ($post['global_user_picture'] == "") {
                $post['post_author_picture'] = get_picture($post['global_user_picture'], $post['user_gender']);
                //                $checkImage = image_exist($post['post_author_picture']);
                //                if ($checkImage != '200') {
                //                    $post['post_author_picture'] = $system['system_uploads'] . '/' . $this->_data['user_picture_full'];
                //                }

                $post['post_author_picture'] = $system['system_url'] . '/includes/wallet-api/image-exist-api.php?userPicture=' . $post['post_author_picture'] . '&userPictureFull=' . $this->_data['user_picture_full'];
            } else {
                $post['post_author_picture'] = $system['system_uploads'] . '/' . $post['global_user_picture'];
            }

            $post['post_author_url'] = $system['system_url'] . '/global-profile.php?username=' . $post['user_name'];
            $post['post_author_user_name'] = $post['user_name'];
            $post['post_author_name'] = $post['user_firstname'] . " " . $post['user_lastname'];
            $post['post_author_username'] = $post['user_name'];
            $post['post_author_verified'] = $post['user_verified'];
            $post['pinned'] = ((!$post['in_group'] && !$post['in_event'] && $post['post_id'] == $post['user_pinned_post']) || ($post['in_group'] && $post['post_id'] == $post['group_pinned_post']) || ($post['in_event'] && $post['post_id'] == $post['event_pinned_post'])) ? true : false;
            if ($system['posts_online_status']) {
                /* check if the post author is online & enable the chat */
                $get_user_status = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s AND user_chat_enabled = '1' AND user_last_seen >= SUBTIME(NOW(), SEC_TO_TIME(%s))", secure($post['author_id'], 'int'), secure($system['offline_time'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_user_status->fetch_assoc()['count'] > 0) {
                    $post['post_author_online'] = true;
                }
            }
        } else {
            /* page */
            $post['post_author_picture'] = get_picture($post['page_picture'], "page");
            $post['post_author_url'] = $system['system_url'] . '/pages/' . $post['page_name'];
            $post['post_author_name'] = $post['page_title'];
            $post['post_author_verified'] = $post['page_verified'];
            $post['pinned'] = ($post['post_id'] == $post['page_pinned_post']) ? true : false;
        }
        if (!$system['posts_online_status']) {
            $post['post_author_online'] = false;
        }
        /* check if viewer can manage post [Edit|Pin|Delete] */
        $post['manage_post'] = false;
        if ($this->_logged_in) {
            /* viewer is (admins|moderators)] */
            if ($this->_data['user_group'] < 3) {
                $post['manage_post'] = true;
            }
            /* viewer is the author of post || page admin */
            if ($this->_data['user_id'] == $post['author_id']) {
                $post['manage_post'] = true;
            }
            /* viewer is the admin of the page of the post */
            if ($post['user_type'] == "page" && $post['is_page_admin']) {
                $post['manage_post'] = true;
            }
            /* viewer is the admin of the group of the post */
            if ($post['in_group'] && $post['is_group_admin']) {
                $post['manage_post'] = true;
            }
            /* viewer is the admin of the event of the post */
            if ($post['in_event'] && $post['is_event_admin']) {
                $post['manage_post'] = true;
            }
        }

        /* full details */
        if ($full_details) {
            /* check if wall post */
            if ($post['in_wall']) {
                $get_wall_user = $db->query(sprintf("SELECT user_firstname, user_lastname, user_name FROM users WHERE user_id = %s", secure($post['wall_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($get_wall_user->num_rows == 0) {
                    return false;
                }
                $get_wall_user1 = $db->query(sprintf("SELECT user_firstname, user_lastname FROM users WHERE user_id = %s", secure($post['wall_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($get_wall_user1->num_rows == 0) {
                    return false;
                }

                $wall_user = $get_wall_user->fetch_assoc();
                $wall_user_1 = $get_wall_user1->fetch_assoc();
                $post['wall_username'] = $wall_user['user_name'];
                $post['wall_fullname'] = $wall_user_1['user_firstname'] . " " . $wall_user_1['user_lastname'];
            }

            /* check if viewer [reacted|saved] this post */
            $post['i_save'] = false;
            $post['i_react'] = false;
            if ($this->_logged_in) {
                /* save */
                $check_save = $db->query(sprintf("SELECT COUNT(*) as count FROM global_posts_saved WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($check_save->fetch_assoc()['count'] > 0) {
                    $post['i_save'] = true;
                }
                /* reaction */
                if ($post['reactions_total_count'] > 0) {
                    $get_reaction = $db->query(sprintf("SELECT reaction FROM global_posts_reactions WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($get_reaction->num_rows > 0) {
                        $post['i_react'] = true;
                        $post['i_reaction'] = $get_reaction->fetch_assoc()['reaction'];
                        $post['i_reaction_details'] = get_reaction_details($post['i_reaction']);
                    }
                }
            }
        }

        /* check privacy */
        /* if post in group & (the group is public || the viewer approved member of this group) => pass privacy check */
        if ($post['in_group'] && ($post['group_privacy'] == 'public' || $this->check_group_membership($this->_data['user_id'], $post['group_id']) == 'approved')) {
            $pass_privacy_check = true;
        }
        /* if post in event & (the event is public || the viewer member of this event) => pass privacy check */
        if ($post['in_event'] && ($post['event_privacy'] == 'public' || $this->check_event_membership($this->_data['user_id'], $post['event_id']))) {
            $pass_privacy_check = true;
        }
        if ($pass_privacy_check || $this->check_privacy($post['privacy'], $post['author_id'])) {
            return $post;
        }
        return false;
    }

    /* ------------------------------- */
    /* Photos & Albums */
    /* ------------------------------- */

    /**
     * get_photos
     * 
     * @param integer $id
     * @param string $type
     * @param integer $offset
     * @param boolean $pass_check
     * @return array
     */
    public function global_get_photos($id, $type = 'user',$user_id=null, $offset = 0, $pass_check = true)
    {
        global $db, $system;
        $photos = [];
        switch ($type) {
            case 'album':
                $offset *= $system['max_results_even'];
                if (!$pass_check) {
                    /* check the album */
                    $album = $this->global_get_album($id, false);
                    if (!$album) {
                        return $photos;
                    }
                }
                // echo'<pre>'; print_r($user_id);die;
                if(!empty($user_id)){
                    $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur, posts.user_id, posts.user_type, posts.privacy FROM global_posts_photos as posts_photos INNER JOIN  global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts_photos.album_id = %s And posts.user_id= %s ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($user_id, 'int'), secure($offset, 'int', false), secure($system['max_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                }else{
                    $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur, posts.user_id, posts.user_type, posts.privacy FROM global_posts_photos as posts_photos INNER JOIN  global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts_photos.album_id = %s ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['max_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                }
                
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        /* check the photo privacy */
                        if ($photo['privacy'] == "public" || $photo['privacy'] == "custom") {
                            $photos[] = $photo;
                        } else {
                            /* check the photo privacy */
                            if ($this->check_privacy($photo['privacy'], $photo['user_id'])) {
                                $photos[] = $photo;
                            }
                        }
                    }
                }
                break;

            case 'user':
                /* get the target user's privacy */
                $get_privacy = $db->query(sprintf("SELECT user_privacy_photos FROM users WHERE user_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $privacy = $get_privacy->fetch_assoc();
                /* check the target user's privacy  */
                if (!$this->check_privacy($privacy['user_privacy_photos'], $id)) {
                    return $photos;
                }
                /* check manage photos */
                $manage_photos = false;
                if ($this->_logged_in) {
                    /* viewer is (admins|moderators)] */
                    if ($this->_data['user_group'] < 3) {
                        $manage_photos = true;
                    }
                    /* viewer is the author of photos */
                    if ($this->_data['user_id'] == $id) {
                        $manage_photos = true;
                    }
                }
                /* get all user photos (except photos from groups or events) */
                $offset *= $system['min_results_even'];
                $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur, posts.privacy FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts.user_id = %s AND posts.user_type = 'user' AND posts.in_group = '0' AND posts.in_event = '0' ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        if ($this->check_privacy($photo['privacy'], $id)) {
                            $photo['manage'] = $manage_photos;
                            $photos[] = $photo;
                        }
                    }
                }
                break;

            case 'page':
                /* check manage photos */
                $manage_photos = false;
                if ($this->_logged_in) {
                    /* viewer is (admins|moderators)] */
                    if ($this->_data['user_group'] < 3) {
                        $manage_photos = true;
                    }
                    /* viewer is the author of photos */
                    if ($this->check_page_adminship($this->_data['user_id'], $id)) {
                        $manage_photos = true;
                    }
                }
                /* get all page photos */
                $offset *= $system['min_results_even'];
                $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts.user_id = %s AND posts.user_type = 'page' ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        $photo['manage'] = $manage_photos;
                        $photos[] = $photo;
                    }
                }
                break;

            case 'group':
                if (!$pass_check) {
                    /* check if the viewer is group member (approved) */
                    if ($this->check_group_membership($this->_data['user_id'], $id) != "approved") {
                        return $photos;
                    }
                }
                /* check manage photos */
                $manage_photos = false;
                if ($this->_logged_in) {
                    /* viewer is (admins|moderators)] */
                    if ($this->_data['user_group'] < 3) {
                        $manage_photos = true;
                    }
                    /* viewer is the author of photos */
                    if ($this->check_group_adminship($this->_data['user_id'], $id)) {
                        $manage_photos = true;
                    }
                }
                /* get all group photos */
                $offset *= $system['min_results_even'];
                $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts.group_id = %s AND posts.in_group = '1' ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        $photo['manage'] = $manage_photos;
                        $photos[] = $photo;
                    }
                }
                break;

            case 'event':
                if (!$pass_check) {
                    /* check if the viewer is event member (approved) */
                    if (!$this->check_event_membership($this->_data['user_id'], $id)) {
                        return $photos;
                    }
                }
                /* check manage photos */
                $manage_photos = false;
                if ($this->_logged_in) {
                    /* viewer is (admins|moderators)] */
                    if ($this->_data['user_group'] < 3) {
                        $manage_photos = true;
                    }
                    /* viewer is the author of photos */
                    if ($this->check_event_adminship($this->_data['user_id'], $id)) {
                        $manage_photos = true;
                    }
                }
                /* get all event photos */
                $offset *= $system['min_results_even'];
                $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts.event_id = %s AND posts.in_event = '1' ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        $photo['manage'] = $manage_photos;
                        $photos[] = $photo;
                    }
                }
                break;
        }
        return $photos;
    }


    /* ------------------------------- */
    /* Comments */
    /* ------------------------------- */

    /**
     * get_comments
     * 
     * @param integer $node_id
     * @param integer $offset
     * @param boolean $is_post
     * @param boolean $pass_privacy_check
     * @param array $post
     * @param boolean $top_sorted
     * @return array
     */
    public function global_get_comments($node_id, $offset = 0, $is_post = true, $pass_privacy_check = true, $post = array(), $top_sorted = false)
    {
        global $db, $system;
        $comments = [];
        $offset *= $system['min_results'];
        $order_query = ($top_sorted) ? " ORDER BY posts_comments.reaction_like_count DESC, posts_comments.reaction_love_count DESC, posts_comments.reaction_haha_count DESC, posts_comments.reaction_yay_count DESC, posts_comments.reaction_wow_count DESC, posts_comments.reaction_sad_count DESC, posts_comments.reaction_angry_count DESC, posts_comments.replies DESC" : " ORDER BY posts_comments.comment_id DESC ";
        /* get comments */
        if ($is_post) {
            /* get post comments */
            if (!$pass_privacy_check) {
                /* (check|get) post */
                $post = $this->global_check_post($node_id, false);
                if (!$post) {
                    return false;
                }
            }
            /* get post comments */
            $getPostComment = sprintf("SELECT posts_comments.*, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture as user_picture,users.user_verified, pages.* FROM global_posts_comments as posts_comments LEFT JOIN users ON posts_comments.user_id = users.user_id AND posts_comments.user_type = 'user' LEFT JOIN pages ON posts_comments.user_id = pages.page_id AND posts_comments.user_type = 'page' WHERE NOT (users.user_name <=> NULL AND pages.page_name <=> NULL) AND posts_comments.node_type = 'post' AND posts_comments.node_id = %s " . $order_query . " LIMIT %s, %s", secure($node_id, 'int'), secure($offset, 'int', false), secure($system['min_results'], 'int', false));
            $get_comments = $db->query($getPostComment) or _error("SQL_ERROR_THROWEN");
        } else {
            /* get photo comments */
            /* check privacy */
            if (!$pass_privacy_check) {
                /* (check|get) photo */
                $photo = $this->global_get_photo($node_id);
                if (!$photo) {
                    _error(403);
                }
                $post = $photo['post'];
            }
            /* get photo comments */
            $getPostComment = sprintf("SELECT posts_comments.*, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture, users.user_verified, pages.* FROM global_posts_comments as posts_comments LEFT JOIN users ON posts_comments.user_id = users.user_id AND posts_comments.user_type = 'user' LEFT JOIN pages ON posts_comments.user_id = pages.page_id AND posts_comments.user_type = 'page' WHERE NOT (users.user_name <=> NULL AND pages.page_name <=> NULL) AND posts_comments.node_type = 'photo' AND posts_comments.node_id = %s " . $order_query . " LIMIT %s, %s", secure($node_id, 'int'), secure($offset, 'int', false), secure($system['min_results'], 'int', false));
            $get_comments = $db->query($getPostComment) or _error("SQL_ERROR_THROWEN");
        }
        if ($get_comments->num_rows == 0) {
            return $comments;
        }
        while ($comment = $get_comments->fetch_assoc()) {

            $comment['user_picture'] = $comment['global_user_picture'];
            /* pass comments_disabled from post to comment */
            $comment['comments_disabled'] = $post['comments_disabled'];

            /* check if the page has been deleted */
            if ($comment['user_type'] == "page" && !$comment['page_admin']) {
                continue;
            }
            /* check if there is any blocking between the viewer & the comment author */
            if ($comment['user_type'] == "user" && $this->blocked($comment['user_id'])) {
                continue;
            }
            //echo "<pre>".$comment['user_picture'];print_r($comment); exit;
            /* get reactions array */
            $comment['reactions']['like'] = $comment['reaction_like_count'];
            $comment['reactions']['love'] = $comment['reaction_love_count'];
            $comment['reactions']['haha'] = $comment['reaction_haha_count'];
            $comment['reactions']['yay'] = $comment['reaction_yay_count'];
            $comment['reactions']['wow'] = $comment['reaction_wow_count'];
            $comment['reactions']['sad'] = $comment['reaction_sad_count'];
            $comment['reactions']['angry'] = $comment['reaction_angry_count'];
            arsort($comment['reactions']);

            /* get total reactions */
            $comment['reactions_total_count'] = $comment['reaction_like_count'] + $comment['reaction_love_count'] + $comment['reaction_haha_count'] + $comment['reaction_yay_count'] + $comment['reaction_wow_count'] + $comment['reaction_sad_count'] + $comment['reaction_angry_count'];

            /* get replies */
            if ($comment['replies'] > 0) {
                $comment['comment_replies'] = $this->global_get_replies($comment['comment_id'], 0, true, $post);
            }

            /* parse text */
            $comment['text_plain'] = $comment['text'];
            $comment['text'] = $this->_parse(["text" => $comment['text']]);

            /* get the comment author */
            if ($comment['user_type'] == "user") {
                /* user type */
                $comment['author_id'] = $comment['user_id'];

                $comment['author_picture'] = get_picture($comment['global_user_picture'], $comment['user_gender']);

                $comment['author_url'] = $system['system_url'] . '/global-profile.php?username=' . $comment['user_name'];

                $comment['author_name'] = $comment['user_firstname'] . " " . $comment['user_lastname'];
                $comment['author_verified'] = $comment['user_verified'];
            } else {
                /* page type */
                $comment['author_id'] = $comment['page_admin'];
                $comment['author_picture'] = get_picture($comment['page_picture'], "page");

                $comment['author_url'] = $system['system_url'] . '/pages/' . $comment['page_name'];

                $comment['author_name'] = $comment['page_title'];
                $comment['author_verified'] = $comment['page_verified'];
            }

            /* check if viewer user react this comment */
            $comment['i_react'] = false;
            if ($this->_logged_in) {
                /* reaction */
                if ($comment['reactions_total_count'] > 0) {
                    $get_reaction = $db->query(sprintf("SELECT reaction FROM   global_posts_comments_reactions as posts_comments_reactions WHERE user_id = %s AND comment_id = %s", secure($this->_data['user_id'], 'int'), secure($comment['comment_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($get_reaction->num_rows > 0) {
                        $comment['i_react'] = true;
                        $comment['i_reaction'] = $get_reaction->fetch_assoc()['reaction'];
                        $comment['i_reaction_details'] = get_reaction_details($comment['i_reaction']);
                    }
                }
            }

            /* check if viewer can manage comment [Edit|Delete] */
            $comment['edit_comment'] = false;
            $comment['delete_comment'] = false;
            if ($this->_logged_in) {
                /* viewer is (admins|moderators)] */
                if ($this->_data['user_group'] < 3) {
                    $comment['edit_comment'] = true;
                    $comment['delete_comment'] = true;
                }
                /* viewer is the author of comment */
                if ($this->_data['user_id'] == $comment['author_id']) {
                    $comment['edit_comment'] = true;
                    $comment['delete_comment'] = true;
                }
                /* viewer is the author of post || page admin */
                if ($this->_data['user_id'] == $post['author_id']) {
                    $comment['delete_comment'] = true;
                }
                /* viewer is the admin of the group of the post */
                if ($post['in_group'] && $post['is_group_admin']) {
                    $comment['delete_comment'] = true;
                }
                /* viewer is the admin of the event of the post */
                if ($post['in_group'] && $post['is_event_admin']) {
                    $comment['delete_comment'] = true;
                }
            }

            $comments[] = $comment;
        }
        return $comments;
    }

    public function global_get_photo($photo_id, $full_details = false, $get_gallery = false, $context = 'photos')
    {
        global $db, $system;

        /* get photo */
        $get_photo = $db->query(sprintf("SELECT * FROM global_posts_photos as posts_photos WHERE photo_id = %s", secure($photo_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_photo->num_rows == 0) {
            return false;
        }
        $photo = $get_photo->fetch_assoc();

        /* get post */
        $post = $this->global_check_post($photo['post_id'], false, $full_details);
        if (!$post) {
            return false;
        }

        /* check if photo can be deleted */
        if ($post['in_group']) {
            /* check if (cover|profile) photo */
            $photo['can_delete'] = (($photo_id == $post['group_picture_id']) or ($photo_id == $post['group_cover_id'])) ? false : true;
        } elseif ($post['in_event']) {
            /* check if (cover) photo */
            $photo['can_delete'] = (($photo_id == $post['event_cover_id'])) ? false : true;
        } elseif ($post['user_type'] == "user") {
            /* check if (cover|profile) photo */
            $photo['can_delete'] = (($photo_id == $post['user_picture_id']) or ($photo_id == $post['user_cover_id'])) ? false : true;
        } elseif ($post['user_type'] == "page") {
            /* check if (cover|profile) photo */
            $photo['can_delete'] = (($photo_id == $post['page_picture_id']) or ($photo_id == $post['page_cover_id'])) ? false : true;
        }

        /* check photo type [single|mutiple] */
        $check_single = $db->query(sprintf("SELECT COUNT(*) as count FROM global_posts_photos as posts_photos WHERE post_id = %s", secure($photo['post_id'], 'int')))  or _error("SQL_ERROR_THROWEN");
        $photo['is_single'] = ($check_single->fetch_assoc()['count'] > 1) ? false : true;

        /* get reactions */
        if ($photo['is_single']) {
            /* [Case: 1] single photo => get (reactions) of post */

            /* get reactions array */
            $photo['reactions'] = $post['reactions'];

            /* get total reactions */
            $photo['reactions_total_count'] = $post['reactions_total_count'];

            /* check if viewer [reacted] this post */
            $photo['i_react'] = $post['i_react'];
            $photo['i_reaction'] = $post['i_reaction'];
            $photo['i_reaction_details'] = $post['i_reaction_details'];
        } else {
            /* [Case: 2] mutiple photo => get (reactions) of photo */

            /* get reactions array */
            $photo['reactions']['like'] = $photo['reaction_like_count'];
            $photo['reactions']['love'] = $photo['reaction_love_count'];
            $photo['reactions']['haha'] = $photo['reaction_haha_count'];
            $photo['reactions']['yay'] = $photo['reaction_yay_count'];
            $photo['reactions']['wow'] = $photo['reaction_wow_count'];
            $photo['reactions']['sad'] = $photo['reaction_sad_count'];
            $photo['reactions']['angry'] = $photo['reaction_angry_count'];
            arsort($photo['reactions']);

            /* get total reactions */
            $photo['reactions_total_count'] = $photo['reaction_like_count'] + $photo['reaction_love_count'] + $photo['reaction_haha_count'] + $photo['reaction_yay_count'] + $photo['reaction_wow_count'] + $photo['reaction_sad_count'] + $photo['reaction_angry_count'];

            /* check if viewer [reacted] this photo */
            $photo['i_react'] = false;
            if ($this->_logged_in) {
                /* reaction */
                $get_reaction = $db->query(sprintf("SELECT reaction FROM global_posts_photos_reactions as posts_photos_reactions WHERE user_id = %s AND photo_id = %s", secure($this->_data['user_id'], 'int'), secure($photo['photo_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($get_reaction->num_rows > 0) {
                    $photo['i_react'] = true;
                    $photo['i_reaction'] = $get_reaction->fetch_assoc()['reaction'];
                    $photo['i_reaction_details'] = get_reaction_details($photo['i_reaction']);
                }
            }
        }

        /* get full details (comments) */
        if ($full_details) {
            if ($photo['is_single']) {
                /* [Case: 1] single photo => get (comments) of post */

                /* get post comments */
                if ($post['comments'] > 0) {
                    $post['post_comments'] = $this->global_get_comments($post['post_id'], 0, true, true, $post);
                }
            } else {
                /* [Case: 2] mutiple photo => get (comments) of photo */

                /* get photo comments */
                if ($photo['comments'] > 0) {
                    $photo['photo_comments'] = $this->global_get_comments($photo['photo_id'], 0, false, true, $post);
                }
            }
        }

        /* get gallery */
        if ($get_gallery) {
            switch ($context) {
                case 'post':
                    $get_post_photos = $db->query(sprintf("SELECT photo_id, source FROM global_posts_photos as posts_photos WHERE post_id = %s ORDER BY photo_id ASC", secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    while ($post_photo = $get_post_photos->fetch_assoc()) {
                        $post_photos[$post_photo['photo_id']] = $post_photo;
                    }
                    $photo['next'] = $post_photos[get_array_key($post_photos, $photo['photo_id'], 1)];
                    $photo['prev'] = $post_photos[get_array_key($post_photos, $photo['photo_id'], -1)];
                    break;

                case 'album':
                    $get_album_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts.user_id, posts.privacy FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts_photos.album_id = %s", secure($photo['album_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    while ($album_photo = $get_album_photos->fetch_assoc()) {
                        /* check the photo privacy */
                        if ($album_photo['privacy'] == "public" || $album_photo['privacy'] == "custom") {
                            $album_photos[$album_photo['photo_id']] = $album_photo;
                        } else {
                            /* check the photo privacy */
                            if ($this->check_privacy($album_photo['privacy'], $album_photo['user_id'])) {
                                $album_photos[$album_photo['photo_id']] = $album_photo;
                            }
                        }
                    }
                    $photo['next'] = ($post['is_anonymous']) ? null : $album_photos[get_array_key($album_photos, $photo['photo_id'], -1)];
                    $photo['prev'] = ($post['is_anonymous']) ? null : $album_photos[get_array_key($album_photos, $photo['photo_id'], 1)];
                    break;

                case 'photos':
                    if ($post['in_group']) {
                        $get_target_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts.user_id, posts.privacy FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts.in_group = '1' AND posts.group_id = %s", secure($post['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    } elseif ($post['in_event']) {
                        $get_target_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts.user_id, posts.privacy FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts.in_event = '1' AND posts.event_id = %s", secure($post['event_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    } elseif ($post['user_type'] == "page") {
                        $get_target_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts.user_id, posts.privacy FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts.user_type = 'page' AND posts.user_id = %s", secure($post['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    } elseif ($post['user_type'] == "user") {
                        $get_target_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts.user_id, posts.privacy FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts.user_type = 'user' AND posts.user_id = %s", secure($post['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    }
                    while ($target_photo = $get_target_photos->fetch_assoc()) {
                        /* check the photo privacy */
                        if ($target_photo['privacy'] == "public" || $target_photo['privacy'] == "custom") {
                            $target_photos[$target_photo['photo_id']] = $target_photo;
                        } else {
                            /* check the photo privacy */
                            if ($this->check_privacy($target_photo['privacy'], $target_photo['user_id'])) {
                                $target_photos[$target_photo['photo_id']] = $target_photo;
                            }
                        }
                    }
                    $photo['next'] = $target_photos[get_array_key($target_photos, $photo['photo_id'], -1)];
                    $photo['prev'] = $target_photos[get_array_key($target_photos, $photo['photo_id'], 1)];
                    break;
            }
        }

        /* og-meta tags */
        $photo['og_title'] = $post['post_author_name'];
        $photo['og_title'] .= ($post['text'] != "") ? " - " . $post['text'] : "";
        $photo['og_description'] = $post['text'];
        $photo['og_image'] = $system['system_uploads'] . '/' . $photo['source'];

        /* return post array with photo */
        $photo['post'] = $post;
        return $photo;
    }

    /**
     * get_albums
     * 
     * @param integer $user_id
     * @param string $type
     * @param integer $offset
     * @return array
     */
    public function global_get_albums($id, $type = 'user', $offset = 0)
    {
        global $db, $system;
        /* initialize vars */
        $albums = [];
        $offset *= $system['max_results_even'];
        switch ($type) {
            case 'user':
                $userquery = sprintf("SELECT album_id FROM global_posts_photos_albums as posts_photos_albums WHERE user_type = 'user' AND user_id = %s AND in_group = '0' AND in_event = '0' LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['max_results_even'], 'int', false));
                $get_albums = $db->query($userquery) or _error("SQL_ERROR_THROWEN");
                break;

            case 'page':
                $get_albums = $db->query(sprintf("SELECT album_id FROM global_posts_photos_albums as posts_photos_albums WHERE user_type = 'page' AND user_id = %s LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['max_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'group':
                $get_albums = $db->query(sprintf("SELECT album_id FROM global_posts_photos_albums as posts_photos_albums WHERE in_group = '1' AND group_id = %s LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['max_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'event':
                $get_albums = $db->query(sprintf("SELECT album_id FROM global_posts_photos_albums as posts_photos_albums WHERE in_event = '1' AND event_id = %s LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['max_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                break;
        }
        if ($get_albums->num_rows > 0) {
            while ($album = $get_albums->fetch_assoc()) {
                $album = $this->get_album($album['album_id'], false); /* $full_details = false */
                if ($album) {
                    $albums[] = $album;
                }
            }
        }
        return $albums;
    }


    /**
     * get_album
     * 
     * @param integer $album_id
     * @param boolean $full_details
     * @return array
     */
    public function global_get_album($album_id, $full_details = true)
    {   
        global $db, $system;
        $get_album = $db->query(sprintf("SELECT posts_photos_albums.*, users.user_name, users.user_album_pictures, users.user_album_covers, users.user_album_timeline, pages.page_id, pages.page_name, pages.page_admin, pages.page_album_pictures, pages.page_album_covers, pages.page_album_timeline, `groups`.group_name, `groups`.group_admin, `groups`.group_album_pictures, `groups`.group_album_covers, `groups`.group_album_timeline, `events`.event_admin, `events`.event_album_covers, `events`.event_album_timeline FROM global_posts_photos_albums as posts_photos_albums LEFT JOIN users ON posts_photos_albums.user_id = users.user_id AND posts_photos_albums.user_type = 'user' LEFT JOIN pages ON posts_photos_albums.user_id = pages.page_id AND posts_photos_albums.user_type = 'page' LEFT JOIN `groups` ON posts_photos_albums.in_group = '1' AND posts_photos_albums.group_id = `groups`.group_id LEFT JOIN `events` ON posts_photos_albums.in_event = '1' AND posts_photos_albums.event_id = `events`.event_id WHERE NOT (users.user_name <=> NULL AND pages.page_name <=> NULL) AND posts_photos_albums.album_id = %s", secure($album_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_album->num_rows == 0) {
            return false;
        }
        $album = $get_album->fetch_assoc();
        /* get the author */
        $album['author_id'] = ($album['user_type'] == "page") ? $album['page_admin'] : $album['user_id'];
        /* check the album privacy  */
        /* if album in group & (the group is public || the viewer approved member of this group) => pass privacy check */
        if ($album['in_group'] && ($album['group_privacy'] == 'public' || $this->check_group_membership($this->_data['user_id'], $album['group_id']) == 'approved')) {
            $pass_privacy_check = true;
        }
        /* if album in event & (the event is public || the viewer member of this event) => pass privacy check */
        if ($album['in_event'] && ($album['event_privacy'] == 'public' || $this->check_event_membership($this->_data['user_id'], $album['event_id']))) {
            $pass_privacy_check = true;
        }
        if (!$pass_privacy_check) {
            if (!$this->check_privacy($album['privacy'], $album['author_id'])) {
                return false;
            }
        }
        /* get album path */
        if ($album['in_group']) {
            $album['path'] = 'groups/' . $album['group_name'];
            /* check if (cover|profile|timeline) album */
            $album['can_delete'] = (($album_id == $album['group_album_pictures']) or ($album_id == $album['group_album_covers']) or ($album_id == $album['group_album_timeline'])) ? false : true;
        } elseif ($album['in_event']) {
            $album['path'] = 'events/' . $album['event_id'];
            /* check if (cover|profile|timeline) album */
            $album['can_delete'] = (($album_id == $album['event_album_pictures']) or ($album_id == $album['event_album_covers']) or ($album_id == $album['event_album_timeline'])) ? false : true;
        } elseif ($album['user_type'] == "user") {
            $album['path'] = $album['user_name'];
            /* check if (cover|profile|timeline) album */
            $album['can_delete'] = (($album_id == $album['user_album_pictures']) or ($album_id == $album['user_album_covers']) or ($album_id == $album['user_album_timeline'])) ? false : true;
        } elseif ($album['user_type'] == "page") {
            $album['path'] = 'pages/' . $album['page_name'];
            /* check if (cover|profile|timeline) album */
            $album['can_delete'] = (($album_id == $album['user_album_timeline']) or ($album_id == $album['page_album_covers']) or ($album_id == $album['page_album_timeline'])) ? false : true;
        }
        /* get album cover photo */
        $where_statement = ($album['user_type'] == "user" && !$album['in_group'] && !$album['in_event']) ? "posts.privacy = 'public' AND" : '';
        $get_cover = $db->query(sprintf("SELECT source, blur FROM posts_photos INNER JOIN posts ON posts_photos.post_id = posts.post_id WHERE " . $where_statement . " posts_photos.album_id = %s ORDER BY photo_id DESC LIMIT 1", secure($album_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_cover->num_rows == 0) {
            $album['cover']['source'] = $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/blank_album.jpg';
            $album['cover']['blur'] = 0;
        } else {
            $cover = $get_cover->fetch_assoc();
            $album['cover']['source'] = $system['system_uploads'] . '/' . $cover['source'];
            $album['cover']['blur'] = $cover['blur'];
        }
        /* get album total photos count */
        $get_album_photos_count = $db->query(sprintf("SELECT COUNT(*) as count FROM global_posts_photos WHERE album_id = %s", secure($album_id, 'int'))) or _error("SQL_ERROR");
        $album['photos_count'] = $get_album_photos_count->fetch_assoc()['count'];
        /* check if viewer can manage album [Edit|Update|Delete] */
        $album['is_page_admin'] = $this->check_page_adminship($this->_data['user_id'], $album['page_id']);
        $album['is_group_admin'] = $this->check_group_adminship($this->_data['user_id'], $album['group_id']);
        $album['is_event_admin'] = $this->check_event_adminship($this->_data['user_id'], $album['event_id']);
        /* check if viewer can manage album [Edit|Update|Delete] */
        $album['manage_album'] = false;
        if ($this->_logged_in) {
            /* viewer is (admins|moderators)] */
            if ($this->_data['user_group'] < 3) {
                $album['manage_album'] = true;
            }
            /* viewer is the author of post */
            if ($this->_data['user_id'] == $album['author_id']) {
                $album['manage_album'] = true;
            }
            /* viewer is the admin of the page */
            if ($album['user_type'] == "page" && $album['is_page_admin']) {
                $album['manage_album'] = true;
            }
            /*
            /* viewer is the admin of the group */
            if ($album['in_group'] && $album['is_group_admin']) {
                $album['manage_album'] = true;
            }
            /* viewer is the admin of the event */
            if ($album['in_event'] && $album['is_event_admin']) {
                $album['manage_album'] = true;
            }
        }
        /* get album photos */
        if ($full_details) {
            $album['photos'] = $this->global_get_photos($album_id, 'album',$album['author_id']);
        }
        return $album;
    }


    /**
     * react_post
     * 
     * @param integer $post_id
     * @param string $reaction
     * @return void
     */
    public function global_react_post($post_id, $reaction)
    {
        global $db, $date;
        /* check reation */
        if (!in_array($reaction, ['like', 'love', 'haha', 'yay', 'wow', 'sad', 'angry'])) {
            _error(403);
        }
        /* (check|get) post */
        $post = $this->global_check_post($post_id);
        if (!$post) {
            _error(403);
        }
        /* check blocking */
        if ($this->blocked($post['author_id'])) {
            _error(403);
        }
        /* react the post */
        if ($post['i_react']) {
            /* remove any previous reaction */
            $db->query(sprintf("DELETE FROM global_posts_reactions WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* update post reaction counter */
            $reaction_field = "reaction_" . $post['i_reaction'] . "_count";
            $db->query(sprintf("UPDATE global_posts SET $reaction_field = IF($reaction_field=0,0,$reaction_field-1) WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* delete notification */
            $this->delete_notification($post['author_id'], 'react_' . $post['i_reaction'], 'post', $post_id);
            /* points balance */
            $this->points_balance("delete", $this->_data['user_id'], "posts_reactions");
        } else {
            $db->query(sprintf("INSERT INTO global_posts_reactions (user_id, post_id, reaction, reaction_time) VALUES (%s, %s, %s, %s)", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'), secure($reaction), secure($date))) or _error("SQL_ERROR_THROWEN");
            $reaction_id = $db->insert_id;
            /* update post reaction counter */
            $reaction_field = "reaction_" . $reaction . "_count";
            $db->query(sprintf("UPDATE global_posts SET $reaction_field = $reaction_field + 1 WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* post notification */
            $this->post_notification(array('to_user_id' => $post['author_id'], 'action' => 'react_' . $reaction, 'hub' => "GlobalHub", 'node_type' => 'post', 'node_url' => $post_id));
            /* points balance */
            $this->points_balance("add", $this->_data['user_id'], "posts_reactions", $reaction_id);
        }
    }


    /**
     * unreact_post
     * 
     * @param integer $post_id
     * @param string $reaction
     * @return void
     */
    public function global_unreact_post($post_id, $reaction)
    {
        global $db;
        /* check reation */
        if (!in_array($reaction, ['like', 'love', 'haha', 'yay', 'wow', 'sad', 'angry'])) {
            _error(403);
        }
        /* (check|get) post */
        $post = $this->global_check_post($post_id);
        if (!$post) {
            _error(403);
        }
        /* check blocking */
        if ($this->blocked($post['author_id'])) {
            _error(403);
        }
        /* unreact the post */
        if ($post['i_react']) {
            $db->query(sprintf("DELETE FROM global_posts_reactions WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* update post reaction counter */
            $reaction_field = "reaction_" . $post['i_reaction'] . "_count";
            $db->query(sprintf("UPDATE global_posts SET $reaction_field = IF($reaction_field=0,0,$reaction_field-1) WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* delete notification */
            $this->delete_notification($post['author_id'], 'react_' . $post['i_reaction'], 'post', $post_id);
            /* points balance */
            $this->points_balance("delete", $this->_data['user_id'], "posts_reactions");
        }
    }


    /**
     * boost_post
     * 
     * @param integer $post_id
     * @return void
     */
    public function global_boost_post($post_id)
    {
        global $db;
        /* (check|get) post */
        $post = $this->global_check_post($post_id);
        if (!$post) {
            _error(403);
        }
        /* check if viewer can edit post */
        if (!$post['manage_post']) {
            _error(403);
        }
        /* check if viewer can boost post */
        if (!$this->_data['can_boost_posts']) {
            modal("MESSAGE", __("Sorry"), __("You reached the maximum number of boosted posts! Upgrade your package to get more"));
        }
        /* check if the post in_group or in_event */
        if ($post['in_group'] || $post['in_event']) {
            throw new Exception(__("You can't boost a post from a group or event"));
        }
        /* boost post */
        if (!$post['boosted']) {
            /* boost post */
            $db->query(sprintf("UPDATE posts SET boosted = '1', boosted_by = %s WHERE post_id = %s", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* update user */
            $db->query(sprintf("UPDATE users SET user_boosted_posts = user_boosted_posts + 1 WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        }
    }


    /**
     * unboost_post
     * 
     * @param integer $post_id
     * @return void
     */
    public function global_unboost_post($post_id)
    {
        global $db;
        /* (check|get) post */
        $post = $this->global_check_post($post_id);
        if (!$post) {
            _error(403);
        }
        /* check if viewer can edit post */
        if (!$post['manage_post']) {
            _error(403);
        }
        /* unboost post */
        if ($post['boosted']) {
            /* unboost post */
            $db->query(sprintf("UPDATE posts SET boosted = '0', boosted_by = NULL WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* update user */
            $db->query(sprintf("UPDATE users SET user_boosted_posts = IF(user_boosted_posts=0,0,user_boosted_posts-1) WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        }
    }


    /**
     * react_photo
     * 
     * @param integer $photo_id
     * @param string $reaction
     * @return void
     */
    public function global_react_photo($photo_id, $reaction)
    {
        global $db, $date;
        /* check reation */
        if (!in_array($reaction, ['like', 'love', 'haha', 'yay', 'wow', 'sad', 'angry'])) {
            _error(403);
        }
        /* (check|get) photo */
        $photo = $this->global_get_photo($photo_id);
        if (!$photo) {
            _error(403);
        }
        $post = $photo['post'];
        /* check blocking */
        if ($this->blocked($post['author_id'])) {
            _error(403);
        }

        /* reaction the post */
        if ($photo['i_react']) {
            /* remove any previous reaction */
            $db->query(sprintf("DELETE FROM global_posts_photos_reactions WHERE user_id = %s AND photo_id = %s", secure($this->_data['user_id'], 'int'), secure($photo_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* update photo reaction counter */
            $reaction_field = "reaction_" . $photo['i_reaction'] . "_count";
            $db->query(sprintf("UPDATE global_posts_photos SET $reaction_field = IF($reaction_field=0,0,$reaction_field-1) WHERE photo_id = %s", secure($photo_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* delete notification */
            $this->delete_notification($post['author_id'], 'react_' . $photo['i_reaction'], 'photo', $photo_id);
        }
        $db->query(sprintf("INSERT INTO global_posts_photos_reactions (user_id, photo_id, reaction, reaction_time) VALUES (%s, %s, %s, %s)", secure($this->_data['user_id'], 'int'), secure($photo_id, 'int'), secure($reaction), secure($date))) or _error("SQL_ERROR_THROWEN");
        $reaction_id = $db->insert_id;
        /* update photo reaction counter */
        $reaction_field = "reaction_" . $reaction . "_count";
        $db->query(sprintf("UPDATE global_posts_photos SET $reaction_field = $reaction_field + 1 WHERE photo_id = %s", secure($photo_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* post notification */
        $this->post_notification(array('to_user_id' => $post['author_id'], 'action' => 'react_' . $reaction, 'hub' => "LocalHub", 'node_type' => 'photo', 'node_url' => $photo_id));
        /* points balance */
        $this->points_balance("add", $this->_data['user_id'], "global_posts_photos_reactions", $reaction_id);
    }


    /**
     * unreact_photo
     * 
     * @param integer $photo_id
     * @param string $reaction
     * @return void
     */
    public function global_unreact_photo($photo_id, $reaction)
    {
        global $db;
        /* (check|get) photo */
        $photo = $this->global_get_photo($photo_id);
        if (!$photo) {
            _error(403);
        }
        $post = $photo['post'];
        /* unreact the photo */
        $db->query(sprintf("DELETE FROM global_posts_photos_reactions WHERE user_id = %s AND photo_id = %s", secure($this->_data['user_id'], 'int'), secure($photo_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* update photo reaction counter */
        $reaction_field = "reaction_" . $photo['i_reaction'] . "_count";
        $db->query(sprintf("UPDATE global_posts_photos SET $reaction_field = IF($reaction_field=0,0,$reaction_field-1) WHERE photo_id = %s", secure($photo_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* delete notification */
        $this->delete_notification($post['author_id'], 'react_' . $reaction, 'photo', $photo_id);
        /* points balance */
        $this->points_balance("delete", $this->_data['user_id'], "global_posts_photos_reactions");
    }

    /* ------------------------------- */
    /* Search */
    /* ------------------------------- */

    /**
     * search
     * 
     * @param string $query
     * @return array
     */
    public function global_search($query)
    {
        global $db, $system;
        $results = [];
        $offset *= $system['max_results'];
        /* search posts */
        $posts = $this->global_profile_get_posts(array('query' => $query));
        if (count($posts) > 0) {
            $results['posts'] = $posts;
        }

        /* search articles */
        if ($system['blogs_enabled']) {
            $get_articles = $db->query(sprintf('SELECT post_id FROM posts_articles WHERE title LIKE %1$s OR text LIKE %1$s OR tags LIKE %1$s ORDER BY title ASC LIMIT %2$s, %3$s', secure($query, 'search'), secure($offset, 'int', false), secure($system['max_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
            if ($get_articles->num_rows > 0) {
                while ($article = $get_articles->fetch_assoc()) {
                    $article = $this->global_profile_get_posts($article['post_id']);
                    if ($article) {
                        $results['articles'][] = $article;
                    }
                }
            }
        }
        /* search users */
        $get_users = $db->query(sprintf('SELECT users.user_id, users.user_name, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, user_picture, global_user_picture,user_subscribed, user_verified FROM users LEFT JOIN global_profile ON global_profile.user_id = users.user_id WHERE users.user_name LIKE %1$s OR global_profile.user_firstname LIKE %1$s OR global_profile.user_lastname LIKE %1$s OR CONCAT(global_profile.user_firstname,  " ", global_profile.user_lastname) LIKE %1$s ORDER BY global_profile.user_firstname ASC LIMIT %2$s, %3$s', secure($query, 'search'), secure($offset, 'int', false), secure($system['max_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
        if ($get_users->num_rows > 0) {
            while ($user = $get_users->fetch_assoc()) {
                $user['user_picture'] = get_picture($user['global_user_picture'], $user['user_gender']);
                /* get the connection between the viewer & the target */
                $user['connection'] = $this->connection($user['user_id']);
                if ($user['user_firstname'] != "") {
                    $results['users'][] = $user;
                }
            }
        }
        /* search pages */
        if ($system['pages_enabled']) {
            $get_pages = $db->query(sprintf('SELECT * FROM pages WHERE page_name LIKE %1$s OR page_title LIKE %1$s ORDER BY page_title ASC LIMIT %2$s, %3$s', secure($query, 'search'), secure($offset, 'int', false), secure($system['max_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
            if ($get_pages->num_rows > 0) {
                while ($page = $get_pages->fetch_assoc()) {
                    $page['page_picture'] = get_picture($page['page_picture'], 'page');
                    /* check if the viewer liked the page */
                    $page['i_like'] = $this->check_page_membership($this->_data['user_id'], $page['page_id']);
                    $results['pages'][] = $page;
                }
            }
        }
        /* search groups */
        if ($system['groups_enabled']) {
            $get_groups = $db->query(sprintf('SELECT * FROM `groups` WHERE group_privacy != "secret" AND (group_name LIKE %1$s OR group_title LIKE %1$s) ORDER BY group_title ASC LIMIT %2$s, %3$s', secure($query, 'search'), secure($offset, 'int', false), secure($system['max_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
            if ($get_groups->num_rows > 0) {
                while ($group = $get_groups->fetch_assoc()) {
                    $group['group_picture'] = get_picture($group['group_picture'], 'group');
                    /* check if the viewer joined the group */
                    $group['i_joined'] = $this->check_group_membership($this->_data['user_id'], $group['group_id']);
                    $results['groups'][] = $group;
                }
            }
        }
        /* search events */
        if ($system['events_enabled']) {
            $get_events = $db->query(sprintf('SELECT * FROM `events` WHERE event_privacy != "secret" AND event_title LIKE %1$s ORDER BY event_title ASC LIMIT %2$s, %3$s', secure($query, 'search'), secure($offset, 'int', false), secure($system['max_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
            if ($get_events->num_rows > 0) {
                while ($event = $get_events->fetch_assoc()) {
                    $event['event_picture'] = get_picture($event['event_cover'], 'event');
                    /* check if the viewer joined the event */
                    $event['i_joined'] = $this->check_event_membership($this->_data['user_id'], $event['event_id']);
                    $results['events'][] = $event;
                }
            }
        }
        //echo "<pre>";print_r($results); exit;
        return $results;
    }

    /**
     * get_users
     * 
     * @param string $query
     * @param array $skipped_array
     * @param boolean $mentioned
     * @return array
     */
    public function get_global_users($query, $skipped_array = array(), $mentioned = false)
    {
        global $db, $system;
        $users = [];
        if ($skipped_array) {
            /* make a skipped list (including the viewer) */
            $skipped_list = implode(',', $skipped_array);
            /* get users */
            //$getUserQuery = sprintf('SELECT user_id, user_name, user_firstname, user_lastname, user_gender, user_picture, user_subscribed, user_verified FROM users WHERE user_id != %1$s AND user_id NOT IN (%2$s) AND (user_name LIKE %3$s OR user_firstname LIKE %3$s OR user_lastname LIKE %3$s OR CONCAT(user_firstname,  " ", user_lastname) LIKE %3$s) ORDER BY user_firstname ASC LIMIT %4$s', secure($this->_data['user_id'], 'int'), $skipped_list, secure($query, 'search'), secure($system['min_results'], 'int', false) );
            $getUserQuery = sprintf('SELECT users.user_id, users.user_name, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, user_picture, global_user_picture,user_subscribed, user_verified FROM users LEFT JOIN global_profile ON global_profile.user_id = users.user_id WHERE global_profile.user_firstname !="" and global_profile.user_lastname !="" and global_user_picture !="" and users.user_name LIKE %1$s OR global_profile.user_firstname LIKE %1$s OR global_profile.user_lastname LIKE %1$s OR CONCAT(global_profile.user_firstname,  " ", global_profile.user_lastname) LIKE %1$s ORDER BY global_profile.user_firstname ASC LIMIT %2$s', secure($query, 'search'), secure($system['min_results'], 'int', false));
        } else {
            /* get users */
            $getUserQuery = sprintf('SELECT users.user_id, users.user_name, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, user_picture, global_user_picture,user_subscribed, user_verified FROM users LEFT JOIN global_profile ON global_profile.user_id = users.user_id WHERE global_profile.user_firstname !="" and global_profile.user_lastname !="" and global_user_picture !="" and users.user_name LIKE %1$s OR global_profile.user_firstname LIKE %1$s OR global_profile.user_lastname LIKE %1$s OR CONCAT(global_profile.user_firstname,  " ", global_profile.user_lastname) LIKE %1$s ORDER BY global_profile.user_firstname ASC LIMIT %2$s', secure($query, 'search'), secure($system['min_results'], 'int', false));
        }
        //echo $getUserQuery;
        $get_users = $db->query($getUserQuery) or _error("SQL_ERROR_THROWEN");
        if ($get_users->num_rows > 0) {
            while ($user = $get_users->fetch_assoc()) {
                /* check if there is any blocking between the viewer & the target user */
                if ($this->blocked($user['user_id'])) {
                    continue;
                }
                $user['user_picture'] = get_picture($user['global_user_picture'], $user['user_gender']);
                if ($mentioned) {
                    $fullName = $user['user_firstname'] . " " . $user['user_lastname'];
                    if ($user['user_firstname'] != "" && $user['user_lastname']) {
                        $mention_item['id'] = $user['user_id'];
                        $mention_item['img'] = $user['user_picture'];
                        $mention_item['getUserQuery'] = $getUserQuery;
                        $mention_item['label'] = $fullName;
                        $mention_item['value'] = "[" . $user['user_name'] . "]";
                        $users[] = $mention_item;
                    }
                } else {
                    $users[] = $user;
                }
            }
        }
        return $users;
    }

    /**
     * search_quick
     * 
     * @param string $query
     * @return array
     */
    public function global_search_quick($query)
    {
        global $db, $system;
        $results = [];
        /* search users */
        $get_users = $db->query(sprintf('SELECT users.user_id, users.user_name, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, user_picture, global_user_picture,user_subscribed, user_verified FROM global_profile LEFT JOIN users ON users.user_id = global_profile.user_id   WHERE users.user_name LIKE %1$s OR global_profile.user_firstname LIKE %1$s OR global_profile.user_lastname LIKE %1$s OR CONCAT(global_profile.user_firstname,  " ", global_profile.user_lastname) LIKE %1$s ORDER BY global_profile.user_firstname ASC LIMIT %2$s', secure($query, 'search'), secure($system['min_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");




        // $get_users = $db->query(sprintf('SELECT users.user_id, users.user_name, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, user_picture, global_user_picture,user_subscribed, user_verified FROM users LEFT JOIN global_profile ON global_profile.user_id = users.user_id WHERE users.user_name LIKE %1$s OR global_profile.user_firstname LIKE %1$s OR global_profile.user_lastname LIKE %1$s OR CONCAT(global_profile.user_firstname,  " ", global_profile.user_lastname) LIKE %1$s ORDER BY global_profile.user_firstname ASC LIMIT %2$s', secure($query, 'search'), secure($system['min_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
        if ($get_users->num_rows > 0) {
            while ($user = $get_users->fetch_assoc()) {
                // if ($user['global_user_picture'] != "") {

                // } else {
                //     if ($system['s3_enabled']) {
                //         $system['system_uploads'] = $system['system_uploads_url'];
                //     }
                //     $user['user_picture'] = $system['system_uploads'] . '/' . $user['global_user_picture'];
                // }
                $user['user_picture'] = get_picture($user['global_user_picture'], $user['user_gender']);
                //$user['user_picture'] = $user['global_user_picture'];

                /* get the connection between the viewer & the target */
                $user['connection'] = $this->connection($user['user_id']);
                $user['sort'] = $user['user_firstname'];
                $user['type'] = 'user';
                $results[] = $user;
            }
        }
        /* search pages */
        if ($system['pages_enabled']) {
            $get_pages = $db->query(sprintf('SELECT * FROM pages WHERE page_name LIKE %1$s OR page_title LIKE %1$s LIMIT %2$s', secure($query, 'search'), secure($system['min_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
            if ($get_pages->num_rows > 0) {
                while ($page = $get_pages->fetch_assoc()) {
                    $page['page_picture'] = get_picture($page['page_picture'], 'page');
                    /* check if the viewer liked the page */
                    $page['i_like'] = $this->check_page_membership($this->_data['user_id'], $page['page_id']);
                    $page['sort'] = $page['page_title'];
                    $page['type'] = 'page';
                    $results[] = $page;
                }
            }
        }
        /* search groups */
        if ($system['groups_enabled']) {
            $get_groups = $db->query(sprintf('SELECT * FROM `groups` WHERE group_privacy != "secret" AND (group_name LIKE %1$s OR group_title LIKE %1$s) LIMIT %2$s', secure($query, 'search'), secure($system['min_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
            if ($get_groups->num_rows > 0) {
                while ($group = $get_groups->fetch_assoc()) {
                    $group['group_picture'] = get_picture($group['group_picture'], 'group');
                    /* check if the viewer joined the group */
                    $group['i_joined'] = $this->check_group_membership($this->_data['user_id'], $group['group_id']);
                    $group['sort'] = $group['group_title'];
                    $group['type'] = 'group';
                    $results[] = $group;
                }
            }
        }
        /* search events */
        if ($system['events_enabled']) {
            $get_events = $db->query(sprintf('SELECT * FROM `events` WHERE event_privacy != "secret" AND event_title LIKE %1$s LIMIT %2$s', secure($query, 'search'), secure($system['min_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
            if ($get_events->num_rows > 0) {
                while ($event = $get_events->fetch_assoc()) {
                    $event['event_picture'] = get_picture($event['event_cover'], 'event');
                    /* check if the viewer joined the event */
                    $event['i_joined'] = $this->check_event_membership($this->_data['user_id'], $event['event_id']);
                    $event['sort'] = $event['event_title'];
                    $event['type'] = 'event';
                    $results[] = $event;
                }
            }
        }
        /* sort results */
        function sort_results($a, $b)
        {
            return strcmp($a["sort"], $b["sort"]);
        }
        usort($results, 'sort_results');
        return $results;
    }

    /**
     * delete_album
     * 
     * @param integer $album_id
     * @return void
     */
    public function global_delete_album($album_id)
    {
        global $db, $system;
        /* (check|get) album */
        $album = $this->get_album($album_id, false);
        if (!$album) {
            _error(403);
        }
        /* check if viewer can manage album */
        if (!$album['manage_album']) {
            _error(403);
        }
        /* check if album can be deleted */
        if (!$album['can_delete']) {
            throw new Exception(__("This album can't be deleted"));
        }
        /* delete the album */
        $db->query(sprintf("DELETE FROM posts_photos_albums WHERE album_id = %s", secure($album_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* delete all album photos */
        $db->query(sprintf("DELETE FROM posts_photos WHERE album_id = %s", secure($album_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* retrun path */
        $path = $system['system_url'] . "/" . $album['path'] . "/albums";
        return $path;
    }


    /**
     * delete_photo
     * 
     * @param integer $photo_id
     * @return void
     */
    public function global_delete_photo($photo_id)
    {
        global $db, $system;
        /* (check|get) photo */
        $photo = $this->global_get_photo($photo_id);
        if (!$photo) {
            _error(403);
        }
        $post = $photo['post'];
        /* check if viewer can manage post */
        if (!$post['manage_post']) {
            _error(403);
        }
        /* check if photo can be deleted */
        if (!$photo['can_delete']) {
            throw new Exception(__("This photo can't be deleted"));
        }
        /* delete the photo */
        $db->query(sprintf("DELETE FROM posts_photos WHERE photo_id = %s", secure($photo_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* delete photo from uploads folder */
        delete_uploads_file($photo['source']);
    }

    /**
     * get_replies
     * 
     * @param integer $comment_id
     * @param integer $offset
     * @param boolean $offset
     * @param array $post
     * @return array
     */
    public function global_get_replies($comment_id, $offset = 0, $pass_check = true, $post = [])
    {
        global $db, $system;
        $replies = [];
        $offset *= $system['min_results'];
        if (!$pass_check) {
            $comment = $this->get_comment($comment_id);
            if (!$comment) {
                _error(403);
            }
            $post_author_id = $comment['post']['author_id'];
        } else {
            $post_author_id = $post['author_id'];
        }
        /* get replies */
        $get_replies = $db->query(sprintf("SELECT * FROM (SELECT posts_comments.*, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture,users.user_verified, pages.* FROM global_posts_comments as posts_comments LEFT JOIN users ON posts_comments.user_id = users.user_id AND posts_comments.user_type = 'user' LEFT JOIN pages ON posts_comments.user_id = pages.page_id AND posts_comments.user_type = 'page' WHERE NOT (users.user_name <=> NULL AND pages.page_name <=> NULL) AND posts_comments.node_type = 'comment' AND posts_comments.node_id = %s ORDER BY posts_comments.comment_id DESC LIMIT %s, %s) comments ORDER BY comments.comment_id ASC", secure($comment_id, 'int'), secure($offset, 'int', false), secure($system['min_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
        if ($get_replies->num_rows == 0) {
            return $replies;
        }
        while ($reply = $get_replies->fetch_assoc()) {

            /* pass comments_disabled from (post|comment) to reply */
            $reply['comments_disabled'] = (isset($post['comments_disabled'])) ? $post['comments_disabled'] : $comment['comments_disabled'];

            /* check if the page has been deleted */
            if ($reply['user_type'] == "page" && !$reply['page_admin']) {
                continue;
            }
            /* check if there is any blocking between the viewer & the comment author */
            if ($reply['user_type'] == "user" && $this->blocked($reply['user_id'])) {
                continue;
            }

            /* get reactions array */
            $reply['reactions']['like'] = $reply['reaction_like_count'];
            $reply['reactions']['love'] = $reply['reaction_love_count'];
            $reply['reactions']['haha'] = $reply['reaction_haha_count'];
            $reply['reactions']['yay'] = $reply['reaction_yay_count'];
            $reply['reactions']['wow'] = $reply['reaction_wow_count'];
            $reply['reactions']['sad'] = $reply['reaction_sad_count'];
            $reply['reactions']['angry'] = $reply['reaction_angry_count'];
            arsort($reply['reactions']);

            /* get total reactions */
            $reply['reactions_total_count'] = $reply['reaction_like_count'] + $reply['reaction_love_count'] + $reply['reaction_haha_count'] + $reply['reaction_yay_count'] + $reply['reaction_wow_count'] + $reply['reaction_sad_count'] + $reply['reaction_angry_count'];

            /* parse text */
            $reply['text_plain'] = $reply['text'];
            $reply['text'] = $this->_parse(["text" => $reply['text']]);

            /* get the reply author */
            if ($reply['user_type'] == "user") {
                /* user type */
                $reply['author_id'] = $reply['user_id'];

                $reply['author_picture'] = get_picture($reply['global_user_picture'], $reply['user_gender']);

                $reply['author_url'] = $system['system_url'] . '/global-profile.php?username=' . $reply['user_name'];

                $reply['author_user_name'] = $reply['user_name'];
                $reply['author_name'] = $reply['user_firstname'] . " " . $reply['user_lastname'];
                $reply['author_verified'] = $reply['user_verified'];
            } else {
                /* page type */
                $reply['author_id'] = $reply['page_admin'];
                $reply['author_picture'] = get_picture($reply['page_picture'], "page");

                $reply['author_url'] = $system['system_url'] . '/pages/' . $reply['page_name'];

                $reply['author_name'] = $reply['page_title'];
                $reply['author_verified'] = $reply['page_verified'];
            }

            /* check if viewer user react this reply */
            $reply['i_react'] = false;
            if ($this->_logged_in) {
                /* reaction */
                if ($reply['reactions_total_count'] > 0) {
                    $get_reaction = $db->query(sprintf("SELECT reaction FROM posts_comments_reactions WHERE user_id = %s AND comment_id = %s", secure($this->_data['user_id'], 'int'), secure($reply['comment_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($get_reaction->num_rows > 0) {
                        $reply['i_react'] = true;
                        $reply['i_reaction'] = $get_reaction->fetch_assoc()['reaction'];
                        $reply['i_reaction_details'] = get_reaction_details($reply['i_reaction']);
                    }
                }
            }

            /* check if viewer can manage reply [Edit|Delete] */
            $reply['edit_comment'] = false;
            $reply['delete_comment'] = false;
            if ($this->_logged_in) {
                /* viewer is (admins|moderators)] */
                if ($this->_data['user_group'] < 3) {
                    $reply['edit_comment'] = true;
                    $reply['delete_comment'] = true;
                }
                /* viewer is the author of reply */
                if ($this->_data['user_id'] == $reply['author_id']) {
                    $reply['edit_comment'] = true;
                    $reply['delete_comment'] = true;
                }
                /* viewer is the author of post */
                if ($this->_data['user_id'] == $post_author_id) {
                    $reply['delete_comment'] = true;
                }
            }

            $replies[] = $reply;
        }
        return $replies;
    }

    /**
     * react_comment
     * 
     * @param integer $comment_id
     * @param string $reaction
     * @return void
     */
    public function global_react_comment($comment_id, $reaction)
    {
        global $db, $date;
        /* check reation */
        if (!in_array($reaction, ['like', 'love', 'haha', 'yay', 'wow', 'sad', 'angry'])) {
            _error(403);
        }
        /* (check|get) comment */
        $comment = $this->global_get_comment($comment_id);
        if (!$comment) {
            _error(403);
        }
        /* check blocking */
        if ($this->blocked($comment['author_id'])) {
            _error(403);
        }
        /* react the comment */
        if ($comment['i_react']) {
            $db->query(sprintf("DELETE FROM posts_comments_reactions WHERE user_id = %s AND comment_id = %s", secure($this->_data['user_id'], 'int'), secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* update comment reaction counter */
            $reaction_field = "reaction_" . $comment['i_reaction'] . "_count";
            $db->query(sprintf("UPDATE posts_comments SET $reaction_field = IF($reaction_field=0,0,$reaction_field-1) WHERE comment_id = %s", secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* delete notification */
            switch ($comment['node_type']) {
                case 'post':
                    $this->delete_notification($comment['author_id'], 'react_' . $comment['i_reaction'], 'post_comment', $comment['node_id']);
                    break;

                case 'photo':
                    $this->delete_notification($comment['author_id'], 'react_' . $comment['i_reaction'], 'photo_comment', $comment['node_id']);
                    break;

                case 'comment':
                    $_node_type = ($comment['parent_comment']['node_type'] == "post") ? "post_reply" : "photo_reply";
                    $_node_url = $comment['parent_comment']['node_id'];
                    $this->delete_notification($comment['author_id'], 'react_' . $comment['i_reaction'], $_node_type, $_node_url);
                    break;
            }
        }
        $db->query(sprintf("INSERT INTO posts_comments_reactions (user_id, comment_id, reaction, reaction_time) VALUES (%s, %s, %s, %s)", secure($this->_data['user_id'], 'int'), secure($comment_id, 'int'), secure($reaction), secure($date))) or _error("SQL_ERROR_THROWEN");
        /* update comment reaction counter */
        $reaction_field = "reaction_" . $reaction . "_count";
        $db->query(sprintf("UPDATE posts_comments SET $reaction_field = $reaction_field + 1 WHERE comment_id = %s", secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* post notification */
        switch ($comment['node_type']) {
            case 'post':
                $this->post_notification(array('to_user_id' => $comment['author_id'], 'action' => 'react_' . $reaction, 'node_type' => 'post_comment', 'hub' => "LocalHub", 'node_url' => $comment['node_id'], 'notify_id' => 'comment_' . $comment_id));
                break;

            case 'photo':
                $this->post_notification(array('to_user_id' => $comment['author_id'], 'action' => 'react_' . $reaction, 'node_type' => 'photo_comment', 'hub' => "LocalHub", 'node_url' => $comment['node_id'], 'notify_id' => 'comment_' . $comment_id));
                break;

            case 'comment':
                $_node_type = ($comment['parent_comment']['node_type'] == "post") ? "post_reply" : "photo_reply";
                $_node_url = $comment['parent_comment']['node_id'];
                $this->post_notification(array('to_user_id' => $comment['author_id'], 'action' => 'react_' . $reaction, 'node_type' => $_node_type, 'hub' => "LocalHub", 'node_url' => $_node_url, 'notify_id' => 'comment_' . $comment_id));
                break;
        }
    }


    /**
     * unreact_comment
     * 
     * @param integer $comment_id
     * @param string $reaction
     * @return void
     */
    public function global_unreact_comment($comment_id, $reaction)
    {
        global $db;
        /* check reation */
        if (!in_array($reaction, ['like', 'love', 'haha', 'yay', 'wow', 'sad', 'angry'])) {
            _error(403);
        }
        /* (check|get) comment */
        $comment = $this->global_get_comment($comment_id);
        if (!$comment) {
            _error(403);
        }
        /* check blocking */
        if ($this->blocked($comment['author_id'])) {
            _error(403);
        }
        /* unreact the comment */
        if ($comment['i_react']) {
            $db->query(sprintf("DELETE FROM posts_comments_reactions WHERE user_id = %s AND comment_id = %s", secure($this->_data['user_id'], 'int'), secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* update comment reaction counter */
            $reaction_field = "reaction_" . $reaction . "_count";
            $db->query(sprintf("UPDATE posts_comments SET $reaction_field = IF($reaction_field=0,0,$reaction_field-1) WHERE comment_id = %s", secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* delete notification */
            switch ($comment['node_type']) {
                case 'post':
                    $this->delete_notification($comment['author_id'], 'react_' . $reaction, 'post_comment', $comment['node_id']);
                    break;

                case 'photo':
                    $this->delete_notification($comment['author_id'], 'react_' . $reaction, 'photo_comment', $comment['node_id']);
                    break;

                case 'comment':
                    $_node_type = ($comment['parent_comment']['node_type'] == "post") ? "post_reply" : "photo_reply";
                    $_node_url = $comment['parent_comment']['node_id'];
                    $this->delete_notification($comment['author_id'], 'react_' . $reaction, $_node_type, $_node_url);
                    break;
            }
        }
    }

    /**
     * get_comment
     * 
     * @param integer $comment_id
     * @return array|false
     */
    public function global_get_comment($comment_id, $recursive = true)
    {
        global $db;
        /* get comment */
        $get_comment = $db->query(sprintf("SELECT posts_comments.*, pages.page_admin FROM global_posts_comments as posts_comments LEFT JOIN pages ON posts_comments.user_type = 'page' AND posts_comments.user_id = pages.page_id WHERE posts_comments.comment_id = %s", secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_comment->num_rows == 0) {
            return false;
        }
        $comment = $get_comment->fetch_assoc();

        /* check if the page has been deleted */
        if ($comment['user_type'] == "page" && !$comment['page_admin']) {
            return false;
        }
        /* check if there is any blocking between the viewer & the comment author */
        if ($comment['user_type'] == "user" && $this->blocked($comment['user_id'])) {
            return false;
        }

        /* get reactions array */
        $comment['reactions']['like'] = $comment['reaction_like_count'];
        $comment['reactions']['love'] = $comment['reaction_love_count'];
        $comment['reactions']['haha'] = $comment['reaction_haha_count'];
        $comment['reactions']['yay'] = $comment['reaction_yay_count'];
        $comment['reactions']['wow'] = $comment['reaction_wow_count'];
        $comment['reactions']['sad'] = $comment['reaction_sad_count'];
        $comment['reactions']['angry'] = $comment['reaction_angry_count'];
        arsort($comment['reactions']);

        /* get total reactions */
        $comment['reactions_total_count'] = $comment['reaction_like_count'] + $comment['reaction_love_count'] + $comment['reaction_haha_count'] + $comment['reaction_yay_count'] + $comment['reaction_wow_count'] + $comment['reaction_sad_count'] + $comment['reaction_angry_count'];

        /* get the author */
        $comment['author_id'] = ($comment['user_type'] == "page") ? $comment['page_admin'] : $comment['user_id'];

        /* get post */
        switch ($comment['node_type']) {
            case 'post':
                $post = $this->global_check_post($comment['node_id'], false, false);
                /* check if the post has been deleted */
                if (!$post) {
                    return false;
                }
                $comment['post'] = $post;
                break;

            case 'photo':
                /* (check|get) photo */
                $photo = $this->global_get_photo($comment['node_id']);
                if (!$photo) {
                    return false;
                }
                $comment['post'] = $photo['post'];
                break;

            case 'comment':
                if (!$recursive) {
                    return false;
                }
                /* (check|get) comment */
                $parent_comment = $this->global_get_comment($comment['node_id'], false);
                if (!$parent_comment) {
                    return false;
                }
                $comment['parent_comment'] = $parent_comment;
                $comment['post'] = $parent_comment['post'];
                break;
        }

        /* pass comments_disabled from post to comment */
        $comment['comments_disabled'] = $comment['post']['comments_disabled'];

        /* check if viewer user react this comment */
        $comment['i_react'] = false;
        if ($this->_logged_in) {
            /* reaction */
            if ($comment['reactions_total_count'] > 0) {
                $get_reaction = $db->query(sprintf("SELECT reaction FROM global_posts_comments_reactions WHERE user_id = %s AND comment_id = %s", secure($this->_data['user_id'], 'int'), secure($comment['comment_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($get_reaction->num_rows > 0) {
                    $comment['i_react'] = true;
                    $comment['i_reaction'] = $get_reaction->fetch_assoc()['reaction'];
                    $comment['i_reaction_details'] = get_reaction_details($comment['i_reaction']);
                }
            }
        }

        /* return */
        return $comment;
    }

    /**
     * delete_comment
     * 
     * @param integer $comment_id
     * @return void
     */
    public function global_delete_comment($comment_id)
    {
        global $db;
        /* (check|get) comment */
        $comment = $this->global_get_comment($comment_id);
        if (!$comment) {
            _error(403);
        }
        /* check if viewer can manage comment [Delete] */
        $comment['delete_comment'] = false;
        if ($this->_logged_in) {
            /* viewer is (admins|moderators)] */
            if ($this->_data['user_group'] < 3) {
                $comment['delete_comment'] = true;
            }
            /* viewer is the author of comment */
            if ($this->_data['user_id'] == $comment['author_id']) {
                $comment['delete_comment'] = true;
            }
            /* viewer is the author of post || page admin */
            if ($this->_data['user_id'] == $comment['post']['author_id']) {
                $comment['delete_comment'] = true;
            }
            /* viewer is the admin of the group of the post */
            if ($comment['post']['in_group'] && $comment['post']['is_group_admin']) {
                $comment['delete_comment'] = true;
            }
            /* viewer is the admin of the event of the post */
            if ($comment['post']['in_event'] && $comment['post']['is_event_admin']) {
                $comment['delete_comment'] = true;
            }
        }
        /* delete the comment */
        if ($comment['delete_comment']) {
            /* delete the comment */
            $db->query(sprintf("DELETE FROM global_posts_comments WHERE comment_id = %s", secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* delete comment image from uploads folder */
            delete_uploads_file($comment['image']);
            /* delete replies */
            if ($comment['replies'] > 0) {
                $get_replies = $db->query(sprintf("SELECT image FROM global_posts_comments WHERE node_type = 'comment' AND node_id = %s", secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                while ($reply = $get_replies->fetch_assoc()) {
                    /* delete reply image from uploads folder */
                    delete_uploads_file($reply['image']);
                }
                $db->query(sprintf("DELETE FROM global_posts_comments WHERE node_type = 'comment' AND node_id = %s", secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            }
            /* update comments counter */
            switch ($comment['node_type']) {
                case 'post':
                    $db->query(sprintf("UPDATE global_posts SET comments = IF(comments=0,0,comments-%s) WHERE post_id = %s", secure($comment['replies'] + 1, 'int'), secure($comment['node_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    break;

                case 'photo':
                    $db->query(sprintf("UPDATE global_posts_photos SET comments = IF(comments=0,0,comments-%s) WHERE photo_id = %s", secure($comment['replies'] + 1, 'int'), secure($comment['node_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    break;

                case 'comment':
                    $db->query(sprintf("UPDATE global_posts_comments SET replies = IF(replies=0,0,replies-1) WHERE comment_id = %s", secure($comment['node_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($comment['parent_comment']['node_type'] == "post") {
                        $db->query(sprintf("UPDATE posts SET comments = IF(comments=0,0,comments-1) WHERE post_id = %s", secure($comment['parent_comment']['node_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    } elseif ($comment['parent_comment']['node_type'] == "photo") {
                        $db->query(sprintf("UPDATE global_posts_photos SET comments = IF(comments=0,0,comments-1) WHERE photo_id = %s", secure($comment['parent_comment']['node_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    }
                    break;
            }
            /* points balance */
            $this->points_balance("delete", $comment['author_id'], "comment");
        }
    }

    /**
     * delete_notification
     * 
     * @param integer $to_user_id
     * @param string $action
     * @param string $node_type
     * @param string $node_url
     * @return void
     */
    public function delete_notification($to_user_id, $action, $node_type = '', $node_url = '')
    {
        global $db;
        /* delete notification */
        $db->query(sprintf("DELETE FROM notifications WHERE to_user_id = %s AND from_user_id = %s AND action = %s AND node_type = %s AND node_url = %s", secure($to_user_id, 'int'), secure($this->_data['user_id'], 'int'), secure($action), secure($node_type), secure($node_url))) or _error("SQL_ERROR_THROWEN");
        /* update notifications counter -1 */
        $db->query(sprintf("UPDATE users SET user_live_notifications_counter = IF(user_live_notifications_counter=0,0,user_live_notifications_counter-1) WHERE user_id = %s", secure($to_user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
    }

    function checkTokenAndGetUserData($paramsData = [])
    {
        global $db;
        $queryResult = $db->query(sprintf("SELECT * FROM users WHERE globalToken = %s", secure($paramsData['token']))) or _error("SQL_ERROR_THROWEN");
        $check_key = $queryResult->fetch_assoc();;
        if (is_array($check_key) && count($check_key) > 0) {
            //"user_id"=> $check_key['user_id'],
            return array("status" => 200, "message" => "success", "userId" => $check_key['knox_user_id'], "user_id" => $check_key['user_id'], "user_email" => $check_key['user_email'], "hash" => $check_key['user_password']);
        } else {
            return array("status" => 400, "message" => "Token is invalid", "token" => $paramsData['token']);
        }
    }

    public function global_sign_out($paramsData = [])
    {
        global $db, $date;
        /* delete the session */
        $db->query(sprintf("DELETE FROM users_sessions WHERE user_id = %s", secure($paramsData['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        /* destroy the session */
        session_destroy();
        /* unset the cookies */
        unset($_COOKIE[$this->_cookie_user_id]);
        unset($_COOKIE[$this->_cookie_user_token]);
        setcookie($this->_cookie_user_id, NULL, -1, '/');
        setcookie($this->_cookie_user_token, NULL, -1, '/');
    }

    public function landing_page_post()
    {
        $userClass  = new User();
        //echo"user_id". $this->_data['user_id']; 
        $global_get_postsAarray = $this->global_profile_get_posts(array('get' => 'posts_profile', 'id' => $this->_data['user_id']));
        $global_get_posts  = $global_get_postsAarray[0];
        $localPostArray = $userClass->get_posts(array('get' => 'newsfeed', 'id' => $this->_data['user_id']));

        $i = 1;
        $j = 1;
        $k = 1;
        $l = 1;
        $m = 1;
        $n = 1;
        foreach ($localPostArray as $key => $localpost) {

            if ($localPostArray[$key]['post_type'] == '' || $localPostArray[$key]['post_type'] == 'photos' || $localPostArray[$key]['post_type'] == 'video' || $localPostArray[$key]['post_type'] == 'profile_picture' || $localPostArray[$key]['post_type'] == 'profile_cover' || $localPostArray[$key]['post_type'] == 'shared' || $localPostArray[$key]['post_type'] == 'album' || $localPostArray[$key]['post_type'] == 'file' || $localPostArray[$key]['post_type'] == 'link' || $localPostArray[$key]['post_type'] == 'audio' || $localPostArray[$key]['post_type'] == 'poll') {
                if ($i <= 2) {
                    $localPostArray[$key]['posthub'] = "LocalHub";
                    $finalPostArray[] = $localPostArray[$key];

                    $i++;
                }
            }
            if ($localpost['post_type'] == 'article') {
                if ($j <= 2) {
                    $finalPostArray[] = $localPostArray[$key];
                    $j++;
                }
            }
            if ($localpost['post_type'] == 'events') {
                if ($k <= 2) {
                    $finalPostArray[] = $localPostArray[$key];
                    $k++;
                }
            }
            if ($localpost['post_type'] == 'product') {
                if ($l <= 2) {
                    $finalPostArray[] = $localPostArray[$key];
                    $l++;
                }
            }
            if ($localpost['post_type'] == '' && $localpost['in_group'] == 1) {
                if ($m <= 2) {
                    $finalPostArray[] = $localPostArray[$key];
                    $m++;
                }
            }
            if ($localpost['post_type'] == '' && $localpost['in_event'] == 1) {
                if ($n <= 2) {
                    $finalPostArray[] = $localPostArray[$key];
                    $n++;
                }
            }
        }
        if (!empty($global_get_postsAarray[0])) {
            $global_get_postsAarray[0]['posthub'] = "GlobalHub";
            $finalPostArray[] = $global_get_postsAarray[0];
        }
        if (!empty($global_get_postsAarray[1])) {
            $global_get_postsAarray[1]['posthub'] = "GlobalHub";
            $finalPostArray[] = $global_get_postsAarray[1];
        }
        // echo "<pre>";
        // print_r($finalPostArray);
        // die;
        return $finalPostArray;
    }

    /**
     * get_pages_ids
     * 
     * @return array
     */
    public function get_pages_ids()
    {
        global $db;
        $pages = [];
        if ($this->_logged_in) {
            $get_pages = $db->query(sprintf("SELECT page_id FROM pages_likes WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($get_pages->num_rows > 0) {
                while ($page = $get_pages->fetch_assoc()) {
                    $pages[] = $page['page_id'];
                }
            }
        }
        return $pages;
    }

    /**
     * get_groups_ids
     * 
     * @param boolean $only_approved
     * @return array
     */
    public function get_groups_ids($only_approved = false)
    {
        global $db;
        $groups = [];
        $where_statement = ($only_approved) ? " approved = '1' AND" : "";
        $get_groups = $db->query(sprintf("SELECT group_id FROM groups_members WHERE " . $where_statement . " user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_groups->num_rows > 0) {
            while ($group = $get_groups->fetch_assoc()) {
                $groups[] = $group['group_id'];
            }
        }
        return $groups;
    }

    /**
     * get_events_ids
     * 
     * @return array
     */
    public function get_events_ids()
    {
        global $db;
        $events = [];
        $get_events = $db->query(sprintf("SELECT event_id FROM events_members WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_events->num_rows > 0) {
            while ($event = $get_events->fetch_assoc()) {
                $events[] = $event['event_id'];
            }
        }
        return $events;
    }


    /* ------------------------------- */
    /* Stories */
    /* ------------------------------- */

    /**
     * post_story
     * 
     * @param string $message
     * @param array $photos
     * @param array $videos
     * @return void
     */
    public function post_story($message, $photos, $videos)
    {
        global $db, $system, $date;
        /* check latest story */
        $queryS = sprintf("SELECT story_id FROM global_stories as stories WHERE time>=DATE_SUB(NOW(), INTERVAL 1 DAY) AND stories.user_id = %s", secure($this->_data['user_id'], 'int'));
        $get_last_story = $db->query($queryS) or _error("SQL_ERROR_THROWEN");
        if ($get_last_story->num_rows > 0) {
            /* get story_id */
            $story_id = $get_last_story->fetch_assoc()['story_id'];
            /* update story time */
            $db->query(sprintf("UPDATE global_stories SET time = %s WHERE story_id = %s", secure($date), secure($story_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        } else {
            /* insert new story */
            $insertQ = sprintf("INSERT INTO global_stories (user_id, time) VALUES (%s, %s)", secure($this->_data['user_id'], 'int'), secure($date));
            $db->query($insertQ) or _error("SQL_ERROR_THROWEN");
            /* get story_id */
            $story_id = $db->insert_id;
        }
        /* insert story media items */
        foreach ($photos as $photo) {
            $db->query(sprintf("INSERT INTO global_stories_media (story_id, source, text, time) VALUES (%s, %s, %s, %s)", secure($story_id, 'int'), secure($photo['source']), secure($message), secure($date))) or _error("SQL_ERROR_THROWEN");
        }
        foreach ($videos as $video) { //print_r($videos); 
            $db->query(sprintf("INSERT INTO global_stories_media (story_id, source, is_photo, text, time) VALUES (%s, %s, '0', %s, %s)", secure($story_id, 'int'), secure($video), secure($message), secure($date))) or _error("SQL_ERROR_THROWEN");
        }
    }



    /**
     * get_stories
     * 
     * @return array
     */
    public function get_stories()
    {
        global $db, $system;
        $stories = [];
        /* get stories */
        $authors = $this->_data['friends_ids'];
        /* add viewer to this list */
        $authors[] = $this->_data['user_id'];
        $friends_list = implode(',', $authors);
        $get_stories = $db->query("SELECT stories.*, users.user_id, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture FROM global_stories as stories INNER JOIN users ON stories.user_id = users.user_id WHERE time>=DATE_SUB(NOW(), INTERVAL 1 DAY) AND stories.user_id IN ($friends_list) ORDER BY stories.story_id DESC") or _error("SQL_ERROR_THROWEN");
        if ($get_stories->num_rows > 0) {
            while ($_story = $get_stories->fetch_assoc()) {
                $story['id'] = $_story['story_id'];
                $story['user_id'] = $_story['user_id'];
                $story['photo'] = get_picture($_story['global_user_picture'], $_story['user_gender']);
                $story['name'] = $_story['user_firstname'] . " " . $_story['user_lastname'];
                $story['lastUpdated'] = strtotime($_story['time']);
                $story['items'] = [];
                /* get story media items */
                $get_media_items = $db->query(sprintf("SELECT * FROM global_stories_media  as stories_media WHERE story_id = %s", secure($_story['story_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                while ($media_item = $get_media_items->fetch_assoc()) {
                    $story_item['id'] = $media_item['media_id'];
                    $story_item['type'] = ($media_item['is_photo']) ? 'photo' : 'video';
                    $story_item['src'] = $system['system_uploads'] . '/' . $media_item['source'];
                    $story_item['link'] = '#';
                    $story_item['linkText'] = $media_item['text'];
                    $story_item['time'] = strtotime($media_item['time']);
                    $story['items'][] = $story_item;
                }
                $stories[] = $story;
            }
        }
        return array("array" => $stories, "json" => json_encode($stories));
    }


    /**
     * get_my_story
     * 
     * @return boolean
     */
    public function get_my_story()
    {
        global $db, $system;
        $get_my_story = $db->query(sprintf("SELECT COUNT(*) as count FROM global_stories WHERE time>=DATE_SUB(NOW(), INTERVAL 1 DAY) AND user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_my_story->fetch_assoc()['count'] == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * delete_my_story
     * 
     * @return void
     */
    public function delete_my_story()
    {
        global $db, $system;
        $check_story = $db->query(sprintf("DELETE FROM global_stories WHERE time>=DATE_SUB(NOW(), INTERVAL 1 DAY) AND user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
    }

    /**
     * get_boosted_post
     * 
     * @return array
     */
    public function get_boosted_post()
    {
        global $db, $system;
        /* get viewer hidden posts to exclude from results */
        $hidden_posts = $this->_get_hidden_posts($this->_data['user_id']);
        $where_query = "";
        if ($hidden_posts) {
            $hidden_posts_list = implode(',', $hidden_posts);
            $where_query .= " AND (post_id NOT IN ($hidden_posts_list)) ";
        }
        $get_random_post = $db->query("SELECT post_id FROM global_posts WHERE boosted = '1'" . $where_query . "ORDER BY RAND() LIMIT 1") or _error("SQL_ERROR_THROWEN");
        if ($get_random_post->num_rows == 0) {
            return false;
        }
        $random_post = $get_random_post->fetch_assoc();
        return $this->global_profile_get_post($random_post['post_id'], true, true);
    }

    /* ------------------------------- */
    /* Get Users */
    /* ------------------------------- */

    /**
     * get_friends
     * 
     * @param integer $user_id
     * @param integer $offset
     * @param boolean $get_all
     * @return array
     */
    public function get_friends($user_id, $offset = 0, $get_all = false)
    {
        global $db, $system;
        $friends = [];
        $offset *= $system['min_results_even'];
        /* get the target user's privacy */
        $get_privacy = $db->query(sprintf("SELECT user_privacy_friends FROM users WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        $privacy = $get_privacy->fetch_assoc();
        /* check the target user's privacy  */
        if (!$this->check_privacy($privacy['user_privacy_friends'], $user_id)) {
            return $friends;
        }
        $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($system['min_results_even'], 'int', false));
        $get_friends = $db->query(sprintf('SELECT users.user_id, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture as user_picture, users.user_subscribed, users.user_verified FROM friends INNER JOIN users ON (friends.user_one_id = users.user_id AND friends.user_one_id != %1$s) OR (friends.user_two_id = users.user_id AND friends.user_two_id != %1$s) WHERE status = 1 AND (user_one_id = %1$s OR user_two_id = %1$s) ' . $limit_statement, secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_friends->num_rows > 0) {
            while ($friend = $get_friends->fetch_assoc()) {
                $friend['user_picture'] = get_picture($friend['user_picture'], $friend['user_gender']);
                /* get the connection between the viewer & the target */
                $friend['connection'] = $this->connection($friend['user_id']);
                $friends[] = $friend;
            }
        }
        return $friends;
    }

    /**
     * _follow
     * 
     * @param integer $user_id
     * @return void
     */
    private function _follow($user_id)
    {
        global $db;
        /* check blocking */
        if ($this->blocked($user_id)) {
            _error(403);
        }
        /* check if the viewer already follow the target */
        $check = $db->query(sprintf("SELECT COUNT(*) as count FROM global_followings WHERE user_id = %s AND following_id = %s", secure($this->_data['user_id'], 'int'),  secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* if yes -> return */
        if ($check->fetch_assoc()['count'] > 0) return;
        /* add as following */
        $db->query(sprintf("INSERT INTO global_followings (user_id, following_id) VALUES (%s, %s)", secure($this->_data['user_id'], 'int'),  secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* post new notification */
        $this->post_notification(array('to_user_id' => $user_id, 'action' => 'follow', 'hub' => "GlobalHub"));
    }


    /**
     * _unfollow
     * 
     * @param integer $user_id
     * @return void
     */
    private function _unfollow($user_id)
    {
        global $db;
        /* check if the viewer already follow the target */
        $check = $db->query(sprintf("SELECT COUNT(*) as count FROM global_followings WHERE user_id = %s AND following_id = %s", secure($this->_data['user_id'], 'int'),  secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* if no -> return */
        if ($check->fetch_assoc()['count'] == 0) return;
        /* delete from viewer's followings */
        $db->query(sprintf("DELETE FROM global_followings WHERE user_id = %s AND following_id = %s", secure($this->_data['user_id'], 'int'), secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* delete notification */
        $this->delete_notification($user_id, 'follow');
    }



    /**
     * connect
     * 
     * @param string $do
     * @param integer $id
     * @param integer $uid
     * @return void
     */
    public function connect($do, $id, $uid = null)
    {
        global $db, $system;
        switch ($do) {
                // case 'delete-app':
                //     /* delete user app */
                //     $this->delete_user_app($id);
                //     break;
            case 'block':
                /* check blocking */
                if ($this->blocked($id)) {
                    throw new Exception(__("You have already blocked this user before!"));
                }
                /* remove any friendship */
                $this->connect('friend-remove', $id);
                /* delete the target from viewer's followings */
                $this->connect('unfollow', $id);
                /* delete the viewer from target's followings */
                $db->query(sprintf("DELETE FROM global_followings WHERE user_id = %s AND following_id = %s", secure($id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* block the user */
                $db->query(sprintf("INSERT INTO global_users_blocks (user_id, blocked_id) VALUES (%s, %s)", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'unblock':
                /* unblock the user */
                $db->query(sprintf("DELETE FROM global_users_blocks WHERE user_id = %s AND blocked_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'friend-accept':
                /* check if there is a friend request from the target to the viewer */
                $check = $db->query(sprintf("SELECT COUNT(*) as count FROM friends WHERE user_one_id = %s AND user_two_id = %s AND status = 0", secure($id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->fetch_assoc()['count'] == 0) return;
                /* add the target as a friend */
                $db->query(sprintf("UPDATE friends SET status = 1 WHERE user_one_id = %s AND user_two_id = %s", secure($id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* post new notification */
                $this->post_notification(array('to_user_id' => $id, 'action' => 'friend_accept', 'hub' => "LocalHub", 'node_url' => $this->_data['user_name']));
                /* follow */
                $this->_follow($id);
                break;

            case 'friend-decline':
                /* check if there is a friend request from the target to the viewer */
                $check = $db->query(sprintf("SELECT COUNT(*) as count FROM friends WHERE user_one_id = %s AND user_two_id = %s AND status = 0", secure($id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->fetch_assoc()['count'] == 0) return;
                /* decline this friend request */
                $db->query(sprintf("UPDATE friends SET status = -1 WHERE user_one_id = %s AND user_two_id = %s", secure($id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* unfollow */
                $this->_unfollow($id);
                break;

            case 'friend-add':
                /* check blocking */
                if ($this->blocked($id)) {
                    _error(403);
                }
                /* check if there is any relation between the viewer & the target */
                $check_relation = $db->query(sprintf('SELECT COUNT(*) as count FROM friends WHERE (user_one_id = %1$s AND user_two_id = %2$s) OR (user_one_id = %2$s AND user_two_id = %1$s)', secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if yes -> return */
                if ($check_relation->fetch_assoc()['count'] > 0) return;
                /* check max friends/user limit for both the viewer & the target */
                if ($system['max_friends'] > 0) {
                    /* get target user group */
                    $get_target_user = $db->query(sprintf("SELECT user_group FROM users WHERE user_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($get_target_user->num_rows == 0) return;
                    $target_user = $get_target_user->fetch_assoc();
                    /* viewer check */
                    $check_viewer_limit = $db->query(sprintf('SELECT COUNT(*) as count FROM friends WHERE (user_one_id = %1$s OR user_two_id = %1$s) AND status = 1', secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($check_viewer_limit->fetch_assoc()['count'] >= $system['max_friends'] && $this->_data['user_group'] >= 3) {
                        modal("MESSAGE", __("Maximum Limit Reached"), __("Your have reached the maximum limit of Friends" . " (" . $system['max_friends'] . " " . __("Friends") . ")"));
                    }
                    /* target check */
                    $check_target_limit = $db->query(sprintf('SELECT COUNT(*) as count FROM friends WHERE (user_one_id = %1$s OR user_two_id = %1$s) AND status = 1', secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($check_target_limit->fetch_assoc()['count'] >= $system['max_friends'] && $target_user['user_group'] >= 3) {
                        modal("MESSAGE", __("Maximum Limit Reached"), __("This user has reached the maximum limit of Friends" . " (" . $system['max_friends'] . " " . __("Friends") . ")"));
                    }
                }
                /* add the friend request */
                $db->query(sprintf("INSERT INTO friends (user_one_id, user_two_id, status) VALUES (%s, %s, '0')", secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update requests counter +1 */
                $db->query(sprintf("UPDATE users SET user_live_requests_counter = user_live_requests_counter + 1 WHERE user_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* post new notification */
                $this->post_notification(array('to_user_id' => $id, 'action' => 'friend_add',  'hub' => "LocalHub", 'node_url' => $this->_data['user_name']));
                /* follow */
                $this->_follow($id);
                break;

            case 'friend-cancel':
                /* check if there is a request from the viewer to the target */
                $check = $db->query(sprintf("SELECT COUNT(*) as count FROM friends WHERE user_one_id = %s AND user_two_id = %s AND status = 0", secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->fetch_assoc()['count'] == 0) return;
                /* delete the friend request */
                $db->query(sprintf("DELETE FROM friends WHERE user_one_id = %s AND user_two_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update requests counter -1 */
                $db->query(sprintf("UPDATE users SET user_live_requests_counter = IF(user_live_requests_counter=0,0,user_live_requests_counter-1), user_live_notifications_counter = IF(user_live_notifications_counter=0,0,user_live_notifications_counter-1) WHERE user_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* unfollow */
                $this->_unfollow($id);
                break;

            case 'friend-remove':
                /* check if there is any relation between me & him */
                $check = $db->query(sprintf('SELECT COUNT(*) as count FROM friends WHERE (user_one_id = %1$s AND user_two_id = %2$s AND status = 1) OR (user_one_id = %2$s AND user_two_id = %1$s AND status = 1)', secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->fetch_assoc()['count'] == 0) return;
                /* delete this friend */
                $db->query(sprintf('DELETE FROM friends WHERE (user_one_id = %1$s AND user_two_id = %2$s AND status = 1) OR (user_one_id = %2$s AND user_two_id = %1$s AND status = 1)', secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'follow':
                $this->_follow($id);
                break;

            case 'unfollow':
                $this->_unfollow($id);
                break;
            case 'page-like':
                /* check if the viewer already liked this page */
                $check = $db->query(sprintf("SELECT COUNT(*) as count FROM pages_likes WHERE user_id = %s AND page_id = %s", secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if yes -> return */
                if ($check->fetch_assoc()['count'] > 0) return;
                /* if no -> like this page */
                $db->query(sprintf("INSERT INTO pages_likes (user_id, page_id) VALUES (%s, %s)", secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update likes counter +1 */
                $db->query(sprintf("UPDATE pages SET page_likes = page_likes + 1  WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'page-unlike':
                /* check if the viewer already liked this page */
                $check = $db->query(sprintf("SELECT COUNT(*) as count FROM pages_likes WHERE user_id = %s AND page_id = %s", secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->fetch_assoc()['count'] == 0) return;
                /* if yes -> unlike this page */
                $db->query(sprintf("DELETE FROM pages_likes WHERE user_id = %s AND page_id = %s", secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update likes counter -1 */
                $db->query(sprintf("UPDATE pages SET page_likes = IF(page_likes=0,0,page_likes-1) WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'page-boost':
                if ($this->_is_admin) {
                    /* check if the user is the system admin */
                    $check = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                } else {
                    /* check if the user is the page admin */
                    $check = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s AND page_admin = %s", secure($id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                if ($check->num_rows == 0) {
                    _error(403);
                }
                $spage = $check->fetch_assoc();
                /* check if viewer can boost page */
                if (!$this->_data['can_boost_pages']) {
                    modal("MESSAGE", __("Sorry"), __("You reached the maximum number of boosted pages! Upgrade your package to get more"));
                }
                /* boost page */
                if (!$spage['page_boosted']) {
                    /* boost page */
                    $db->query(sprintf("UPDATE pages SET page_boosted = '1', page_boosted_by = %s WHERE page_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    /* update user */
                    $db->query(sprintf("UPDATE users SET user_boosted_pages = user_boosted_pages + 1 WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                break;

            case 'page-unboost':
                if ($this->_is_admin) {
                    /* check if the user is the system admin */
                    $check = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                } else {
                    /* check if the user is the page admin */
                    $check = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s AND page_admin = %s", secure($id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                if ($check->num_rows == 0) {
                    _error(403);
                }
                $spage = $check->fetch_assoc();
                /* unboost page */
                if ($spage['page_boosted']) {
                    /* unboost page */
                    $db->query(sprintf("UPDATE pages SET page_boosted = '0', page_boosted_by = NULL WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    /* update user */
                    $db->query(sprintf("UPDATE users SET user_boosted_pages = IF(user_boosted_pages=0,0,user_boosted_pages-1) WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                break;

            case 'page-invite':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the viewer liked the page */
                $check_viewer = $db->query(sprintf("SELECT pages.* FROM pages INNER JOIN pages_likes ON pages.page_id = pages_likes.page_id WHERE pages_likes.user_id = %s AND pages_likes.page_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check_viewer->num_rows == 0) return;
                /* check if the target already liked this page */
                $check_target = $db->query(sprintf("SELECT * FROM pages_likes WHERE user_id = %s AND page_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if yes -> return */
                if ($check_target->num_rows > 0) return;
                /* check if the viewer already invited to the viewer to this page */
                $check_target = $db->query(sprintf("SELECT * FROM pages_invites WHERE page_id = %s AND user_id = %s AND from_user_id = %s", secure($id, 'int'), secure($uid, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if yes -> return */
                if ($check_target->num_rows > 0) return;
                /* if no -> invite to this page */
                /* get page */
                $page = $check_viewer->fetch_assoc();
                /* insert invitation */
                $db->query(sprintf("INSERT INTO pages_invites (page_id, user_id, from_user_id) VALUES (%s, %s, %s)", secure($id, 'int'), secure($uid, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* send notification (page invitation) to the target user */
                $this->post_notification(array('to_user_id' => $uid, 'action' => 'page_invitation', 'hub' => "LocalHub", 'node_type' => $page['page_title'], 'node_url' => $page['page_name']));
                break;

            case 'page-admin-addation':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the target already a page member */
                $check = $db->query(sprintf("SELECT * FROM pages_likes WHERE user_id = %s AND page_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                /* check if the target already a page admin */
                $check = $db->query(sprintf("SELECT * FROM pages_admins WHERE user_id = %s AND page_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if yes -> return */
                if ($check->num_rows > 0) return;
                /* get page */
                $get_page = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $page = $get_page->fetch_assoc();
                /* check if the viewer is page admin */
                if (!$this->check_page_adminship($this->_data['user_id'], $page['page_id']) && $this->_data['user_id'] != $page['page_admin']) {
                    _error(400);
                }
                /* add the target as page admin */
                $db->query(sprintf("INSERT INTO pages_admins (user_id, page_id) VALUES (%s, %s)", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* send notification (page admin addation) to the target user */
                $this->post_notification(array('to_user_id' => $uid, 'action' => 'page_admin_addation', 'hub' => "LocalHub", 'node_type' => $page['page_title'], 'node_url' => $page['page_name']));
                break;

            case 'page-admin-remove':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the target already a page admin */
                $check = $db->query(sprintf("SELECT * FROM pages_admins WHERE user_id = %s AND page_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                /* get page */
                $get_page = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $page = $get_page->fetch_assoc();
                /* check if the viewer is page admin */
                if (!$this->check_page_adminship($this->_data['user_id'], $page['page_id'])) {
                    _error(400);
                }
                /* check if the target is the super page admin */
                if ($uid == $page['page_admin']) {
                    throw new Exception(__("You can not remove page super admin"));
                }
                /* remove the target as page admin */
                $db->query(sprintf("DELETE FROM pages_admins WHERE user_id = %s AND page_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* delete notification (page admin addation) to the target user */
                $this->delete_notification($uid, 'page_admin_addation', $page['page_title'], $page['page_name']);
                break;

            case 'page-member-remove':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the target already a page member */
                $check = $db->query(sprintf("SELECT * FROM pages_likes WHERE user_id = %s AND page_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                /* get page */
                $get_page = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $page = $get_page->fetch_assoc();
                /* check if the target is the super page admin */
                if ($uid == $page['page_admin']) {
                    throw new Exception(__("You can not remove page super admin"));
                }
                /* remove the target as page admin */
                $db->query(sprintf("DELETE FROM pages_admins WHERE user_id = %s AND page_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* remove the target as page member */
                $db->query(sprintf("DELETE FROM pages_likes WHERE user_id = %s AND page_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update members counter -1 */
                $db->query(sprintf("UPDATE pages SET page_likes = IF(page_likes=0,0,page_likes-1) WHERE page_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'group-join':
                /* check if the viewer already joined (approved||pending) this group */
                $check = $db->query(sprintf("SELECT * FROM groups_members WHERE user_id = %s AND group_id = %s", secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if yes -> return */
                if ($check->num_rows > 0) return;
                /* if no -> join this group */
                /* get group */
                $get_group = $db->query(sprintf("SELECT * FROM `groups` WHERE group_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $group = $get_group->fetch_assoc();
                /* check approved */
                $approved = 0;
                if ($group['group_privacy'] == 'public') {
                    /* the group is public */
                    $approved = '1';
                } elseif ($this->_data['user_id'] == $group['group_admin']) {
                    /* the group admin join his group */
                    $approved = '1';
                }
                $db->query(sprintf("INSERT INTO groups_members (user_id, group_id, approved) VALUES (%s, %s, %s)", secure($this->_data['user_id'], 'int'),  secure($id, 'int'), secure($approved))) or _error("SQL_ERROR_THROWEN");
                if ($approved) {
                    /* update members counter +1 */
                    $db->query(sprintf("UPDATE `groups` SET group_members = group_members + 1  WHERE group_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                } else {
                    /* send notification (pending request) to group admin  */
                    $this->post_notification(array('to_user_id' => $group['group_admin'], 'action' => 'group_join', 'hub' => "LocalHub", 'node_type' => $group['group_title'], 'node_url' => $group['group_name']));
                }
                break;

            case 'group-leave':
                /* check if the viewer already joined (approved||pending) this group */
                $check = $db->query(sprintf("SELECT groups_members.approved, `groups`.* FROM groups_members INNER JOIN `groups` ON groups_members.group_id = `groups`.group_id WHERE groups_members.user_id = %s AND groups_members.group_id = %s", secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                /* if yes -> leave this group */
                $group = $check->fetch_assoc();
                $db->query(sprintf("DELETE FROM groups_members WHERE user_id = %s AND group_id = %s", secure($this->_data['user_id'], 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update members counter -1 */
                if ($group['approved']) {
                    $db->query(sprintf("UPDATE `groups` SET group_members = IF(group_members=0,0,group_members-1) WHERE group_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                } else {
                    /* delete notification (pending request) that sent to group admin */
                    $this->delete_notification($group['group_admin'], 'group_join', $group['group_title'], $group['group_name']);
                }
                break;

            case 'group-invite':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the viewer is group member (approved) */
                $check_viewer = $db->query(sprintf("SELECT `groups`.* FROM `groups` INNER JOIN groups_members ON `groups`.group_id = groups_members.group_id WHERE groups_members.approved = '1' AND groups_members.user_id = %s AND groups_members.group_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check_viewer->num_rows == 0) return;
                /* check if the target already joined (approved||pending) this group */
                $check_target = $db->query(sprintf("SELECT * FROM groups_members WHERE user_id = %s AND group_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if yes -> return */
                if ($check_target->num_rows > 0) return;
                /* if no -> join this group */
                /* get group */
                $group = $check_viewer->fetch_assoc();
                /* check approved */
                $approved = 0;
                if ($group['group_privacy'] == 'public') {
                    /* the group is public */
                    $approved = '1';
                } elseif ($this->_data['user_id'] == $group['group_admin']) {
                    /* the group admin want to add a user */
                    $approved = '1';
                } elseif ($uid == $group['group_admin']) {
                    /* the viewer invite group admin to join his group */
                    $approved = '1';
                }
                /* add the target user as group member */
                $db->query(sprintf("INSERT INTO groups_members (user_id, group_id, approved) VALUES (%s, %s, %s)", secure($uid, 'int'),  secure($id, 'int'), secure($approved))) or _error("SQL_ERROR_THROWEN");
                if ($approved) {
                    /* update members counter +1 */
                    $db->query(sprintf("UPDATE `groups` SET group_members = group_members + 1  WHERE group_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    /* send notification (group addition) to the target user */
                    $this->post_notification(array('to_user_id' => $uid, 'action' => 'group_add', 'hub' => "LocalHub", 'node_type' => $group['group_title'], 'node_url' => $group['group_name']));
                } else {
                    /* send notification (group addition) to the target user */
                    if ($group['group_privacy'] != 'secret') {
                        $this->post_notification(array('to_user_id' => $uid, 'action' => 'group_add', 'hub' => "LocalHub", 'node_type' => $group['group_title'], 'node_url' => $group['group_name']));
                    }
                    /* send notification (pending request) to group admin [from the target]  */
                    $this->post_notification(array('to_user_id' => $group['group_admin'], 'from_user_id' => $uid, 'action' => 'group_join', 'hub' => "LocalHub", 'node_type' => $group['group_title'], 'node_url' => $group['group_name']));
                }
                break;

            case 'group-accept':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the target has pending request */
                $check = $db->query(sprintf("SELECT `groups`.* FROM `groups` INNER JOIN groups_members ON `groups`.group_id = groups_members.group_id WHERE groups_members.approved = '0' AND groups_members.user_id = %s AND groups_members.group_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                $group = $check->fetch_assoc();
                /* check if the viewer is group admin */
                if (!$this->check_group_adminship($this->_data['user_id'], $group['group_id'])) {
                    _error(400);
                }
                /* update request */
                $db->query(sprintf("UPDATE groups_members SET approved = '1' WHERE user_id = %s AND group_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update members counter +1 */
                $db->query(sprintf("UPDATE `groups` SET group_members = group_members + 1  WHERE group_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* send notification (group acceptance) to the target user */
                $this->post_notification(array('to_user_id' => $uid, 'action' => 'group_accept', 'hub' => "LocalHub", 'node_type' => $group['group_title'], 'node_url' => $group['group_name']));
                break;

            case 'group-decline':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the target has pending request */
                $check = $db->query(sprintf("SELECT `groups`.* FROM `groups` INNER JOIN groups_members ON `groups`.group_id = groups_members.group_id WHERE groups_members.approved = '0' AND groups_members.user_id = %s AND groups_members.group_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                $group = $check->fetch_assoc();
                /* check if the viewer is group admin */
                if (!$this->check_group_adminship($this->_data['user_id'], $group['group_id'])) {
                    _error(400);
                }
                /* delete request */
                $db->query(sprintf("DELETE FROM groups_members WHERE user_id = %s AND group_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'group-admin-addation':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the target already a group member */
                $check = $db->query(sprintf("SELECT * FROM groups_members WHERE user_id = %s AND group_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                /* check if the target already a group admin */
                $check = $db->query(sprintf("SELECT * FROM groups_admins WHERE user_id = %s AND group_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if yes -> return */
                if ($check->num_rows > 0) return;
                /* get group */
                $get_group = $db->query(sprintf("SELECT * FROM `groups` WHERE group_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $group = $get_group->fetch_assoc();
                /* check if the viewer is group admin */
                if (!$this->check_group_adminship($this->_data['user_id'], $group['group_id']) && $this->_data['user_id'] != $group['group_admin']) {
                    _error(400);
                }
                /* add the target as group admin */
                $db->query(sprintf("INSERT INTO groups_admins (user_id, group_id) VALUES (%s, %s)", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* send notification (group admin addation) to the target user */
                $this->post_notification(array('to_user_id' => $uid, 'action' => 'group_admin_addation', 'hub' => "LocalHub", 'node_type' => $group['group_title'], 'node_url' => $group['group_name']));
                break;

            case 'group-admin-remove':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the target already a group admin */
                $check = $db->query(sprintf("SELECT * FROM groups_admins WHERE user_id = %s AND group_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                /* get group */
                $get_group = $db->query(sprintf("SELECT * FROM `groups` WHERE group_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $group = $get_group->fetch_assoc();
                /* check if the viewer is group admin */
                if (!$this->check_group_adminship($this->_data['user_id'], $group['group_id'])) {
                    _error(400);
                }
                /* check if the target is the super group admin */
                if ($uid == $group['group_admin']) {
                    throw new Exception(__("You can not remove group super admin"));
                }
                /* remove the target as group admin */
                $db->query(sprintf("DELETE FROM groups_admins WHERE user_id = %s AND group_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* delete notification (group admin addation) to the target user */
                $this->delete_notification($uid, 'group_admin_addation', $group['group_title'], $group['group_name']);
                break;

            case 'group-member-remove':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the target already a group member */
                $check = $db->query(sprintf("SELECT * FROM groups_members WHERE user_id = %s AND group_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                /* get group */
                $get_group = $db->query(sprintf("SELECT * FROM `groups` WHERE group_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $group = $get_group->fetch_assoc();
                /* check if the target is the super group admin */
                if ($uid == $group['group_admin']) {
                    throw new Exception(__("You can not remove group super admin"));
                }
                /* remove the target as group admin */
                $db->query(sprintf("DELETE FROM groups_admins WHERE user_id = %s AND group_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* remove the target as group member */
                $db->query(sprintf("DELETE FROM groups_members WHERE user_id = %s AND group_id = %s", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update members counter -1 */
                $db->query(sprintf("UPDATE `groups` SET group_members = IF(group_members=0,0,group_members-1) WHERE group_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'event-go':
                /* check if the viewer member to this event */
                $check = $db->query(sprintf("SELECT * FROM events_members WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $invited = false;
                $interested = false;
                if ($check->num_rows > 0) {
                    $member = $check->fetch_assoc();
                    /* if going -> return */
                    if ($member['is_going'] == '1') return;
                    $invited = ($member['is_invited'] == '1') ? true : false;
                    $interested = ($member['is_interested'] == '1') ? true : false;
                }
                $approved = false;
                if ($invited || $interested) {
                    $approved = true;
                } else {
                    /* get event */
                    $get_event = $db->query(sprintf("SELECT * FROM `events` WHERE event_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    $event = $get_event->fetch_assoc();
                    if ($event['event_privacy'] == 'public') {
                        /* the event is public */
                        $approved = true;
                    } elseif ($this->check_event_adminship($this->_data['user_id'], $event['event_id'])) {
                        /* the event admin going his event */
                        $approved = true;
                    }
                }
                if ($approved) {
                    if ($invited || $interested) {
                        $db->query(sprintf("UPDATE events_members SET is_going = '1' WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    } else {
                        $db->query(sprintf("INSERT INTO events_members (user_id, event_id, is_going) VALUES (%s, %s, '1')", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    }
                    /* update going counter +1 */
                    $db->query(sprintf("UPDATE `events` SET event_going = event_going + 1  WHERE event_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                break;

            case 'event-ungo':
                /* check if the viewer member to this event */
                $check = $db->query(sprintf("SELECT * FROM events_members WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                $invited = false;
                $interested = false;
                $member = $check->fetch_assoc();
                /* if not going -> return */
                if ($member['is_going'] == '0') return;
                $invited = ($member['is_invited'] == '1') ? true : false;
                $interested = ($member['is_interested'] == '1') ? true : false;
                if (!$invited && !$interested) {
                    $db->query(sprintf("DELETE FROM events_members WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                } else {
                    $db->query(sprintf("UPDATE events_members SET is_going = '0' WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                /* update going counter -1 */
                $db->query(sprintf("UPDATE `events` SET event_going = IF(event_going=0,0,event_going-1)  WHERE event_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'event-interest':
                /* check if the viewer member to this event */
                $check = $db->query(sprintf("SELECT * FROM events_members WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $invited = false;
                $going = false;
                if ($check->num_rows > 0) {
                    $member = $check->fetch_assoc();
                    /* if interested -> return */
                    if ($member['is_interested'] == '1') return;
                    $invited = ($member['is_invited'] == '1') ? true : false;
                    $going = ($member['is_going'] == '1') ? true : false;
                }
                $approved = false;
                if ($invited || $going) {
                    $approved = true;
                } else {
                    /* get event */
                    $get_event = $db->query(sprintf("SELECT * FROM `events` WHERE event_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    $event = $get_event->fetch_assoc();
                    if ($event['event_privacy'] == 'public') {
                        /* the event is public */
                        $approved = true;
                    } elseif ($this->check_event_adminship($this->_data['user_id'], $event['event_id'])) {
                        /* the event admin interested his event */
                        $approved = true;
                    }
                }
                if ($approved) {
                    if ($invited || $going) {
                        $db->query(sprintf("UPDATE events_members SET is_interested = '1' WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    } else {
                        $db->query(sprintf("INSERT INTO events_members (user_id, event_id, is_interested) VALUES (%s, %s, '1')", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                    }
                    /* update interested counter +1 */
                    $db->query(sprintf("UPDATE `events` SET event_interested = event_interested + 1  WHERE event_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                break;

            case 'event-uninterest':
                /* check if the viewer member to this event */
                $check = $db->query(sprintf("SELECT * FROM events_members WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check->num_rows == 0) return;
                $invited = false;
                $going = false;
                $member = $check->fetch_assoc();
                /* if not interested -> return */
                if ($member['is_interested'] == '0') return;
                $invited = ($member['is_invited'] == '1') ? true : false;
                $going = ($member['is_going'] == '1') ? true : false;
                if (!$invited && !$going) {
                    $db->query(sprintf("DELETE FROM events_members WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                } else {
                    $db->query(sprintf("UPDATE events_members SET is_interested = '0' WHERE user_id = %s AND event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                /* update interested counter -1 */
                $db->query(sprintf("UPDATE `events` SET event_interested = IF(event_interested=0,0,event_interested-1)  WHERE event_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'event-invite':
                if ($uid == null) {
                    _error(400);
                }
                /* check if the viewer is event member */
                $check_viewer = $db->query(sprintf("SELECT `events`.* FROM `events` INNER JOIN events_members ON `events`.event_id = events_members.event_id WHERE events_members.user_id = %s AND events_members.event_id = %s", secure($this->_data['user_id'], 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if no -> return */
                if ($check_viewer->num_rows == 0) return;
                /* check if the target already event member */
                $check_target = $db->query(sprintf("SELECT * FROM events_members WHERE user_id = %s AND event_id = %s", secure($uid, 'int'),  secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* if yes -> return */
                if ($check_target->num_rows > 0) return;
                /* get event */
                $event = $check_viewer->fetch_assoc();
                /* insert invitation */
                $db->query(sprintf("INSERT INTO events_members (user_id, event_id, is_invited) VALUES (%s, %s, '1')", secure($uid, 'int'), secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update invited counter +1 */
                $db->query(sprintf("UPDATE `events` SET event_invited = event_invited + 1  WHERE event_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* send notification (page invitation) to the target user */
                $this->post_notification(array('to_user_id' => $uid, 'action' => 'event_invitation', 'hub' => "LocalHub", 'node_type' => $event['event_title'], 'node_url' => $event['event_id']));
                break;
        }
    }

    /**
     * connection
     * 
     * @param integer $user_id
     * @param boolean $friendship
     * @return string
     */
    public function connection($user_id, $friendship = false)
    {
        /* check which type of connection (friendship|follow) connections to get */
        if ($friendship) {
            /* check if there is a logged user */
            if (!$this->_logged_in) {
                /* no logged user */
                return "add";
            }
            /* check if the viewer is the target */
            if ($user_id == $this->_data['user_id']) {
                return "me";
            }
            /* check if the viewer & the target are friends */
            if (in_array($user_id, $this->_data['friends_ids'])) {
                return "remove";
            }
            /* check if the target sent a request to the viewer */
            if (in_array($user_id, $this->_data['friend_requests_ids'])) {
                return "request";
            }
            /* check if the viewer sent a request to the target */
            if (in_array($user_id, $this->_data['friend_requests_sent_ids'])) {
                return "cancel";
            }
            /* check if the viewer declined the friend request to the target */
            if ($this->friendship_declined($user_id)) {
                return "declined";
            }
            /* there is no relation between the viewer & the target */
            return "add";
        } else {
            /* check if there is a logged user */
            if (!$this->_logged_in) {
                /* no logged user */
                return "follow";
            }
            /* check if the viewer is the target */
            if ($user_id == $this->_data['user_id']) {
                return "me";
            }
            if (in_array($user_id, $this->_data['followings_ids'])) {
                /* the viewer follow the target */
                return "unfollow";
            } else {
                /* the viewer not follow the target */
                return "follow";
            }
        }
    }

    /**
     * get_followers
     * 
     * @param integer $user_id
     * @param integer $offset
     * @param boolean $get_all
     * @return array
     */
    public function get_followers($user_id, $offset = 0, $get_all = false)
    {
        global $db, $system;
        $followers = [];
        $offset *= $system['min_results_even'];
        $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($system['min_results_even'], 'int', false));
        $get_followers = $db->query(sprintf('SELECT users.user_id, users.user_name, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, users.global_user_picture as user_picture, users.user_subscribed, users.user_verified FROM global_followings INNER JOIN users ON (global_followings.user_id = users.user_id) LEFT JOIN global_profile ON (global_followings.user_id = global_profile.user_id) WHERE global_followings.following_id = %s ' . $limit_statement, secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_followers->num_rows > 0) {
            while ($follower = $get_followers->fetch_assoc()) {
                if ($follower['user_picture'] == "") {
                    $follower['user_picture'] = get_picture($follower['user_picture'], $follower['user_gender']);
                    //                    $checkImage = image_exist($follower['user_picture']);
                    if ($system['s3_enabled']) {
                        $system['system_uploads'] = $system['system_uploads_url'];
                    }
                    //                    if ($checkImage != 200) {
                    //                        $follower['user_picture'] = $system['system_uploads'] . '/' . $follower['user_picture_full'];
                    //                    }

                    $follower['user_picture'] = $system['system_url'] . '/includes/wallet-api/image-exist-api.php?userPicture=' . $follower['user_picture'] . '&userPictureFull=' . $system['system_uploads'] . '/' . $follower['user_picture_full'] . '&type=1';
                } else {
                    $follower['user_picture'] = $system['system_uploads'] . '/' . $follower['user_picture'];
                }
                //$follower['user_picture'] = get_picture($follower['user_picture'], $follower['user_gender']);
                /* get the connection between the viewer & the target */
                $follower['connection'] = $this->connection($follower['user_id'], false);
                $followers[] = $follower;
            }
        }
        return $followers;
    }


    /**
     * get_followings
     * 
     * @param integer $user_id
     * @param integer $offset
     * @param boolean $get_all
     * @return array
     */
    public function get_followings($user_id, $offset = 0, $get_all = false)
    {
        global $db, $system;
        $followings = [];
        $offset *= $system['min_results_even'];
        $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($system['min_results_even'], 'int', false));
        $get_followings = $db->query(sprintf('SELECT users.user_id, users.user_name, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, users.global_user_picture as user_picture, users.user_subscribed, users.user_verified FROM global_followings INNER JOIN users ON (global_followings.following_id = users.user_id) LEFT JOIN global_profile ON (global_followings.following_id = global_profile.user_id) WHERE global_followings.user_id = %s ' . $limit_statement, secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_followings->num_rows > 0) {
            while ($following = $get_followings->fetch_assoc()) {
                $following['user_picture'] = get_picture($following['user_picture'], $following['user_gender']);
                /* get the connection between the viewer & the target */
                $following['connection'] = $this->connection($following['user_id'], false);
                $followings[] = $following;
            }
        }
        return $followings;
    }


    /**
     * check_page_membership
     * 
     * @param integer $user_id
     * @param integer $page_id
     * @return boolean
     */
    public function check_page_membership($user_id, $page_id)
    {
        global $db;
        if ($this->_logged_in) {
            $get_likes = $db->query(sprintf("SELECT COUNT(*) as count FROM pages_likes WHERE user_id = %s AND page_id = %s", secure($user_id, 'int'), secure($page_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($get_likes->fetch_assoc()['count'] > 0) {
                return true;
            }
        }
        return false;
    }
    /**
     * friendship_declined
     * 
     * @param integer $user_id
     * @return boolean
     */
    public function friendship_declined($user_id)
    {
        global $db;
        /* check if there is any declined friendship request between the viewer & the target */
        if ($this->_logged_in) {
            $check = $db->query(sprintf('SELECT COUNT(*) as count FROM friends WHERE status = -1 AND (user_one_id = %1$s AND user_two_id = %2$s) OR (user_one_id = %2$s AND user_two_id = %1$s)', secure($this->_data['user_id'], 'int'),  secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check->fetch_assoc()['count'] > 0) {
                return true;
            }
        }
        return false;
    }
    /**
     * check_group_membership
     * 
     * @param integer $user_id
     * @param integer $group_id
     * @return mixed
     */
    public function check_group_membership($user_id, $group_id)
    {
        global $db;
        if ($this->_logged_in) {
            $get_membership = $db->query(sprintf("SELECT * FROM groups_members WHERE user_id = %s AND group_id = %s", secure($user_id, 'int'), secure($group_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($get_membership->num_rows > 0) {
                $membership = $get_membership->fetch_assoc();
                return ($membership['approved'] == '1') ? "approved" : "pending";
            }
        }
        return false;
    }

    /**
     * check_event_membership
     * 
     * @param integer $user_id
     * @param integer $event_id
     * @return mixed
     */
    public function check_event_membership($user_id, $event_id)
    {
        global $db;
        if ($this->_logged_in) {
            $get_membership = $db->query(sprintf("SELECT is_invited, is_interested, is_going FROM events_members WHERE user_id = %s AND event_id = %s", secure($user_id, 'int'), secure($event_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($get_membership->num_rows > 0) {
                return $get_membership->fetch_assoc();
            }
        }
        return false;
    }
    /**
     * get_followers_ids
     * 
     * @param integer $user_id
     * @return array
     */
    public function get_followers_ids($user_id)
    {
        global $db;
        $followers = [];
        $get_followers = $db->query(sprintf("SELECT user_id FROM global_followings WHERE following_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_followers->num_rows > 0) {
            while ($follower = $get_followers->fetch_assoc()) {
                $followers[] = $follower['user_id'];
            }
        }
        return $followers;
    }
    /**
     * get_mutual_friends_count
     * 
     * @param integer $user_two_id
     * @return integer
     */
    public function get_mutual_friends_count($user_two_id)
    {
        return count(array_intersect($this->_data['friends_ids'], $this->get_friends_ids($user_two_id)));
    }

    /**
     * live_counters_reset
     * 
     * @param string $counter
     * @return void
     */
    public function live_counters_reset($counter)
    {
        global $db;

        $db->query(sprintf("UPDATE users SET user_live_requests_counter = 0,
            user_live_messages_counter = 0,user_live_notifications_counter=0 WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        $db->query(sprintf("UPDATE notifications SET seen = '1' WHERE to_user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
    }
    /**
     * get_search_log
     * 
     * @return array
     */
    public function get_search_log()
    {
        global $db, $system;
        $results = [];
        $get_search_log = $db->query(sprintf("SELECT users_searches.log_id, users_searches.node_type, users.user_id, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture, users.user_subscribed, users.user_verified, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, pages.*, `groups`.*, `events`.* FROM users_searches LEFT JOIN users ON users_searches.node_type = 'user' LEFT JOIN global_profile ON users_searches.node_type = 'global_profile' AND users_searches.node_id = users.user_id LEFT JOIN pages ON users_searches.node_type = 'page' AND users_searches.node_id = pages.page_id LEFT JOIN `groups` ON users_searches.node_type = 'group' AND users_searches.node_id = `groups`.group_id LEFT JOIN `events` ON users_searches.node_type = 'event' AND users_searches.node_id = `events`.event_id WHERE users_searches.user_id = %s ORDER BY users_searches.log_id DESC LIMIT %s", secure($this->_data['user_id'], 'int'), secure($system['min_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
        if ($get_search_log->num_rows > 0) {
            while ($result = $get_search_log->fetch_assoc()) {
                switch ($result['node_type']) {
                    case 'user':
                        $result['user_picture'] = get_picture($result['user_picture'], $result['user_gender']);
                        /* get the connection between the viewer & the target */
                        $result['connection'] = $this->connection($result['user_id']);
                        break;
                    case 'global_profile':
                        $result['user_firstname'] = $result['user_firstname'];
                        $result['user_lastname'] = $result['user_lastname'];
                        $result['user_gender'] = $result['user_gender'];
                        /* get the connection between the viewer & the target */
                        $result['connection'] = $this->connection($result['user_id']);
                        break;

                    case 'page':
                        $result['page_picture'] = get_picture($result['page_picture'], 'page');
                        /* check if the viewer liked the page */
                        $result['i_like'] = $this->check_page_membership($this->_data['user_id'], $result['page_id']);
                        break;

                    case 'group':
                        $result['group_picture'] = get_picture($result['group_picture'], 'group');
                        /* check if the viewer joined the group */
                        $result['i_joined'] = $this->check_group_membership($this->_data['user_id'], $result['group_id']);
                        break;

                    case 'event':
                        $result['event_picture'] = get_picture($result['event_cover'], 'event');
                        /* check if the viewer joined the event */
                        $result['i_joined'] = $this->check_event_membership($this->_data['user_id'], $result['event_id']);
                        break;
                }
                $result['type'] = $result['node_type'];
                $results[] = $result;
            }
        }
        return $results;
    }


    /**
     * set_search_log
     * 
     * @param integer $node_id
     * @param string $node_type
     * @return void
     */
    public function set_search_log($node_id, $node_type)
    {
        global $db, $date;
        $db->query(sprintf("INSERT INTO users_searches (user_id, node_id, node_type, time) VALUES (%s, %s, %s, %s)", secure($this->_data['user_id'], 'int'), secure($node_id, 'int'), secure($node_type), secure($date)));
    }


    /**
     * clear_search_log
     * 
     * @return void
     */
    public function clear_search_log()
    {
        global $db, $system;
        $db->query(sprintf("DELETE FROM users_searches WHERE user_id = %s", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
    }
    /**
     * get_album
     * 
     * @param integer $album_id
     * @param boolean $full_details
     * @return array
     */
    public function get_album($album_id, $full_details = true)
    {
        global $db, $system;
        
        $albumGet = sprintf("SELECT posts_photos_albums.*, users.user_name, users.user_album_pictures, users.global_user_album_covers, users.user_album_timeline, pages.page_id, pages.page_name, pages.page_admin, pages.page_album_pictures, pages.page_album_covers, pages.page_album_timeline, `groups`.group_name, `groups`.group_admin, `groups`.group_album_pictures, `groups`.group_album_covers, `groups`.group_album_timeline, `events`.event_admin, `events`.event_album_covers, `events`.event_album_timeline FROM global_posts_photos_albums as posts_photos_albums LEFT JOIN users ON posts_photos_albums.user_id = users.user_id AND posts_photos_albums.user_type = 'user' LEFT JOIN pages ON posts_photos_albums.user_id = pages.page_id AND posts_photos_albums.user_type = 'page' LEFT JOIN `groups` ON posts_photos_albums.in_group = '1' AND posts_photos_albums.group_id = `groups`.group_id LEFT JOIN `events` ON posts_photos_albums.in_event = '1' AND posts_photos_albums.event_id = `events`.event_id WHERE NOT (users.user_name <=> NULL AND pages.page_name <=> NULL) AND posts_photos_albums.album_id = %s", secure($album_id, 'int'));
        $get_album = $db->query($albumGet) or _error("SQL_ERROR_THROWEN");
        if ($get_album->num_rows == 0) {
            return false;
        }
        $album = $get_album->fetch_assoc();
        /* get the author */
        $album['author_id'] = ($album['user_type'] == "page") ? $album['page_admin'] : $album['user_id'];
        /* check the album privacy  */
        /* if album in group & (the group is public || the viewer approved member of this group) => pass privacy check */
        if ($album['in_group'] && ($album['group_privacy'] == 'public' || $this->check_group_membership($this->_data['user_id'], $album['group_id']) == 'approved')) {
            $pass_privacy_check = true;
        }
        /* if album in event & (the event is public || the viewer member of this event) => pass privacy check */
        if ($album['in_event'] && ($album['event_privacy'] == 'public' || $this->check_event_membership($this->_data['user_id'], $album['event_id']))) {
            $pass_privacy_check = true;
        }
        if (!$pass_privacy_check) {
            if (!$this->check_privacy($album['privacy'], $album['author_id'])) {
                return false;
            }
        }
        /* get album path */
        if ($album['in_group']) {
            $album['path'] = 'groups/' . $album['group_name'];
            /* check if (cover|profile|timeline) album */
            $album['can_delete'] = (($album_id == $album['group_album_pictures']) or ($album_id == $album['group_album_covers']) or ($album_id == $album['group_album_timeline'])) ? false : true;
        } elseif ($album['in_event']) {
            $album['path'] = 'events/' . $album['event_id'];
            /* check if (cover|profile|timeline) album */
            $album['can_delete'] = (($album_id == $album['event_album_pictures']) or ($album_id == $album['event_album_covers']) or ($album_id == $album['event_album_timeline'])) ? false : true;
        } elseif ($album['user_type'] == "user") {
            $album['path'] = $album['user_name'];
            /* check if (cover|profile|timeline) album */
            $album['can_delete'] = (($album_id == $album['user_album_pictures']) or ($album_id == $album['global_user_album_covers']) or ($album_id == $album['user_album_timeline'])) ? false : true;
        } elseif ($album['user_type'] == "page") {
            $album['path'] = 'pages/' . $album['page_name'];
            /* check if (cover|profile|timeline) album */
            $album['can_delete'] = (($album_id == $album['user_album_timeline']) or ($album_id == $album['page_album_covers']) or ($album_id == $album['page_album_timeline'])) ? false : true;
        }
        /* get album cover photo */
        $where_statement = ($album['user_type'] == "user" && !$album['in_group'] && !$album['in_event']) ? "global_posts.privacy = 'public' AND" : '';
        $coverget = sprintf("SELECT source, blur FROM global_posts_photos INNER JOIN global_posts ON global_posts_photos.post_id = global_posts.post_id WHERE " . $where_statement . " global_posts_photos.album_id = %s ORDER BY photo_id DESC LIMIT 1", secure($album_id, 'int'));
        $get_cover = $db->query($coverget) or _error("SQL_ERROR_THROWEN");
        if ($get_cover->num_rows == 0) {
            $album['cover']['source'] = $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/blank_album.jpg';
            $album['cover']['blur'] = 0;
        } else {
            $cover = $get_cover->fetch_assoc();
            $album['cover']['source'] = $system['system_uploads'] . '/' . $cover['source'];
            $album['cover']['blur'] = $cover['blur'];
        }
        /* get album total photos count */
        $get_album_photos_count = $db->query(sprintf("SELECT COUNT(*) as count FROM global_posts_photos WHERE album_id = %s", secure($album_id, 'int'))) or _error("SQL_ERROR");
        
        // echo'<pre>';print_r($get_album_photos_count->fetch_assoc());die;
        $album['photos_count'] = $get_album_photos_count->fetch_assoc()['count'];

        /* check if viewer can manage album [Edit|Update|Delete] */
        $album['is_page_admin'] = $this->check_page_adminship($this->_data['user_id'], $album['page_id']);
        $album['is_group_admin'] = $this->check_group_adminship($this->_data['user_id'], $album['group_id']);
        $album['is_event_admin'] = $this->check_event_adminship($this->_data['user_id'], $album['event_id']);
        /* check if viewer can manage album [Edit|Update|Delete] */
        $album['manage_album'] = false;
        if ($this->_logged_in) {
            /* viewer is (admins|moderators)] */
            if ($this->_data['user_group'] < 3) {
                $album['manage_album'] = true;
            }
            /* viewer is the author of post */
            if ($this->_data['user_id'] == $album['author_id']) {
                $album['manage_album'] = true;
            }
            /* viewer is the admin of the page */
            if ($album['user_type'] == "page" && $album['is_page_admin']) {
                $album['manage_album'] = true;
            }
            /*
            /* viewer is the admin of the group */
            if ($album['in_group'] && $album['is_group_admin']) {
                $album['manage_album'] = true;
            }
            /* viewer is the admin of the event */
            if ($album['in_event'] && $album['is_event_admin']) {
                $album['manage_album'] = true;
            }
        }
        //echo "<pre>";print_r($full_details);die;
        /* get album photos */
        if ($full_details) {
            $album['photos'] = $this->get_photos($album_id, 'album');
        }
        return $album;
    }

    /* ------------------------------- */
    /* Photos & Albums */
    /* ------------------------------- */

    /**
     * get_photos
     * 
     * @param integer $id
     * @param string $type
     * @param integer $offset
     * @param boolean $pass_check
     * @return array
     */
    public function get_photos($id, $type = 'user', $offset = 0, $pass_check = true)
    {
        global $db, $system;
        $photos = [];

        switch ($type) {
            case 'album':
                $offset *= $system['max_results_even'];
                if (!$pass_check) {
                    /* check the album */
                    $album = $this->get_album($id, false);
                    if (!$album) {
                        return $photos;
                    }
                }
                $query = sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur, posts.user_id, posts.user_type, posts.privacy FROM global_posts_photos as posts_photos INNER JOIN global_posts as posts ON posts_photos.post_id = posts.post_id WHERE posts_photos.album_id = %s ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['max_results_even'], 'int', false));
                $get_photos = $db->query($query) or _error("SQL_ERROR_THROWEN");
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        /* check the photo privacy */
                        if ($photo['privacy'] == "public" || $photo['privacy'] == "custom") {
                            $photos[] = $photo;
                        } else {
                            /* check the photo privacy */
                            if ($this->check_privacy($photo['privacy'], $photo['user_id'])) {
                                $photos[] = $photo;
                            }
                        }
                    }
                }
                break;

            case 'user':
                /* get the target user's privacy */
                $get_privacy = $db->query(sprintf("SELECT user_privacy_photos FROM users WHERE user_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $privacy = $get_privacy->fetch_assoc();
                /* check the target user's privacy  */
                if (!$this->check_privacy($privacy['user_privacy_photos'], $id)) {
                    return $photos;
                }
                /* check manage photos */
                $manage_photos = false;
                if ($this->_logged_in) {
                    /* viewer is (admins|moderators)] */
                    if ($this->_data['user_group'] < 3) {
                        $manage_photos = true;
                    }
                    /* viewer is the author of photos */
                    if ($this->_data['user_id'] == $id) {
                        $manage_photos = true;
                    }
                }
                /* get all user photos (except photos from groups or events) */
                $offset *= $system['min_results_even'];
                $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur, posts.privacy FROM posts_photos INNER JOIN posts ON posts_photos.post_id = posts.post_id WHERE posts.user_id = %s AND posts.user_type = 'user' AND posts.in_group = '0' AND posts.in_event = '0' ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        if ($this->check_privacy($photo['privacy'], $id)) {
                            $photo['manage'] = $manage_photos;
                            $photos[] = $photo;
                        }
                    }
                }
                break;

            case 'page':
                /* check manage photos */
                $manage_photos = false;
                if ($this->_logged_in) {
                    /* viewer is (admins|moderators)] */
                    if ($this->_data['user_group'] < 3) {
                        $manage_photos = true;
                    }
                    /* viewer is the author of photos */
                    if ($this->check_page_adminship($this->_data['user_id'], $id)) {
                        $manage_photos = true;
                    }
                }
                /* get all page photos */
                $offset *= $system['min_results_even'];
                $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur FROM posts_photos INNER JOIN posts ON posts_photos.post_id = posts.post_id WHERE posts.user_id = %s AND posts.user_type = 'page' ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        $photo['manage'] = $manage_photos;
                        $photos[] = $photo;
                    }
                }
                break;

            case 'group':
                if (!$pass_check) {
                    /* check if the viewer is group member (approved) */
                    if ($this->check_group_membership($this->_data['user_id'], $id) != "approved") {
                        return $photos;
                    }
                }
                /* check manage photos */
                $manage_photos = false;
                if ($this->_logged_in) {
                    /* viewer is (admins|moderators)] */
                    if ($this->_data['user_group'] < 3) {
                        $manage_photos = true;
                    }
                    /* viewer is the author of photos */
                    if ($this->check_group_adminship($this->_data['user_id'], $id)) {
                        $manage_photos = true;
                    }
                }
                /* get all group photos */
                $offset *= $system['min_results_even'];
                $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur FROM posts_photos INNER JOIN posts ON posts_photos.post_id = posts.post_id WHERE posts.group_id = %s AND posts.in_group = '1' ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        $photo['manage'] = $manage_photos;
                        $photos[] = $photo;
                    }
                }
                break;

            case 'event':
                if (!$pass_check) {
                    /* check if the viewer is event member (approved) */
                    if (!$this->check_event_membership($this->_data['user_id'], $id)) {
                        return $photos;
                    }
                }
                /* check manage photos */
                $manage_photos = false;
                if ($this->_logged_in) {
                    /* viewer is (admins|moderators)] */
                    if ($this->_data['user_group'] < 3) {
                        $manage_photos = true;
                    }
                    /* viewer is the author of photos */
                    if ($this->check_event_adminship($this->_data['user_id'], $id)) {
                        $manage_photos = true;
                    }
                }
                /* get all event photos */
                $offset *= $system['min_results_even'];
                $get_photos = $db->query(sprintf("SELECT posts_photos.photo_id, posts_photos.source, posts_photos.blur FROM posts_photos INNER JOIN posts ON posts_photos.post_id = posts.post_id WHERE posts.event_id = %s AND posts.in_event = '1' ORDER BY posts_photos.photo_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_photos->num_rows > 0) {
                    while ($photo = $get_photos->fetch_assoc()) {
                        $photo['manage'] = $manage_photos;
                        $photos[] = $photo;
                    }
                }
                break;
        }
        return $photos;
    }



    /**
     * edit_privacy
     * 
     * @param integer $post_id
     * @param string $privacy
     * @return void
     */
    public function edit_privacy($post_id, $privacy)
    {
        global $db, $system;
        /* (check|get) post */
        $post = $this->_check_post($post_id, true);
        if (!$post) {
            _error(403);
        }
        /* check if viewer can edit privacy */
        if ($post['manage_post'] && $post['user_type'] == 'user' && !$post['in_group'] && !$post['in_event'] && $post['post_type'] != "product") {
            /* update privacy */
            $db->query(sprintf("UPDATE global_posts SET privacy = %s WHERE post_id = %s", secure($privacy), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        } else {
            _error(403);
        }
    }

    /**
     * _check_post
     * 
     * @param integer $id
     * @param boolean $pass_privacy_check
     * @param boolean $full_details
     * @return array|false
     */
    private function _check_post($id, $pass_privacy_check = false, $full_details = true)
    {
        global $db, $system;

        /* get post */
        $get_post = $db->query(sprintf("SELECT global_posts.*, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture, users.user_picture_id, users.user_cover, users.user_cover_id, users.user_verified, users.user_subscribed, users.user_pinned_post, pages.*, `groups`.*, `events`.* FROM global_posts LEFT JOIN users ON global_posts.user_id = users.user_id AND global_posts.user_type = 'user' LEFT JOIN pages ON global_posts.user_id = pages.page_id AND global_posts.user_type = 'page' LEFT JOIN `groups` ON global_posts.in_group = '1' AND global_posts.group_id = `groups`.group_id LEFT JOIN `events` ON global_posts.in_event = '1' AND global_posts.event_id = `events`.event_id WHERE NOT (users.user_name <=> NULL AND pages.page_name <=> NULL) AND global_posts.post_id = %s", secure($id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_post->num_rows == 0) {
            return false;
        }
        $post = $get_post->fetch_assoc();
        /* check if the page has been deleted */
        if ($post['user_type'] == "page" && !$post['page_admin']) {
            return false;
        }
        /* check if there is any blocking between the viewer & the post author */
        if ($post['user_type'] == "user" && $this->blocked($post['user_id'])) {
            return false;
        }

        /* get reactions array */
        $post['reactions']['like'] = $post['reaction_like_count'];
        $post['reactions']['love'] = $post['reaction_love_count'];
        $post['reactions']['haha'] = $post['reaction_haha_count'];
        $post['reactions']['yay'] = $post['reaction_yay_count'];
        $post['reactions']['wow'] = $post['reaction_wow_count'];
        $post['reactions']['sad'] = $post['reaction_sad_count'];
        $post['reactions']['angry'] = $post['reaction_angry_count'];
        arsort($post['reactions']);

        /* get total reactions */
        $post['reactions_total_count'] = $post['reaction_like_count'] + $post['reaction_love_count'] + $post['reaction_haha_count'] + $post['reaction_yay_count'] + $post['reaction_wow_count'] + $post['reaction_sad_count'] + $post['reaction_angry_count'];

        /* get the author */
        $post['author_id'] = ($post['user_type'] == "page") ? $post['page_admin'] : $post['user_id'];
        $post['is_page_admin'] = $this->check_page_adminship($this->_data['user_id'], $post['page_id']);
        $post['is_group_admin'] = $this->check_group_adminship($this->_data['user_id'], $post['group_id']);
        $post['is_event_admin'] = $this->check_event_adminship($this->_data['user_id'], $post['event_id']);
        $post['post_author_online'] = false;
        /* check the post author type */
        if ($post['user_type'] == "user") {
            /* user */
            $post['post_author_picture'] = get_picture($post['user_picture'], $post['user_gender']);
            //            $checkImage = image_exist($post['post_author_picture']);
            //            if ($checkImage != '200') {
            //                $post['post_author_picture'] = $system['system_uploads'] . '/' . $this->_data['user_picture_full'];
            //            }

            $post['post_author_picture'] = $system['system_url'] . '/includes/wallet-api/image-exist-api.php?userPicture=' . $post['post_author_picture'] . '&userPictureFull=' . $this->_data['user_picture_full'];

            $post['post_author_url'] = $system['system_url'] . '/' . $post['user_name'];
            $post['post_author_name'] = $post['user_firstname'] . " " . $post['user_lastname'];
            $post['post_author_verified'] = $post['user_verified'];
            $post['pinned'] = ((!$post['in_group'] && !$post['in_event'] && $post['post_id'] == $post['user_pinned_post']) || ($post['in_group'] && $post['post_id'] == $post['group_pinned_post']) || ($post['in_event'] && $post['post_id'] == $post['event_pinned_post'])) ? true : false;
            if ($system['posts_online_status']) {
                /* check if the post author is online & enable the chat */
                $get_user_status = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s AND user_chat_enabled = '1' AND user_last_seen >= SUBTIME(NOW(), SEC_TO_TIME(%s))", secure($post['author_id'], 'int'), secure($system['offline_time'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_user_status->fetch_assoc()['count'] > 0) {
                    $post['post_author_online'] = true;
                }
            }
        } else {
            /* page */
            $post['post_author_picture'] = get_picture($post['page_picture'], "page");
            $post['post_author_url'] = $system['system_url'] . '/pages/' . $post['page_name'];
            $post['post_author_name'] = $post['page_title'];
            $post['post_author_verified'] = $post['page_verified'];
            $post['pinned'] = ($post['post_id'] == $post['page_pinned_post']) ? true : false;
        }
        if (!$system['posts_online_status']) {
            $post['post_author_online'] = false;
        }
        /* check if viewer can manage post [Edit|Pin|Delete] */
        $post['manage_post'] = false;
        if ($this->_logged_in) {
            /* viewer is (admins|moderators)] */
            if ($this->_data['user_group'] < 3) {
                $post['manage_post'] = true;
            }
            /* viewer is the author of post || page admin */
            if ($this->_data['user_id'] == $post['author_id']) {
                $post['manage_post'] = true;
            }
            /* viewer is the admin of the page of the post */
            if ($post['user_type'] == "page" && $post['is_page_admin']) {
                $post['manage_post'] = true;
            }
            /* viewer is the admin of the group of the post */
            if ($post['in_group'] && $post['is_group_admin']) {
                $post['manage_post'] = true;
            }
            /* viewer is the admin of the event of the post */
            if ($post['in_event'] && $post['is_event_admin']) {
                $post['manage_post'] = true;
            }
        }

        /* full details */
        if ($full_details) {
            /* check if wall post */
            if ($post['in_wall']) {
                $get_wall_user = $db->query(sprintf("SELECT user_firstname, user_lastname, user_name FROM users WHERE user_id = %s", secure($post['wall_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($get_wall_user->num_rows == 0) {
                    return false;
                }
                $wall_user = $get_wall_user->fetch_assoc();
                $post['wall_username'] = $wall_user['user_name'];
                $post['wall_fullname'] = $wall_user['user_firstname'] . " " . $wall_user['user_lastname'];
            }

            /* check if viewer [reacted|saved] this post */
            $post['i_save'] = false;
            $post['i_react'] = false;
            if ($this->_logged_in) {
                /* save */
                $check_save = $db->query(sprintf("SELECT COUNT(*) as count FROM posts_saved WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($check_save->fetch_assoc()['count'] > 0) {
                    $post['i_save'] = true;
                }
                /* reaction */
                if ($post['reactions_total_count'] > 0) {
                    $get_reaction = $db->query(sprintf("SELECT reaction FROM posts_reactions WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    if ($get_reaction->num_rows > 0) {
                        $post['i_react'] = true;
                        $post['i_reaction'] = $get_reaction->fetch_assoc()['reaction'];
                        $post['i_reaction_details'] = get_reaction_details($post['i_reaction']);
                    }
                }
            }
        }

        /* check privacy */
        /* if post in group & (the group is public || the viewer approved member of this group) => pass privacy check */
        if ($post['in_group'] && ($post['group_privacy'] == 'public' || $this->check_group_membership($this->_data['user_id'], $post['group_id']) == 'approved')) {
            $pass_privacy_check = true;
        }
        /* if post in event & (the event is public || the viewer member of this event) => pass privacy check */
        if ($post['in_event'] && ($post['event_privacy'] == 'public' || $this->check_event_membership($this->_data['user_id'], $post['event_id']))) {
            $pass_privacy_check = true;
        }
        if ($pass_privacy_check || $this->check_privacy($post['privacy'], $post['author_id'])) {
            return $post;
        }
        return false;
    }

    public function retweet($post_id, $args)
    {
        global $db, $date;
        /* check if the viewer can retweet the post */
        $post = $this->global_check_post($post_id, true);
        if (!$post || $post['privacy'] != 'public') {
            _error(403);
        }
        /* check blocking */
        if ($this->blocked($post['author_id'])) {
            _error(403);
        }
        /* retweet to */
        switch ($args) {
            case 'retweet':
                $check = $db->query(sprintf("SELECT* FROM global_retweet WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($check->num_rows < 1) {
                    $db->query(sprintf("INSERT INTO global_retweet (user_id, post_id, retweet_time) VALUES (%s, %s, %s)", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'), secure($date))) or _error("SQL_ERROR_THROWEN");
                    /* update the origin post retweet counter */
                    $db->query(sprintf("UPDATE global_posts SET retweet = retweet + 1 WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                }
                break;
            case 'undoRetweet':
                $db->query(sprintf("DELETE FROM global_retweet WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                /* update the origin post retweet counter */
                $db->query(sprintf("UPDATE global_posts SET retweet = retweet - 1 WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                break;
        }
        return true;
    }

    public function share($post_id, $args)
    {
        global $db, $date;
        if (!isset($args['share_to'])) {
            $args['share_to'] = 'timeline';
        }
        /* check if the viewer can share the post */
        $post = $this->global_check_post($post_id, true);

        if (!$post || $post['privacy'] != 'public') {
            _error(403);
        }
        /* check blocking */
        if ($this->blocked($post['author_id'])) {
            _error(403);
        }
        // share post
        /* get the origin post */
        if ($post['post_type'] == "shared") {
            $origin = $this->global_check_post($post['origin_id'], true);
            if (!$origin || $origin['privacy'] != 'public') {
                _error(403);
            }
            $post_id = $origin['post_id'];
            $author_id = $origin['author_id'];
        } else {
            $post_id = $post['post_id'];
            $author_id = $post['author_id'];
        }
        /* share to */
        switch ($args['share_to']) {
            case 'timeline':
                /* insert the new shared post */
                $db->query(sprintf("INSERT INTO global_posts (user_id, user_type, post_type, origin_id, time, privacy, text) VALUES (%s, 'user', 'shared', %s, %s, 'public', %s)", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'), secure($date), secure($args['message']))) or _error("SQL_ERROR_THROWEN");
                break;

            case 'page':
                /* check if the page is valid */
                $check_page = $db->query(sprintf("SELECT COUNT(*) as count FROM pages WHERE page_id = %s", secure($args['page'], 'int'))) or _error("SQL_ERROR_THROWEN");
                if ($check_page->fetch_assoc()['count'] == 0) {
                    _error(400);
                }
                /* check if the viewer is page admin */
                if (!$this->check_page_adminship($this->_data['user_id'], $args['page'])) {
                    _error(400);
                }
                /* insert the new shared post */
                $db->query(sprintf("INSERT INTO global_posts (user_id, user_type, post_type, origin_id, time, privacy, text) VALUES (%s, 'page', 'shared', %s, %s, 'public', %s)", secure($args['page'], 'int'), secure($post_id, 'int'), secure($date), secure($args['message']))) or _error("SQL_ERROR_THROWEN");
                break;


            case 'group':
                /* check if the viewer is group member */
                if ($this->check_group_membership($this->_data['user_id'], $args['group']) != "approved") {
                    _error(400);
                }
                /* insert the new shared post */
                $db->query(sprintf("INSERT INTO global_posts (user_id, user_type, post_type, origin_id, time, privacy, text, in_group, group_id) VALUES (%s, 'user', 'shared', %s, %s, 'public', %s, '1', %s)", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'), secure($date), secure($args['message']), secure($args['group'], 'int'))) or _error("SQL_ERROR_THROWEN");
                break;

            default:
                _error(403);
                break;
        }
        /* update the origin post shares counter */
        $db->query(sprintf("UPDATE global_posts SET shares = shares + 1 WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* post notification */
        $this->post_notification(array('to_user_id' => $author_id, 'action' => 'share',  'hub' => "GlobalHub", 'node_type' => 'post', 'node_url' => $post_id));
    }

    /**
     * bookmark_post
     * 
     * @param integer $post_id
     * @return void
     */
    public function bookmark_post($post_id)
    {
        global $db;
        /* (check|get) post */
        $post = $this->global_check_post($post_id);
        if (!$post) {
            _error(403);
        }
        /* check blocking */
        if ($this->blocked($post['author_id'])) {
            _error(403);
        }
        /* bookmarke post */
        $postQuerychk = sprintf("SELECT * FROM bookmarks WHERE post_id = %s AND user_id = %s", secure($post_id, 'int'), secure($this->_data['user_id'], 'int'));
        $chckCount = $db->query($postQuerychk);
        if ($chckCount->num_rows > 0) {
            return 1;
        } else {

            $db->query(sprintf("INSERT INTO bookmarks (user_id, post_id) VALUES (%s, %s)", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            return 0;
        }
    }

    /**
     * bookmark_post
     * 
     * @param integer $post_id
     * @return void
     */
    public function bookmark_post_remove($post_id)
    {
        global $db;
        /* (check|get) post */
        $post = $this->global_check_post($post_id);
        if (!$post) {
            _error(403);
        }
        /* check blocking */
        if ($this->blocked($post['author_id'])) {
            _error(403);
        }

        $db->query(sprintf("DELETE FROM bookmarks WHERE user_id = %s AND post_id = %s", secure($this->_data['user_id'], 'int'), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
    }

    /**
     * get_posts
     * 
     * @param array $args
     * @return array
     */
    public function global_profile_get_bookmarks_posts($args = [])
    {
        global $db, $system;
        /* initialize vars */
        $posts = [];
        /* validate arguments */
        $get = !isset($args['get']) ? 'newsfeed' : $args['get'];
        $filter = !isset($args['filter']) ? 'all' : $args['filter'];
        if (!in_array($filter, array('all', '', 'link', 'media', 'photos', 'map', 'product', 'article', 'poll', 'video', 'audio', 'file'))) {
            _error(400);
        }
        $last_post_id = !isset($args['last_post_id']) ? null : $args['last_post_id'];
        if (isset($last_post_id) && !is_numeric($last_post_id)) {
            _error(400);
        }
        $offset = !isset($args['offset']) ? 0 : $args['offset'];
        $offset *= $system['max_results'];
        $get_all = !isset($args['get_all']) ? false : true;
        if (isset($args['query'])) {
            if (is_empty($args['query'])) {
                return $posts;
            } else {
                $query = secure($args['query'], 'search', false);
            }
        }
        /* prepare query */
        $order_query = "ORDER BY posts.post_id DESC";
        $where_query = "";

        $loginusrId = $this->_data['user_id'];
        $where_query .= " AND parentId=0";
        $where_query1 .= " (posts.post_id IN (select post_id from bookmarks where user_id = $loginusrId))";

        /* get posts */
        if ($last_post_id != null && $get != 'popular' && $get != 'saved' && $get != 'memories') { /* excluded as not ordered by post_id */
            //$get_posts = $db->query(sprintf("SELECT * FROM (SELECT posts.post_id FROM global_posts as posts ".$where_query.") posts WHERE posts.post_id > %s ORDER BY posts.post_id DESC", secure($last_post_id, 'int') )) or _error("SQL_ERROR_THROWEN");
            $postQuery27 = sprintf("SELECT * FROM (SELECT posts.post_id FROM global_posts as posts " . $where_query . ") posts WHERE posts.post_id > %s ORDER BY posts.post_id DESC", secure($last_post_id, 'int'));
        } else {
            $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($system['max_results'], 'int', false)); /* get_all for cases like download user's posts */
            //$get_posts = $db->query("SELECT posts.post_id FROM global_posts ".$where_query." ".$order_query." ".$limit_statement) or _error("SQL_ERROR_THROWEN");
            $postQuery27 = "SELECT posts.post_id FROM global_posts as posts where" . $where_query1 . " " . $order_query . " " . $limit_statement;
            // echo $postQuery27; die;
        }
        //echo $postQuery27;
        $get_posts = $db->query($postQuery27) or _error("SQL_ERROR_THROWEN");
        if ($get_posts->num_rows > 0) {
            // while($post = $get_posts->fetch_assoc()) {
            //     $post = $this->get_post($post['post_id'], true, true);  $full_details = true, $pass_privacy_check = true 
            //     if($post) {
            //         $posts[] = $post;
            //     }
            // }

            while ($post = $get_posts->fetch_assoc()) {
                $post = $this->global_profile_get_post($post['post_id'], true, true);
                // echo "<pre>"; print_r($post); exit;
                /* $full_details = true, $pass_privacy_check = true */
                if ($post) {
                    //    $childPostData =$this->global_profile_get_child_post($post['post_id'], true, true);
                    //     if($childPostData) {
                    //         $post['childPostExists'] = true;
                    //         $post['childPostData'] = $childPostData;
                    //     }else{
                    //         $post['childPostExists'] = false;
                    //         $post['childPostData'] = [];
                    //     } 

                    $posts[] = $post;
                }
            }
        }
        return $posts;
    }
    /* --- new for global messages ----- */
    public function createConversations($from_id, $to_id)
    {
        global $db, $system, $date;
        /* insert conversation */
        $db->query("INSERT INTO conversations_global (last_message_id) VALUES ('0')") or _error("SQL_ERROR_THROWEN");
        $conversation_id = $db->insert_id;
        /* insert the sender (viewer) */
        $db->query(sprintf("INSERT INTO conversations_global_users (conversation_id, user_id, seen) VALUES (%s, %s, '1')", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        /* insert recipients */
        //  foreach($recipients as $recipient) {
        $db->query(sprintf("INSERT INTO conversations_global_users (conversation_id, user_id) VALUES (%s, %s)", secure($conversation_id, 'int'), secure($to_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        //  }



        /* insert message */
        $image = '';
        $voice_note = '';
        $message = '';

        $db->query(sprintf("INSERT INTO conversations_global_messages (conversation_id, user_id, message, image, voice_note, time) VALUES (%s, %s, %s, %s, %s, %s)", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'), secure($message), secure($image), secure($voice_note), secure($date))) or _error("SQL_ERROR_THROWEN");
        $message_id = $db->insert_id;
        /* update the conversation with last message id */
        $db->query(sprintf("UPDATE conversations_global SET last_message_id = %s WHERE conversation_id = %s", secure($message_id, 'int'), secure($conversation_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* update sender (viewer) with last message id */
        $db->query(sprintf("UPDATE users SET user_live_messages_lastid = %s WHERE user_id = %s", secure($message_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        /* get conversation */
        $conversation = $this->get_conversation($conversation_id);
        /* update all recipients with last message id & only offline recipient messages counter */
        foreach ($conversation['recipients'] as $recipient) {
            $db->query(sprintf("UPDATE users SET user_live_messages_lastid = %s, user_live_messages_counter = user_live_messages_counter + 1 WHERE user_id = %s", secure($message_id, 'int'), secure($recipient['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        }
    }

    /**
     * get_online_friends
     * 
     * @return array
     */
    public function get_online_friends()
    {
        global $db, $system;
        /* get online friends */
        $online_friends = [];
        /* check if the viewer has friends */
        if (!$this->_data['friends_ids']) {
            return $online_friends;
        }
        /* make a list from viewer's friends */
        $friends_list = implode(',', $this->_data['friends_ids']);
        $get_online_friends = $db->query(sprintf("SELECT user_id, user_name, user_firstname, user_lastname, user_gender, user_picture FROM users WHERE user_last_seen >= SUBTIME(NOW(), SEC_TO_TIME(%s)) AND user_chat_enabled = '1' AND user_id IN (%s)", secure($system['offline_time'], 'int', false), $friends_list)) or _error("SQL_ERROR_THROWEN");
        if ($get_online_friends->num_rows > 0) {
            while ($online_friend = $get_online_friends->fetch_assoc()) {
                $online_friend['user_picture'] = get_picture($online_friend['user_picture'], $online_friend['user_gender']);
                $online_friend['user_is_online'] = '1';
                $online_friends[] = $online_friend;
            }
        }
        return $online_friends;
    }


    /**
     * get_offline_friends
     * 
     * @return array
     */
    public function get_offline_friends()
    {
        global $db, $system;
        /* get offline friends */
        $offline_friends = [];
        /* check if the viewer has friends */
        if (!$this->_data['friends_ids']) {
            return $offline_friends;
        }
        /* make a list from viewer's friends */
        $friends_list = implode(',', $this->_data['friends_ids']);
        $get_offline_friends = $db->query(sprintf("SELECT user_id, user_name, user_firstname, user_lastname, user_gender, user_picture, user_subscribed, user_verified, user_last_seen FROM users WHERE user_last_seen < SUBTIME(NOW(), SEC_TO_TIME(%s)) AND user_id IN (%s) ORDER BY user_last_seen DESC LIMIT 25", secure($system['offline_time'], 'int', false), $friends_list)) or _error("SQL_ERROR_THROWEN");
        if ($get_offline_friends->num_rows > 0) {
            while ($offline_friend = $get_offline_friends->fetch_assoc()) {
                $offline_friend['user_picture'] = get_picture($offline_friend['user_picture'], $offline_friend['user_gender']);
                $offline_friend['user_is_online'] = '0';
                $offline_friends[] = $offline_friend;
            }
        }
        return $offline_friends;
    }

    /**
     * get_conversations_new
     * 
     * @return array
     */
    public function get_conversations_new()
    {
        global $db;
        $conversations = [];
        if (!empty($_SESSION['chat_boxes_opened'])) {
            /* make list from opened chat boxes keys (conversations ids) */
            $chat_boxes_opened_list = implode(',', $_SESSION['chat_boxes_opened']);
            $get_conversations = $db->query(sprintf("SELECT conversation_id FROM conversations_global_users WHERE user_id = %s AND seen = '0' AND deleted = '0' AND conversation_id NOT IN (%s)", secure($this->_data['user_id'], 'int'), $chat_boxes_opened_list)) or _error("SQL_ERROR_THROWEN");
        } else {
            $get_conversations = $db->query(sprintf("SELECT conversation_id FROM conversations_global_users WHERE user_id = %s AND seen = '0' AND deleted = '0'", secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        }
        if ($get_conversations->num_rows > 0) {
            while ($conversation = $get_conversations->fetch_assoc()) {
                $db->query(sprintf("UPDATE conversations_global_users SET seen = '1' WHERE conversation_id = %s AND user_id = %s", secure($conversation['conversation_id'], 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                $conversations[] = $this->get_conversation($conversation['conversation_id']);
            }
        }
        return $conversations;
    }


    /**
     * get_conversations
     * 
     * @param integer $offset
     * @return array
     */
    public function get_conversations($offset = 0)
    {
        global $db, $system;
        $conversations = [];
        $offset *= $system['max_results'];
        $conversationsQuery = sprintf("SELECT conversations_global.conversation_id FROM conversations_global INNER JOIN conversations_global_users ON conversations_global.conversation_id = conversations_global_users.conversation_id WHERE conversations_global_users.deleted = '0' AND conversations_global_users.user_id = %s ORDER BY conversations_global.last_message_id DESC LIMIT %s, %s", secure($this->_data['user_id'], 'int'), secure($offset, 'int', false), secure($system['max_results'], 'int', false));
        $get_conversations = $db->query($conversationsQuery) or _error("SQL_ERROR_THROWEN");
        if ($get_conversations->num_rows > 0) {
            while ($conversation = $get_conversations->fetch_assoc()) {
                $conversation = $this->get_conversation($conversation['conversation_id']);
                if ($conversation) {
                    $conversations[] = $conversation;
                }
            }
        }
        return $conversations;
    }


    /**
     * get_conversation
     * 
     * @param integer $conversation_id
     * @return array
     */
    public function get_conversation($conversation_id)
    {
        global $db, $system;
        $conversation = [];
        $getChat = sprintf("SELECT conversations_global.*, conversations_global_messages.message, conversations_global_messages.image, conversations_global_messages.voice_note, conversations_global_messages.time, conversations_global_users.seen,global_profile.user_firstname as user_firstname,global_profile.user_lastname as user_lastname, users.user_id, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture, users.user_subscribed, users.user_verified FROM conversations_global INNER JOIN conversations_global_messages ON conversations_global.last_message_id = conversations_global_messages.message_id INNER JOIN conversations_global_users ON conversations_global.conversation_id = conversations_global_users.conversation_id LEFT JOIN global_profile ON global_profile.user_id = conversations_global_users.user_id INNER JOIN users ON conversations_global_users.user_id = users.user_id WHERE conversations_global_users.user_id = %s AND conversations_global.conversation_id = %s", secure($this->_data['user_id'], 'int'), secure($conversation_id, 'int'));
        $get_conversation = $db->query($getChat) or _error("SQL_ERROR_THROWEN");
        if ($get_conversation->num_rows == 0) {
            return false;
        }
        $conversation = $get_conversation->fetch_assoc();
        // echo "<pre>";print_r($conversation); die;
        /* get recipients */
        $chat_get = sprintf("SELECT conversations_global_users.seen, conversations_global_users.typing, users.user_id, users.user_name, global_profile.user_firstname as user_firstname, global_profile.user_lastname as user_lastname, users.user_gender, users.global_user_picture, users.user_subscribed, users.user_verified FROM conversations_global_users INNER JOIN users ON conversations_global_users.user_id = users.user_id LEFT JOIN global_profile ON users.user_id = global_profile.user_id WHERE conversations_global_users.conversation_id = %s AND conversations_global_users.user_id != %s", secure($conversation['conversation_id'], 'int'), secure($this->_data['user_id'], 'int'));
        $get_recipients = $db->query($chat_get) or _error("SQL_ERROR_THROWEN");
        $recipients_num = $get_recipients->num_rows;
        if ($recipients_num == 0) {
            return false;
        }
        $i = 1;
        while ($recipient = $get_recipients->fetch_assoc()) {
            $onlineStatus = $this->user_online($recipient['user_id']);
            // echo $onlineStatus; die;
            $recipient['user_is_online'] = $onlineStatus;

            // echo $recipient['user_id']." ".$onlineStatus;

            //print_r( $recipient); exit;
            /* get recipient picture */
            $recipient['user_picture'] = get_picture($recipient['global_user_picture'], $recipient['user_gender']);
            /* add to conversation recipients */
            $conversation['recipients'][] = $recipient;
            /* prepare typing recipients */
            if ($system['chat_typing_enabled'] && $recipient['typing']) {
                $chatG = sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s AND user_last_seen >= SUBTIME(NOW(), SEC_TO_TIME(%s))", secure($recipient['user_id'], 'int'), secure($system['offline_time'], 'int', false));
                /* check if recipient typing but offline */
                $get_recipient_status = $db->query($chatG) or _error("SQL_ERROR_THROWEN");
                if ($get_recipient_status->fetch_assoc()['count'] == 0) {
                    /* recipient offline -> remove his typing status */
                    $db->query(sprintf("UPDATE conversations_global_users SET typing = '0' WHERE conversation_id = %s AND user_id = %s", secure($conversation_id, 'int'), secure($recipient['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                } else {
                    /* recipient online -> return his typing status */
                    if ($conversation['typing_name_list']) {
                        $conversation['typing_name_list'] .= ", ";
                    }
                    $conversation['typing_name_list'] .= html_entity_decode($recipient['user_firstname'], ENT_QUOTES);
                }
            }
            /* prepare seen recipients */
            if ($system['chat_seen_enabled'] && $recipient['seen']) {
                if ($conversation['seen_name_list']) {
                    $conversation['seen_name_list'] .= ", ";
                }
                $conversation['seen_name_list'] .= html_entity_decode($recipient['user_firstname'], ENT_QUOTES);
            }
            /* prepare conversation name_list */
            $conversation['name_list'] .= html_entity_decode($recipient['user_firstname'], ENT_QUOTES);
            if ($i < $recipients_num) {
                $conversation['name_list'] .= ", ";
            }
            $i++;
        }
        //echo "recipients_num".$recipients_num;
        /* prepare conversation with multiple_recipients */
        if ($recipients_num > 1) {
            /* multiple recipients */
            $conversation['group_recipients'] = "show";
            $conversation['multiple_recipients'] = true;
            $conversation['link'] = $conversation['conversation_id'];
            $conversation['picture_left'] = $conversation['recipients'][0]['user_picture'];
            $conversation['picture_right'] = $conversation['recipients'][1]['user_picture'];
            // $conversation['senderName'] = $conversation['name'];
            if ($conversation['global_user_firstname']) {
                $conversation['senderName'] = $conversation['global_user_firstname'] . " " . $conversation['global_user_lastname'];
            } else {
                $conversation['senderName'] = $conversation['name'];
            }
            // $conversation['senderUserImage'] = $conversation['recipients'][0]['user_picture'];
            if ($conversation['global_user_picture']) {
                $conversation['senderUserImage'] = $system['system_uploads'] . '/' . $conversation['global_user_picture'];
            } else {
                $conversation['senderUserImage'] = $system['system_uploads'] . '/' . $conversation['recipients'][0]['user_picture'];
            }

            if ($recipients_num > 2) {
                $conversation['name'] = html_entity_decode($conversation['recipients'][0]['user_firstname'], ENT_QUOTES) . ", " . html_entity_decode($conversation['recipients'][1]['user_firstname'], ENT_QUOTES) . " & " . ($recipients_num - 2) . " " . __("more");
                $name_new = "<div class='multiple-recipients-section'> <div class='multiple-recipients-image data-avatar'><div class='left-avatar'><img src='" . $conversation['picture_left'] . "'> </div><div class='right-avatar'><img src='" . $conversation['recipients'][1]['user_picture'] . "'> </div></div>";
                $name_new .= "<div class='multiple-recipients-text'>" . $conversation['name'] . " </div></div>";
                $conversation['name_new'] = $name_new;
                // $conversation['senderName'] = $conversation['name'];
                if ($conversation['global_user_firstname']) {
                    $conversation['senderName'] = $conversation['global_user_firstname'] . " " . $conversation['global_user_lastname'];
                } else {
                    $conversation['senderName'] = $conversation['name'];
                }
                // $conversation['senderUserImage'] = $conversation['recipients'][0]['user_picture'];
                if ($conversation['global_user_firstname']) {
                    $conversation['senderName'] = $conversation['global_user_firstname'] . " " . $conversation['global_user_lastname'];
                } else {
                    $conversation['senderName'] = $conversation['name'];
                }
                if ($conversation['global_user_picture']) {
                    $conversation['senderUserImage'] = $system['system_uploads'] . '/' . $conversation['global_user_picture'];
                } else {
                    $conversation['senderUserImage'] = $system['system_uploads'] . '/' . $conversation['recipients'][0]['user_picture'];
                }
            } else {
                $conversation['name'] = html_entity_decode($conversation['recipients'][0]['user_firstname'], ENT_QUOTES) . " & " . html_entity_decode($conversation['recipients'][1]['user_firstname'], ENT_QUOTES);

                $name_new = "<div class='multiple-recipients-section'> <div class='multiple-recipients-image data-avatar'><div class=' left-avatar'><img src='" . $conversation['recipients'][0]['user_picture'] . "'> </div><div class='right-avatar'><img src='" . $conversation['recipients'][1]['user_picture'] . "'> </div></div>";
                $name_new .= "<div class='multiple-recipients-text'>" . $conversation['name'] . " </div></div>";
                $conversation['name_new'] = $name_new;
                // $conversation['senderName'] = $conversation['name'];
                if ($conversation['global_user_firstname']) {
                    $conversation['senderName'] = $conversation['global_user_firstname'] . " " . $conversation['global_user_lastname'];
                } else {
                    $conversation['senderName'] = $conversation['name'];
                }
                if ($conversation['global_user_picture']) {
                    $conversation['senderUserImage'] = $system['system_uploads'] . '/' . $conversation['global_user_picture'];
                } else {
                    $conversation['senderUserImage'] = $system['system_uploads'] . '/' . $conversation['recipients'][0]['user_picture'];
                }
            }
        } else {
            //echo "<pre>"; print_r($conversation);echo "</pre>";// die;
            /* one recipient */
            $conversation['group_recipients'] = "not_show";
            $conversation['multiple_recipients'] = false;
            $conversation['user_id'] = $conversation['recipients'][0]['user_id'];
            $conversation['link'] = $conversation['recipients'][0]['user_name'];
            $conversation['picture'] = $conversation['recipients'][0]['user_picture'];
            $conversation['name'] = html_entity_decode($conversation['recipients'][0]['user_firstname'], ENT_QUOTES) . " " . html_entity_decode($conversation['recipients'][0]['user_lastname'], ENT_QUOTES);

            $onlineStatus = $this->user_online($conversation['recipients'][0]['user_id']);
            $conversation['user_is_online'] = $onlineStatus;

            $name_new = "<div class='multiple-recipients-section'> <div class='multiple-recipients-image data-avatar'><div class='left'><img src='" . $conversation['picture_left'] = $conversation['recipients'][0]['user_picture'] . "'> </div><div class='right'><img src='" . $conversation['user_picture'] = $conversation['recipients'][1]['picture_right'] . "'> </div></div>";
            $name_new .= "<div class='multiple-recipients-text'>" . $conversation['name'] . " </div></div>";
            $conversation['name_new'] = $name_new;
            $conversation['name_html_new'] = "<div class='message-user-image-section'><div class='imageSection'><img src ='" . $conversation['picture'] . "'></div><div class='nameSection'><span class='js_user-popover' data-uid='" . $conversation['recipients'][0]['user_id'] . "'><a href='" . $system['url'] . "'>" . $conversation['recipients'][0]['user_firstname'] . " " . $conversation['recipients'][0]['user_lastname'] . "</a></span></div></div>";
            $conversation['senderName'] = $conversation['name'];
            if ($conversation['global_user_picture']) {
                $conversation['senderUserImage'] = $system['system_uploads'] . '/' . $conversation['global_user_picture'];
            } else {
                $conversation['senderUserImage'] = $system['system_uploads'] . '/' . $conversation['recipients'][0]['user_picture'];
            }

            //echo "sadasdasd ".$conversation['name_html_new'];exit;   
        }
        //echo "<pre>"; print_r($conversation);
        /* get total number of messages */
        $conversation['total_messages'] = $this->get_conversation_total_messages($conversation_id);
        /* decode message text */
        $conversation['message_orginal'] = $this->decode_emoji($conversation['message']);
        $conversation['message'] = $this->_parse(["text" => $conversation['message'], "decode_mention" => false, "decode_hashtags" => false]);
        /* return */
        // echo "<pre>"; print_r($conversation); //die;

        return $conversation;
    }


    /**
     * get_mutual_conversation
     * 
     * @param array $recipients
     * @param boolean $check_deleted
     * @return integer
     */
    public function get_mutual_conversation($recipients, $check_deleted = false)
    {
        global $db;
        $recipients_array = (array)$recipients;
        $recipients_array[] = $this->_data['user_id'];
        $recipients_list = implode(',', $recipients_array);
        $get_mutual_conversations = $db->query(sprintf('SELECT conversation_id FROM conversations_global_users WHERE user_id IN (%s) GROUP BY conversation_id HAVING COUNT(conversation_id) = %s', $recipients_list, count($recipients_array))) or _error("SQL_ERROR_THROWEN");
        if ($get_mutual_conversations->num_rows == 0) {
            return false;
        }
        while ($mutual_conversation = $get_mutual_conversations->fetch_assoc()) {
            /* get recipients */
            $where_statement = ($check_deleted) ? " AND deleted != '1' " : "";
            $get_recipients = $db->query(sprintf("SELECT COUNT(*) as count FROM conversations_global_users WHERE conversation_id = %s" . $where_statement, secure($mutual_conversation['conversation_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($get_recipients->fetch_assoc()['count'] == count($recipients_array)) {
                return $mutual_conversation['conversation_id'];
            }
        }
    }


    /**
     * get_conversation_total_messages
     * 
     * @param integer $conversation_id
     * @return integer
     */
    public function get_conversation_total_messages($conversation_id)
    {
        global $db;
        $get_total_messages = $db->query(sprintf("SELECT COUNT(*) as count FROM conversations_global_messages WHERE conversation_id = %s", secure($conversation_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        return $get_total_messages->fetch_assoc()['count'];
    }


    /**
     * get_conversation_messages
     * 
     * @param integer $conversation_id
     * @param integer $offset
     * @param integer $last_message_id
     * @return array
     */
    public function get_conversation_messages($conversation_id, $offset = 0, $last_message_id = null)
    {
        global $db, $system;
        /* check if user authorized to see this conversation */
        $check_conversation = $db->query(sprintf("SELECT COUNT(*) as count FROM conversations_global_users WHERE conversation_id = %s AND user_id = %s", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_conversation->fetch_assoc()['count'] == 0) {
            throw new Exception(__("You are not authorized to view this"));
        }
        $offset *= $system['max_results'];
        $messages = [];
        if ($last_message_id !== null) {
            /* get all messages after the last_message_id */
            $messages_query = sprintf("SELECT conversations_global_messages.message_id, conversations_global_messages.message, conversations_global_messages.image, conversations_global_messages.voice_note, conversations_global_messages.time, users.user_id, users.user_name, global_profile.user_firstname as user_firstname, global_profile.user_lastname as user_lastname, users.user_gender, users.global_user_picture, users.user_subscribed, users.user_verified, picture_photo.source as user_picture_full FROM conversations_global_messages INNER JOIN users ON conversations_global_messages.user_id = users.user_id LEFT JOIN global_profile ON users.user_id = global_profile.user_id LEFT JOIN posts_photos as picture_photo ON users.user_picture_id = picture_photo.photo_id WHERE conversations_global_messages.conversation_id = %s AND conversations_global_messages.message_id > %s", secure($conversation_id, 'int'), secure($last_message_id, 'int'));
        } else {
            $messages_query = sprintf("SELECT * FROM ( SELECT conversations_global_messages.message_id, conversations_global_messages.message, conversations_global_messages.image, conversations_global_messages.voice_note, conversations_global_messages.time, users.user_id, users.user_name, global_profile.user_firstname as user_firstname, global_profile.user_lastname as user_lastname, users.user_gender, users.global_user_picture, users.user_subscribed, users.user_verified, picture_photo.source as user_picture_full FROM conversations_global_messages INNER JOIN users ON conversations_global_messages.user_id = users.user_id LEFT JOIN global_profile ON users.user_id = global_profile.user_id LEFT JOIN posts_photos as picture_photo ON users.user_picture_id = picture_photo.photo_id WHERE conversations_global_messages.conversation_id = %s ORDER BY conversations_global_messages.message_id DESC LIMIT %s,%s ) messages ORDER BY messages.message_id ASC", secure($conversation_id, 'int'), secure($offset, 'int', false), secure($system['max_results'], 'int', false));
        }
        $get_messages = $db->query($messages_query) or _error("SQL_ERROR_THROWEN");
        while ($message = $get_messages->fetch_assoc()) {
            $message['user_picture'] = get_picture($message['global_user_picture'], $message['user_gender']);

            $message['user_picture_full'] = ($message['user_picture_full']) ? $system['system_uploads'] . '/' . $message['user_picture_full'] : $message['user_picture_full'];
            if ($message['user_picture'] != "") {
        
                $message['user_picture'] =  $system['system_url'].'/includes/wallet-api/image-exist-api.php?userPicture=' . $message['user_picture'] . '&userPictureFull=' . $message['user_picture_full'] . '&type=1';
            }
            if ($message['user_picture'] == "") {
                $message['user_picture'] =  $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
            }



            $message['message'] = $this->_parse(["text" => $message['message'], "decode_mentions" => false, "decode_hashtags" => false]);
            /* return */
            $messages[] = $message;
        }
        return $messages;
    }


    /**
     * post_conversation_message
     * 
     * @param string $message
     * @param string $image
     * @param string $voice_note
     * @param integer $conversation_id
     * @param array $recipients
     * @return array
     */
    public function post_conversation_message($message, $image, $voice_note, $conversation_id = null, $recipients = null)
    {
        global $db, $system, $date;
        /* check if posting the message to (new || existed) conversation */
        if ($conversation_id == null) {
            /* [first] check previous conversation between (viewer & recipients) */
            $mutual_conversation = $this->get_mutual_conversation($recipients);
            if (!$mutual_conversation) {
                /* [1] there is no conversation between viewer and the recipients -> start new one */
                /* insert conversation */
                $db->query("INSERT INTO conversations_global (last_message_id) VALUES ('0')") or _error("SQL_ERROR_THROWEN");
                $conversation_id = $db->insert_id;
                /* insert the sender (viewer) */
                $db->query(sprintf("INSERT INTO conversations_global_users (conversation_id, user_id, seen) VALUES (%s, %s, '1')", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                /* insert recipients */
                foreach ($recipients as $recipient) {
                    $db->query(sprintf("INSERT INTO conversations_global_users (conversation_id, user_id) VALUES (%s, %s)", secure($conversation_id, 'int'), secure($recipient, 'int'))) or _error("SQL_ERROR_THROWEN");
                }
            } else {
                /* [2] there is a conversation between the viewer and the recipients */
                /* set the conversation_id */
                $conversation_id = $mutual_conversation;
            }
        } else {
            /* [3] post the message to -> existed conversation */
            /* check if user authorized */
            $conversation = $this->get_conversation($conversation_id);
            if (!$conversation) {
                throw new Exception(__("You are not authorized to do this"));
            }
            foreach ($conversation['recipients'] as $recipient) {
                if ($this->blocked($recipient['user_id'])) {
                    modal("MESSAGE", __("Message"), __("You aren't allowed to message") . " " . $recipient['user_firstname'] . " " . $recipient['user_lastname']);
                }
            }
            /* update sender (viewer) as seen and not deleted if any */
            $db->query(sprintf("UPDATE conversations_global_users SET seen = '1', deleted = '0' WHERE conversation_id = %s AND user_id = %s", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            /* update recipients as not seen and not deleted if any */
            $db->query(sprintf("UPDATE conversations_global_users SET seen = '0', deleted = '0' WHERE conversation_id = %s AND user_id != %s", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        }
        /* insert message */
        $image = ($image != '') ? $image : '';
        $voice_note = ($voice_note != '') ? $voice_note : '';
        $db->query(sprintf("INSERT INTO conversations_global_messages (conversation_id, user_id, message, image, voice_note, time) VALUES (%s, %s, %s, %s, %s, %s)", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'), secure($message), secure($image), secure($voice_note), secure($date))) or _error("SQL_ERROR_THROWEN");
        $message_id = $db->insert_id;
        /* update the conversation with last message id */
        $db->query(sprintf("UPDATE conversations_global SET last_message_id = %s WHERE conversation_id = %s", secure($message_id, 'int'), secure($conversation_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* update sender (viewer) with last message id */
        $db->query(sprintf("UPDATE users SET user_live_messages_lastid = %s WHERE user_id = %s", secure($message_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        /* get conversation */
        $conversation = $this->get_conversation($conversation_id);
        /* update all recipients with last message id & only offline recipient messages counter */
        foreach ($conversation['recipients'] as $recipient) {
            $db->query(sprintf("UPDATE users SET user_live_messages_lastid = %s, user_live_messages_counter = user_live_messages_counter + 1 WHERE user_id = %s", secure($message_id, 'int'), secure($recipient['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        }
        /* update typing status of the viewer for this conversation */
        $is_typing = '0';
        $db->query(sprintf("UPDATE conversations_global_users SET typing = %s WHERE conversation_id = %s AND user_id = %s", secure($is_typing), secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        /* return with conversation */
        //  echo "<pre>"; print_r($conversation); die;
        return $conversation;
    }


    /**
     * delete_conversation
     * 
     * @param integer $conversation_id
     * @return void
     */
    public function delete_conversation($conversation_id)
    {
        global $db;
        /* check if user authorized */
        $check_conversation = $db->query(sprintf("SELECT COUNT(*) as count FROM conversations_global_users WHERE conversation_id = %s AND user_id = %s", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_conversation->fetch_assoc()['count'] == 0) {
            throw new Exception(__("You are not authorized to do this"));
        }
        /* update typing status of the viewer for this conversation */
        $is_typing = '0';
        $db->query(sprintf("UPDATE conversations_global_users SET typing = %s WHERE conversation_id = %s AND user_id = %s", secure($is_typing), secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        /* update conversation as deleted */
        $db->query(sprintf("UPDATE conversations_global_users SET deleted = '1' WHERE conversation_id = %s AND user_id = %s", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
    }


    /**
     * get_conversation_color
     * 
     * @param integer $conversation_id
     * @return string
     */
    public function get_conversation_color($conversation_id)
    {
        global $db;
        $get_conversation = $db->query(sprintf("SELECT color FROM conversations_global WHERE conversation_id = %s", secure($conversation_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        return $get_conversation->fetch_assoc()['color'];
    }


    /**
     * set_conversation_color
     * 
     * @param integer $conversation_id
     * @param string $color
     * @return void
     */
    public function set_conversation_color($conversation_id, $color)
    {
        global $db;
        /* check if user authorized */
        $check_conversation = $db->query(sprintf("SELECT COUNT(*) as count FROM conversations_global_users WHERE conversation_id = %s AND user_id = %s", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_conversation->fetch_assoc()['count'] == 0) {
            _error(403);
        }
        $db->query(sprintf("UPDATE conversations_global SET color = %s WHERE conversation_id = %s", secure($color), secure($conversation_id, 'int'))) or _error("SQL_ERROR_THROWEN");
    }


    /**
     * update_conversation_typing_status
     * 
     * @param integer $conversation_id
     * @param boolean $is_typing
     * @return void
     */
    public function update_conversation_typing_status($conversation_id, $is_typing)
    {
        global $db;
        /* check if user authorized */
        $check_conversation = $db->query(sprintf("SELECT COUNT(*) as count FROM conversations_global_users WHERE conversation_id = %s AND user_id = %s", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_conversation->fetch_assoc()['count'] == 0) {
            return;
        }
        /* update typing status of the viewer for this conversation */
        $is_typing = ($is_typing) ? '1' : '0';
        $db->query(sprintf("UPDATE conversations_global_users SET typing = %s WHERE conversation_id = %s AND user_id = %s", secure($is_typing), secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
    }


    /**
     * update_conversation_seen_status
     * 
     * @param array $conversation_ids
     * @return void
     */
    public function update_conversation_seen_status($conversation_ids)
    {
        global $db;
        $conversations_array = [];
        /* check if user authorized */
        foreach ((array)$conversation_ids as $conversation_id) {
            $check_conversation = $db->query(sprintf("SELECT COUNT(*) as count FROM conversations_global_users WHERE conversation_id = %s AND user_id = %s", secure($conversation_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check_conversation->fetch_assoc()['count'] > 0) {
                $conversations_array[] = $conversation_id;
            }
        }
        if (!$conversations_array) return;
        $conversations_list = implode(',', $conversations_array);
        /* update seen status of the viewer to these conversation(s) */
        $db->query(sprintf("UPDATE conversations_global_users SET seen = '1' WHERE conversation_id IN (%s) AND user_id = %s", $conversations_list, secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
    }



    /* ------------------------------- */
    /* Video/Audio Chat */
    /* ------------------------------- */

    /**
     * create_call
     * 
     * @param string $type
     * @param integer $to_user_id
     * @return integer|false
     */
    public function create_call($type, $to_user_id)
    {
        global $db, $system, $date;
        /* check call type */
        switch ($type) {
            case 'video':
                $table = "conversations_global_calls_video";
                /* check if video calls enabled */
                if (!$system['video_call_enabled']) {
                    throw new Exception(__("This feature has been disabled by the admin"));
                }
                break;

            case 'audio':
                $table = "conversations_calls_audio";
                /* check if audio calls enabled */
                if (!$system['audio_call_enabled']) {
                    throw new Exception(__("This feature has been disabled by the admin"));
                }
                break;

            default:
                _error(400);
                break;
        }
        /* check if target user exist */
        $check_target_user = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s", secure($to_user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_target_user->fetch_assoc()['count'] == 0) {
            return false;
        }
        /* check blocking */
        if ($this->blocked($to_user_id)) {
            return false;
        }
        /* check if target user offline */
        $check_target_busy_offline = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s AND user_last_seen >= SUBTIME(NOW(), SEC_TO_TIME(%s))", secure($to_user_id, 'int'), secure($system['offline_time'], 'int', false))) or _error("SQL_ERROR_THROWEN");
        if ($check_target_busy_offline->fetch_assoc()['count'] == 0) {
            return "recipient_offline";
        }
        /* check if target user busy (someone calling him || he calling someone || in a call) (audio|video) */
        $check_target_busy_audio = $db->query(sprintf('SELECT COUNT(*) as count FROM conversations_global_calls_audio WHERE (from_user_id = %1$s OR to_user_id = %1$s) AND declined = "0" AND updated_time >= SUBTIME(NOW(), SEC_TO_TIME(40))', secure($to_user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_target_busy_audio->fetch_assoc()['count'] > 0) {
            return "recipient_busy";
        }
        $check_target_busy_video = $db->query(sprintf('SELECT COUNT(*) as count FROM conversations_global_calls_video WHERE (from_user_id = %1$s OR to_user_id = %1$s) AND declined = "0" AND updated_time >= SUBTIME(NOW(), SEC_TO_TIME(40))', secure($to_user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_target_busy_video->fetch_assoc()['count'] > 0) {
            return "recipient_busy";
        }
        /* check if the viewer busy (someone calling him || he calling someone || in a call) (audio|video) */
        $check_viewer_busy_audio = $db->query(sprintf('SELECT COUNT(*) as count FROM conversations_global_calls_audio WHERE (from_user_id = %1$s OR to_user_id = %1$s) AND declined = "0" AND updated_time >= SUBTIME(NOW(), SEC_TO_TIME(40))', secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_viewer_busy_audio->fetch_assoc()['count'] > 0) {
            return "caller_busy";
        }
        $check_viewer_busy_video = $db->query(sprintf('SELECT COUNT(*) as count FROM conversations_global_calls_audio WHERE (from_user_id = %1$s OR to_user_id = %1$s) AND declined = "0" AND updated_time >= SUBTIME(NOW(), SEC_TO_TIME(40))', secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_viewer_busy_video->fetch_assoc()['count'] > 0) {
            return "caller_busy";
        }
        /* create new call */
        require_once(ABSPATH . 'includes/libs/Twilio/autoload.php');
        /* create a new room */
        $room = get_hash_token();
        // caller
        $caller_id = substr(get_hash_token(), 0, 15);
        $caller_token = new Twilio\Jwt\AccessToken($system['twilio_sid'], $system['twilio_apisid'], $system['twilio_apisecret'], 3600, $caller_id);
        $caller_grant = new Twilio\Jwt\Grants\VideoGrant();
        $caller_grant->setRoom($room);
        $caller_token->addGrant($caller_grant);
        $caller_token_serialized = $caller_token->toJWT();
        /* -- */
        // receiver
        $receiver_id = substr(get_hash_token(), 0, 15);
        $receiver_token = new Twilio\Jwt\AccessToken($system['twilio_sid'], $system['twilio_apisid'], $system['twilio_apisecret'], 3600, $receiver_id);
        $receiver_grant = new Twilio\Jwt\Grants\VideoGrant();
        $receiver_grant->setRoom($room);
        $receiver_token->addGrant($receiver_grant);
        $receiver_token_serialized = $receiver_token->toJWT();
        /* -- */
        /* insert the new call */
        $db->query(sprintf("INSERT INTO %s (from_user_id, from_user_token, to_user_id, to_user_token, room, created_time, updated_time) VALUES (%s, %s, %s, %s, %s, %s, %s)", $table, secure($this->_data['user_id'], 'int'), secure($caller_token_serialized), secure($to_user_id, 'int'), secure($receiver_token_serialized), secure($room), secure($date), secure($date))) or _error("SQL_ERROR_THROWEN");
        return $db->insert_id;
    }


    /**
     * check_new_calls
     * 
     * @param string $type
     * @return array
     */
    public function check_new_calls($type)
    {
        global $db;
        /* check call type */
        switch ($type) {
            case 'video':
                $table = "conversations_calls_video";
                break;

            case 'audio':
                $table = "conversations_calls_audio";
                break;

            default:
                _error(400);
                break;
        }
        /* new call -> [call created from less than 40 seconds and not answered nor declined] */
        $get_new_calls = $db->query(sprintf('SELECT %1$s.*, users.user_name, users.user_firstname, users.user_lastname, users.user_gender, users.global_user_picture FROM %1$s INNER JOIN users ON %1$s.from_user_id = users.user_id WHERE to_user_id = %2$s AND created_time >= SUBTIME(NOW(), SEC_TO_TIME(40)) AND answered = "0" AND declined = "0"', $table, secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_new_calls->num_rows == 0) {
            return false;
        }
        $call = $get_new_calls->fetch_assoc();
        $call['caller_name'] = $call['user_firstname'] . " " . $call['user_lastname'];
        $call['caller_picture'] = get_picture($call['global_user_picture'], $call['user_gender']);
        return $call;
    }


    /**
     * check_calling_response
     * 
     * @param string $type
     * @param integer $call_id
     * @return void
     */
    public function check_calling_response($type, $call_id)
    {
        global $db, $date;
        /* check call type */
        switch ($type) {
            case 'video':
                $table = "conversations_calls_video";
                break;

            case 'audio':
                $table = "conversations_calls_audio";
                break;

            default:
                _error(400);
                break;
        }
        /* check if user authorized */
        $check_call = $db->query(sprintf("SELECT * FROM %s WHERE call_id = %s AND from_user_id = %s", $table, secure($call_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_call->num_rows == 0) {
            _error(403);
        }
        $call = $check_call->fetch_assoc();
        /* update the call */
        $db->query(sprintf("UPDATE %s SET updated_time = %s WHERE call_id = %s", $table, secure($date), secure($call_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* return */
        if ($call['declined']) {
            return "declined";
        } else if ($call['answered']) {
            return $call;
        } else {
            return "no_answer";
        }
    }


    /**
     * answer_call
     * 
     * @param string $type
     * @param integer $call_id
     * @return void
     */
    public function answer_call($type, $call_id)
    {
        global $db, $date;
        /* check call type */
        switch ($type) {
            case 'video':
                $table = "conversations_calls_video";
                break;

            case 'audio':
                $table = "conversations_calls_audio";
                break;

            default:
                _error(400);
                break;
        }
        /* check if user authorized */
        $check_call = $db->query(sprintf("SELECT * FROM %s WHERE call_id = %s AND to_user_id = %s", $table, secure($call_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_call->num_rows == 0) {
            _error(403);
        }
        $call = $check_call->fetch_assoc();
        /* update the call */
        $db->query(sprintf("UPDATE %s SET answered = '1', updated_time = %s WHERE call_id = %s", $table, secure($date), secure($call_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* return */
        return $call;
    }


    /**
     * decline_call
     * 
     * @param string $type
     * @param integer $call_id
     * @return void
     */
    public function decline_call($type, $call_id)
    {
        global $db, $date;
        /* check call type */
        switch ($type) {
            case 'video':
                $table = "conversations_calls_video";
                break;

            case 'audio':
                $table = "conversations_calls_audio";
                break;

            default:
                _error(400);
                break;
        }
        /* check if user authorized */
        $check_call = $db->query(sprintf('SELECT COUNT(*) as count FROM  %1$s WHERE call_id =  %2$s AND (from_user_id = %3$s OR to_user_id = %3$s)', $table, secure($call_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_call->fetch_assoc()['count'] == 0) {
            _error(403);
        }
        /* update the call */
        $db->query(sprintf("UPDATE %s SET declined = '1', updated_time = %s WHERE call_id = %s", $table, secure($date), secure($call_id, 'int'))) or _error("SQL_ERROR_THROWEN");
    }


    /**
     * update_call
     * 
     * @param string $type
     * @param integer $call_id
     * @return void
     */
    public function update_call($type, $call_id)
    {
        global $db, $date;
        /* check call type */
        switch ($type) {
            case 'video':
                $table = "conversations_calls_video";
                break;

            case 'audio':
                $table = "conversations_calls_audio";
                break;

            default:
                _error(400);
                break;
        }
        /* check if user authorized */
        $check_call = $db->query(sprintf('SELECT COUNT(*) as count FROM  %1$s WHERE call_id =  %2$s AND (from_user_id = %3$s OR to_user_id = %3$s)', $table, secure($call_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check_call->fetch_assoc()['count'] == 0) {
            return; /* not 403 error returned as error will not be handled */
        }
        /* update the call */
        $db->query(sprintf("UPDATE %s SET updated_time = %s WHERE call_id = %s", $table, secure($date), secure($call_id, 'int'))) or _error("SQL_ERROR_THROWEN");
    }

    /* ------------------------------- */
    /* Chat */
    /* ------------------------------- */

    /**
     * user_online
     * 
     * @param integer $user_id
     * @return boolean
     */
    public function user_online($user_id)
    {
        global $db, $system;
        /* check if the target user is a friend to the viewer */
        if (!in_array($user_id, $this->_data['friends_ids'])) {
            /* if no > return false */
            return false;
        }
        /* check if the target user is online & enable the chat */
        $get_user_status = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_id = %s AND user_chat_enabled = '1' AND user_last_seen >= SUBTIME(NOW(), SEC_TO_TIME(%s))", secure($user_id, 'int'), secure($system['offline_time'], 'int', false))) or _error("SQL_ERROR_THROWEN");
        if ($get_user_status->fetch_assoc()['count'] == 0) {
            /* if no > return false */
            return false;
        }
        return true;
    }

    /**
     * delete_post
     * 
     * @param integer $post_id
     * @param boolean $return_errors
     * @return boolean
     */
    public function delete_post($post_id, $return_errors = true)
    {
        global $db, $system;
        /* (check|get) post */
        $post = $this->global_profile_get_post($post_id, false, true);
        if (!$post) {
            if (!$return_errors) {
                return;
            }
            _error(403);
        }
        /* can delete the post */
        if (!$post['manage_post']) {
            if (!$return_errors) {
                return;
            }
            _error(403);
        }
        /* delete hashtags */
        $this->delete_hashtags($post_id);
        /* delete post */
        $refresh = false;
        $db->query(sprintf("DELETE FROM notifications WHERE node_url = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        $db->query(sprintf("DELETE FROM global_posts WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        switch ($post['post_type']) {
            case 'photos':
            case 'album':
            case 'profile_cover':
            case 'profile_picture':
            case 'page_cover':
            case 'page_picture':
            case 'group_cover':
            case 'group_picture':
            case 'event_cover':
            case 'product':
                /* delete uploads from uploads folder */
                foreach ($post['photos'] as $photo) {
                    delete_uploads_file($photo['source']);
                }
                /* delete post photos from database */
                $db->query(sprintf("DELETE FROM global_posts_photos WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                switch ($post['post_type']) {
                    case 'profile_cover':
                        /* update user cover if it's current cover */
                        if ($post['user_cover_id']  ==  $post['photos'][0]['photo_id']) {
                            $db->query(sprintf("UPDATE users SET user_cover = null, user_cover_id = null WHERE user_id = %s", secure($post['author_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                            /* return */
                            $refresh = true;
                        }
                        break;

                    case 'profile_picture':
                        /* update user picture if it's current picture */
                        if ($post['user_picture_id']  ==  $post['photos'][0]['photo_id']) {
                            $db->query(sprintf("UPDATE users SET user_picture = null, user_picture_id = null WHERE user_id = %s", secure($post['author_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                            /* delete cropped picture from uploads folder */
                            delete_uploads_file($post['user_picture']);
                            /* return */
                            $refresh = true;
                        }
                        break;

                    case 'page_cover':
                        /* update page cover if it's current cover */
                        if ($post['page_cover_id']  ==  $post['photos'][0]['photo_id']) {
                            $db->query(sprintf("UPDATE pages SET page_cover = null, page_cover_id = null WHERE page_id = %s", secure($post['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                            /* return */
                            $refresh = true;
                        }
                        break;

                    case 'page_picture':
                        /* update page picture if it's current picture */
                        if ($post['page_picture_id']  ==  $post['photos'][0]['photo_id']) {
                            $db->query(sprintf("UPDATE pages SET page_picture = null, page_picture_id = null WHERE page_id = %s", secure($post['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                            /* delete cropped picture from uploads folder */
                            delete_uploads_file($post['page_picture']);
                            /* return */
                            $refresh = true;
                        }
                        break;

                    case 'group_cover':
                        /* update group cover if it's current cover */
                        if ($post['group_cover_id']  ==  $post['photos'][0]['photo_id']) {
                            $db->query(sprintf("UPDATE `groups` SET group_cover = null, group_cover_id = null WHERE group_id = %s", secure($post['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                            /* return */
                            $refresh = true;
                        }
                        break;

                    case 'group_picture':
                        /* update group picture if it's current picture */
                        if ($post['group_picture_id']  ==  $post['photos'][0]['photo_id']) {
                            $db->query(sprintf("UPDATE `groups` SET group_picture = null, group_picture_id = null WHERE group_id = %s", secure($post['group_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                            /* delete cropped from uploads folder */
                            delete_uploads_file($post['group_picture']);
                            /* return */
                            $refresh = true;
                        }
                        break;

                    case 'event_cover':
                        /* update event cover if it's current cover */
                        if ($post['event_cover_id']  ==  $post['photos'][0]['photo_id']) {
                            $db->query(sprintf("UPDATE `events` SET event_cover = null, event_cover_id = null WHERE event_id = %s", secure($post['event_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                            /* return */
                            $refresh = true;
                        }
                        break;

                    case 'product':
                        /* delete nested table row */
                        $db->query(sprintf("DELETE FROM posts_products WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                        break;
                }
                break;

            case 'video':
                /* delete uploads from uploads folder */
                delete_uploads_file($post['video']['source']);
                /* delete nested table row */
                $db->query(sprintf("DELETE FROM posts_videos WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $refresh = true;
                break;

            case 'audio':
                /* delete uploads from uploads folder */
                delete_uploads_file($post['audio']['source']);
                /* delete nested table row */
                $db->query(sprintf("DELETE FROM global_posts_audios WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $refresh = true;
                break;

            case 'file':
                /* delete uploads from uploads folder */
                delete_uploads_file($post['file']['source']);
                /* delete nested table row */
                $db->query(sprintf("DELETE FROM global_posts_files WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $refresh = true;
                break;

            case 'media':
                /* delete nested table row */
                $db->query(sprintf("DELETE FROM global_posts_media WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $refresh = true;
                break;

            case 'link':
                /* delete nested table row */
                $db->query(sprintf("DELETE FROM global_posts_links WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $refresh = true;
                break;

            case 'poll':
                /* delete nested table row */
                $db->query(sprintf("DELETE FROM global_posts_polls WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $db->query(sprintf("DELETE FROM global_posts_polls_options WHERE poll_id = %s", secure($post['poll']['poll_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                $db->query(sprintf("DELETE FROM global_posts_polls_options_users WHERE poll_id = %s", secure($post['poll']['poll_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                $refresh = true;
                break;

            case 'article':
                /* delete nested table row */
                $db->query(sprintf("DELETE FROM global_posts_articles WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
                $refresh = true;
                break;

            case 'shared':

                $shares_count = $post['origin']['shares'] > 0 ? $post['origin']['shares'] - 1 : 0;

                $db->query(sprintf("UPDATE `global_posts` SET shares = %s WHERE post_id = %s", secure($shares_count, 'int'), secure($post['origin']['post_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                $refresh = true;
                break;    
        }
        /* points balance */
        $this->points_balance("delete", $post['author_id'], "post");
        /* delete post in_group notification */
        if ($post['in_group'] && !$post['group_approved']) {
            $this->delete_notification($post['group_admin'], 'group_post_pending', $post['group_title'], $post['group_name'] . "-[guid=]" . $post['post_id']);
        }
        /* delete post in_event notification */
        if ($post['in_event'] && !$event['event_approved']) {
            $this->delete_notification($post['event_admin'], 'event_post_pending', $post['event_title'], $post['event_id'] . "-[guid=]" . $post['post_id']);
        }
        return $refresh;
    }

    /**
     * delete_hashtags
     * 
     * @param integer $post_id
     * @return void
     */
    public function delete_hashtags($post_id)
    {
        global $db;
        /* unconnect hashtag with the post */
        $db->query(sprintf("DELETE FROM hashtags_posts WHERE postHubType='LocalHub' and post_id = %s", secure($post_id, 'int')));
    }

    /**
     * edit_post
     * 
     * @param integer $post_id
     * @param string $message
     * @return array
     */
    public function edit_post($post_id, $message)
    {
        global $db, $system;
        /* (check|get) post */
        $post = $this->_check_post($post_id, true);
        if (!$post) {
            _error(403);
        }
        /* check if viewer can edit post */
        if (!$post['manage_post']) {
            _error(403);
        }
        /* check post max length */
        if ($system['max_post_length'] > 0 && $this->_data['user_group'] >= 3) {
            if (strlen($message) >= $system['max_post_length']) {
                modal("MESSAGE", __("Text Length Limit Reached"), __("Your message characters length is over the allowed limit") . " (" . $system['max_post_length'] . " " . __("Characters") . ")");
            }
        }
        /* delete hashtags */
        $this->delete_hashtags($post_id);
        /* check if post in_group with approval system */
        if ($post['in_group'] && $post['group_publish_approval_enabled'] && $post['group_approved']) {
            $post['group_approved'] = ($post['group_publish_approval_enabled'] && !$post['is_group_admin']) ? '0' : '1';
            /* post notification to group admin */
            if (!$post['group_approved']) {
                $this->post_notification(array('to_user_id' => $post['group_admin'], 'action' => 'group_post_pending', 'node_type' => $post['group_title'], 'hub' => "LocalHub", 'node_url' => $post['group_name'] . "-[guid=]" . $post['post_id']));
            }
        }
        /* check if post in_event with approval system */
        if ($post['in_event'] && $post['event_publish_approval_enabled'] && $post['event_approved']) {
            $post['event_approved'] = ($post['event_publish_approval_enabled'] && !$post['is_event_admin']) ? '0' : '1';
            /* post notification to event admin */
            if (!$post['event_approved']) {
                $this->post_notification(array('to_user_id' => $post['event_admin'], 'action' => 'event_post_pending', 'hub' => "LocalHub", 'node_type' => $post['event_title'], 'node_url' => $post['event_id'] . "-[guid=]" . $post['post_id']));
            }
        }
        /* update post */
        $db->query(sprintf("UPDATE global_posts SET text = %s, group_approved = %s, event_approved = %s WHERE post_id = %s", secure($message), secure($post['group_approved']), secure($post['event_approved']), secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* post mention notifications */
        $this->post_mentions($message, $post_id);
        /* parse text */
        $post['text_plain'] = htmlentities($message, ENT_QUOTES, 'utf-8');
        $post['text'] = $this->_parse(["text" => $post['text_plain'], "trending_hashtags" => true, "post_id" => $post_id]);
        /* get post colored pattern */
        $post['colored_pattern'] = $this->get_posts_colored_pattern($post['colored_pattern']);
        /* return */
        return $post;
    }


    /**
     * get_new_people
     * 
     * @param integer $offset
     * @param boolean $random
     * @return array
     */
    public function get_new_people($offset = 0, $random = false, $page = "GlobalHub")
    {
        global $db, $system;
        $results = [];
        $offset *= $system['min_results'];
        $unit = 6371;
        $distance = 10000;
        // prepare where statement
        $where = "";
        /* merge (friends, followings, friend requests & friend requests sent) and get the unique ids  */
        $old_people_ids = array_unique($this->_data['followings_ids']);

        $profileName = "global_profile.user_firstname != '' and users.global_user_picture != '' and ";

        /* add the viewer to this list */
        $old_people_ids[] = $this->_data['user_id'];
        /* make a list from old people */
        $old_people_ids_list = implode(',', $old_people_ids);
        $where .= sprintf("WHERE " . $profileName . " users.user_banned = '0' AND users.user_id NOT IN (%s)", $old_people_ids_list);
        if ($system['activation_enabled']) {
            $where .= " AND user_activated = '1'";
        }
        /* get users */
        if ($random) {
            $sqlSearch =  sprintf("SELECT * FROM (SELECT users.user_id, users.user_name, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, global_user_picture as user_picture, picture_photo.source as user_picture_full, users.user_subscribed, country.country_name as user_country_name, users.user_verified, (%s * acos(cos(radians(%s)) * cos(radians(user_latitude)) * cos(radians(user_longitude) - radians(%s)) + sin(radians(%s)) * sin(radians(user_latitude))) ) AS distance FROM users LEFT JOIN posts_photos as picture_photo ON users.user_picture_id = picture_photo.photo_id INNER JOIN global_profile ON users.user_id=global_profile.user_id left join system_countries as country on country.country_id = users.user_country " . $where . " HAVING distance < %s ORDER BY distance ASC LIMIT %s) tmp ORDER BY distance ASC LIMIT %s, %s", secure($unit, 'int'), secure($this->_data['user_latitude']), secure($this->_data['user_longitude']), secure($this->_data['user_latitude']), secure($distance, 'int'), secure($system['max_results'] * 2, 'int', false), secure($offset, 'int', false), secure($system['min_results'], 'int', false));
        } else {
            $sqlSearch = sprintf("SELECT * FROM (SELECT users.user_id, users.user_name, global_profile.user_firstname, global_profile.user_lastname, global_profile.user_gender, global_user_picture as user_picture, picture_photo.source as user_picture_full, users.user_subscribed, country.country_name as user_country_name, users.user_verified, (%s * acos(cos(radians(%s)) * cos(radians(user_latitude)) * cos(radians(user_longitude) - radians(%s)) + sin(radians(%s)) * sin(radians(user_latitude))) ) AS distance FROM users LEFT JOIN posts_photos as picture_photo ON users.user_picture_id = picture_photo.photo_id INNER JOIN global_profile ON users.user_id=global_profile.user_id left join system_countries as country on country.country_id = users.user_country " . $where . " HAVING distance < %s ORDER BY distance ASC LIMIT %s, %s", secure($unit, 'int'), secure($this->_data['user_latitude']), secure($this->_data['user_longitude']), secure($this->_data['user_latitude']), secure($distance, 'int'), secure($offset, 'int', false), secure($system['min_results'], 'int', false));
        }
        $get_users = $db->query($sqlSearch) or _error("SQL_ERROR_THROWEN");
        if ($get_users->num_rows > 0) {
            while ($user = $get_users->fetch_assoc()) {
                /* check if there is any blocking between the viewer & the target user */
                if ($this->blocked($user['user_id'])) {
                    continue;
                }
                $g_details = $this->get_global_user_details($user['user_id']);
                $user['user_firstname'] = $g_details['user_firstname'];
                $user['user_lastname'] = $g_details['user_lastname'];

                $user['user_picture'] = get_picture($user['user_picture'], $user['user_gender']);
                $user['mutual_friends_count'] = $this->get_mutual_friends_count($user['user_id']);
                if ($user['user_firstname']) {
                    $results[] = $user;
                }
            }
        }
        return $results;
    }

    function get_global_user_details($user_id)
    {
        global $db;
        $get_user1 = $db->query(sprintf("SELECT * FROM global_profile WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_user1->num_rows > 0) {
            return $get_user1->fetch_assoc();
        }
    }

    function get_posts_trending($get_all=true)
    {
        global $db, $system;
        $offset = 0;

        $detailed_posts = array();
       
        if($get_all){
            $getusers = $db->query(sprintf("SELECT l.post_id, count(*) as countPost FROM global_posts_reactions l GROUP BY l.post_id ORDER BY countPost DESC 
            " )) or _error("SQL_ERROR_THROWEN"); 
         }else {
            $getusers = $db->query(sprintf("SELECT l.post_id, count(*) as countPost FROM global_posts_reactions l GROUP BY l.post_id ORDER BY countPost DESC LIMIT %s, %s
            ", secure($offset, 'int', false), secure($system['max_results'], 'int', false)  )) or _error("SQL_ERROR_THROWEN");
        }

        if ($getusers->num_rows > 0) {
            while ($rows = $getusers->fetch_assoc()) {
                $detailedPosts = $this->global_profile_get_post($rows['post_id']);
                if (!empty($detailedPosts)) {
                    $detailed_posts[] = $detailedPosts;
                }
            }
        }
        return $detailed_posts;
    }

    /**
     * get_trending_hashtags
     * 
     * @return array
     */
    public function get_trending_hashtags($postType = null)
    {
        global $system, $db;
        $hashtags = [];
        if ($postType == 'LocalHub') {
            $selectQuery = sprintf("SELECT hashtags.hashtag, hashtags_posts.id as hash_post, COUNT(hashtags_posts.id) AS frequency,hashtags_posts.postHubType FROM hashtags INNER JOIN hashtags_posts as hashtags_posts ON hashtags.hashtag_id = hashtags_posts.hashtag_id WHERE hashtags_posts.created_at > DATE_SUB(CURDATE(), INTERVAL 1 %s) and hashtags_posts.postHubType = 'LocalHub'  GROUP BY hashtags_posts.hashtag_id,hashtags_posts.postHubType ORDER BY frequency DESC LIMIT %s", secure($system['trending_hashtags_interval'], "", false), secure($system['trending_hashtags_limit'], 'int', false));
        } elseif ($postType == 'GlobalHub') {
            $selectQuery = sprintf("SELECT hashtags.hashtag, hashtags_posts.id as hash_post, COUNT(hashtags_posts.id) AS frequency,hashtags_posts.postHubType FROM hashtags INNER JOIN hashtags_posts as hashtags_posts ON hashtags.hashtag_id = hashtags_posts.hashtag_id WHERE hashtags_posts.created_at > DATE_SUB(CURDATE(), INTERVAL 1 %s) and hashtags_posts.postHubType = 'GlobalHub'  GROUP BY hashtags_posts.hashtag_id,hashtags_posts.postHubType ORDER BY frequency DESC LIMIT %s", secure($system['trending_hashtags_interval'], "", false), secure($system['trending_hashtags_limit'], 'int', false));
        } else {
            $selectQuery = sprintf("SELECT hashtags.hashtag, hashtags_posts.id as hash_post, COUNT(hashtags_posts.id) AS frequency,hashtags_posts.postHubType FROM hashtags INNER JOIN hashtags_posts as hashtags_posts ON hashtags.hashtag_id = hashtags_posts.hashtag_id WHERE hashtags_posts.created_at > DATE_SUB(CURDATE(), INTERVAL 1 %s) GROUP BY hashtags_posts.hashtag_id,hashtags_posts.postHubType ORDER BY frequency DESC LIMIT %s", secure($system['trending_hashtags_interval'], "", false), secure($system['trending_hashtags_limit'], 'int', false));
        }
        // $get_trending_hashtags = $db->query($selectQuery) or _error("SQL_ERROR_THROWEN");
        // if ($get_trending_hashtags->num_rows > 0) {
        //     while ($hashtag = $get_trending_hashtags->fetch_assoc()) {
        //         $hashtag['hashtag'] = html_entity_decode($hashtag['hashtag'], ENT_QUOTES);
        //         $hashtags[] = $hashtag;
        //     }
        // }

        return $hashtags;
    }

    /**
     * get_trending_hashtags_posts
     * 
     * @return array
     */
    public function get_trending_hashtags_posts($postType = null)
    {
        global $system, $db;
        $hashtags = [];
        if ($postType == 'LocalHub') {
            $selectQuery = sprintf("SELECT hashtags.hashtag, hashtags.hashtag_id as hash_id, hashtags_posts.id as hash_post, COUNT(hashtags_posts.id) AS frequency,hashtags_posts.postHubType FROM hashtags INNER JOIN hashtags_posts as hashtags_posts ON hashtags.hashtag_id = hashtags_posts.hashtag_id WHERE hashtags_posts.created_at > DATE_SUB(CURDATE(), INTERVAL 1 %s) and hashtags_posts.postHubType = 'LocalHub'  GROUP BY hashtags_posts.hashtag_id,hashtags_posts.postHubType ORDER BY frequency DESC LIMIT %s", secure($system['trending_hashtags_interval'], "", false), secure($system['trending_hashtags_limit'], 'int', false));
        } elseif ($postType == 'GlobalHub') {
            $selectQuery = sprintf("SELECT hashtags.hashtag, hashtags.hashtag_id as hash_id, hashtags_posts.id as hash_post, COUNT(hashtags_posts.id) AS frequency,hashtags_posts.postHubType FROM hashtags INNER JOIN hashtags_posts as hashtags_posts ON hashtags.hashtag_id = hashtags_posts.hashtag_id WHERE hashtags_posts.created_at > DATE_SUB(CURDATE(), INTERVAL 1 %s) and hashtags_posts.postHubType = 'GlobalHub'  GROUP BY hashtags_posts.hashtag_id,hashtags_posts.postHubType ORDER BY frequency DESC LIMIT %s", secure($system['trending_hashtags_interval'], "", false), secure($system['trending_hashtags_limit'], 'int', false));
        } else {
            $selectQuery = sprintf("SELECT hashtags.hashtag, hashtags.hashtag_id as hash_id, hashtags_posts.id as hash_post, COUNT(hashtags_posts.id) AS frequency,hashtags_posts.postHubType FROM hashtags INNER JOIN hashtags_posts as hashtags_posts ON hashtags.hashtag_id = hashtags_posts.hashtag_id WHERE hashtags_posts.created_at > DATE_SUB(CURDATE(), INTERVAL 1 %s) GROUP BY hashtags_posts.hashtag_id,hashtags_posts.postHubType ORDER BY frequency DESC LIMIT %s", secure($system['trending_hashtags_interval'], "", false), secure($system['trending_hashtags_limit'], 'int', false));
        }
        $get_trending_hashtags = $db->query($selectQuery) or _error("SQL_ERROR_THROWEN");
        $detailed_posts = array();
        if ($get_trending_hashtags->num_rows > 0) {
            while ($hashtag = $get_trending_hashtags->fetch_assoc()) {
                //$hashtag['hashtag'] = html_entity_decode($hashtag['hashtag'], ENT_QUOTES);
                $hashtags[] = $hashtag['hash_id'];
            }
            $hashTagLists = implode(', ', $hashtags);
            if (count($hashtags) > 0) {
                $gethashposts = $db->query(sprintf("SELECT DISTINCT(post_id) from hashtags_posts where hashtag_id IN (" . $hashTagLists . ") order by post_id DESC")) or _error("SQL_ERROR_THROWEN");
                if ($gethashposts->num_rows > 0) {
                    while ($hashtagValues = $gethashposts->fetch_assoc()) {
                        $detailedPosts = $this->global_profile_get_post($hashtagValues['post_id']);
                        if (!empty($detailedPosts)) {
                            $detailed_posts[] = $detailedPosts;
                        }
                    }
                }
            }
        }

        return $detailed_posts;
    }

    /**
     * get_pro_members
     * 
     * @return array
     */
    public function get_pro_members()
    {
        global $db, $system;
        $pro_members = [];
        $get_pro_members = $db->query(sprintf("SELECT user_id, user_name, user_firstname, user_lastname, user_gender, user_picture, user_subscribed, user_verified FROM users WHERE user_subscribed = '1' ORDER BY RAND() LIMIT %s", $system['max_results'])) or _error("SQL_ERROR_THROWEN");
        if ($get_pro_members->num_rows > 0) {
            while ($user = $get_pro_members->fetch_assoc()) {
                $user['user_picture'] = get_picture($user['user_picture'], $user['user_gender']);
                $user['mutual_friends_count'] = $this->get_mutual_friends_count($user['user_id']);
                $pro_members[] = $user;
            }
        }
        return $pro_members;
    }

    /* ------------------------------- */
    /* Gifts */
    /* ------------------------------- */

    /**
     * get_gifts
     * 
     * @return array
     */
    public function get_gifts()
    {
        global $db;
        $gifts = [];
        $get_gifts = $db->query("SELECT * FROM gifts") or _error("SQL_ERROR_THROWEN");
        if ($get_gifts->num_rows > 0) {
            while ($gift = $get_gifts->fetch_assoc()) {
                $gifts[] = $gift;
            }
        }
        return $gifts;
    }


    /**
     * get_gift
     * 
     * @return array
     */
    public function get_gift($gift_id)
    {
        global $db;
        $get_gift = $db->query(sprintf("SELECT gifts.image, users.user_firstname, users.user_lastname FROM users_gifts INNER JOIN gifts ON users_gifts.gift_id = gifts.gift_id INNER JOIN users ON users_gifts.from_user_id = users.user_id WHERE users_gifts.id = %s AND users_gifts.to_user_id = %s", secure($gift_id, 'int'), secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($get_gift->num_rows == 0) {
            return false;
        }
        return $get_gift->fetch_assoc();
    }

    /**
     * poked
     * 
     * @param integer $user_id
     * @return boolean
     */
    public function poked($user_id)
    {
        global $db;
        /* check if the viewer poked the target before */
        if ($this->_logged_in) {
            $check = $db->query(sprintf("SELECT COUNT(*) as count FROM users_pokes WHERE user_id = %s AND poked_id = %s ", secure($this->_data['user_id'], 'int'),  secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            if ($check->fetch_assoc()['count'] > 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * banned
     *
     * @param integer $user_id
     * @return boolean
     */
    public function banned($user_id)
    {
        global $db;
        $check = $db->query(sprintf("SELECT COUNT(*) as count FROM users WHERE user_banned = '1' AND user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        if ($check->fetch_assoc()['count'] > 0) {
            return true;
        }
        return false;
    }

    /**
     * get_mutual_friends
     * 
     * @param integer $user_two_id
     * @param integer $offset
     * @return array
     */
    public function get_mutual_friends($user_two_id, $offset = 0)
    {
        global $db, $system;
        $mutual_friends = [];
        $offset *= $system['max_results'];
        $mutual_friends = array_intersect($this->_data['friends_ids'], $this->get_friends_ids($user_two_id));
        /* if there is no mutual friends -> return empty array */
        if (count($mutual_friends) == 0) {
            return $mutual_friends;
        }
        /* slice the mutual friends array with system max results */
        $mutual_friends = array_slice($mutual_friends, $offset, $system['max_results']);
        /* if there is no more mutual friends to show -> return empty array */
        if (count($mutual_friends) == 0) {
            return $mutual_friends;
        }
        /* make a list from mutual friends */
        $mutual_friends_list = implode(',', $mutual_friends);
        /* get the user data of each mutual friend */
        $mutual_friends = [];
        $get_mutual_friends = $db->query("SELECT user_id, user_name, user_firstname, user_lastname, user_gender, user_picture, user_subscribed, user_verified FROM users WHERE user_id IN ($mutual_friends_list)") or _error("SQL_ERROR_THROWEN");
        if ($get_mutual_friends->num_rows > 0) {
            while ($mutual_friend = $get_mutual_friends->fetch_assoc()) {
                $mutual_friend['user_picture'] = get_picture($mutual_friend['user_picture'], $mutual_friend['user_gender']);
                $mutual_friend['mutual_friends_count'] = $this->get_mutual_friends_count($mutual_friend['user_id']);
                $mutual_friends[] = $mutual_friend;
            }
        }
        return $mutual_friends;
    }

    /* ------------------------------- */
    /* Custom Fields */
    /* ------------------------------- */

    /**
     * get_custom_fields
     * 
     * @param array $args
     * @return array
     */
    public function get_custom_fields($args = [])
    {
        global $db, $system;
        $fields = [];
        /* prepare "for" [user|page|group|event] - default -> user */
        $args['for'] = (isset($args['for'])) ? $args['for'] : "user";
        if (!in_array($args['for'], array('user', 'page', 'group', 'event'))) {
            _error(400);
        }
        /* prepare "get" [registration|profile|settings] - default -> registration */
        $args['get'] = (isset($args['get'])) ? $args['get'] : "registration";
        if (!in_array($args['get'], array('registration', 'profile', 'settings'))) {
            _error(400);
        }
        /* prepare where_query */
        $where_query = "WHERE field_for = '" . $args['for'] . "'";
        if ($args['get'] == "registration") {
            $where_query .= " AND in_registration = '1'";
        } elseif ($args['get'] == "profile") {
            $where_query .= " AND in_profile = '1'";
        }
        $get_fields = $db->query("SELECT * FROM custom_fields " . $where_query . " ORDER BY field_order ASC") or _error("SQL_ERROR_THROWEN");
        if ($get_fields->num_rows > 0) {
            while ($field = $get_fields->fetch_assoc()) {
                if ($field['type'] == "selectbox") {
                    $field['options'] = explode(PHP_EOL, $field['select_options']);
                }
                if ($args['get'] == "registration") {
                    /* no value neeeded */
                    $fields[] = $field;
                } else {
                    /* valid node_id */
                    if (!isset($args['node_id'])) {
                        _error(400);
                    }
                    /* get the custom field value */
                    $get_field_value = $db->query(sprintf("SELECT value FROM custom_fields_values WHERE field_id = %s AND node_id = %s AND node_type = %s", secure($field['field_id'], 'int'), secure($args['node_id'], 'int'), secure($args['for']))) or _error("SQL_ERROR_THROWEN");
                    $field_value = $get_field_value->fetch_assoc();
                    if ($field['type'] == "selectbox") {
                        $field['value'] = $field['options'][$field_value['value']];
                    } else {
                        $field['value'] = $field_value['value'];
                    }
                    if ($args['get'] == "profile" && is_empty($field['value'])) {
                        continue;
                    }
                    $fields[$field['place']][] = $field;
                }
            }
        }
        return $fields;
    }

    /* ------------------------------- */
    /* Videos */
    /* ------------------------------- */

    /**
     * get_videos
     * 
     * @param integer $id
     * @param string $type
     * @param integer $offset
     * @return array
     */
    public function get_videos($id, $type = 'user', $offset = 0)
    {
        global $db, $system;
        $videos = [];
        switch ($type) {
            case 'user':
                /* get all user videos (except videos from groups or events) */
                $offset *= $system['min_results_even'];
                $get_videos = $db->query(sprintf("SELECT posts_videos.*, posts.privacy FROM posts_videos INNER JOIN posts ON posts_videos.post_id = posts.post_id WHERE posts.user_id = %s AND posts.user_type = 'user' AND posts.in_group = '0' AND posts.in_event = '0' ORDER BY posts_videos.video_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_videos->num_rows > 0) {
                    while ($video = $get_videos->fetch_assoc()) {
                        if ($this->check_privacy($video['privacy'], $id)) {
                            $videos[] = $video;
                        }
                    }
                }
                break;

            case 'page':
                $offset *= $system['min_results_even'];
                $get_videos = $db->query(sprintf("SELECT posts_videos.* FROM posts_videos INNER JOIN posts ON posts_videos.post_id = posts.post_id WHERE posts.user_id = %s AND posts.user_type = 'page' ORDER BY posts_videos.video_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_videos->num_rows > 0) {
                    while ($video = $get_videos->fetch_assoc()) {
                        $videos[] = $video;
                    }
                }
                break;

            case 'group':
                /* check if the viewer is group member (approved) */
                if ($this->check_group_membership($this->_data['user_id'], $id) != "approved") {
                    return $videos;
                }
                $offset *= $system['min_results_even'];
                $get_videos = $db->query(sprintf("SELECT posts_videos.* FROM posts_videos INNER JOIN posts ON posts_videos.post_id = posts.post_id WHERE posts.group_id = %s AND posts.in_group = '1' ORDER BY posts_videos.video_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_videos->num_rows > 0) {
                    while ($video = $get_videos->fetch_assoc()) {
                        $videos[] = $video;
                    }
                }
                break;

            case 'event':
                /* check if the viewer is event member (approved) */
                if (!$this->check_event_membership($this->_data['user_id'], $id)) {
                    return $videos;
                }
                $offset *= $system['min_results_even'];
                $get_videos = $db->query(sprintf("SELECT posts_videos.* FROM posts_videos INNER JOIN posts ON posts_videos.post_id = posts.post_id WHERE posts.event_id = %s AND posts.in_event = '1' ORDER BY posts_videos.video_id DESC LIMIT %s, %s", secure($id, 'int'), secure($offset, 'int', false), secure($system['min_results_even'], 'int', false))) or _error("SQL_ERROR_THROWEN");
                if ($get_videos->num_rows > 0) {
                    while ($video = $get_videos->fetch_assoc()) {
                        $videos[] = $video;
                    }
                }
                break;
        }
        return $videos;
    }

    /* ------------------------------- */
    /* Pages */
    /* ------------------------------- */

    /**
     * get_pages
     * 
     * @param array $args
     * @return array
     */
    public function get_pages($args = [])
    {
        global $db, $system;
        /* initialize arguments */
        $user_id = !isset($args['user_id']) ? null : $args['user_id'];
        $offset = !isset($args['offset']) ? 0 : $args['offset'];
        $promoted = !isset($args['promoted']) ? false : true;
        $suggested = !isset($args['suggested']) ? false : true;
        $random = !isset($args['random']) ? false : true;
        $boosted = !isset($args['boosted']) ? false : true;
        $managed = !isset($args['managed']) ? false : true;
        $results = !isset($args['results']) ? $system['max_results_even'] : $args['results'];
        /* initialize vars */
        $pages = [];
        $offset *= $results;
        /* get suggested pages */
        if ($promoted) {
            $get_pages = $db->query(sprintf("SELECT * FROM pages WHERE page_boosted = '1' ORDER BY RAND() LIMIT %s", $system['max_results'])) or _error("SQL_ERROR_THROWEN");
        } elseif ($suggested) {
            $pages_ids = $this->get_pages_ids();
            $random_statement = ($random) ? "ORDER BY RAND()" : "";
            if (count($pages_ids) > 0) {
                /* make a list from liked pages */
                $pages_list = implode(',', $pages_ids);
                $get_pages = $db->query(sprintf("SELECT * FROM pages WHERE page_id NOT IN (%s) " . $random_statement . " LIMIT %s, %s", $pages_list, secure($offset, 'int', false), secure($results, 'int', false))) or _error("SQL_ERROR_THROWEN");
            } else {
                $get_pages = $db->query(sprintf("SELECT * FROM pages " . $random_statement . " LIMIT %s, %s", secure($offset, 'int', false), secure($results, 'int', false))) or _error("SQL_ERROR_THROWEN");
            }
            /* get the "viewer" boosted pages */
        } elseif ($boosted) {
            $get_pages = $db->query(sprintf("SELECT * FROM pages WHERE page_boosted = '1' AND page_boosted_by = %s LIMIT %s, %s", secure($this->_data['user_id'], 'int'), secure($offset, 'int', false), secure($results, 'int', false))) or _error("SQL_ERROR_THROWEN");
            /* get the "taget" all pages who admin */
        } elseif ($managed) {
            $get_pages = $db->query(sprintf("SELECT pages.* FROM pages_admins INNER JOIN pages ON pages_admins.page_id = pages.page_id WHERE pages_admins.user_id = %s ORDER BY page_id DESC", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* get the "viewer" pages who admin */
        } elseif ($user_id == null) {
            $get_pages = $db->query(sprintf("SELECT pages.* FROM pages_admins INNER JOIN pages ON pages_admins.page_id = pages.page_id WHERE pages_admins.user_id = %s ORDER BY page_id DESC LIMIT %s, %s", secure($this->_data['user_id'], 'int'), secure($offset, 'int', false), secure($results, 'int', false))) or _error("SQL_ERROR_THROWEN");
            /* get the "target" liked pages*/
        } else {
            /* get the target user's privacy */
            $get_privacy = $db->query(sprintf("SELECT user_privacy_pages FROM users WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            $privacy = $get_privacy->fetch_assoc();
            /* check the target user's privacy  */
            if (!$this->check_privacy($privacy['user_privacy_pages'], $user_id)) {
                return $pages;
            }
            $get_pages = $db->query(sprintf("SELECT pages.* FROM pages INNER JOIN pages_likes ON pages.page_id = pages_likes.page_id WHERE pages_likes.user_id = %s LIMIT %s, %s", secure($user_id, 'int'), secure($offset, 'int', false), secure($results, 'int', false))) or _error("SQL_ERROR_THROWEN");
        }
        if ($get_pages->num_rows > 0) {
            while ($page = $get_pages->fetch_assoc()) {
                $page['page_picture'] = get_picture($page['page_picture'], 'page');
                /* check if the viewer liked the page */
                $page['i_like'] = $this->check_page_membership($this->_data['user_id'], $page['page_id']);
                $pages[] = $page;
            }
        }
        return $pages;
    }

    /* ------------------------------- */
    /* Groups */
    /* ------------------------------- */

    /**
     * get_groups
     * 
     * @param array $args
     * @return array
     */
    public function get_groups($args = [])
    {
        global $db, $system;
        /* initialize arguments */
        $user_id = !isset($args['user_id']) ? null : $args['user_id'];
        $offset = !isset($args['offset']) ? 0 : $args['offset'];
        $get_all = !isset($args['get_all']) ? false : true;
        $suggested = !isset($args['suggested']) ? false : true;
        $random = !isset($args['random']) ? false : true;
        $managed = !isset($args['managed']) ? false : true;
        $results = !isset($args['results']) ? $system['max_results_even'] : $args['results'];
        /* initialize vars */
        $groups = [];
        $offset *= $results;
        /* get suggested groups */
        if ($suggested) {
            $where_statement = "";
            /* make a list from joined groups (approved|pending) */
            $groups_ids = $this->get_groups_ids();
            if ($groups_ids) {
                $groups_list = implode(',', $groups_ids);
                $where_statement .= "AND group_id NOT IN (" . $groups_list . ") ";
            }
            $sort_statement = ($random) ? " ORDER BY RAND() " : " ORDER BY group_id DESC ";
            $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($results, 'int', false));
            $get_groups = $db->query("SELECT * FROM `groups` WHERE group_privacy != 'secret' " . $where_statement . $sort_statement . $limit_statement) or _error("SQL_ERROR_THROWEN");
            /* get the "taget" all groups who admin */
        } elseif ($managed) {
            $get_groups = $db->query(sprintf("SELECT `groups`.* FROM groups_admins INNER JOIN `groups` ON groups_admins.group_id = `groups`.group_id WHERE groups_admins.user_id = %s ORDER BY group_id DESC", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* get the "viewer" groups who admin */
        } elseif ($user_id == null) {
            $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($results, 'int', false));
            $get_groups = $db->query(sprintf("SELECT `groups`.* FROM groups_admins INNER JOIN `groups` ON groups_admins.group_id = `groups`.group_id WHERE groups_admins.user_id = %s ORDER BY group_id DESC " . $limit_statement, secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
            /* get the "target" groups*/
        } else {
            /* get the target user's privacy */
            $get_privacy = $db->query(sprintf("SELECT user_privacy_groups FROM users WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            $privacy = $get_privacy->fetch_assoc();
            /* check the target user's privacy  */
            if (!$this->check_privacy($privacy['user_privacy_groups'], $user_id)) {
                return $groups;
            }
            /* if the viewer not the target exclude secret groups */
            $where_statement = ($this->_data['user_id'] == $user_id) ? "" : "AND `groups`.group_privacy != 'secret'";
            $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($results, 'int', false));
            $get_groups = $db->query(sprintf("SELECT `groups`.* FROM `groups` INNER JOIN groups_members ON `groups`.group_id = groups_members.group_id WHERE groups_members.approved = '1' AND groups_members.user_id = %s " . $where_statement . " ORDER BY group_id DESC " . $limit_statement, secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        }
        if ($get_groups->num_rows > 0) {
            while ($group = $get_groups->fetch_assoc()) {
                $group['group_picture'] = get_picture($group['group_picture'], 'group');
                /* check if the viewer joined the group */
                $group['i_joined'] = $this->check_group_membership($this->_data['user_id'], $group['group_id']);;
                $groups[] = $group;
            }
        }
        return $groups;
    }

    /* ------------------------------- */
    /* Events */
    /* ------------------------------- */

    /**
     * get_events
     * 
     * @param array $args
     * @return array
     */
    public function get_events($args = [])
    {
        global $db, $system;
        /* initialize arguments */
        $user_id = !isset($args['user_id']) ? null : $args['user_id'];
        $offset = !isset($args['offset']) ? 0 : $args['offset'];
        $get_all = !isset($args['get_all']) ? false : true;
        $suggested = !isset($args['suggested']) ? false : true;
        $random = !isset($args['random']) ? false : true;
        $managed = !isset($args['managed']) ? false : true;
        $filter = !isset($args['filter']) ? "admin" : $args['filter'];
        $results = !isset($args['results']) ? $system['max_results_even'] : $args['results'];
        /* initialize vars */
        $events = [];
        $offset *= $results;
        /* get suggested events */
        if ($suggested) {
            $where_statement = "";
            /* make a list from joined events */
            $events_ids = $this->get_events_ids();
            if ($events_ids) {
                $events_list = implode(',', $events_ids);
                $where_statement .= "AND event_id NOT IN (" . $events_list . ") ";
            }
            $sort_statement = ($random) ? " ORDER BY RAND() " : " ORDER BY event_id DESC ";
            $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($results, 'int', false));
            $get_events = $db->query("SELECT * FROM `events` WHERE event_privacy != 'secret' " . $where_statement . $sort_statement . $limit_statement) or _error("SQL_ERROR_THROWEN");
            /* get the "taget" all events who admin */
        } elseif ($managed) {
            $get_events = $db->query(sprintf("SELECT * FROM `events` WHERE event_admin = %s ORDER BY event_id DESC", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            /* get the "viewer" events who (going|interested|invited|admin) */
        } elseif ($user_id == null) {
            $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($results, 'int', false));
            switch ($filter) {
                case 'going':
                    $get_events = $db->query(sprintf("SELECT `events`.* FROM `events` INNER JOIN events_members ON `events`.event_id = events_members.event_id WHERE events_members.is_going = '1' AND events_members.user_id = %s ORDER BY event_id DESC " . $limit_statement, secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    break;

                case 'interested':
                    $get_events = $db->query(sprintf("SELECT `events`.* FROM `events` INNER JOIN events_members ON `events`.event_id = events_members.event_id WHERE events_members.is_interested = '1' AND events_members.user_id = %s ORDER BY event_id DESC " . $limit_statement, secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    break;

                case 'invited':
                    $get_events = $db->query(sprintf("SELECT `events`.* FROM `events` INNER JOIN events_members ON `events`.event_id = events_members.event_id WHERE events_members.is_invited = '1' AND events_members.user_id = %s ORDER BY event_id DESC " . $limit_statement, secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    break;

                default:
                    $get_events = $db->query(sprintf("SELECT * FROM `events` WHERE event_admin = %s ORDER BY event_id DESC " . $limit_statement, secure($this->_data['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
                    break;
            }
            /* get the "target" events */
        } else {
            /* get the target user's privacy */
            $get_privacy = $db->query(sprintf("SELECT user_privacy_events FROM users WHERE user_id = %s", secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
            $privacy = $get_privacy->fetch_assoc();
            /* check the target user's privacy  */
            if (!$this->check_privacy($privacy['user_privacy_events'], $user_id)) {
                return $events;
            }
            /* if the viewer not the target exclude secret groups */
            $where_statement = ($this->_data['user_id'] == $user_id) ? "" : "AND `events`.event_privacy != 'secret'";
            $limit_statement = ($get_all) ? "" : sprintf("LIMIT %s, %s", secure($offset, 'int', false), secure($results, 'int', false));
            $get_events = $db->query(sprintf("SELECT `events`.* FROM `events` INNER JOIN events_members ON `events`.event_id = events_members.event_id WHERE (events_members.is_going = '1' OR events_members.is_interested = '1') AND events_members.user_id = %s " . $where_statement . " ORDER BY event_id DESC " . $limit_statement, secure($user_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        }
        if ($get_events->num_rows > 0) {
            while ($event = $get_events->fetch_assoc()) {
                $event['event_picture'] = get_picture($event['event_cover'], 'event');
                /* check if the viewer joined the event */
                $event['i_joined'] = $this->check_event_membership($this->_data['user_id'], $event['event_id']);;
                $events[] = $event;
            }
        }
        return $events;
    }
    /**
     * disable_post_comments
     *
     * @param integer $post_id
     * @return void
     */
    public function disable_post_comments($post_id)
    {
        global $db;
        /* (check|get) post */
        $post = $this->global_check_post($post_id);
        if (!$post) {
            _error(403);
        }
        /* check if viewer can edit post */
        if (!$post['manage_post']) {
            _error(403);
        }
        /* trun off post commenting */
        $db->query(sprintf("UPDATE global_posts SET comments_disabled = '1' WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
    }


    /**
     * enable_post_comments
     *
     * @param integer $post_id
     * @return void
     */
    public function enable_post_comments($post_id)
    {
        global $db;
        /* (check|get) post */
        $post = $this->global_check_post($post_id);
        if (!$post) {
            _error(403);
        }
        /* check if viewer can edit post */
        if (!$post['manage_post']) {
            _error(403);
        }

        /* trun on post commenting */
        $db->query(sprintf("UPDATE global_posts SET comments_disabled = '0' WHERE post_id = %s", secure($post_id, 'int'))) or _error("SQL_ERROR_THROWEN");
    }

       /**
     * edit_comment
     *
     * @param integer $comment_id
     * @param string $message
     * @param string $photo
     * @return array
     */
    public function global_edit_comment($comment_id, $message, $photo)
    {
        global $db, $system;
        /* (check|get) comment */
        $comment = $this->global_get_comment($comment_id);
        if (!$comment) {
            _error(403);
        }
        /* check if viewer can manage comment [Edit] */
        $comment['edit_comment'] = false;
        if ($this->_logged_in) {
            /* viewer is (admins|moderators)] */
            if ($this->_data['user_group'] < 3) {
                $comment['edit_comment'] = true;
            }
            /* viewer is the author of comment */
            if ($this->_data['user_id'] == $comment['author_id']) {
                $comment['edit_comment'] = true;
            }
        }
        if (!$comment['edit_comment']) {
            _error(400);
        }
        /* check post max length */
        if ($system['max_comment_length'] > 0 && $this->_data['user_group'] >= 3) {
            if (strlen($message) >= $system['max_comment_length']) {
                modal("MESSAGE", __("Text Length Limit Reached"), __("Your message characters length is over the allowed limit") . " (" . $system['max_comment_length'] . " " . __("Characters") . ")");
            }
        }
        /* update comment */
        $comment['text'] = $message;
        $comment['image'] = (!is_empty($comment['image'])) ? $comment['image'] : $photo;
        $db->query(sprintf("UPDATE global_posts_comments SET text = %s, image = %s WHERE comment_id = %s", secure($comment['text']), secure($comment['image']), secure($comment_id, 'int'))) or _error("SQL_ERROR_THROWEN");
        /* post mention notifications if any */
        if ($comment['node_type'] == "comment") {
            $this->post_mentions($comment['text'], $comment['parent_comment']['node_id'], "reply_" . $comment['parent_comment']['node_type'], 'comment_' . $comment['comment_id'], array($comment['post']['author_id'], $comment['parent_comment']['author_id']));
        } else {
            $this->post_mentions($comment['text'], $comment['node_id'], "comment_" . $comment['node_type'], 'comment_' . $comment['comment_id'], array($comment['post']['author_id']));
        }
        /* parse text */
        $comment['text_plain'] = htmlentities($comment['text'], ENT_QUOTES, 'utf-8');
        $comment['text'] = $this->_parse(["text" => $comment['text_plain']]);
        /* return */
        return $comment;
    }



     /**
     * who_shares
     *
     * @param integer $post_id
     * @param integer $offset
     * @return array
     */
    public function who_shares($post_id, $offset = 0)
    {
        global $db, $system;
        $posts = [];
        $offset *= $system['max_results'];
        $get_posts = $db->query(sprintf('SELECT global_posts.post_id FROM global_posts INNER JOIN users ON global_posts.user_id = users.user_id WHERE global_posts.post_type = "shared" AND global_posts.origin_id = %s LIMIT %s, %s', secure($post_id, 'int'), secure($offset, 'int', false), secure($system['max_results'], 'int', false))) or _error("SQL_ERROR_THROWEN");
        if ($get_posts->num_rows > 0) {
            while ($post = $get_posts->fetch_assoc()) {
                $post = $this->global_profile_get_post($post['post_id']);
                if ($post) {
                    $posts[] = $post;
                }
            }
        }
        return $posts;
    }






    /* Posts */
    /* ------------------------------- */

    /**
     * get_posts
     * 
     * @param array $args
     * @return array
     */
    public function global_profile_explore_posts($offset){   
 
      global $db, $system; 
   
      $offset = !isset($offset) ? 1 : $offset;
      $offset *= $system['max_results'];

      $detailed_posts = array();
      $getusers = $db->query(sprintf("SELECT l.post_id, count(*) as countPost FROM global_posts_reactions l GROUP BY l.post_id ORDER BY countPost DESC LIMIT %s, %s
      " , secure($offset, 'int', false), secure($system['max_results'], 'int', false)   )) or _error("SQL_ERROR_THROWEN");
      if ($getusers->num_rows > 0) {
          while ($rows = $getusers->fetch_assoc()) {
              $detailedPosts = $this->global_profile_get_post($rows['post_id']);
              if (!empty($detailedPosts)) {
                  $detailed_posts[] = $detailedPosts;
              }
          }
      }
      return $detailed_posts;
    
    
    }


 



}
