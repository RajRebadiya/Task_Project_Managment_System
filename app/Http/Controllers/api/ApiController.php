<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ApiController extends Controller
{
    //
    public function index()
    {
        $project = Project::find(6);
        $task = $project->tasks()->get();
        // dd($task);
        $userIds = [];

        // Extract user IDs from tasks
        foreach ($task as $tasks) {
            // Assuming user_ids is stored as a comma-separated string
            $ids = explode(',', $tasks->user_id);

            // Merge and filter user IDs (avoid duplicates)
            $userIds = array_merge($userIds, $ids);
        }

        // Remove duplicates
        $userIds = array_unique($userIds);
        // dd($userIds);

        // Fetch users based on the IDs
        $users = User::whereIn('id', $userIds)->get();
        return $users;


        // dd($project);
      
    }
}
