<?php

namespace App\Models;

use App\Models\Traits\Account\Functions;
use App\Models\Traits\Account\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method hasBalanceDecrease(int $amount)
 * @property int balance
 * @property string number
 * @property int user_id
 */
class Account extends Model
{
    use HasFactory, Relations, Functions;

    protected $fillable = [
        'number',
        'balance',
        'user_id'
    ];
}
