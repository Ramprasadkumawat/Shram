<?php

namespace App\Http\Requests\Admin\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Constants\AdminConstants;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
        $postId = $this->route('post')->id;

        return [
            'owner_id'        => 'required|exists:users,id',
            'title'           => 'required|string|max:150',
            'description'     => 'nullable|string',
            'required_labours'=> 'required|integer|min:1',
            'location'        => 'required|string|max:255',
            'start_date'      => 'nullable|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
            'work_type'       => 'required|in:daily,hourly',
            'wage_per_day'    => 'required_if:work_type,daily|nullable|numeric|min:0',
            'wage_per_hour'   => 'required_if:work_type,hourly|nullable|numeric|min:0',
            'status'          => 'nullable|in:' . AdminConstants::POST_STATUS_OPEN . ',' . AdminConstants::POST_STATUS_CLOSED . ',' . AdminConstants::POST_STATUS_IN_PROGRESS,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'owner_id.required' => AdminConstants::OWNER_ID_REQUIRED,
            'owner_id.exists' => AdminConstants::OWNER_ID_EXISTS,
            'title.required' => AdminConstants::POST_TITLE_REQUIRED,
            'title.string' => AdminConstants::POST_TITLE_STRING,
            'title.max' => AdminConstants::POST_TITLE_MAX,
            'required_labours.required' => AdminConstants::POST_REQUIRED_LABOURS_REQUIRED,
            'required_labours.integer' => AdminConstants::POST_REQUIRED_LABOURS_INTEGER,
            'required_labours.min' => AdminConstants::POST_REQUIRED_LABOURS_MIN,
            'location.required' => AdminConstants::POST_LOCATION_REQUIRED,
            'location.string' => AdminConstants::POST_LOCATION_STRING,
            'location.max' => AdminConstants::POST_LOCATION_MAX,
            'start_date.date' => AdminConstants::POST_START_DATE_DATE,
            'end_date.date' => AdminConstants::POST_END_DATE_DATE,
            'end_date.after_or_equal' => AdminConstants::POST_END_DATE_AFTER_OR_EQUAL,
            'work_type.required' => AdminConstants::POST_WORK_TYPE_REQUIRED,
            'work_type.in' => AdminConstants::POST_WORK_TYPE_IN,
            'wage_per_day.required_if' => AdminConstants::POST_WAGE_PER_DAY_REQUIRED_IF,
            'wage_per_day.numeric' => AdminConstants::POST_WAGE_PER_DAY_NUMERIC,
            'wage_per_day.min' => AdminConstants::POST_WAGE_PER_DAY_MIN,
            'wage_per_hour.required_if' => AdminConstants::POST_WAGE_PER_HOUR_REQUIRED_IF,
            'wage_per_hour.numeric' => AdminConstants::POST_WAGE_PER_HOUR_NUMERIC,
            'wage_per_hour.min' => AdminConstants::POST_WAGE_PER_HOUR_MIN,
            'status.in' => AdminConstants::POST_STATUS_IN,
        ];
    }
}
