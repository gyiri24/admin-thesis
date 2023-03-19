@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="users">{{ trans('cruds.transaction.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users"  required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || $transaction->user->id) ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="services">{{ trans('cruds.transaction.fields.service') }}</label>
                <select class="form-control select2 {{ $errors->has('services') ? 'is-invalid' : '' }}" name="services[]" id="services" required>
                    @foreach($services as $id => $service)
                        <option value="{{ $id }}" {{ (in_array($id, old('services', [])) || $transaction->service->id) ? 'selected' : '' }}>{{ $service }}</option>
                    @endforeach
                </select>
                @if($errors->has('services'))
                    <div class="invalid-feedback">
                        {{ $errors->first('services') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection
