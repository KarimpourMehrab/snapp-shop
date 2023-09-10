<?php

namespace App\Rules\Transaction;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MinimumRemittanceAmountRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $minimumRemittanceAmount = intval(config('transaction.minimum_remittance_amount'));
        if (intval($value) < $minimumRemittanceAmount) {
            $fail(trans('validation.custom.transaction.minimum_remittance_amount_rule',
                ['attribute' => number_format($minimumRemittanceAmount)]));
        }
    }
}
