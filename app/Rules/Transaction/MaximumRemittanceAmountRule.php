<?php

namespace App\Rules\Transaction;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaximumRemittanceAmountRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $maximumRemittanceAmount = intval(config('transaction.maximum_remittance_amount'));
        if (intval($value) > $maximumRemittanceAmount) {
            $fail(trans('validation.custom.transaction.maximum_remittance_amount_rule',
                ['attribute' => number_format($maximumRemittanceAmount)]));
        }

    }
}
