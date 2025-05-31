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

    public function messages(): array //messages in case of errors with validation
    {
        return 
        [
            'company_id.required' => 'Employee need Company.',
            'company_id.exists' => 'We cant find this Company. Try another.',

            'first_name.required' => 'Name is required.',
            'first_name.string' => 'Name must be string.',
            'first_name.max' => 'Name is no longer than 255 letters.',

            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be text.',
            'last_name.max' => 'Last name is no longer than 255 letters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Write correct email.',

            'phone.string' => 'Phone must be text.',
            'phone.max' => 'Phone number is no longer than 20 letters.',
        ];
}
}
