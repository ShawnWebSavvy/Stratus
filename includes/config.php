<?php
/*

Note: You need to set these in the .htaccess file per whatever
the environment sepcifications are.

SetEnv DB_NAME some_database
SetEnv DB_USER some_user
SetEnv DB_PASSWORD some_password 
SetEnv DB_HOST some_host
SetEnv DB_PORT some_port
SetEnv SYS_URL some_url
SetEnv API_BASE_URL some_url
 */
/*
define("DB_NAME", getenv("DB_NAME"));
define("DB_USER", getenv("DB_USER"));
define("DB_PASSWORD", getenv("DB_PASSWORD"));
define("DB_HOST", getenv("DB_HOST"));
define("DB_PORT", getenv("DB_PORT"));
define("SYS_URL", getenv("SYS_URL"));
define("API_BASE_URL", getenv("API_BASE_URL"));
define("DEBUGGING", true);
define("DEFAULT_LOCALE", "en_us");
define("LICENCE_KEY", "2dZZzu6jS-3DMmA-2iBui-2OlV7-4zfJK-b6c299384b5a");
 */
define("DB_NAME", "sngine");
define("DB_USER", "root");
define("DB_PASSWORD", "root");
define("DB_HOST", "localhost");
define("DB_PORT","3306");
define("SYS_URL", "http://localhost");
define("API_BASE_URL", "https://ws.stage-apollo.xyz/api");
//define("API_BASE_URL", "https://ws.knoxglobal.com/api");
define("DEBUGGING", true);
define("DEFAULT_LOCALE", "en_us");
define("LICENCE_KEY", "2dZZzu6jS-3DMmA-2iBui-2OlV7-4zfJK-b6c299384b5a");
