<?php

namespace App\Http\Requests\Instructor\Courses;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'title' => 'required|string|min:10|max:255',
            'name' => 'required|string|min:10|max:255',
            'image' => 'required|file',
            'video' => 'required|mimes:mp4|max:10000',
            'selling_price' => 'required|integer',
            'discount_price' => 'nullable|integer',
            'description' => 'required|min:10',
            'label' => 'required|string',
            'duration' => 'required',
            'resources' => 'nullable|string',
            'certificate' => 'nullable|string',
            'prerequisites' => 'required',
            'highestrated' => 'nullable',
            'featured' => 'nullable',
            'bestseller' => 'nullable',
        ];
    }
}
