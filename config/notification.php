<?php


use App\Services\Notification\Sms\Sms;
use App\Services\Sms\Ghasedak\Ghasedak;
use App\Services\Sms\Kavenegar\Kavenegar;

return [
    'active_services' => [
        Sms::name()
    ],
    Sms::name() => [
        'active_services' => [
            Kavenegar::class,
            Ghasedak::class
        ],
        Kavenegar::name() => [
            'base_url' =>env('NOTIFICATION_SMS_KAVENEGAR_BASE_URL') ,
            'api_key' => env('NOTIFICATION_SMS_KAVENEGAR_API_KEY')
        ],
        Ghasedak::name() => [
            'base_url' =>env('NOTIFICATION_SMS_GHASEDAK_BASE_URL') ,
            'api_key' => env('NOTIFICATION_SMS_GHASEDAK_API_KEY')
        ]
    ]
];
