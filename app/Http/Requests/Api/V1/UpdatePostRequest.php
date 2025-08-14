<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title'            => 'sometimes|string|max:150',
            'description'      => 'sometimes|nullable|string',
            'required_labours' => 'sometimes|integer|min:1',
            'location'         => 'sometimes|string|max:255',
            'start_date'       => 'sometimes|nullable|date',
            'end_date'         => 'sometimes|nullable|date|after_or_equal:start_date',
            'work_type'        => 'sometimes|in:daily,hourly',
            'wage_per_day'     => 'sometimes|nullable|numeric|min:0',
            'wage_per_hour'    => 'sometimes|nullable|numeric|min:0',
            'status'           => 'sometimes|in:open,closed,in_progress',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.max' => 'Title cannot exceed 150 characters.',
            'required_labours.min' => 'Required labours must be at least 1.',
            'location.max' => 'Location cannot exceed 255 characters.',
            'end_date.after_or_equal' => 'End date must be after or equal to start date.',
            'work_type.in' => 'Work type must be either daily or hourly.',
            'wage_per_day.min' => 'Wage per day must be a positive number.',
            'wage_per_hour.min' => 'Wage per hour must be a positive number.',
            'status.in' => 'Status must be open, closed, or in_progress.',
        ];
    }
}
