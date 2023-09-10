<?php


namespace App\Services\Sms\Kavenegar;

use App\Services\Sms\Kavenegar\KavenegarException;
use App\Services\Sms\SmsAbstract;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class Kavenegar extends SmsAbstract
{
    private readonly ?string $apiKey;
    private readonly ?string $baseUrl;


    public function __construct()
    {
        $this->apiKey = config('notification.sms.' . self::name() . '.api_key');
        $this->baseUrl = config('notification.sms.' . self::name() . '.base_url');
    }


    public static function name()
    {
        return 'KAVENEGAR';
    }

    public function send(string $message, string $mobile): array
    {
        try {
            $url = $this->baseUrl . $this->apiKey . $this->arrayToQueryString(['receptor' => $mobile, 'message' => $message]);
            return Http::get($url)->json();
        } catch (\Exception $e) {
            Log::error($e);
        }
        return [];
    }


}
