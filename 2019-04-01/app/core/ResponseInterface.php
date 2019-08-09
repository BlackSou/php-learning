<?php


namespace app\core;


/**
 * Interface ResponseInterface
 */
interface ResponseInterface
{
    /**
     * Get the View Name.
     *
     * @return string
     */
    public function getViewName(): string;

    /**
     * Get params for view render.
     *
     * @return array
     */
    public function getParams(): array;

    /**
     * Response HTTP status.
     *
     * @return int
     */
    public function getHttpStatusCode(): int;
}