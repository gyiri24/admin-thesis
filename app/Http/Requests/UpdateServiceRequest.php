<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:services,name,' . request()->route('service')->id,
            ],
            'qr_code' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
            ],
            'slug' => [
                'string',
                'required',
                'unique:services,slug,' . request()->route('service')->id,
            ],
            'duration' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
