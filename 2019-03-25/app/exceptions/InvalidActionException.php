<?php

namespace app\exceptions;

use Throwable;

/**
 * Class InvalidActionException
 */
class InvalidActionException extends \InvalidArgumentException
{
    private const MSG = 'Invalid action name called: ';

    /**
     * InvalidActionException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(self::MSG . $message, $code, $previous);
    }
}
