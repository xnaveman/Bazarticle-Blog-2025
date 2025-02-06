<?php
// Define ROOT_PATH
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

// Define ROOT_URL
if (strpos($_SERVER['HTTP_HOST'], 'scalingo') !== false) {
    define('ROOT_URL', 'https://' . $_SERVER['HTTP_HOST']);
} else {
    define('ROOT_URL', 'http://' . $_SERVER['HTTP_HOST']);
}

// Load env
require_once ROOT . '/includes/libs/DotEnv.php';
if (strpos($_SERVER['HTTP_HOST'], 'scalingo') == false) {
    (new DotEnv(ROOT . '/.env'))->load();
}

// Defines
require_once ROOT . '/config/defines.php';

// Debug
if (getenv('APP_DEBUG') == 'true') {
    require_once ROOT . '/config/debug.php';
}

//load functions
require_once ROOT . '/functions/global.inc.php';

//load security
require_once ROOT . '/config/security.php';
?>