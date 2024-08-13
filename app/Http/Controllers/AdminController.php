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
        $projects = Project::all();
        return view('admin.project', compact('projects'));
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

        if (!$project) {
            return redirect()->route('projects')->with('error', 'Project not added');
        }

        // Prepare data for pivot table
        $pivotData = [];
        foreach ($request->user_roles as $userRole) {
            $pivotData[] = [
                'user_id' => $userRole['user_id'],
                'role_id' => $userRole['role_id'],
            ];
        }

        foreach ($pivotData as $data) {
            $project->users()->attach($data['user_id'], ['role_id' => $data['role_id']]);
        }
        // $project->users()->attach($pivotData);
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

    public function project_detail($id)
    {
        // dd($id);
        $project = Project::find($id);
        $users = User::all();
        $roles = Role::all();
        // dd($project);
        return view('admin.project_detail', compact('project', 'users', 'roles'));
    }

    public function project_edit($id)
    {
        $project = Project::find($id);
        $users = User::all();
        $roles = Role::all();
        $priorities = Project::distinct('priority')->orderBy('priority', 'asc')->pluck('priority');
        $status_data = Project::distinct('status')->pluck('status');
        $categories = Project::distinct('project_category')->pluck('project_category');
        return view('admin.edit_project_show', compact('project', 'priorities', 'status_data', 'categories', 'users', 'roles'));
    }

    public function edit_project(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'due_date' => 'required|date',
            'priority' => 'required|string',
            'project_category' => 'required|string',
            'budget' => 'nullable|numeric',
            'status' => 'required|string',
            'user_roles.*.user_id' => 'required|exists:users,id',
            'user_roles.*.role_id' => 'required|exists:roles,id',
        ]);

        // Find the project by ID
        $project = Project::findOrFail($request->id);

        // Update the project data
        $project->title = $request->title;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->due_date = $request->due_date;
        $project->priority = $request->priority;
        $project->project_category = $request->project_category;
        $project->budget = $request->budget;
        $project->status = $request->status;

        // Save the updated project data
        $project->save();

        // Sync the user-role relationships
        // Prepare data for pivot table
        $pivotData = [];
        foreach ($request->user_roles as $userRole) {
            $pivotData[] = [
                'user_id' => $userRole['user_id'],
                'role_id' => $userRole['role_id'],
            ];
        }

        // Sync the pivot table with the new data
        $project->users()->sync($pivotData);


        // Redirect back with a success message
        return redirect()->route('projects')->with('success', 'Project updated successfully.');
    }

    public function delete_project($id)
    {
        // dd($id);
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects')->with('success', 'Project deleted successfully');
    }
}
