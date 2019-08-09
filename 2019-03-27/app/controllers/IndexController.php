<?php

namespace app\controllers;

use app\models\Fact;
use app\models\Post;

class IndexController extends Controller
{
    public function indexAction()
    {
        var_dump(Fact::findAll());
//        $post->getAuthor();
//        var_dump(Post::find(1));
//        var_dump(Post::findAll(1));
//        var_dump(Post::findOneBy(['author' => 'dima']));
//        var_dump(Post::findBy(['author' => 'dima', 'is_active' => false]));
//        var_dump(Post::getTodayPosts(1));
    }

}