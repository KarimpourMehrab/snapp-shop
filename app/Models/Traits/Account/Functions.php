<?php

namespace App\Models\Traits\Account;

use App\Models\Card;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Functions
{
    public function hasBalanceDecrease(int $amount): bool
    {
        if ($this->balance < $amount) {
            return false;
        }
        $this->balance -= $amount;
        return $this->save();
    }

    public function increaseBalance(int $amount): bool
    {
        $this->balance += $amount;
        return $this->save();
    }
}
