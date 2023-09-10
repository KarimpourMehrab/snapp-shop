<?php

namespace App\Models\Traits\Transaction;

use App\Models\Card;
use App\Models\Fee;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait Relations
{
    public function fee(): HasOne
    {
        return $this->hasOne(Fee::class);
    }

    public function fromCard(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'from_card_id');
    }

    public function toCard(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'to_card_id');
    }
}
