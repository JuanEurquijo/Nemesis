<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            'active_ingredient' => 'required|max:100',
            'pharmaceutical_form' => 'required',
            'concentration' => 'required|max:100',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages():array
    {
         return [
        
         ];
    }
    
}
