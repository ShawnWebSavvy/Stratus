<?php
//require('bootstrap.php');
require_once('includes/libs/Smarty/Smarty.class.php');
$smarty = new Smarty;
require_once('includes/class-user.php');
try {
    $user = new User();
    /* assign variables */
    $smarty->assign('user', $user);
} catch (Exception $e) {
    _error(__("Error"), $e->getMessage());
}
//error_reporting(0);
class ChatHandler extends User{
	
	
	function send($message) {
		global $clientSocketArray;
		$messageLength = strlen($message);
		foreach($clientSocketArray as $clientSocket)
		{
			@socket_write($clientSocket,$message,$messageLength);
		}
		return true;
	}

	function unseal($socketData) {
		$length = ord($socketData[1]) & 127;
		if($length == 126) {
			$masks = substr($socketData, 4, 4);
			$data = substr($socketData, 8);
		}
		elseif($length == 127) {
			$masks = substr($socketData, 10, 4);
			$data = substr($socketData, 14);
		}
		else {
			$masks = substr($socketData, 2, 4);
			$data = substr($socketData, 6);
		}
		$socketData = "";
		for ($i = 0; $i < strlen($data); ++$i) {
			$socketData .= $data[$i] ^ $masks[$i%4];
		}
		return $socketData;
	}

	function seal($socketData) {
		$b1 = 0x80 | (0x1 & 0x0f);
		$length = strlen($socketData);
		
		if($length <= 125)
			$header = pack('CC', $b1, $length);
		elseif($length > 125 && $length < 65536)
			$header = pack('CCn', $b1, 126, $length);
		elseif($length >= 65536)
			$header = pack('CCNN', $b1, 127, $length);
		return $header.$socketData;
	}

	function doHandshake($received_header,$client_socket_resource, $host_name, $port) {
		$headers = array();
		$lines = preg_split("/\r\n/", $received_header);
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
		$buffer  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
		"Upgrade: websocket\r\n" .
		"Connection: Upgrade\r\n" .
		"WebSocket-Origin: $host_name\r\n" .
		"WebSocket-Location: ws://$host_name:$port/stratus/\r\n".
		"Sec-WebSocket-Accept:$secAccept\r\n\r\n";
		socket_write($client_socket_resource,$buffer,strlen($buffer));
	}
	
	function newConnectionACK($client_ip_address) {
		$message = 'New client ' . $client_ip_address.' joined';
		$messageArray = array('message'=>$message,'message_type'=>'chat-connection-ack');
		$ACK = $this->seal(json_encode($messageArray));
		return $ACK;
	}
	
	function connectionDisconnectACK($client_ip_address) {
		$message = 'Client ' . $client_ip_address.' disconnected';
		$messageArray = array('message'=>$message,'message_type'=>'chat-connection-ack');
		$ACK = $this->seal(json_encode($messageArray));
		return $ACK;
}
	
	function createChatBoxMessage($chat_user,$chat_box_message,$conversation_id,$user_id,$photo,$voice_note,$recipients) {
		$user= new User;
		global $smarty;
		$return = array();
		// initialize the conversation
		$conversation = array();
		$saveconversation = $user->post_conversation_message($chat_box_message, $photo, $voice_note, $conversation_id, $recipients);
	/* remove typing status */
		$user->update_conversation_typing_status($saveconversation['conversation_id'], false);

	/* add conversation to opened chat boxes session if not */
			if(!in_array($saveconversation['conversation_id'], $_SESSION['chat_boxes_opened'])) {
			$_SESSION['chat_boxes_opened'][] = $saveconversation['conversation_id'];
			}
		// get conversation messages
		/* check single user's chat status */
		// if(isset($user_id)) {
		// 		$return['user_online'] = ($user->user_online($_GET['ids']))? true: false;
		// }
		/* if conversation_id not set -> check if there is a mutual conversation */

		/* get convertsation details */
		$conversation = $user->get_conversation($conversation_id);
		$online_friends = $user->get_online_friends();
		print_r($online_friends);
		/* get offline friends */
		$offline_friends = $user->get_offline_friends();
		print_r($offline_friends);
		/* get sidebar friends */
		$sidebar_friends = array_merge( $online_friends, $offline_friends );
		// assign variables
		$smarty->assign('sidebar_friends', $sidebar_friends);
		/* return */
		$return['master']['sidebar'] = $smarty->fetch("ajax.chat.master.sidebar.tpl");
		/* get conversation messages */
		$conversation['messages'] = $user->get_conversation_messages($conversation_id);
		/* check if last message sent by the viewer */
		if($conversation['seen_name_list'] && end($conversation['messages'])['user_id'] == $user->_data['user_id']) {
			$smarty->assign('last_seen_message_id', end($conversation['messages'])['message_id']);
		}
	
		/* return [color] */
		$return['color'] = $conversation['color'];
	
		/* return [messages] */
		$smarty->assign('conversation', $conversation);
		$return['messages'] = $smarty->fetch("socket.chat.conversation.messages.tpl");
		
		/* add conversation to opened chat boxes session if not */
		if(!in_array($conversation['conversation_id'], $_SESSION['chat_boxes_opened'])) {
			$_SESSION['chat_boxes_opened'][] = $conversation['conversation_id'];
		}
	
		// return & exit
		
		//return_json($return);

		$chatMessage = $this->seal(json_encode($return));
		return $chatMessage; 
		/* $message ="<div class='chat-box-message'>" . $chat_box_message . "</div>";
		$messageArray = array('message'=>$message,'message_type'=>'chat-box-html');
		$chatMessage = $this->seal(json_encode($messageArray));
		return $chatMessage; */
	}
}
?>