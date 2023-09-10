<?php

namespace App\Http\Controllers;

use App\Exceptions\DataNotFoundException;
use App\Http\Requests\RemittanceRequest;
use App\Models\User;
use App\Repositories\Eloquent\AccountRepository;
use App\Repositories\Eloquent\CardRepository;
use App\Repositories\Eloquent\FeeRepository;
use App\Repositories\Eloquent\TransactionRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RemittanceController extends Controller
{
    public function __construct(
        protected CardRepository        $cardRepository,
        protected AccountRepository     $accountRepository,
        protected TransactionRepository $transactionRepository,
        protected FeeRepository         $feeRepository
    )
    {
        parent::__construct();
    }

    /**
     * @throws DataNotFoundException
     */
    public function store(RemittanceRequest $request): JsonResponse
    {
        $fromCard = $this->cardRepository->first('number', $request->input('from_card_number'));
        $toCard = $this->cardRepository->first('number', $request->input('to_card_number'));
        $params = [
            ...$request->validated(),
            'fromAccount' => $fromCard->account,
            'toAccount' => $toCard->account,
            'from_card_id' => $fromCard->id,
            'to_card_id' => $toCard->id
        ];
        [$state, $transaction] = $this->accountRepository->decreaseBalance($params, $this->transactionRepository, $this->feeRepository);
        $this->status = $state;
        $this->data = $transaction;
        return $this->response(Response::HTTP_CREATED);
    }

}
