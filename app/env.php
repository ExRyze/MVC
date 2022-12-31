<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvc');

define('BASE_URL', '/mvc');
define('VIEW', '../app/views');
define('CSS', BASE_URL.'/public/css');
define('VENDOR', BASE_URL.'/public/vendor');
define('IMG', BASE_URL.'/public/img');
define('JS', BASE_URL.'/public/js');

define('MAIN_HEAD', VIEW.'/components/head.php');
define('MAIN_FOOT', VIEW.'/components/foot.php');
define('MAIN_SIDEBAR', VIEW.'/components/sidebar.php');
define('MAIN_NAVBAR', VIEW.'/components/navbar.php');