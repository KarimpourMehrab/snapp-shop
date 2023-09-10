<?php

namespace App\Http\Requests;

use App\Rules\Card\CheckBalanceRule;
use App\Rules\Transaction\MaximumRemittanceAmountRule;
use App\Rules\Transaction\MinimumRemittanceAmountRule;
use Illuminate\Foundation\Http\FormRequest;

class RemittanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount' => ['required', 'integer', new MaximumRemittanceAmountRule(), new MinimumRemittanceAmountRule(),
                new CheckBalanceRule()],
            'from_card_number' => ['required', 'integer', 'card_number', 'exists:cards,number'],
            'to_card_number' => ['required', 'integer', 'card_number', 'exists:cards,number', 'different:from_card_number']
        ];
    }


}
