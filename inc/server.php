<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
define('ABSPATH', dirname(__FILE__) . '/');
function shutdown(){
	file_put_contents(ABSPATH."serverStatus.txt", "0");
	require_once ABSPATH."startServer.php";
}
register_shutdown_function('shutdown');
if( isset($startNow) ){
	require_once ABSPATH."vendor/autoload.php";
	require_once ABSPATH."class.chat.php";
	$server = IoServer::factory(
		new ChatServer(),
		8040,
		"127.0.0.1"
	);
	$server->run();
}
else { echo "no";}
?>