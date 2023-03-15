<?php

namespace App\Http\Requests;

use App\Models\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('role_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:3',
                'required',
                'unique:roles,title,' . request()->route('role')->id,
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions' => [
                'required',
                'array',
            ],
            'slug' => [
                'string',
                'min:3',
                'required',
                'unique:roles,slug,' . request()->route('role')->id,
            ],
        ];
    }
}
