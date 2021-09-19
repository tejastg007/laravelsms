<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\course_detail;
use App\Models\fee_detail;
use App\Models\registration;

class reportController extends Controller
{
    public function index2(Request $r)
    {
        //! for view only records
        if ($r->has('submit') && $r->submit == 'submit') {
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
                $startdate = Carbon::createFromFormat(
                    'Y-m-d',
                    '2021-01-01'
                );
                $enddate = today();
            }
            $feedata = fee_detail::whereBetween('paid_on', [$startdate, $enddate])->where('status', 1)->with('studname')->orderBy('paid_on', 'desc')->get();
            return view('report', ['courses' => $coursedata, 'feedata' => $feedata]);
        }
        //! for download pdf 
        elseif ($r->has('downloadpdf') && $r->downloadpdf == 'download') {

            $coursedata = course_detail::get()->keyBy('name');
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
                $startdate = Carbon::createFromFormat(
                    'Y-m-d',
                    '2021-01-01'
                );
                $enddate = today();
            }
            $feedata = fee_detail::whereBetween('paid_on', [$startdate, $enddate])->where('status', 1)->with('studname')->orderBy('paid_on', 'desc')->get();
            return view('reports.feereport', ['courses' => $coursedata, 'feedata' => $feedata, 'companydetails' => \App\Models\companydetail::first()]);
        }
        //! for all data 
        else {
            $courses = course_detail::all()->keyBy('name');
            $feedata = fee_detail::where('status', 1)->with(['studname'])->orderBy('paid_on', 'desc')->get();
            return view('report', ['courses' => $courses, 'feedata' => $feedata]);
        }
    }
}
