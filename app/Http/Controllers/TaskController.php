<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    
    public function index()
    {
        $todoList = Task::whereStatus(0)->latest()->get();
        $progressList = Task::whereStatus(1)->latest()->get();
        $doneList = Task::whereStatus(2)->latest()->get();
        return view('welcome',compact('todoList','progressList','doneList'));
    }
    public function store(Request $request)
    {
        try{
                DB::beginTransaction();
                Task::create($request->all());
                DB::commit();
                return back();
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
    public function inProgress($id)
    {
        $progress = Task::where("id", $id)->update(["status" => 1]);
           return back();  
    }
    public function done($id)
    {
        $done = Task::where("id", $id)->update(["status" => 2]);
           return back();  
    }

  
  

 
}
