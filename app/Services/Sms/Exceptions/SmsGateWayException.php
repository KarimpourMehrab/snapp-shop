<?php


namespace App\Services\Sms\Exceptions;


use Exception;

class SmsGateWayException extends Exception
{
    protected $code = 100;
    protected $message ='خطای سامانه!';
}