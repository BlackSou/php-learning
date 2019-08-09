<?php

require 'App/autoload.php';

use App\Common\Router;
use App\Common\Auth;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (Auth::isLogged()) {
    Router::setCurrent(Router::PAGE_HOME);
}
Router::action();

