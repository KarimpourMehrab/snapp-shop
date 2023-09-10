<?php


namespace App\Services\Sms\Ghasedak;


use App\Services\Sms\SmsAbstract;


class Ghasedak extends SmsAbstract
{
    private readonly ?string $apiKey;
    private readonly ?string $baseUrl;


    public function __construct()
    {
        $this->apiKey = config('notification.sms.' . self::name() . '.api_key');
        $this->baseUrl = config('notification.sms.' . self::name() . '.base_url');
    }

    public static function name():string
    {
        return 'GHASEDAK';
    }

   public function send(string $message, string $mobile): array
   {
       // TODO: Implement send() method.
   }
}
