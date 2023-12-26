<?php

namespace App\Http\Controllers\Backend\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = SubCategory::latest()->get();
        return view('admin.backend.subcategories.index', compact('categories'));
    }
}
