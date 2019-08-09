<?php

namespace App\Actions;

use App\Common\Auth;
use App\Common\Settings;
use App\Views\Render;

class IndexAction extends AbstractAction
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
            'title' => 'Index page',
            'content' => '
                <h1>Index page</h1>
                <a href="?auth=1">login</a>
            ',
        ]);
    }
}