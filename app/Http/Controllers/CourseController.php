<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){
        $user = Auth::user();
        $courses = $user->courses;
        return view('instructor.courses.index', compact('courses'));
    }

    public function create(){
        $categories = Category::all();
        return view('instructor.courses.create', compact('categories'));
    }




    public function getSubCategories($category_id){
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('title', 'ASC')->get();
        return json_encode($subcat);
    }
}
