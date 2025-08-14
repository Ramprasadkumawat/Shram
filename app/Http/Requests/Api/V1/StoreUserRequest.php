<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Constants\CommonConstants;

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
            'first_name.required' => CommonConstants::USERS['first_name_is_required'],
            'email.unique' => CommonConstants::USERS['email_taken'],
            'aadhar_number.unique' => CommonConstants::USERS['aadhar_exists'],
            // Add more messages as needed
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'code' => CommonConstants::HTTP['422'],
            'message' => CommonConstants::USERS['validation_errors'],
            'errors' => $validator->errors()
        ], CommonConstants::HTTP['422']));
    }

}
