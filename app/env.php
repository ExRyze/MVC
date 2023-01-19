<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvc');

define('BASE_URL', '/mvc');
define('PUBLIC_URL', BASE_URL.'/public');
define('VIEW_URL', '../app/views');

define('COMPONENTS', VIEW_URL.'/components');
define('HEADER', COMPONENTS.'/header.php');
define('NAVBAR', COMPONENTS.'/navbar.php');
define('FOOTER', COMPONENTS.'/footer.php');

define('CSS', PUBLIC_URL.'/css');
define('IMG', PUBLIC_URL.'/img');
define('JS', PUBLIC_URL.'/js');
define('VENDOR', PUBLIC_URL.'/vendor');