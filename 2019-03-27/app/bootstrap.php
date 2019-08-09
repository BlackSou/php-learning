<?php

require 'autoload.php';

use app\core\Router;

try {
    Router::init();
} catch (\Throwable $e) {
    // save error to logs
    // service page
    echo 'Fatal Error: ' . $e->getMessage();
}
