<?php


namespace app\core;


/**
 * Interface RequestInterface
 */
interface RequestInterface
{
    /**
     * Get the URL (no query string) for the request.
     *
     * @return string
     */
    public function url(): string;

    /**
     * Retrieve a query string item from the request.
     *
     * @return string
     */
    public function query(): string;

    /**
     * Retrieve an input item from the request.
     *
     * @param string $key
     * @param null $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null);
}