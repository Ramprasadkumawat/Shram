<?php

namespace App\Http\Requests\Admin\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user')->id;

        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'type' => ['required', 'string', 'in:admin,user'],
            'mobile_number' => ['nullable', 'string', 'max:20'],
            'aadhar_number' => ['nullable', 'string', 'max:12'],
            'age' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
