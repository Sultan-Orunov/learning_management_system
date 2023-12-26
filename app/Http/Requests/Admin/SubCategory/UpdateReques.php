<?php

namespace App\Http\Requests\Admin\SubCategory;

use App\Models\Category;
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
            'category_id' => 'nullable|integer',
            'title' => 'nullable|min:3|max:255|unique:sub_categories,title,'. $this->subcategory_id,
        ];
    }
}
