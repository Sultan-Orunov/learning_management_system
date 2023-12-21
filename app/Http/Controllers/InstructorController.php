<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function instructorLogin(){
        return view('instructor.login');
    }

    public function instructorDashboard(){
        return view('instructor.index');
    }

    public function instructorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('instructor.login');
    }

    public function instructorProfile(User $user){

        return view('instructor.instructor_profile', compact('user'));
    }
}
