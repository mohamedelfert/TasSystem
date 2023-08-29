<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name.*' => [
                'required',
                'string',
//                'regex:/^[a-zA-Z\p{Arabic}\s]+$/',
                'regex :/[^0-9]/',
                Rule::unique('branches','name')->ignore($this->branch)
            ],
            'address' => 'required',
            'email' => [
                'sometimes',
                'nullable',
                'email',
                Rule::unique('branches','email')->ignore($this->branch)
            ],
            'phone' => [
                'required',
                'numeric',
//                'regex:/^\+\d{1,3}([0-9\s\-\+\(\)]*)$/',
                'regex:/^\d([0-9]*)$/',
                'min:10',
                Rule::unique('branches','phone')->ignore($this->branch)
            ],
            'status' => 'required',
            'country_id' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ];
    }
}
