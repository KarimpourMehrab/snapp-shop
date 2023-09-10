<?php

namespace App\Http\Controllers;


use App\Repositories\Eloquent\UserRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository
    )
    {
        parent::__construct();
    }


    public function latestMostTransaction(): JsonResponse
    {
        $this->data = $this->userRepository->getByCountOfTransactions();
        return $this->response(Response::HTTP_CREATED);
    }

}
