<?php


namespace app\core;


/**
 * Class Request.
 */
class Request implements RequestInterface
{
    /**
     * @var string
     */
    private $url = '';

    /**
     * @var string
     */
    private $query = '';

    /**
     * @var array
     */
    private $queryParams = [];

    /**
     * @var array
     */
    private $params = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->setUrl();
        $this->setQuery();
        $this->setQueryParams();
    }

    /**
     * {@inheritDoc}
     */
    public function url(): string
    {
        return $this->url;
    }

    /**
     * {@inheritDoc}
     */
    public function query(): string
    {
        return $this->query;
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $key, $default = null)
    {
        if (array_key_exists(strtolower($key), $this->queryParams)) {
            return $this->queryParams[strtolower($key)];
        }

        return $default;
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed|null
     */
    public function getParam(string $key, $default = null)
    {
        if (array_key_exists(strtolower($key), $this->params)) {
            return $this->params[strtolower($key)];
        }

        return $default;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * setUrl
     */
    private function setUrl(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $search = strpos($uri, '?');
        if ($search !== false) {
            $uri = substr($uri, 0, $search);
        }
        $this->url = $uri;
    }

    /**
     * setQuery
     */
    private function setQuery(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $search = strpos($uri, '?');
        $this->query = ($search === false)
            ? ''
            : substr($uri, $search + 1, strlen($uri) - 1);
    }

    /**
     * setQueryParams
     */
    private function setQueryParams(): void
    {
        if (in_array($this->query, ['', '='], true) && strpos($this->query, '=') === false) {
            return;
        }

        $queryParams = explode('&', $this->query);
        foreach ($queryParams as $param) {
            if (strpos($param, '=') === false) {
                $this->queryParams[strtolower($param)] = null;
                continue;
            }

            [$key, $value] = explode('=', $param);
            $this->queryParams[strtolower($key)] = $value;
        }
    }
}