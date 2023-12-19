<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReques extends FormRequest
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
            'name' => 'nullable|min:3',
            'username' => 'nullable|min:3',
            'email' => 'nullable|email',
            'photo' => 'nullable|file',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ];
    }
}
