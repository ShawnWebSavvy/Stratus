<?php
$is_secure = false;
if (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') {
    $is_secure = true;
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
    $is_secure = true;
}
$protocol = $is_secure ? 'https' : 'http';
$system_url =  $protocol . "://" . $_SERVER['HTTP_HOST'];
define("DB_NAME", "sngine");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_HOST", "localhost");
define("DB_PORT", "3306");
define("SYS_URL", "http://localhost/stratus");
define("API_BASE_URL", "https://ws.stage-apollo.xyz/api");
define("DEBUGGING", true);
define("DEFAULT_LOCALE", "en_us");
define("LICENCE_KEY", "2dZZzu6jS-3DMmA-2iBui-2OlV7-4zfJK-b6c299384b5a");
define("PLY_URL", "http://localhost/playtube");


define("PLAYTUBE_LINK", "http://localhost/playtube/logout");
