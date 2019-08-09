<?php

namespace app\controllers;


use app\core\Request;

/**
 * Class Controller
 */
abstract class Controller
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Controller constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
