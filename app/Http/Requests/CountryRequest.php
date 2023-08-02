<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryRequest extends FormRequest
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
                'regex:/^[a-zA-Z\p{Arabic}\s]+$/',
                Rule::unique('countries', 'name')->ignore($this->country)
            ],
            'code' => 'required|regex:/^\+\d{1,3}$/',
            'status' => 'required',
        ];
    }


}
