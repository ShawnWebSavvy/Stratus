<?php
$socket_key = fetchkey('0x33');
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
socket_bind($socket, 0, $port);
socket_listen($socket);
$clients = array($socket);

while (true) {
	$changed = $clients;
	socket_select($changed, $null, $null, 0, 10);
	if (in_array($socket, $changed)) {
		$socket_new = socket_accept($socket);
		$clients[] = $socket_new;
		$header = socket_read($socket_new, 1024);
		perform_handshaking($header, $socket_new, $host, $port);
		socket_getpeername($socket_new, $ip);
		$found_socket = array_search($socket, $changed);
		sendOldMessages($socket_new);		
		unset($changed[$found_socket]);
	}
	foreach ($changed as $changed_socket) {	
		while(socket_recv($changed_socket, $buf, 1024, 0) >= 1)
		{	
			$received_text = unmask($buf);
			$msg = json_decode($received_text);
			$msg_type    =  @$msg->type;
			$write_key    = @$msg->writekey;
			if($msg_type == 'chatmsg' && $write_key == $socket_key) {
				$user_name    = @$msg->name;
				$user_message = @$msg->message;
				$user_color   = @$msg->color;
				if(in_array($user_name,$admin)) {
					if (strpos($user_message,'./ban') !== false) {
						newBan($user_message);
						break 2; 
					}
					if (strpos($user_message,'./unban') !== false) {
						unBan($user_message);
						break 2; 
					}	
				}
				if(usernameExists($user_name)) {
					if($user_name == $null || $user_message == $null) {
						break 2;
					}else{
						if(!isBant($user_name)) {
							newMessage($user_name,$user_message,$user_color);					
							break 2;
						}else{
							cooldown($user_name);
						}
					}
				}
			}
		}
		if($msg_type == 'alert' && $write_key == $socket_key) {
			$recipient   = @$msg->user;
			$alert		 = @$msg->alert;
			$response_text = mask(json_encode(array('type'=>'alert', 'user'=>security($recipient), 'alert'=>security($alert))));
			send_message($response_text);
		}
		
		if($msg_type == 'mktdata' && $write_key == $socket_key) {
			$pair   = @$msg->pair;
			$price	= @$msg->price;
			$response_text = mask(json_encode(array('type'=>'mktdata', 'pair'=>$pair, 'price'=>$price)));
			send_message($response_text);
		}
		
		$buf = @socket_read($changed_socket, 1024, PHP_NORMAL_READ);
		if ($buf === false) { 
			$found_socket = array_search($changed_socket, $clients);
			@socket_getpeername($changed_socket, $ip);
			unset($clients[$found_socket]);
		}
	}
}
socket_close($sock);