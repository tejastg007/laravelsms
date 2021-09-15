<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee_detail;
use App\Models\registration;

class feeController extends Controller
{
    public function index()
    {
        $data = fee_detail::where('status', '1')->with('studname')->orderBy('paid_on', 'desc')->get();
        return view('fee-status', ['data' => $data]);
    }

    public function fee_details($id)
    {
        $data = registration::find($id);
        // return $data->feedetail;
        return view('fee-details', ['data' => $data]);
    }

    public function update_fee(Request $r)
    {
        $id = $r->id;
        $status = $r->status;
        if ($status == 1) {
            $paiddate = now()->format('Y-m-d');
        } else {
            $paiddate = NULL;
        }
        fee_detail::find($id)->update([
            'status' => $status,
            'paid_on' => $paiddate
        ]);
        if ($status == 1) {
            $paiddate = now()->format('d-M-Y');
        } else {
            $paiddate = NULL;
        }
        return response()->json(['paidon' => $paiddate]);
    }
}
