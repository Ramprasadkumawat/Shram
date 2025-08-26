<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use App\Constants\ApiConstants; // Import ApiConstants

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'title'            => 'required|string|max:150',
            'description'      => 'nullable|string',
            'required_labours' => 'required|integer|min:1',
            // 'location'         => 'required|string|max:255',
            'start_date'       => 'nullable|date',
            'end_date'         => 'nullable|date|after_or_equal:start_date',
            'work_type'        => 'required|in:daily,hourly',
            'wage_per_day'     => 'required_if:work_type,daily|nullable|numeric|min:0',
            'wage_per_hour'    => 'required_if:work_type,hourly|nullable|numeric|min:0',
            'status'           => 'nullable|in:' . ApiConstants::POST_STATUS_OPEN . ',' . ApiConstants::POST_STATUS_CLOSED . ',' . ApiConstants::POST_STATUS_IN_PROGRESS,
            'latitude'         => ['required', 'numeric', 'between:-90,90'],
            'longitude'        => ['required', 'numeric', 'between:-180,180'],
        ];
    }

    public function messages(): array
    {
        return [
            'latitude.required' => ApiConstants::LATITUDE_REQUIRED,
            'latitude.numeric' => ApiConstants::LATITUDE_NUMERIC,
            'latitude.between' => ApiConstants::LATITUDE_BETWEEN,
            'longitude.required' => ApiConstants::LONGITUDE_REQUIRED,
            'longitude.numeric' => ApiConstants::LONGITUDE_NUMERIC,
            'longitude.between' => ApiConstants::LONGITUDE_BETWEEN,
        ];
    }
}
