<?php

namespace App\Providers;

use App\Services\Notification\NotificationServiceResolver;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('notificationService', function () {
            return new NotificationServiceResolver();
        });
    }
}
