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

    public function update(User $user){
        if ($user->status == 1){
            $data['status'] = '0';
            $user->update($data);
        }elseif($user->status == 0){
            $data['status'] = '1';
            $user->update($data);
        }

        $notification = [
            'message' => 'Instructor status updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
