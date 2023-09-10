<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class DataNotFoundException extends Exception
{
    public function __construct(string $message = "", int $code = Response::HTTP_NOT_FOUND, ?Throwable $previous = null)
    {
        $message = trans('messages.general.model_not_found');
        parent::__construct($message, $code, $previous);
    }
}
