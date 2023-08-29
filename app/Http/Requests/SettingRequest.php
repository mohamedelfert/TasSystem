<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingRequest extends FormRequest
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
            'site_name_ar' => 'required|string|regex:/[^0-9]/',
            'site_name_en' => 'required|string|regex:/[^0-9]/',
            'email' => 'required|email',
//            'phone' => 'required|numeric|min:10|regex:/^\+\d{1,3}([0-9\s\-\+\(\)]*)$/',
            'phone' => 'required|numeric|min:10|regex:/^\d([0-9]*)$/',
            'total' => 'sometimes|nullable',
            'address' => 'required',
            'currency' => 'required',
            'logo' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif',
            'icon' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'main_lang' => 'required|in:arabic,english',
            'status' => 'required|in:open,close',
        ];
    }
}
