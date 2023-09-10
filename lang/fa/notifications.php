<?php


use App\Services\Notification\Pattern;

return [
    Pattern::UserAccountDecreaseBalance => 'کاربر :user، مبلغ :amount از حساب شما با شماره :account کسر شد',
    Pattern::UserAccountIncreaseBalance => 'کاربر :user، مبلغ amount به حساب شما با شماره :account افزوده شد',
];
