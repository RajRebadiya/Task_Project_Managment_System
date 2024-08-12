<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use PhpParser\Node\Expr\Empty_;

class TaskController extends Controller
{
    //
    public function index(){
       $task = Task::find(2);
       $task->comments()->create([
           'body' => 'hello'
       ]);

       
       if($task){
           return 'Task Comment created';
       }
    }
    public function data(){
        $task = Task::find(1)->comments;
        // dd($task);
       if ($task->isEmpty()) { // Check if task is empty
            // Task found but contains no data
            return response()->json([
                'status' => 1,
                'code' => 204,
                'message' => 'Task found but contains no data',
                'data' => [],
            ], 204);
        } else {
            // Task found and contains data
            return response()->json([
                'status' => 1,
                'code' => 200,
                'message' => 'Task found',
                'data' => $task,
            ], 200);
        }
        
    }
}
