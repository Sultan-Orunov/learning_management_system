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

    public function instructorRegister(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'instructor';
        $data['status'] = '0';

        User::create($data);

        $notification = [
            'message' => 'Instructor Registered Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('instructor.login')->with($notification);
    }
}
