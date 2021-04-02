<?php
require('includes/class-user.php');
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
	
	function createChatBoxMessage($chat_user,$chat_box_message,$conversation_id,$user_id) {
		$user= new User;
		$return = array();

		// initialize the conversation
		$conversation = array();
		// get conversation messages
		/* check single user's chat status */
		// if(isset($user_id)) {
		// 		$return['user_online'] = ($user->user_online($_GET['ids']))? true: false;
		// }
		/* if conversation_id not set -> check if there is a mutual conversation */
		if(!isset($conversation_id)) {
			$mutual_conversation = $user->get_mutual_conversation((array)$user_id);
			if(!$mutual_conversation) {
				/* there is no mutual conversation -> return & exit */
				return_json($return);
			}
			/* set the conversation_id */
			$conversation_id = $mutual_conversation;
			/* return [conversation_id: to set it as chat-box cid] */
			$return['conversation_id'] = $mutual_conversation;
		}
	
		/* get convertsation details */
		$conversation = $user->get_conversation($conversation_id);
	
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
		return_json($return);
		/* $message ="<div class='chat-box-message'>" . $chat_box_message . "</div>";
		$messageArray = array('message'=>$message,'message_type'=>'chat-box-html');
		$chatMessage = $this->seal(json_encode($messageArray));
		return $chatMessage; */
	}
}
?>