<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class AdminController extends Controller
{
    //
    public function projects()
    {
        return view('admin.project');
    }
    public function add_project_show()
    {
        $priorities = Project::distinct('priority')->orderBy('priority', 'asc')->pluck('priority');
        $status_data = Project::distinct('status')->pluck('status');
        $categories = Project::distinct('project_category')->pluck('project_category');
        return view('admin.add_project', compact('priorities', 'status_data', 'categories'));
    }
}
