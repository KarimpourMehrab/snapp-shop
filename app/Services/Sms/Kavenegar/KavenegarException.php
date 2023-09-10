<?php


namespace App\Services\Sms\Kavenegar;


use App\Services\Sms\Exceptions\SmsGateWayException;

class KavenegarException extends SmsGateWayException
{
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
