<?php

namespace app\core;

/**
 * Class Response
 */
class Response implements ResponseInterface
{
    public const STATUS_OK          = 200;
    public const STATUS_BAD_REQUEST = 400;
    public const STATUS_NOT_FOUND   = 404;

    /**
     * @var string
     */
    private $viewName;

    /**
     * @var array
     */
    private $params;

    /**
     * @var int
     */
    private $httpStatusCode;

    /**
     * Response constructor.
     * @param $viewName
     * @param array $params
     * @param int $httpStatusCode
     */
    public function __construct(
        $viewName,
        $params = [],
        int $httpStatusCode = self::STATUS_OK
    ) {
        $this->viewName = $viewName;
        $this->params = $params;
        $this->httpStatusCode = $httpStatusCode;
    }

    /**
     * {@inheritDoc}
     */
    public function getViewName(): string
    {
        return $this->viewName;
    }

    /**
     * {@inheritDoc}
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * {@inheritDoc}
     */
    public function getHttpStatusCode(): int
    {
        $this->httpStatusCode;
    }
}