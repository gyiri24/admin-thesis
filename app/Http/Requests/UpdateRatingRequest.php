<?php

namespace App\Http\Requests;

use App\Models\Rating;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRatingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'rate' => [
                'required',
            ],
            'comment' => [
                'string',
                'max:500',
                'nullable',
            ]
        ];
    }
}
