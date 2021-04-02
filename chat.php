<?php
require('bootloader.php');

// user access
user_access();

// page header

$host = 'localhost';
$port = '8090';
$subfolder = "stratus";
$colors = array('#007AFF','#FF7000','#FF7000','#15E25F','#CFC700','#CFC700','#CF1100','#CF00BE','#F00');
$color_pick = array_rand($colors);
//error_reporting(E_ALL);

page_header(__("chat"));
function perform_handshaking($receved_header,$client_conn, $host, $port)
{
	$headers = array();
	$lines = preg_split("/\r\n/", $receved_header);
	foreach($lines as $line)
	{
		$line = chop($line);
		if(preg_match('/\A(\S+): (.*)\z/', $line, $matches))
		{
			$headers[$matches[1]] = $matches[2];
		}
	}

	$secKey = $headers['Sec-WebSocket-Key'];
	$secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
	//hand shaking header
	$upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
	"Upgrade: websocket\r\n" .
	"Connection: Upgrade\r\n" .
	"WebSocket-Origin: $host\r\n" .
	"WebSocket-Location: wss://$host:$port/stratus/server.php\r\n".
	"Sec-WebSocket-Accept:$secAccept\r\n\r\n";
	socket_write($client_conn,$upgrade,strlen($upgrade));
}
try {

	// check the view
	$view = (!isset($_GET['view']))? 'chat' : 'new';

	// get view content
	if($view == 'chat') {

		if (!isset($_GET['cid'])) {
			if($user->_data['conversations']) {
				$conversation = $user->_data['conversations'][0];
				$conversation['messages'] = $user->get_conversation_messages($conversation['conversation_id']);
			}
		} else {
			/* check cid is valid */
			if(is_empty($_GET['cid']) || !is_numeric($_GET['cid'])) {
				_error(404);
			}
			$conversation = $user->get_conversation($_GET['cid']);
			$conversation['messages'] = $user->get_conversation_messages($conversation['conversation_id']);
		}
		// assign variables
		//echo "<pre>"; print_r($conversation); die(" hiii");
		$smarty->assign('conversation', $conversation);

	} elseif ($view == 'new') {

		/* get recipient */
		if(isset($_GET['uid'])) {
			$get_recipient = $db->query(sprintf("SELECT user_id, CONCAT(users.user_firstname,' ',users.user_lastname) as user_fullname FROM users WHERE user_id = %s", secure($_GET['uid'], 'int') )) or _error("SQL_ERROR_THROWEN");
			if($get_recipient->num_rows > 0) {
				$recipient = $get_recipient->fetch_assoc();
				/* assign variables */
				$smarty->assign('recipient', $recipient);
			}
		}
		
	}
	/* assign variables */
	$smarty->assign('view', $view);
	$smarty->assign('active_page', 'LocalHub');
	$smarty->assign('subactive_page', 'chat');

} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}
//$smarty->assign('view', $view);
$smarty->assign('active_page', 'LocalHub');
$smarty->assign('subactive_page', 'chat');
page_footer("chat");
?>