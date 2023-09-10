<?php

namespace App\Models\Traits\Transaction;


use App\Enums\TransactionStatesEnum;

trait Functions
{
    public function succeed(): bool
    {
        $this->state = TransactionStatesEnum::SUCCESS->value;
        return $this->save();
    }

    public function failed(): bool
    {
        $this->state = TransactionStatesEnum::FAIL->value;
        return $this->save();
    }
}
