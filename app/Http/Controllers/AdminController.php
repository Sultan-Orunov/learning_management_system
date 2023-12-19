<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UpdateReques;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLogin(){
        return view('admin.login');
    }

    public function adminDashboard(){
        return view('admin.index');
    }

    public function adminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile', compact('profileData'));
    }

    public function adminProfileStore(UpdateReques $request, User $user){

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
}
