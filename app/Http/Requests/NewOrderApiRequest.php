<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewOrderApiRequest extends FormRequest
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
            'app_order_id' => 'required',
            'teacher_id' => 'required|exists:teachers,id',
            'branch_id' => 'required|exists:branches,id',
            'subject_id' => 'required|exists:subjects,id',
            'details.*.app_detail_id' => 'required',
            'details.*.date' => 'required',
            'details.*.start_at' => 'required',
            'details.*.end_at' => 'required',
            'date' => 'required',
            'price' => 'required',
            'final_price' => 'sometimes',
            'coupon_name' => 'sometimes|nullable',
        ];
    }
}
