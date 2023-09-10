<?php

namespace App\Models;

use App\Models\Traits\Fee\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory, Relations;

    protected $fillable = [
        'transaction_id',
        'amount',
        'updated_at'
    ];
}
