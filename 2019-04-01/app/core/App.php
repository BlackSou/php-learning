<?php


namespace app\core;


use app\exceptions\InvalidActionException;
use app\exceptions\InvalidControllerException;

/**
 * Class App
 */
class App implements AppInterface
{
    /**
     * run App
     */
    public function run(): void
    {
        try {
            $this->runApp();
        } catch (\Throwable $e) {
            // save error to logs
            // service page
            echo 'Fatal Error: ' . $e->getMessage();
        }
    }

    private function runApp(): void
    {
        $request = new Request();
        $routerObj = new Router($request);

        if (!file_exists($routerObj->controllerFilePath)) {
            throw new InvalidControllerException($routerObj->controllerClassName);
        }
        $controller = new $routerObj->controllerClassName($request);
        if (!method_exists($controller, $routerObj->actionMethodName)) {
            throw new InvalidActionException($routerObj->controllerClassName);
        }
        $response = $controller->{$routerObj->actionMethodName}();

        (new View($response))->render();
    }
}