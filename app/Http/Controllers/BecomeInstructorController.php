<?php

namespace App\Http\Controllers;


use App\Http\Requests\Instructor\UpdateReques;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BecomeInstructorController extends Controller
{
    public function becomeInstructor(){
        return view('frontend.become.register');
    }


}
