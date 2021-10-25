<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\registration;

class studentsController extends Controller
{
    public function active_students()
    {
        $data = registration::where('status', 1)->with('course')->get();
        return view("active-students", ["data" => $data]);
    }

    public function view_student($id)
    {
        // return public_path('');
        $data = registration::find($id);
        return view("view-student", ['data' => $data]);
    }

    public function edit_student_action(Request $req)
    {
        $obj = registration::find($req->id)->update([
            'name' => $req->name,
            'gender' => $req->gender,
            'dob' => $req->dob,
            'phone' => $req->phone,
            'address' => $req->address
        ]);
        if ($obj) {
            return back()->with('success', 'data updated successfully !');
        } else {
            return back()->with('fail', 'something went wrong! please try again !');
        }
    }

    public function view_student_redirect()
    {
        return redirect(URL::previous());
    }

    public function all_students()
    {
        
        $data = registration::with('course')->get();
        return view("all-students", ['data' => $data]);
    }

    public function upload_photo(Request $r)
    {
        $stud = registration::find($r->id);
        $r->validate([
            'student-photo' => 'required|image|mimes:jpg|max:1024',
        ]);
        $ext = $r->file('student-photo')->extension();
        $path = $r->file('student-photo')->storeAs(
            'public/avatars',
            $stud->id . '.' . $ext
        );
        $stud->update([
            'avatar' => $ext
        ]);
        return back()->with('success', 'image uploaded successfully !');
    }
}