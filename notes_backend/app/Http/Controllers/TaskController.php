<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function delete(Request $request)
    {
        // $id = Task->findOrFail($request->id);
        $task = Task::findOrFail($request->id);
        $task->delete();
       
        return response()->json([
            "status"=>true,
            "message"=>"Task Deleted Successfully"
        ]);
    }
    public function create(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Task::create($request->all());

        return response()->json([
            "status"=>true,
           "message"=>"Task Created Successfully"
        ]);

    }
    public function index(){
        $list = Task::all();
        return response()->json(
            ["list" => $list]
        );
    }
}
