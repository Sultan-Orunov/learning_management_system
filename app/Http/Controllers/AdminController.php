<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UpdateReques;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminLogin(){
        return view('admin.login');
    }

    public function adminDashboard(){
        return view('admin.index');
    }

    public function adminProfile(User $user){

        return view('admin.admin_profile', compact('user'));
    }

    public function adminProfileUpdate(UpdateReques $request, User $user){

        $data = $request->validated();

        if (isset($data['photo'])){
            $file = $data['photo'];
            @unlink(public_path('upload/admin_images/'. $user->photo));
            $data['photo'] = time().$data['photo']->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $data['photo']);
        }

        $notification = [
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        $user->update($data);
        return redirect()->back()->with($notification);
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function adminPasswordEdit(User $user){

        return view('admin.change_password', compact('user'));
    }

    public function adminPasswordUpdate(Request $request, User $user){
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
