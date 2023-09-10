<?php

namespace App\Enums;

enum TransactionStatesEnum: string
{
    case INITIALIZE = 'INITIALIZE';
    case SUCCESS = 'SUCCESS';
    case FAIL = 'FAIL';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
