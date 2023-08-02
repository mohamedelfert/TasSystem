<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                Rule::unique('users','name')->ignore($this->user)
            ],
            'first_name' => [
                'required',
                'string',
                Rule::unique('users','first_name')->ignore($this->user)
            ],
            'last_name' => [
                'required',
                'string',
                Rule::unique('users','last_name')->ignore($this->user)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users','email')->ignore($this->user)
            ],
            'password' => 'required|confirmed',
            'status' => 'required',
            'role_name' => 'required'
        ];
    }
}
