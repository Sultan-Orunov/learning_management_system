<?php

namespace App\Http\Controllers\Backend\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('admin.backend.subcategories.create', compact('categories'));
    }
}
