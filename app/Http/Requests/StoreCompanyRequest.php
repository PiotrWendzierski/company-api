<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//validate data for CREATING company

class StoreCompanyRequest extends FormRequest
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
            'nip' => 'required|string|max:20|unique:companies,nip', //create if NIP does not exist already
            'adress' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
        ];
    }

    public function messages(): array //messages in case of any errors with validation
    {
        return 
        [
            'name.required' => 'Name of company is required.',
            'name.string' => 'Name of company must be text.',
            'name.max' => 'Name of company is no longer than 255 letters.',

            'nip.required' => 'NIP is required.',
            'nip.unique' => 'We have this NIP in db. Try another NIP',
            'nip.string' => 'NIP must be text',
            'nip.max' => 'NIP is no longer than 20 letters.',

            'adress.required' => 'We need your adress.',
            'adress.string' => 'Adress must be text.',

            'city.required' => 'Write your city.',
            'city.string' => 'City must be text.',

            'postal_code.required' => 'Write postal code :).',
            'postal_code.string' => 'Postal code must be string.',
        ];
    }
}
