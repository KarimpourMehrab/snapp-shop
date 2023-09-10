<?php

namespace App\Rules\Card;

use App\Models\Card;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckBalanceRule implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $card = Card::query()->where('number', request()->input('from_card_number'))->first();

        $amount = intval($value);
        $accountBalance = $card?->account?->balance + config('transaction.fee');

        if ($amount > $accountBalance) {
            $fail(trans('validation.custom.account.balance_gt', ['attribute' => number_format($accountBalance)]));
        }
    }
}
