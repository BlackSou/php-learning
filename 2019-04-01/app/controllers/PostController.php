<?php

namespace app\controllers;

use app\core\Response;
use app\models\Post;

class PostController extends Controller
{
    public function listAction()
    {
        echo __CLASS__ . __METHOD__;
    }

    public function readAction(): Response
    {
        if (!$postId = (int) $this->request->getParam(0)) {
            return new Response(
                'error.' . Response::STATUS_NOT_FOUND,
                ['msg' => 'post id not set'],
                Response::STATUS_NOT_FOUND
            );
        }
        if (!$post = Post::find($postId)) {
            return new Response(
                'error.' . Response::STATUS_BAD_REQUEST,
                ['post' => $postId],
                Response::STATUS_BAD_REQUEST
            );
        }

        return new Response(
            'post.read',
            ['post' => $post]
        );
    }
}