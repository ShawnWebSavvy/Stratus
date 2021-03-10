<?php
require('bootloader.php');
require_once('./includes/investment-referral-helper.php');
// live enabled
if(!$system['investment_module_status']) {
	_error(404);
}
// echo '<pre>'; print_r($referral); die;
$referral = $db->query(sprintf("SELECT currency as token_name, extra, investment_transactions.user_id, amount, base_currency,order_id, crons.id as cron_id, investment_transactions.order_id from  crons INNER JOIN investment_transactions ON investment_transactions.id=crons.item_id Where status='completed' and try<3 ORDER BY crons.id DESC LIMIT 1")) or _error("SQL_ERROR_THROWEN");
// echo '<pre>'; print_r($referral); die;
if ($referral->num_rows == 0) {
    return false;
}

$referral =  (object)$referral->fetch_assoc();
// echo '<pre>'; print_r($referral); die;
$referral_execute = new InvestmentReferralHelper($referral);
$referral_execute->addToken('refer_by');
$cron_id = $referral->cron_id;
if(!empty($referral_execute)){
    $db->query(sprintf("DELETE FROM crons where id=$cron_id")) or _error("SQL_ERROR_THROWEN");
    $redisObject = new RedisClass();
    $redisPostKey = 'user-' . $referral->user_id;
    $redisObject->deleteValueFromKey($redisPostKey);
}


?>