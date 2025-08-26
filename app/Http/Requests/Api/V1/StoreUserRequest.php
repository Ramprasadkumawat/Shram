<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Constants\ApiConstants; // Import ApiConstants

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        \Log::info('Authorize method hit in StoreUserRequest.');
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
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'age'           => 'required|integer',
            'mobile_number' => 'required|string|max:20',
            'aadhar_number' => 'required|string|max:20|unique:users,aadhar_number',
            'email'         => 'required|email|unique:users,email',
            'type'          => 'required|string|max:50',
            'password'      => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => ApiConstants::FIRST_NAME_REQUIRED,
            'last_name.required' => ApiConstants::LAST_NAME_REQUIRED,
            'age.required' => ApiConstants::AGE_REQUIRED,
            'age.integer' => ApiConstants::AGE_INTEGER,
            'mobile_number.required' => ApiConstants::MOBILE_NUMBER_REQUIRED,
            'aadhar_number.required' => ApiConstants::AADHAR_NUMBER_REQUIRED,
            'aadhar_number.unique' => ApiConstants::AADHAR_NUMBER_UNIQUE,
            'email.required' => ApiConstants::EMAIL_REQUIRED,
            'email.email' => ApiConstants::EMAIL_INVALID,
            'email.unique' => ApiConstants::EMAIL_UNIQUE,
            'type.required' => ApiConstants::TYPE_REQUIRED,
            'type.string' => ApiConstants::TYPE_STRING,
            'type.max' => ApiConstants::TYPE_MAX,
            'type.in' => ApiConstants::TYPE_IN,
            'password.required' => ApiConstants::PASSWORD_REQUIRED,
            'password.string' => ApiConstants::PASSWORD_STRING,
            'password.min' => ApiConstants::PASSWORD_MIN,
            'password.confirmed' => ApiConstants::PASSWORD_CONFIRMED,
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'code' => ApiConstants::HTTP_422,
            'message' => ApiConstants::VALIDATION_ERRORS,
            'errors' => $validator->errors()
        ], ApiConstants::HTTP_422));
    }

}
