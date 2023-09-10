<?php


namespace App\Services\Sms\Exceptions;


class SmsGateWayNotFoundException extends SmsGateWayException
{
    protected $code = 101;
    protected $message = 'درگاه پیامک وارد شده معتبر نمی باشد.';
}