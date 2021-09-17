<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class profileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function updateprofile(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        if ($req->email != Auth::user()->email)
            if (user::where('email', $req->email)->count() == 1) {
                return back()->with('error', 'Email already exists! ');
            }
        $result = user::find(Auth::user()->id)->update([
            'email' => $req->email,
            'name' => $req->name
        ]);
        if ($result) {
            return back()->with('success', 'profile updated successfully!');
        } else {
            return back()->with('error', 'something went wrong!');
        }
    }

    public function updatepassword(Request $req)
    {
        $req->validate([
            'password' => 'required | confirmed',
            'old_password' => 'required'
        ]);
        if (Hash::check($req->old_password, Auth::user()->password)) {
            User::find(Auth::user()->id)->update([
                'password' => Hash::make($req->password)
            ]);
            return back()->with('success', 'password changed successfully !');
        } else {
            return back()->with('error', 'old password is incorrect !');
        }
    }
}
