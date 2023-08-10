<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlotEditRequest extends FormRequest
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
            'old_workday_id' => 'required',
            'old_slot_id' => 'required',
            'workday_id' => 'required',
            'slot_id' => 'required'
        ];
    }
}
