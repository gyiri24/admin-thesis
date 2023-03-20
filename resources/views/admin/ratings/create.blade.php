@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rating.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ratings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.rating.fields.rating') }}</label>
                <select class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}" name="rating" id="rating" required>
                    <option value disabled {{ old('rating', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Rating::RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('rating', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rating.fields.rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.rating.fields.comment') }}</label>
                <input class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" type="text" name="comment" id="comment" value="{{ old('comment', '') }}">
                @if($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rating.fields.comment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="services">{{ trans('cruds.rating.fields.service') }}</label>
                <div style="padding-bottom: 4px">
                </div>
                <select class="form-control select2 {{ $errors->has('services') ? 'is-invalid' : '' }}" name="service" id="service" required>
                    @foreach($services as $id => $service)
                        <option value="{{ $id }}" {{ old('service', '') === (string) $key ? 'selected' : '' }}>{{ $service }}</option>
                    @endforeach
                </select>
                @if($errors->has('services'))
                    <div class="invalid-feedback">
                        {{ $errors->first('services') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rating.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
