<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return  [
            'reg_number'=>'The registration number is required',
            'brand'=>'The brand is required',
            'model'=>'The model is required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reg_number'=>'required|min:3|max:32',
            'brand'=>'required|min:3|max:20',
            'model'=>'required|min:3|max:18'
        ];
    }
}
