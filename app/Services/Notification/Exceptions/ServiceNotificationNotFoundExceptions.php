<?php

namespace App\Services\Notification\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ServiceNotificationNotFoundExceptions extends Exception
{
    public function __construct(string $message = "", int $code = Response::HTTP_NOT_FOUND, ?Throwable $previous = null)
    {
        $message = trans('messages.exceptions.services.notification.service_not_found');
        parent::__construct($message, $code, $previous);
    }

}
