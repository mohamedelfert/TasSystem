<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('teachers', 'email')->ignore($this->teacher)
            ],
            'password' => 'sometimes|nullable',
            'phone' => [
                'required',
                'numeric',
                Rule::unique('teachers', 'phone')->ignore($this->teacher)
            ],
            'image' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif',
            'country_id' => 'required',
            'address' => 'required',
            'status' => 'sometimes|nullable',
            'work' => 'sometimes|nullable',
            'language' => 'sometimes|nullable'
        ];
    }
}
