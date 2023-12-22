<?php

namespace App\Http\Controllers;


use App\Http\Requests\Instructor\UpdateReques;
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

    public function instructorProfileUpdate(UpdateReques $request, User $user){

        $data = $request->validated();

        if (isset($data['photo'])){
            $file = $data['photo'];
            @unlink(public_path('upload/instructor_images/'. $user->photo));
            $data['photo'] = time().$data['photo']->getClientOriginalName();
            $file->move(public_path('upload/instructor_images'), $data['photo']);
        }

        $notification = [
            'message' => 'Instructor Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        $user->update($data);
        return redirect()->back()->with($notification);
    }

    public function instructorPasswordEdit(User $user){

        return view('instructor.change_password', compact('user'));
    }
}
