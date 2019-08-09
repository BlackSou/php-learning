<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\models\Fact;
use app\models\Post;

class IndexController extends Controller
{
    public function indexAction(Request $request): Response
    {
        var_dump($request->url());exit;
        return new Response();
    }

}