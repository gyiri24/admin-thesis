<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Role;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::with(['user', 'service'])->get();

        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userRole = Role::where('slug', '=', Role::USER)->first();

        $users = User::whereHas('roles', function($query) use($userRole) {
            $query->where('id', '=',  $userRole->id);
        })->pluck('name', 'id');

        $services = Service::pluck('name', 'id');

        return view('admin.transactions.create', compact('services', 'users'));
    }

    public function store(StoreTransactionRequest $request)
    {
        $data = $request->only('users', 'services');

        $userId = $data['users'][0];
        $serviceId = $data['services'][0];

        $price = Service::find($serviceId);

        Transaction::create(
            [
                'price' => $price['price'],
                'service_id' => $serviceId,
                'user_id' => $userId,
            ]
        );

        return redirect()->route('admin.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id');

        $services = Service::pluck('name', 'id');

        $transaction->load('user', 'service');

        return view('admin.transactions.edit', compact('services', 'transaction', 'users'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $data = $request->only('users', 'services');

        $userId = $data['users'][0];
        $serviceId = $data['services'][0];

        $price = Service::find($serviceId);

        $transaction->update(
            [
                'price' => $price['price'],
                'service_id' => $serviceId,
                'user_id' => $userId,
            ]
        );

        return redirect()->route('admin.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->load('user', 'service');

        return view('admin.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        $transactions = Transaction::find(request('ids'));

        foreach ($transactions as $transaction) {
            $transaction->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
