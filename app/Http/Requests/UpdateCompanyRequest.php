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
}
