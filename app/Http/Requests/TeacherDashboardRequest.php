<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherDashboardRequest extends FormRequest
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
            'first_name' => 'required|string|regex:/[^0-9]/',
            'last_name' => 'required|string|regex:/[^0-9]/',
            'email' => [
                'required',
                'email',
                Rule::unique('teachers', 'email')->ignore($this->teacher)
            ],
            'password' => 'sometimes|nullable',
            'phone' => [
                'required',
                'numeric',
//                'regex:/^\+\d{1,3}([0-9\s\-\+\(\)]*)$/',
                'regex:/^\d([0-9]*)$/',
                'min:10',
                Rule::unique('teachers', 'phone')->ignore($this->teacher)
            ],
            'image' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif',
            'address' => 'required',
            'language' => 'sometimes|nullable'
        ];
    }
}
