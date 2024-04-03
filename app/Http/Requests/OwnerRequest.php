<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'name'=>'Name is required',
            'surname'=>'Surname is required',
            'phone'=>'Phone is required',
            'email'=>'Email is required',
            'address'=>'address is required'
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
            'name'=>'required|min:3|max:32',
            'surname'=>'required|min:3|max:32',
            'phone'=>'required|min:3|max:18',
            'email'=>'required|min:3|max:32',
            'address'=>'required|min:3|max:64'
        ];
    }
}
