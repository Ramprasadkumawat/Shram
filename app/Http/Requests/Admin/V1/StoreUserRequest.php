<?php

namespace App\Http\Requests\Admin\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required', 'string', 'in:admin,user'],
            'mobile_number' => ['nullable', 'string', 'max:20'],
            'aadhar_number' => ['nullable', 'string', 'max:12'],
            'age' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
