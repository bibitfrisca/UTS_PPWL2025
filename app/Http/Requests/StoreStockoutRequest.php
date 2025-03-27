<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockoutRequest extends FormRequest
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
            'stockout_code' => 'required|string|max:255',
            'product_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'date' => 'required|date',
        ];
    }
}