<?php
/**
 * ajax -> admin -> referrals
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();
// print_r($_POST['name']);die;
// check admin|moderator permission
if(!$user->_is_admin) {
	modal("MESSAGE", __("System Message"), __("You don't have the right permission to access this"));
}



// handle referrals
try {
    switch ($_GET['do']) {
		case '':
        $return = array();

        $total = $db->query(sprintf('SELECT COUNT(*) as count FROM users WHERE (user_email LIKE %1$s) ORDER BY user_id DESC', secure($_POST['name'], 'search'))) or _error("SQL_ERROR");
        $params['total_items'] = $total->fetch_assoc()['count'];
        $params['items_per_page'] = 10;
        $params['selected_page'] = ((int) $_POST['pageNumber'] == 0) ? 1 : $_POST['pageNumber'];
        $return['totalRow'] = $params['total_items'];
        require('../../class-pager.php');

        $pager = new Pager($params);

        $limit_query = $pager->getLimitSql();
        $get_rows = $db->query(sprintf('SELECT user_id as id, user_email as name FROM users WHERE (user_email LIKE %1$s) ' . $limit_query, secure($_POST['name'], 'search'))) or _error("SQL_ERROR");
        $return['list'] = array();
        if ($get_rows->num_rows > 0) {
        
            while ($row = $get_rows->fetch_assoc()) {
                $rows[] = $row;
            }

            $return['list'] = $rows;
        }
        return_json($return);
        break;

        case 'add_custom_referral':
            global $db, $system;
                // valid inputs
            if(!isset($_POST['user_id'])) {
                _error(400);
            }
            	/* valid inputs */
			if (is_empty($_POST['user_id']) || !is_numeric($_POST['user_id'])) {
				throw new Exception(__("Please select an email from drop down list."));
            }   
            // print_r($_POST);die;
            if (is_empty($_POST['user_id_text'])) {
				throw new Exception(__("Please select an email from drop down list."));
            }

            // if (is_empty($_POST['referral']) || !is_email($_POST['name_text'])) {
			// 	throw new Exception(__("You must enter a valid email id"));
            // }
            
            $user_id = $_POST['user_id'];
            $params['referral'] = json_encode($_POST['referral']);
            $check_exist = $db->query(sprintf("SELECT * FROM user_custom_referrals WHERE user_id =  $user_id")) or _error("SQL_ERROR_THROWEN");
         
            if ($check_exist->num_rows == 0) {
                $db->query(sprintf("INSERT INTO user_custom_referrals (user_id, referral) VALUES ('{$user_id}','{$params['referral']}')")) or _error("SQL_ERROR_THROWEN");
                $referral_id = $db->insert_id;
                if($referral_id){
				    return_json(array('success' => true, 'message' =>'Custom referral added successfully'));
                }
            }else{
                return_json(array('success' => true, 'message' =>'User custom referral already exist.'));
            }
        break;
        case 'edit_custom_referral':
            global $db, $system;
            
                // valid inputs
            if(!isset($_POST['user_id'])) {
                _error(400);
            }
            	/* valid inputs */
			if (is_empty($_POST['user_id']) || !is_numeric($_POST['user_id'])) {
				throw new Exception(__("Please select an email from drop down list."));
            }   
            // print_r($_POST);die;
            if (is_empty($_POST['email_id'])) {
				throw new Exception(__("Please select an email from drop down list."));
            }

            // if (is_empty($_POST['referral']) || !is_email($_POST['name_text'])) {
			// 	throw new Exception(__("You must enter a valid email id"));
            // }
            
            $user_id = $_POST['user_id'];
            $referral = json_encode($_POST['referral']);
            $check_exist = $db->query(sprintf("SELECT * FROM user_custom_referrals WHERE user_id =  $user_id")) or _error("SQL_ERROR_THROWEN");
         
            if ($check_exist->num_rows >0) {
                $db->query(sprintf("UPDATE user_custom_referrals  SET referral='$referral' WHERE user_id = $user_id")) or _error("SQL_ERROR_THROWEN");
                return_json(array('success' => true, 'message' =>'Custom referral updated successfully'));
            }else{
                return_json(array('success' => true, 'message' =>'No custom referral found'));
            }
        break;
    }

} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}


?>