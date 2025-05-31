<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//validate data to CREATE and UPDATE employee

class StoreEmployeeRequest extends FormRequest
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

    public function rules(): array
    {
        return [
            'company_id' => 'required|exists:companies,id', //create or update, only if his company exists
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|',
            'phone' => 'nullable|string|max:20', //phone is not required
        ];
    }
}
