<?php

namespace App\Models;

use App\Models\Traits\Card\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory, Relations;

    protected $fillable = [
        'number',
        'account_id'
    ];


}
