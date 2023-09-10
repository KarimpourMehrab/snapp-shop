<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Card;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accountIds = Account::query()->pluck('id');
        foreach ($accountIds as $key => $accountId) {
            if ($key == 0) {
                $number = '6104337517593909';
                Card::factory()->create([
                    'account_id' => $accountId,
                    'number' => $number
                ]);
                continue;
            }
            if ($key == 1) {
                $number = '6219861065883364';
                Card::factory()->create([
                    'account_id' => $accountId,
                    'number' => $number
                ]);
                continue;
            }
            Card::factory()->create([
                'account_id' => $accountId
            ]);
        }
    }
}
