<?php

namespace app\exceptions;

use Throwable;

/**
 * Class InvalidControllerException
 */
class InvalidControllerException extends \InvalidArgumentException
{
    private const MSG = 'Invalid controller name called: ';

    /**
     * InvalidControllerException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(self::MSG . $message, $code, $previous);
    }
}
