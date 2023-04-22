<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Resources\Admin\TransactionResource;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class TransactionApiController extends Controller
{
    public function store(StoreTransactionRequest $request)
    {
        $user = auth()->user();
        $serviceSlug = $request->only('slug');
        $service = Service::where('slug', '=', $serviceSlug)->first();

        if($user->amount < $service->price) {
            abort_if(false, Response::HTTP_BAD_REQUEST, 'Bad request');
        }

        try{
            $transaction = Transaction::create([
                'price' => $service->price,
                'service_id' => $service->id,
                'user_id' => $user->id,
            ]);

            $updatedUser = User::where('id', '=', $user->id)->first();

            $updatedUser->update([
                'amount' => $user->amount - $service->price
            ]);

            return (new TransactionResource($transaction))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);

        } catch(Exception $e)
        {
            throw new UnprocessableEntityHttpException();
        }
    }

    public function show(Transaction $transaction)
    {
        return new TransactionResource($transaction->load(['users', 'services']));
    }

    public function getUserTransactions(Request $request)
    {
        $user = auth()->user();
        $transactions = Transaction::where('user_id', '=', $user->id)->get();

        return response()->json($transactions);
    }
}
