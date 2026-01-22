<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\pM\s\-\.\']+$/u'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^[\+]?[0-9\s\-\(\)]{7,20}$/'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.max' => 'Name is too long.',
            'name.regex' => 'Name contains invalid characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'Please enter a valid phone number.',
            'phone.max' => 'Phone number is too long.',
            'message.required' => 'Please enter your message.',
            'message.min' => 'Message is too short.',
            'message.max' => 'Message is too long.',
        ];
    }
}
