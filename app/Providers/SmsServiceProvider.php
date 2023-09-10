<?php

namespace App\Providers;

use App\Services\Sms\SmsResolver;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->singleton('sms', function () {
            return new SmsResolver();
        });
    }


}
