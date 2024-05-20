<?php

namespace App\Http\Requests\Sell;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'string|required',
            'description' => 'string|required',
            'price' => 'numeric|required',
            'info' => 'string|required',
            'category_id' => 'int|required',
            'platform_id' => 'int|required',
            'params' => 'string|required'
        ];
    }
}
