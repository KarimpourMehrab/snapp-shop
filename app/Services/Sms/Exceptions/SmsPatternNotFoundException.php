<?php


namespace App\Services\Sms\Exceptions;


class SmsPatternNotFoundException extends SmsGateWayException
{

    protected string $_gateway;

    protected $code = 102;

    public function __construct(string $gateway)
    {
        $this->message = "الگوی وارد شده برای درگاه $gateway تعریف نشده است.";
        parent::__construct($this->message, $this->code);
    }
}
