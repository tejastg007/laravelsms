<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\registration;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function index()
    {
        $studs = registration::all();
        foreach ($studs as $stud) {
            if (Carbon::parse($stud->course_end_date)->eq(today())) {
                $stud->status = -1;
                $stud->save();
                continue;
            }
            if (Carbon::parse($stud->course_start_date)->eq(today())) {
                $stud->status = 1;
                $stud->save();
                continue;
            }
        }
        // return $msg;
        return redirect('admin/dashboard');
    }
    public function notifications()
    {
        $barr = [];
        $parr = [];
        $data = registration::all();
        foreach ($data as $d) {
            if ($d->status == 1) {
                $dob = Carbon::createFromFormat(
                    "Y-m-d",
                    $d->dob,
                );
                if ($dob->isBirthday()) {
                    $msg = $d->name . ', studentID-' . $d->student_id . 'has a birthday today, wish a happy
                birthday with a tasty cake';
                    array_push($barr, $msg);
                }
            }
        }

        foreach ($data as $d) {
            $enddate = Carbon::createFromFormat(
                "Y-m-d",
                Carbon::parse($d->course_end_date)->format('Y-m-d'),
            );
            if ($enddate->isToday()) {
                $msg = $d->name . ', studentID-' . $d->student_id . ' has successfully completed the course
                <strong>' . $d->course->name . '</strong> today';
                array_push($parr, $msg);
            }
        }

        return view('notifications', ['bmsg' => $barr, 'pmsg' => $parr]);
    }
}
