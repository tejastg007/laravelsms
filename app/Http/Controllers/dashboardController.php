<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Models\registration;
use App\Models\course_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index()
    {

        $users = registration::select(DB::raw('count(*) as count'))
            ->whereYear('registration_date', date('Y'))
            ->groupBy(DB::raw('month(registration_date)'))
            ->pluck('count');

        $months = registration::select(DB::raw('Month(registration_date) as month'))
            ->whereYear('registration_date', date('Y'))
            ->groupBy(DB::raw('month(registration_date)'))
            ->pluck('month');

        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $datas[$month - 1] = $users[$index];
        }

        $studdata = registration::all();
        $coursedata = course_detail::all()->keyBy('name');
        return view("dashboard", ['datas' => $datas, 'studdata' => $studdata, 'coursedata' => $coursedata]);
    }
}
