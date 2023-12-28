<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){
        $user = Auth::user();
        $courses = $user->courses;
        return view('instructor.courses.index', compact('courses'));
    }
}
