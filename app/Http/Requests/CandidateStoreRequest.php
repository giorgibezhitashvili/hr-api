<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateStoreRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'position' => 'required',
            'skill_ids.*' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'first_name is required!',
            'last_name.required' => 'last_name is required!',
            'position.required' => 'position is required!'
        ];
    }
}
