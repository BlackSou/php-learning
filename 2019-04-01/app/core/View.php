<?php

namespace app\core;


/**
 * Class View
 */
class View implements ViewInterface
{
    /**
     * @var string
     */
    private $viewPath;

    /**
     * @var array
     */
    private $viewParams;

    /**
     * @var array
     */
    private $viewOptions;

    /**
     * View constructor.
     */
    public function __construct(Response $response)
    {
        $this->viewPath = dirname(__DIR__) . DIRECTORY_SEPARATOR .
            'views' . DIRECTORY_SEPARATOR .
            str_replace('.', DIRECTORY_SEPARATOR, $response->getViewName()) .
            '.alp.php';

    }

    /**
     * {@inheritDoc}
     */
    public function render(): void
    {
        var_dump(Config::getAll(), $this);exit;
    }
}