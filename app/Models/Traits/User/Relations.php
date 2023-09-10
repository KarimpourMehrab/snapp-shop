<?php

namespace App\Models\Traits\User;

use App\Models\Account;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }
}
