<?php

namespace App\Http\Controllers;

use App\Models\Project;

class AdminController extends Controller
{
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
