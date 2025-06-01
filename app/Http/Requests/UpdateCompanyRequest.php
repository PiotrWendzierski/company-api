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
            'name' => 'required|string|max:255|regex:/^[A-Za-zĄĆĘŁŃÓŚŹŻąćęłńóśźż\s\-]+$/u',
            'nip' => 'required|string|size:10|regex:/^\d/', //can be the same while editing data
            'adress' => 'required|string|regex:/^[A-Za-zĄĆĘŁŃÓŚŹŻąćęłńóśźż\s\-]+$/u',
            'city' => 'required|string|regex:/^[A-Za-zĄĆĘŁŃÓŚŹŻąćęłńóśźż\s\-]+$/u',
            'postal_code' => 'required|string|regex:/^\d{2}-\d{3}$/',
        ];
    }

    public function messages(): array //messages in case of errors with validation
{
    return [
        'name.required' => 'Name of company is required.',
        'name.string' => 'Name of company must be text.',
        'name.max' => 'Name of company is no longer than 255 letters.',
        'name.regex' => 'Name must contain only letters, spaces or hyphens.',

        'nip.required' => 'NIP is required.',
        'nip.string' => 'NIP must be text',
        'nip.regex' => 'NIP must have only numbers.',
        'nip.size' => 'NIP must have extact 10 numbers.',

        'adress.required' => 'Adress is required.',
        'adress.string' => 'Adress must be text.',
        'adress.regex' => 'Only letters, spaces or hyphens',

        'city.required' => 'City is required.',
        'city.string' => 'City must be text.',
        'city.regex' => 'Only letters, spaces or hyphens',

        'postal_code.required' => 'Postal code is required.',
        'postal_code.string' => 'Postal code must be string.',
        'postal_code.regex' => 'Postal code must be in format XX-XX',
    ];
}
}
