<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function projects()
    {
        return view('admin.project');
    }
    public function add_project_show()
    {
        $users = User::all();
        $roles = Role::all();
        $priorities = Project::distinct('priority')->orderBy('priority', 'asc')->pluck('priority');
        $status_data = Project::distinct('status')->pluck('status');
        $categories = Project::distinct('project_category')->pluck('project_category');
        return view('admin.add_project', compact('priorities', 'status_data', 'categories', 'users', 'roles'));
    }

    public function add_project(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'start_date' => 'required',
            'due_date' => 'required',
            'priority' => 'required',
            'project_category' => 'required',
            'budget' => 'required',
            'status' => 'required',
            'user_roles' => 'required|array',
            'user_roles.*.user_id' => 'required|exists:users,id',
            'user_roles.*.role_id' => 'required|exists:roles,id',

        ]);
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->due_date = $request->due_date;
        $project->priority = $request->priority;
        $project->project_category = $request->project_category;
        $project->budget = $request->budget;
        $project->status = $request->status;
        $project->save();

        // Prepare data for pivot table
        $pivotData = [];
        foreach ($request->user_roles as $userRole) {
            $pivotData[$userRole['user_id']] = ['role_id' => $userRole['role_id']];
        }
        // dd($pivotData);
        $project->users()->attach($pivotData);
        return redirect()->route('projects')->with('success', 'Project added successfully');
    }

    public function users()
    {
        // Find the project
        $project = Project::with('users.roles')->find(15);

        // Prepare user roles data
        $userRoles = $project->users->map(function ($user) {
            // Get the role associated with the user for this project
            $role = $user->roles->where('pivot.project_id', 15)->first();
            return [
                'name' => $user->name,
                'role' => $role ? $role->role_name : 'No Role'
            ];
        });

        return response()->json($userRoles);
    }
}
