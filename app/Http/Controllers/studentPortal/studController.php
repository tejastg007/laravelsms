<?php

namespace App\Http\Controllers\studentPortal;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\course_detail;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\registration;
use App\Models\resource;
use App\Models\companydetail;

class studController extends Controller
{
    public function register()
    {
        return view('student.register');
    }

    public function register_action(Request $req)
    {
        $req->validate([
            'student_id' => 'required | min:9 | max:9',
            'password' => 'required | min:8 | confirmed'
        ]);
        if (!registration::where('student_id', $req->student_id)->exists()) {
            return back()->with('error', 'studentID not found in our records!')->withInput();
        } else {
            if (student::where('student_id', $req->student_id)->exists()) {
                return back()->with('error', 'studentID already registered, please login!')->withInput();
            }
            $result = student::create([
                'student_id' => $req->student_id,
                'password' => Hash::make($req->password)
            ]);
        }
        if ($result) {
            return back()->with('success', 'registration successful ! please login  :)');
        } else {
            return back()->with('error', 'something went wrong :( , please try again !');
        }
    }

    public function login()
    {
        return view('student.login');
    }

    public function login_action(Request $req)
    {
        $req->validate([
            'student_id' => 'required | min:9 | max:9'
        ]);
        if (!student::where('student_id', $req->student_id)->exists()) {
            return back()->with('error', 'student ID is not registered, please register first :)');
        }
        if (Auth::guard('student')->attempt(['student_id' => $req->student_id, 'password' => $req->password])) {
            return redirect()->intended(route('student.profile'));
        }
        return redirect()->back()->withInput($req->only('student_id'));
    }

    public function profile()
    {
        $result = registration::where('student_id', Auth::user()->student_id)->first();
        return view('student.profile', ['data' => $result]);
    }

    public function profileupdate(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'dob' => 'required',
            'mobile' => 'min:10 | max:10',
            'address' => 'required | max:100',
        ]);
        $result = registration::where('student_id', Auth::user()->student_id)->update([
            'name' => $req->name,
            'dob' => $req->dob,
            'phone' => $req->mobile,
            'address' => $req->address,
        ]);
        if ($result) {
            return back()->with('success', 'profile details updated successfully!');
        }
        return back()->with('error', 'something went wrong, please try again!');
    }

    public function passwordupdate(Request $req)
    {
        $req->validate([
            'cpassword' => 'required',
            'password' => 'required | confirmed | min:8',
        ]);
        if (Hash::check($req->cpassword, Auth::user()->password)) {
            student::find(Auth::user()->id)->update([
                'password' => Hash::make($req->password)
            ]);
            return back()->with('success', 'password changed successfully !');
        } else {
            return back()->with('error', 'old password is incorrect !');
        }
    }

    public function mycourse()
    {
        $data = registration::where('student_id', Auth::user()->student_id)->with('course')->first();
        $courses = course_detail::where('status', 1)->get();
        return view('student.mycourse', ['data' => $data, 'courses' => $courses]);
    }
    public function feestatus()
    {
        $data = registration::where('student_id', Auth::user()->student_id)->with('feedetail')->first();
        return view('student.feestatus', ['data' => $data]);
    }

    public function fee_receipt($id)
    {
        $data = registration::where('student_id', $id)->with('feedetail')->first();
        return view('student.reports.feereceipt', ['data' => $data, 'companydetails' => \App\Models\companydetail::first()]);
    }
    public function resources()
    {
        $coursename = registration::where('student_id', Auth::user()->student_id)->first()->course->name;
        $data = resource::where('course', $coursename)->get();
        return view('student.resources', ['data' => $data, 'course' => $coursename]);
    }
    public function contact()
    {
        $data = companydetail::first();
        return view('student.contact', ["data" => $data]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('student.login');
    }
}
