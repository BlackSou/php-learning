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
    public $controllerClassName;

    /**
     * @var string
     */
    public $controllerFilePath;

    /**
     * @var string
     */
    public $actionMethodName;

    /**
     * @var array
     */
    public $params = [];

    /**
     * Router constructor.
     * @param string $requestUri
     * @todo add alias implementation
     */
    public function __construct(Request $request)
    {
        $requestArr = explode(DIRECTORY_SEPARATOR, $request->url());

        $controller = ($requestArr[1] !== '')
            ? strtolower($requestArr[1])
            : self::DEFAULT_CONTROLLER;
        $action = (isset($requestArr[2]) && $requestArr[2] !== '')
            ? strtolower($requestArr[2])
            : self::DEFAULT_ACTION;

        $requestCnt = count($requestArr);
        if ($requestCnt > 3) {
            $params = [];
            for ($i = 3; $i < $requestCnt; $i++) {
                if (strlen($requestArr[$i])) {
                    $params[] = $requestArr[$i];
                }
            }
            $request->setParams($params);
        }

        $this->controllerClassName = '\app\controllers\\' . ucfirst($controller) . 'Controller';
        $this->controllerFilePath  = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR .
            ucfirst($controller) . 'Controller.php';
        $this->actionMethodName =  $action . 'Action';
    }
}
