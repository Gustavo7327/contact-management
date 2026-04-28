<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|string|min:6',
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('contacts')->whereNull('deleted_at')
            ],
            'contact' => [
                'required', 'string', 'digits:9',
                Rule::unique('contacts')->whereNull('deleted_at')
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.min' => 'The name must be at least 6 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.lowercase' => 'The email must be in lowercase.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'The email has already been taken.',
            'contact.required' => 'The contact field is required.',
            'contact.string' => 'The contact must be a string.',
            'contact.digits' => 'The contact must be exactly 9 digits.',
            'contact.unique' => 'The contact has already been taken.',
        ];
    }
}
