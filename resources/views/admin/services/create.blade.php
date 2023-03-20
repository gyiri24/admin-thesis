@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.services.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.service.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qr_code">{{ trans('cruds.service.fields.qr_code') }}</label>
                <input class="form-control {{ $errors->has('qr_code') ? 'is-invalid' : '' }}" type="text" name="qr_code" id="qr_code" value="{{ old('qr_code', '') }}" required>
                @if($errors->has('qr_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qr_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.qr_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.service.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">{{ trans('cruds.service.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                @if($errors->has('slug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duration">{{ trans('cruds.service.fields.duration') }}</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="number" name="duration" id="duration" value="{{ old('duration', '') }}" step="1" required>
                @if($errors->has('duration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.service.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry}}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection
