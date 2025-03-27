<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockinRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'stockin_code' => 'nullable|string|max:255',
            'product_id' => 'nullable|integer',
            'product_name' => 'nullable|string|max:255',
            'user_id' => 'nullable|integer',
            'name' => 'nullable|string|max:255',
            'quantity' => 'nullable|integer',
            'date' => 'nullable|date',
        ];
    }
}