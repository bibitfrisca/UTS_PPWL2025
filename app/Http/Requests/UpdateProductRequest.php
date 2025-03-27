<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UpdateProductRequest extends FormRequest
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
     * @return array<string,\Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'nullable|string|max:250',
            'name' => 'nullable|string|max:250',
            'price' => 'nullable|numeric',
            'category' => 'nullable|string|in:Makeup,Skincare'
        ];
    }
}
