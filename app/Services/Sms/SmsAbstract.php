<?php


namespace App\Services\Sms;

use Exception;
use Illuminate\Config\Repository as Config;

abstract class SmsAbstract
{
    abstract public static function name();


    abstract public function send(string $message, string $mobile): array;

    public function arrayToQueryString(array $arr): string
    {
        return "?" . http_build_query($arr);
    }
}
