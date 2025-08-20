<?php

namespace App\Http\Requests\Admin\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use App\Constants\CommonConstants;

class AdminLoginStoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        \Log::info('Authorize method hit in AdminLoginStoreUserRequest.');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        // For web forms, redirect back with errors
        if ($this->expectsJson()) {
            throw new HttpResponseException(response()->json([
                'status' => false,
                'code' => CommonConstants::HTTP['422'],
                'message' => 'Validation errors occurred.',
                'errors' => $validator->errors()
            ], CommonConstants::HTTP['422']));
        }

        // For web requests, redirect back with errors
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
