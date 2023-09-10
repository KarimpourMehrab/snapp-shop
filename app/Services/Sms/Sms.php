<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Facade;

/**
 * @see SmsResolver
 * @method static make(\App\Services\Sms\SmsResolver| string | null $sms_gateway)
 */
class Sms extends Facade
{
    /**
     * The name of the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'sms';
    }
}
