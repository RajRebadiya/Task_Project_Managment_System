<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    //
    public function index(){
        $comment = Project::find(1);
        $comment->comments()->create([
            'body' => 'hello'
        ]);
    
        if($comment){
            return 'success';
        }

    }
    public function data(){
        return Project::find(1)->comments;
    }
}
