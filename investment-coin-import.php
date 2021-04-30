<?php
require('bootloader.php');

/* convert csv to php array
$filepath = $system['system_url'].'/content/uploads/files/stratus_distribution.csv';

ini_set('auto_detect_line_endings', TRUE);

$rows = array_map('str_getcsv', file($filepath));
$header = array_shift($rows);
// print_r($header);die;
$header['0'] = "userId"; 
$csv = array();
foreach ($rows as $row) {
  $csv[] = array_combine($header, $row);
}
foreach($csv as $key=>$line){    

    $db->query(sprintf("INSERT INTO investment_coin_imports (user_id, gsx_coins) VALUES (%s, %s)",secure($line['userId']), secure($line['Payout']))) or _error("SQL_ERROR_THROWEN");

}
*/

$data = $db->query(sprintf("SELECT * from  investment_coin_imports Where process='P' LIMIT 10")) or _error("SQL_ERROR_THROWEN");
$list =  [];
if ($data->num_rows > 0) {
    while ($data1 = $data->fetch_assoc()) {
        // $list[] = $data1;

        // echo '<pre>'; print_r($data1);die;
        
        $id = "gsx_distribution_".$data1['user_id'].$data1['user_id'].time(); //
        
        $db->query(sprintf("INSERT INTO investment_transactions (user_id, order_id, base_currency, tokens, currency, tnx_type ,amount, receive_amount, recieve_token, status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", secure($data1['user_id'], 'int'),secure($id),secure('usd'), secure($data1['gsx_coins']), secure('gsx'), secure('buy'),secure(0),secure(0), secure($data1['gsx_coins']), secure('completed') )) or _error("SQL_ERROR_THROWEN");
        $investment_id = $db->insert_id;
          
        if($investment_id){

            $db->query(sprintf("INSERT INTO ads_users_wallet_transactions (user_id, investment_id, node_type, node_id, amount, type, date,paymentMode) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", secure($data1['user_id'], 'int'), secure($investment_id), secure('purchase_coin'), secure(0, 'int'), secure(0), secure('out'), secure(date('Y-m-d h:i:m')), secure('usd_wallet_balance'))) or _error("SQL_ERROR_THROWEN");
     
            $db->query(sprintf("UPDATE users SET gsx_wallet = gsx_wallet + %s WHERE user_id = %s", secure($data1['gsx_coins']), secure($data1['user_id'], 'int'))) or _error("SQL_ERROR_THROWEN");
        }
        exit;
        
    }
}



?>