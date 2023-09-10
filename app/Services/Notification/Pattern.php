<?php

namespace App\Services\Notification;

use ReflectionClass;

class Pattern
{
    public const UserAccountIncreaseBalance = 'UserAccountIncreaseBalance';
    public const UserAccountDecreaseBalance = 'UserAccountDecreaseBalance';

    public static function cases(): array
    {
        try {
            return (new ReflectionClass(get_called_class()))->getConstants();
        } catch (\ReflectionException $e) {
            return [];
        }
    }
}
