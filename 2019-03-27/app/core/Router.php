<?php

namespace app\core;

use app\exceptions\InvalidActionException;
use app\exceptions\InvalidControllerException;

/**
 * Class Router
 */
class Router
{
    private const DEFAULT_CONTROLLER = 'index';
    private const DEFAULT_ACTION     = 'index';

    /**
     * @var string
     */
    private $controllerClassName;

    /**
     * @var string
     */
    private $controllerFilePath;

    /**
     * @var string
     */
    private $actionMethodName;

    /**
     * Router constructor.
     * @param string $requestUri
     * @todo add alias implementation
     */
    public function __construct(string $requestUri)
    {
        $request = explode(DIRECTORY_SEPARATOR, $requestUri);

        $controller = ($request[1] !== '')
            ? strtolower($request[1])
            : self::DEFAULT_CONTROLLER;
        $action = (isset($request[2]) && $request[2] !== '')
            ? strtolower($request[2])
            : self::DEFAULT_ACTION;

        $this->controllerClassName = '\app\controllers\\' . ucfirst($controller) . 'Controller';
        $this->controllerFilePath  = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR .
            ucfirst($controller) . 'Controller.php';
        $this->actionMethodName =  $action . 'Action';
    }

    /**
     * init application
     */
    public static function init(): void
    {
        $routerObj = new self($_SERVER['REQUEST_URI']);
        if (!file_exists($routerObj->controllerFilePath)) {
            throw new InvalidControllerException($routerObj->controllerClassName);
        }
        $controller = new $routerObj->controllerClassName;
        if (!method_exists($controller, $routerObj->actionMethodName)) {
            throw new InvalidActionException($routerObj->controllerClassName);
        }
        $controller->{$routerObj->actionMethodName}();
    }
}
