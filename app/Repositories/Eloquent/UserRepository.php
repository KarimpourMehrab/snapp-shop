<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getByCountOfTransactions()
    {
        return Cache::remember('latest_users', 1000, function () {
            $userIds = [];
            $fromCountTransaction = $this->byFromCountTransaction();
            $toCountTransaction = $this->byToCountTransaction();
            foreach ($fromCountTransaction as $key => $item) {
                $userIds[] = $item['transactionCount'] >= $toCountTransaction[$key]['transactionCount']
                    ? $item['user_id'] : $toCountTransaction[$key]['user_id'];
            }
            return $this->usersByLatestTransaction($userIds);
        });
    }

    private function usersByLatestTransaction(array $userIds): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->model->query()->with(['accounts.cards.transactionsFrom', 'accounts.cards.transactionsTo'])
            ->whereHas('accounts.cards.transactionsFrom', function ($q) {
                $q->where('created_at', '>=', now()->subMinutes(10));
            })
            ->whereHas('accounts.cards.transactionsTo', function ($q) {
                $q->where('created_at', '>=', now()->subMinutes(10));
            })
            ->whereIn('id', $userIds)->get();
    }

    private function byFromCountTransaction(): array
    {
        return $this->model->query()
            ->select(DB::raw('users.id as user_id,COUNT(transactions.id) as transactionCount'))
            ->join('accounts', 'accounts.user_id', 'users.id')
            ->join('cards', 'cards.account_id', 'accounts.id')
            ->join('transactions', 'transactions.from_card_id', 'cards.id')
            ->groupBy('users.id')
            ->orderByDesc('transactionCount')
            ->limit(3)
            ->where('transactions.created_at', '>=', now()->subMinutes(10))
            ->get()->toArray();
    }

    private function byToCountTransaction(): array
    {
        return $this->model->query()
            ->select(DB::raw('users.id as user_id,COUNT(transactions.id) as transactionCount'))
            ->join('accounts', 'accounts.user_id', 'users.id')
            ->join('cards', 'cards.account_id', 'accounts.id')
            ->join('transactions', 'transactions.to_card_id', 'cards.id')
            ->groupBy('users.id')
            ->orderByDesc('transactionCount')
            ->limit(3)
            ->where('transactions.created_at', '>=', now()->subMinutes(10))
            ->get()->toArray();
    }


}
