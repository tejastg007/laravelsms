<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\companydetail;

class profileController extends Controller
{
    public function index()
    {
        $companydetails = companydetail::first();
        if ($companydetails == null) {
            companydetail::insert([
                'address' => 'near PWD office, behind karnataka bank, nippani road, chikodi, karnataka.',
                'phone1' => '7776999440',
                'email' => 'madcraft2019@gmail.com'
            ]);
        }
        return view('profile', ['companydetails' => $companydetails]);
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

    public function updatedetails(Request $req)
    {
        $result = companydetail::first()->update([
            'address' => $req->address,
            'phone1' => $req->phone1,
            'phone2' => $req->phone2,
            'email' => $req->email,
        ]);
        if ($result) {
            return back()->with('success', 'company details updated successfully');
        } else {
            return back()->with('error', 'something went wrong!');
        }
    }
}
