<?php

namespace app\controllers;

use app\models\Post;

class IndexController extends Controller
{
    public function indexAction()
    {
        var_dump(Post::getData());
        echo __CLASS__ . __METHOD__;
    }

}