<?php

namespace App\Http\Controllers\Backend\Instructor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CheckInstructorController extends Controller
{
    public function index(){
        $instructors = User::where('role', 'instructor')->latest()->get();
        return view('admin.backend.instructors.index', compact('instructors'));
    }
}
