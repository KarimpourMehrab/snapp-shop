<?php

namespace App\Models\Traits\Card;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    public function transactionsFrom(): HasMany
    {
        return $this->hasMany(Transaction::class, 'from_card_id');
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function transactionsTo(): HasMany
    {
        return $this->hasMany(Transaction::class, 'to_card_id');
    }

    public function latestTransactionsFrom(): HasMany
    {
        return $this->transactionsFrom()->orderByDesc('created_at')->limit(5);
    }
    public function latestTransactionsTo(): HasMany
    {
        return $this->transactionsTo()->orderByDesc('created_at')->limit(5);
    }

    public function getLatestTransactionsAttribute() {
        return $this->latestTransactionsFrom->merge($this->latestTransactionsTo);
    }
}
