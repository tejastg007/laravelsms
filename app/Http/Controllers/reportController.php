<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\course_detail;
use App\Models\fee_detail;
use App\Models\registration;

class reportController extends Controller
{
    public function index(Request $r)
    {
        if ($r->has('submit')) {
            $courses = course_detail::all()->keyBy('name');
            $fee = array();
            if (!empty($r->courses)) {
                $courselist = $r->courses;
                $count = count($r->courses);
            } else {
                $courselist = course_detail::select('name')->distinct()->get();
                $count = course_detail::select('name')->distinct()->get()->count();
            }
            if (!empty($r->startdate) && !empty($r->enddate)) {
                $start = $r->startdate;
                $end = $r->enddate;
            } else {
                $start = fee_detail::orderBy('id', 'asc')->first();
                $start = Carbon::parse($start->paid_on)->format('Y-m-d');
                $end = fee_detail::orderBy('id', 'desc')->first();
                $end = Carbon::parse($end->paid_on)->format('Y-m-d');
            }
            // return $start . $end . $courselist[0]->name;
            for ($i = 0; $i < $count; $i++) {
                if (empty($r->courses))
                    $data =  course_detail::where('name', $courselist[$i]->name)->first();
                else
                    $data =  course_detail::where('name', $courselist[$i])->first();
                foreach ($data->getstudents as $d) {
                    foreach ($d->feedetail()->whereBetween('paid_on', [$start, $end])->get() as $f) {
                        if ($f->status == 1) {
                            array_push($fee, $f);
                        }
                    }
                }
            }
            return view('report', ['courses' => $courses, 'feedata' => $fee]);
        } else {
            $courses = course_detail::all()->keyBy('name');
            $feedata = fee_detail::where('status', '1')->orderBy('id', 'desc')->get();
            return view('report', ['courses' => $courses, 'feedata' => $feedata]);
        }
    }
    public function index2(Request $r)
    {
        if ($r->has('submit')) {
            $coursedata = course_detail::all()->keyBy('name');
            if ($r->has('courses')) {
                $courses = $r->courses;
            } else {
                $course = course_detail::select('name')->distinct()->get();
                $courses = array();
                for ($i = 0; $i < count($course); $i++) {
                    array_push($courses, $course[$i]->name);
                }
            }
            if (!empty($r->startdate) && !empty($r->enddate)) {
                $startdate = $r->startdate;
                $enddate = $r->enddate;
            } else {
                $start = fee_detail::orderBy('id', 'asc')->first();
                $startdate = Carbon::parse($start->paid_on)->format('Y-m-d');
                $end = fee_detail::orderBy('id', 'desc')->first();
                $enddate = Carbon::parse($end->paid_on)->format('Y-m-d');
            }
            $feedata = fee_detail::whereBetween('paid_on', [$startdate, $enddate])->where('status', 1)->with('studname')->orderBy('paid_on', 'desc')->get();
            return view('report', ['courses' => $coursedata, 'feedata' => $feedata]);
        }
        // else block
        else {
            $courses = course_detail::all()->keyBy('name');
            $feedata = fee_detail::where('status', 1)->with('studname')->orderBy('paid_on', 'desc')->get();
            return view('report', ['courses' => $courses, 'feedata' => $feedata]);
        }
    }
}
