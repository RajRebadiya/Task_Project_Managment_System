<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //
    public function projects()
    {
        if (Auth::guard('admin')->check()) {
            $projects = Project::all();
            return view('admin.projects.project', compact('projects'));
        } else if (Auth::guard('web')->check()) {
            $users = Auth::guard('web')->user();
            $project = $users->projectsWithRoles;
            return view('users.project', compact('users', 'project'));
        } else {
            return redirect('/login');
        }
    }

    public function add_project_show()
    {
        $users = User::all();
        $roles = Role::all();
        $clients = Client::all();
        return view('admin.projects.add_project', compact('users', 'roles', 'clients'));
    }
    public function add_project(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'client' => 'required',
            'project_category' => 'required',
            'budget' => 'required',
            'project_managers' => 'required|array',
            'developers' => 'required|array',

        ]);

        // dd('move to the next');
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->client = $request->client;
        $project->project_category = $request->project_category;
        $project->budget = $request->budget;
        $project->status = 'pending';
        $project->save();

        if (!$project) {
            return redirect()->route('projects')->with('error', 'Project not added');
        }
        $project_manager = $request->project_managers;
        $developer = $request->developers;
        // dd($developer);


        // Prepare pivot data for project managers (role_id = 3)
        $pivotData = [];
        foreach ($project_manager as $userId) {
            $pivotData[] = [
                'user_id' => $userId,
                'role_id' => 3, // Role ID for project managers
            ];
        }

        // Attach project managers to the project
        foreach ($pivotData as $data) {
            $project->users()->attach($data['user_id'], ['role_id' => $data['role_id']]);
        }

        // Prepare pivot data for developers (role_id = 2)
        $pivotData = [];
        foreach ($developer as $userId) {
            $pivotData[] = [
                'user_id' => $userId,
                'role_id' => 2, // Role ID for developers
            ];
        }

        // Attach developers to the project
        foreach ($pivotData as $data) {
            $project->users()->attach($data['user_id'], ['role_id' => $data['role_id']]);
        }
        return redirect()->route('projects')->with('success', 'Project added successfully');
    }

    public function project_detail($id)
    {
        if (Auth::guard('admin')->check()) {
            $project = Project::find($id);
            $users = User::all();
            $roles = Role::all();
            $data = Task::where('project_id', $id)->get();
            // dd($project);
            return view('admin.projects.project_detail', compact('project', 'users', 'roles', 'data'));
        } else if (Auth::guard('web')->check()) {
            $users = Auth::guard('web')->user();
            $project = $users->projectsWithRoles;
            // dd($project);
            return view('users.project_detail', compact('users', 'project'));
        } else {
            return redirect('/login');
        }
    }

    public function project_edit($id)
    {
        $project = Project::find($id);
        $users = User::all();
        $roles = Role::all();
        $projectManagers = $project->users()->wherePivot('role_id', 3)->pluck('user_id')->toArray();
        $developers = $project->users()->wherePivot('role_id', 2)->pluck('user_id')->toArray();
        $status_data = Project::distinct('status')->pluck('status');
        $categories = Project::distinct('project_category')->pluck('project_category');
        return view('admin.projects.edit_project_show', compact('project',  'status_data', 'categories', 'users', 'roles', 'projectManagers', 'developers'));
    }

    public function edit_project(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'project_category' => 'required|string',
            'budget' => 'nullable|numeric',
            'status' => 'required|string',
            'project_managers' => 'required|array',
            'developers' => 'required|array',

        ]);


        $project = Project::findOrFail($request->id);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->project_category = $request->project_category;
        $project->budget = $request->budget;
        $project->status = $request->status;
        $project->save();

        $projectManagers = $request->project_managers;
        $developers = $request->developers;

        // Detach existing project managers and developers
        $project->users()->wherePivot('role_id', 3)->detach();
        $project->users()->wherePivot('role_id', 2)->detach();


        foreach ($projectManagers as $userId) {
            $project->users()->attach($userId, ['role_id' => 3]); // Attach project managers
        }

        foreach ($developers as $userId) {
            $project->users()->attach($userId, ['role_id' => 2]); // Attach developers
        }
        return redirect()->route('projects')->with('success', 'Project updated successfully.');
    }

    public function delete_project($id)
    {
        // dd($id);
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects')->with('success', 'Project deleted successfully');
    }

    public function update_status(Request $request)
    {
        // dd($request->all());
        $project = Project::find($request->id);
        $project->status = $request->status;
        $project->save();
        return redirect()->route('projects')->with('success', 'Project status changed');
    }

    public function update_user(Request $request)
    {
        $project = Project::find($request->project_id);
        // dd($request->project_id);


        $project->users()->wherePivot('role_id', 2)->detach();

        // dd('all users deleted');
        $developers = $request->developers;
        if ($developers == null) {
            return response()->json(['success' => 'User updated successfully.', 'project_user' => $project->users()->wherePivot('role_id', 2)->get()]);
        }
        foreach ($developers as $userId) {
            $project->users()->attach($userId, ['role_id' => 2]); // Attach developers
        }
        return response()->json(['success' => 'User updated successfully.', 'project_user' => $project->users()->wherePivot('role_id', 2)->get()]);
    }

    public function table()
    {
        if (Auth::guard('admin')->check()) {
            $projects = Project::all();
            return view('admin.projects.table', compact('projects'));
        } else if (Auth::guard('web')->check()) {
            $users = Auth::guard('web')->user();
            $project = $users->projectsWithRoles;
            return view('users.table', compact('users', 'project'));
        } else {
            return redirect('/login');
        }
    }
}
