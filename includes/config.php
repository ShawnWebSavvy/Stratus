<?php
<<<<<<< HEAD
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
define("DB_PASSWORD", "Admin@123");
define("DB_HOST", "localhost");
=======
define("DB_NAME", "s2_stratus");
define("DB_USER", "s2_stratu");
define("DB_PASSWORD", "cs3gnMHw");
define("DB_HOST", "10.1.0.16");
>>>>>>> b8279ce1ccdcde60ea3f8c1dd1d7cbf71413ef8d
define("DB_PORT", "3306");
define("SYS_URL", "http://localhost/redis");
define("API_BASE_URL", "https://ws.stage-apollo.xyz/api");
define("DEBUGGING", true);
define("DEFAULT_LOCALE", "en_us");
define("LICENCE_KEY", "2dZZzu6jS-3DMmA-2iBui-2OlV7-4zfJK-b6c299384b5a");
<<<<<<< HEAD
define("PLY_URL", "https://playtube.stratus-stage.xyz");
define("PLAYTUBE_LINK", "https://playtube.stratus-stage.xyz/logout");
=======
define("PLY_URL", "http://localhost/playtube");

// define("DB_NAME", "notecloud");
// define("DB_USER", "notecloud");
// define("DB_PASSWORD", "LesinyyMVD4uqxKM");
// define("DB_HOST", "notecloud-rds.cc5yzmpks9xy.us-west-1.rds.amazonaws.com");
// define("DB_PORT", "3306");
// define("SYS_URL", "https://www.stratus-stage.xyz");
// define("API_BASE_URL", "https://ws.stage-apollo.xyz/api");
// define("DEBUGGING", true);
// define("DEFAULT_LOCALE", "en_us");
// define("LICENCE_KEY", "2dZZzu6jS-3DMmA-2iBui-2OlV7-4zfJK-b6c299384b5a");
>>>>>>> b8279ce1ccdcde60ea3f8c1dd1d7cbf71413ef8d
