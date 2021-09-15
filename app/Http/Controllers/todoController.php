<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;

class todoController extends Controller
{
    public function showtask()
    {
        $tasks = todo::orderBy('id', 'desc')->get();
        return view("/home", ["tasks" => $tasks, "count" => 1]);
    }

    public function loaddata()
    {
        $i = 0;
        $data = "";
        $tasks = todo::orderBy('id', 'desc')->get();
        foreach ($tasks  as $task) {
            $i++;
            if ($task->status == 1)
                $color = "#cfffdd";
            else
                $color = "";
            $data .= "<div class='border-bottom row mb-1' style='background-color:$color'>
                <div class='col-1 d-flex'>
                    <h5> $i</h5>
                </div> 


                <textarea rows='3' style='display: none !important; resize:none'
                class=' col-8 p-0 task-edit row-$task->id'> $task->task </textarea>
            <a style='display: none !important' href='javascript:void(0)'
                class=' col-3 d-flex align-items-center justify-content-between task-edit-save row-$task->id' onclick='taskeditaction($task->id, event)'>
                <i class='fas fa-check-double text-success'></i>
            </a>
            


                <div class='col-10 pb-2 task-content row-$task->id'><strong>$task->task</strong>
                    <p class='text-right m-0' style='font-size: 12px'>task created at :
                         $task->created_at </p>
                    <p class='text-right m-0' style='font-size: 12px'>task updated at :
                        $task->updated_at</p>
                </div>
                <div class='col-11  d-flex justify-content-end task-actions row-$task->id'>
                    <a href='javascript:void(0)' onclick='taskcomplete($task->id),event'>
                        <i class='fas fa-check-double text-success'></i>
                    </a>
                    <a href='javascript:void(0)' onclick='taskedit($task->id)'>
                        <i class='fas fa-edit text-info '></i>
                    </a>
                    <a href='javascript:void(0)' onclick='taskdelete($task->id)'>
                        <i class='fa fa-window-close text-danger' aria-hidden='true'></i>
                    </a>
                  
                </div>
            </div> ";
        }
        return response()->json(["data" => $data]);
    }

    public function addtask(Request $req)
    {
        todo::create([
            'task' => $req->task,
            'status' => "0"
        ]);
        return back();
    }

    public function taskcomplete(Request $req)
    {
        $status = todo::where("id", $req->id)->get();
        if ($status[0]->status == 1) {
            $status[0]->status = 0;
            $status[0]->save();
        } else {
            $status[0]->status = 1;
            $status[0]->save();
        }
        return response()->json(["message" => "updated"]);
    }

    public function taskedit(Request $req)
    {
        $res = todo::where("id", $req->id)->update([
            'task' => $req->task
        ]);
        return response()->json(["message" => $req->task]);
    }

    public function taskdelete(Request $req)
    {
        todo::where("id", $req->id)->delete();
        return response()->json(["message" => "task deleted"]);
    }
}
