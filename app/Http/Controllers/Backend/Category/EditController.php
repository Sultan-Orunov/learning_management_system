<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Category $category)
    {
        return view('admin.backend.categories.edit', compact('category'));
    }
}
