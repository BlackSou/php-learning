<?php

namespace App\Actions;

use App\Common\Auth;
use App\Common\Settings;
use App\Views\Render;

class NotFoundAction extends AbstractAction
{
    public function index(): void
    {
        if (isset($_GET['auth'])) {
            Auth::login();
        }
        if (Auth::isLogged()) {
            header('Location: ' . Settings::host() . '/home.php');
        }

        Render::render('main', [
            'title' => 'page 404',
            'content' => '
                <h1>Page NOT FOUND</h1>
                <a href="/">to index page</a>
            ',
        ]);
    }
}