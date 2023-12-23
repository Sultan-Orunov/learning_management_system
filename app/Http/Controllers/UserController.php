<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function PasswordEdit(User $user){
        return view('user.dashboard.password_edit', compact('user'));
    }

    public function PasswordUpdate(Request $request, User $user){
        $data = $request->validate([
            'old_password' => 'required|current_password',
            'password' => 'required|confirmed'
        ]);
        unset($data['old_password']);
        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        $notification = [
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
