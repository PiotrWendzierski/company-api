<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//validate data for UPDATE company

class UpdateCompanyRequest extends FormRequest
{
    //Determine if the user is authorized to make this request.
     
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array //all data required
    {
        return [
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20', //can be the same while editing data
            'adress' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
        ];
    }

    public function messages(): array //messages in case of errors with validation
{
    return [
        'name.required' => 'Name of company is required.',
        'name.string' => 'Name of company must be text.',
        'name.max' => 'Name of company is no longer than 255 letters.',

        'nip.required' => 'NIP is required.',
        'nip.string' => 'NIP must be text',
        'nip.max' => 'NIP is no longer than 20 letters.',

        'adress.required' => 'Adress is required.',
        'adress.string' => 'Adress must be text.',

        'city.required' => 'City is required.',
        'city.string' => 'City must be text.',

        'postal_code.required' => 'Postal code is required.',
        'postal_code.string' => 'Postal code must be string.',
    ];
}
}
