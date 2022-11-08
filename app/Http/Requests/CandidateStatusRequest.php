<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CandidateStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => [ 'required', Rule::in(['Initial', 'First Contact', 'Interview', 'Tech Assignment', 'Rejected', 'Hired']) ],
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'status is required!',
        ];
    }
}
