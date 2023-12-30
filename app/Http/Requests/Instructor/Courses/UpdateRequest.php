<?php

namespace App\Http\Requests\Instructor\Courses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'title' => 'nullable|string|min:10|max:255',
            'name' => 'nullable|string|min:10|max:255',
            'image' => 'nullable|file',
            'video' => 'nullable|mimes:mp4|max:10000',
            'selling_price' => 'nullable|integer',
            'discount_price' => 'nullable|integer',
            'description' => 'nullable|min:10',
            'label' => 'nullable|string',
            'duration' => 'nullable',
            'resources' => 'nullable|string',
            'certificate' => 'nullable|string',
            'prerequisites' => 'nullable',
            'highestrated' => 'nullable',
            'featured' => 'nullable',
            'bestseller' => 'nullable',
        ];
    }
}
