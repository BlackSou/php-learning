<?php

namespace App\Actions;


use App\Common\Auth;
use App\Common\Settings;
use App\Views\Render;

class HomeAction extends AbstractAction
{
    public function index(): void
    {
        if (isset($_GET['logout'])) {
            Auth::logout();
        }
        if (!Auth::isLogged()) {
            header('Location: ' . Settings::host());
        }

        Render::render('main', [
            'title' => 'Home page',
            'content' => '
                <h1>Home page</h1>
                <a href="home.php?logout=1">logout</a>
            ',
        ]);
    }
}