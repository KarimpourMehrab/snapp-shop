<?php

namespace App\Models;

use App\Models\Traits\Transaction\Functions;
use App\Models\Traits\Transaction\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, Relations, Functions;

    protected $fillable = [
        'amount',
        'state',
        'from_card_id',
        'to_card_id',
        'updated_at'
    ];
}
