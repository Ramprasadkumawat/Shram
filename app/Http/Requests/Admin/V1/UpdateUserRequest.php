<?php

namespace App\Http\Requests\Admin\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Constants\AdminConstants; // Import AdminConstants

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
            'password' => ['nullable', 'string', AdminConstants::PASSWORD_MIN, 'confirmed'],
            'type' => ['required', 'string', Rule::in([AdminConstants::USER_TYPE_ADMIN, AdminConstants::USER_TYPE_STAFF, AdminConstants::USER_TYPE_OWNER])],
            'mobile_number' => ['nullable', 'string', 'max:20'],
            'aadhar_number' => ['nullable', 'string', 'max:12'],
            'age' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'password.min' => AdminConstants::PASSWORD_MIN,
            'password.confirmed' => AdminConstants::PASSWORD_CONFIRMED,
            'type.required' => AdminConstants::USER_TYPE_REQUIRED,
            'type.string' => AdminConstants::USER_TYPE_STRING,
            'type.in' => AdminConstants::USER_TYPE_INVALID,
        ];
    }
}
