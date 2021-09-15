<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\batch_detail;
use App\Models\registration;

class batchesController extends Controller
{
    public function index(Request $req)
    {
        // $data = batch_detail::with('getstudents')->get();
        $data = batch_detail::all();
        return view("batches", ["data" => $data]);
    }

    public function view_batch($batchid)
    {
        // $batchdata = batch_detail::where('id', $batchid)->with('getstudents')->first();
        $batchdata = registration::where([
            ['batch_id', $batchid],
            ['status', '1']
        ])->with('course')->get();
        $batchinfo = batch_detail::where('id', $batchid)->first();
        return view("view-batch", ['batchdata' => $batchdata, 'batchinfo' => $batchinfo]);
    }

    public function add_batch()
    {
        $data = batch_detail::all();
        return view("add-batch", ["data" => $data]);
    }

    public function add_batch_action(Request $r)
    {
        $starttime = strtotime(date('Y-m-d') . " " . $r->starttime . "Asia/Kolkata");
        $endtime = strtotime(date('Y-m-d') . " " . $r->endtime . "Asia/Kolkata");
        if ($endtime < $starttime) {
            return back()->withInput()->with('timeerror', 'start time should not be greater than end time');
        } else if (($endtime - $starttime) > 10800) {
            return back()->withInput()->with('timeerror', 'batch time should be maximum 3 hours');
        } else {
            $status = batch_detail::create([
                "start_time" => $r->starttime,
                "end_time" => $r->endtime,
            ]);
            if ($status) {
                return back()->with('success', 'batch timing has been saved !');
            } else {
                return back()->with('timeerror', 'something is wrong! please try again !');
            }
        }
    }

    public function edit_batch($id)
    {
        $data = batch_detail::find($id);
        $alldata = batch_detail::all();
        return view('edit-batch', ["data" => $data, "alldata" => $alldata]);
    }

    public function edit_batch_action(Request $r)
    {
        $starttime = strtotime(date('Y-m-d') . " " . $r->starttime . "Asia/Kolkata");
        $endtime = strtotime(date('Y-m-d') . " " . $r->endtime . "Asia/Kolkata");
        if ($endtime < $starttime) {
            return back()->withInput()->with('timeerror', 'start time should not be greater than end time');
        } else if (($endtime - $starttime) > 10800) {
            return back()->withInput()->with('timeerror', 'batch time should be maximum 3 hours');
        } else {
            $batch =  batch_detail::find($r->id);
            $batch->start_time = $r->starttime;
            $batch->end_time = $r->endtime;
            $batch->save();
            if ($batch) {
                return back()->with('success', 'batch timing has been updated !');
            } else {
                return back()->with('timeerror', 'something is wrong! please try again !');
            }
        }
    }
}
