<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\registration;
use App\Models\course_detail;
use App\Models\batch_detail;
use App\Models\fee_detail;

class newAdmissionController extends Controller
{
    public function index()
    {
        $courses = course_detail::where('status', 1)->get();
        $batches = batch_detail::all();
        return view('new-admission', ['courses' => $courses, 'batches' => $batches],);
    }

    public function course_details(Request $r)
    {
        $data = course_detail::where('id', $r->courseid)->first();
        return response()->json([
            'duration' => $data->duration,
            'registrationfee' => $data->registration_fee,
            'coursefee' => $data->course_fee,
        ]);
    }

    public function admission_action(Request $r)
    {
        // $count = registration::count() + 1;
        $no = registration::count();
        if ($no == 0) {
            $count = 1;
        } else {
            $temp = registration::orderBy('id', 'desc')->first();
            $count = $temp->id + 1;
        }
        $stud_id = "MAD" . str_pad($count, 4, "0", STR_PAD_LEFT) . date('y');
        $registrationdate = now()->format('Y-m-d');


        // check status ; 0= yet to start, 1 = learning, -1= completed, 2= abandoned 
        $startdateObj = Carbon::parse($r->startdate);
        $registrationdateObj = Carbon::parse($registrationdate);
        if ($startdateObj->gt($registrationdateObj)) {
            $status = 0;
        } elseif ($startdateObj->eq($registrationdateObj)) {
            $status = 1;
        } elseif ($startdateObj->lt($registrationdateObj)) {
            return back()->withInput()->with('error', 'course start date must be greater than or equal to todays date');
        } else {
        }
        $enddate = Carbon::createFromFormat(
            'Y-m-d',
            $r->startdate
        )->addMonth($r->duration)->format('Y-m-d');

        $result = registration::create([
            'name' => $r->name,
            'gender' => $r->gender,
            'student_id' => $stud_id,
            'gender' => $r->gender,
            'dob' => $r->dob,
            'phone' => $r->mobile,
            'address' => $r->address,
            'course_id' => $r->course,
            'batch_id' => $r->batch,
            'registration_date' => $registrationdate,
            'course_start_date' => $r->startdate,
            'course_end_date' => $enddate,
            'status' => $status
        ]);
        if ($result) {
            $coursedetails = course_detail::where('id', $r->course)->first();
            // $coursefee = $coursedetails->course_fee;
            $installments = $coursedetails->installments;
            $studentid = registration::orderBy('id', 'desc')->first();
            fee_detail::create([
                'student_id' => $studentid->id,
                'fee_type' => 0,
                'status' => 0
            ]);
            for ($i = 1; $i <= $installments; $i++) {
                fee_detail::create([
                    'student_id' => $studentid->id,
                    'fee_type' => $i,
                    'status' => 0
                ]);
            }
            $studid = registration::select('id')->orderBy('id', 'desc')->first();
            return back()->with('success', ['successmsg' => 'student has been successfully registered !', 'id' => $studid->id]);
        } else {
            return back()->with('error', 'something went wrong ! please try again');
        }
    }
}
