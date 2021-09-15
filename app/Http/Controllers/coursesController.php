<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course_detail;
use App\Models\registration;

class coursesController extends Controller
{
    public function index()
    {
        $studdata = registration::with('course')->get();
        $data = course_detail::all()->keyBy('name');
        return view('courses', ['data' => $data, "studdata" => $studdata]);
    }

    public function view_course($id)
    {
        $coursename = course_detail::where('id', $id)->first();
        $cdata = course_detail::where('name', $coursename->name)->orderBy('id', 'desc')->first();
        $versions = course_detail::where('name', $cdata->name)->get();
        return view('view-course', ["data" => $cdata, "versions" => $versions]);
    }

    public function edit_course_action(Request $r)
    {
        global $fee;
        $fee = $r->coursefee;
        $r->validate([
            'course' => 'max:30',
            'duration' => 'integer | gte:0',
            'registrationfee' => 'integer | gte:0',
            'coursefee' => 'integer | gte:0',
            'installments' => ['integer', 'gte:0', function ($attribute, $value, $fail) {
                if ($GLOBALS['fee'] % $value != 0) {
                    $fail('installments should be in order to divide course fee equally');
                }
            }],
        ]);

        $cname = course_detail::where("id", $r->id)->first();
        $todisable = course_detail::where('name', $cname->name)->orderBy('id', 'desc')->first();
        $todisable->status = 0;
        $todisable->save();
        $status = course_detail::create([
            "name" => $r->course,
            "duration" => $r->duration,
            "registration_fee" => $r->registrationfee,
            "course_fee" => $r->coursefee,
            "installments" => $r->installments,
            "version" => $todisable->version + 1,
            "status" => 1,
        ]);
        if ($status) {
            return back()->with('success', 'course updated successfully !');
        } else {
            return back()->with('error', 'something went wrong, pleas try again !');
        }
    }

    public function view_course_version($id)
    {
        $versiondata = course_detail::find($id);
        $students = registration::where([
            ['course_id', $versiondata->id],
            ['status', '1']
        ])->get();
        // return $versiondata;
        // return $students;
        return view('view-course-version', ['vdata' => $versiondata, 'students' => $students]);
    }


    public function add_course()
    {
        $data = course_detail::all()->keyBy('name');
        return view('add-course', ["data" => $data]);
    }

    public function add_course_action(Request $r)
    {
        global $fee;
        $fee = $r->coursefee;
        $r->validate([
            'course' => 'max:30',
            'duration' => 'integer | gte:0',
            'registrationfee' => 'integer | gte:0',
            'coursefee' => 'integer | gte:0',
            'installments' => ['integer', 'gte:0', function ($attribute, $value, $fail) {
                if ($GLOBALS['fee'] % $value != 0) {
                    $fail('installments should be in order to divide course fee equally');
                }
            }],
        ]);
        $status = course_detail::create([
            "name" => $r->course,
            "duration" => $r->duration,
            "registration_fee" => $r->registrationfee,
            "course_fee" => $r->coursefee,
            "installments" => $r->installments,
            "version" => 1,
            "status" => 1
        ]);

        if ($status) {
            return back()->with("success", "course added successfully !");
        } else {
            return back()->withInput()->with("error", "something went wrong ! please try again !");
        }
        // return redirect('/add-course');
    }
}
