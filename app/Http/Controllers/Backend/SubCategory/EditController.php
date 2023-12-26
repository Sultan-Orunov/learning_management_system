<?php

namespace App\Http\Controllers\Backend\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

class EditController extends Controller
{
    public function __invoke(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.backend.subcategories.edit', compact('subcategory', 'categories'));
    }
}
