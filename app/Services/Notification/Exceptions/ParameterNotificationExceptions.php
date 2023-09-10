<?php

namespace App\Services\Notification\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ParameterNotificationExceptions extends Exception
{
    public function __construct(string $message = "", int $code = Response::HTTP_BAD_REQUEST, ?Throwable $previous = null)
    {
        $message = trans('messages.exceptions.services.notification.missing_parameter');
        parent::__construct($message, $code, $previous);
    }

}
