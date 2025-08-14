<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

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
            'location'         => 'required|string|max:255',
            'start_date'       => 'nullable|date',
            'end_date'         => 'nullable|date|after_or_equal:start_date',
            'work_type'        => 'required|in:daily,hourly',
            'wage_per_day'     => 'required_if:work_type,daily|nullable|numeric|min:0',
            'wage_per_hour'    => 'required_if:work_type,hourly|nullable|numeric|min:0',
            'status'           => 'nullable|in:open,closed,in_progress',
        ];
    }
}
