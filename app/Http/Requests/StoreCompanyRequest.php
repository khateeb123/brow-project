<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'required|string|max:255',
            'logo' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048',
                Rule::dimensions()->minWidth(100)->minHeight(100)->maxWidth(1000)->maxHeight(1000), // Example dimension constraint
            ],
        ];
    }



}
