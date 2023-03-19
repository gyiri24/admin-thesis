@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
     {{ trans('cruds.transaction.header') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.id') }}
                        </th>
                        <td>
                            {{ $transaction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.user') }}
                        </th>
                        <td>
                            <span class="label label-info">{{ $transaction->user->fullName }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.employee') }}
                        </th>
                        <td>
                            <span class="label label-info">{{ $transaction->service->user->fullName }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.price') }}
                        </th>
                        <td>
                            {{ $transaction->fullPrice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.service') }}
                        </th>
                        <td>
                            <span class="label label-info">{{ $transaction->service->name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.created_at') }}
                        </th>
                        <td>
                            <span class="label label-info">{{ $transaction->service->created_at }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.updated_at') }}
                        </th>
                        <td>
                            <span class="label label-info">{{ $transaction->service->updated_at }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
