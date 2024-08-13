@extends('admin.layout.template')

@section('title', 'Project Detail')

@section('content')
    <!-- Main page content body part -->
    <div id="main-content" style='width: calc(100% - 279px);'>
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>View Project Detail</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Extra</li>
                            <li class="breadcrumb-item active">View Project</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Display project details -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h4 class="card-title">Project Information</h4>
                        </div>
                        <div class="card-body">
                            <!-- Project Title -->
                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label font-weight-bold">Project
                                    Title:</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext">{{ $project->title }}</p>
                                </div>
                            </div>

                            <!-- Project Description -->
                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label font-weight-bold">Project
                                    Description:</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext">{{ $project->description }}</p>
                                </div>
                            </div>

                            <!-- Start Date and Due Date -->
                            <div class="form-group row">
                                <label for="start_date" class="col-md-3 col-form-label font-weight-bold">Start Date:</label>
                                <div class="col-md-3">
                                    <p class="form-control-plaintext">{{ $project->start_date }}</p>
                                </div>

                                <label for="due_date" class="col-md-3 col-form-label font-weight-bold">Due Date:</label>
                                <div class="col-md-3">
                                    <p class="form-control-plaintext">{{ $project->due_date }}</p>
                                </div>
                            </div>

                            <!-- Priority -->
                            <div class="form-group row">
                                <label for="priority" class="col-md-3 col-form-label font-weight-bold">Priority:</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext">{{ $project->priority }}</p>
                                </div>
                            </div>

                            <!-- Project Category -->
                            <div class="form-group row">
                                <label for="project_category" class="col-md-3 col-form-label font-weight-bold">Project
                                    Category:</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext">{{ $project->project_category }}</p>
                                </div>
                            </div>

                            <!-- Budget -->
                            <div class="form-group row">
                                <label for="budget" class="col-md-3 col-form-label font-weight-bold">Budget:</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext">{{ $project->budget }}</p>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group row">
                                <label for="status" class="col-md-3 col-form-label font-weight-bold">Status:</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext">{{ $project->status }}</p>
                                </div>
                            </div>

                            <!-- User-Role Section -->
                            <div id="user-role-section">
                                <div class="card mt-4">
                                    <div class="card-header bg-secondary text-white">
                                        <h5 class="card-title">Assigned Users and Roles</h5>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($project->users as $index => $user)
                                            <div class="user-role-pair mb-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="user-select" class="font-weight-bold">User:</label>
                                                        <p class="form-control-plaintext">{{ $user->name }}</p>
                                                    </div>
                                                    {{-- @dd($user->pivot->role_id) --}}
                                                    <div class="col-md-6">
                                                        <label for="role-select" class="font-weight-bold">Role:</label>
                                                        <p class="form-control-plaintext">
                                                            {{ $project->getRoleNameById($user->pivot->role_id) }}
                                                        </p>

                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <a href="{{ route('projects') }}" class="btn btn-secondary mb-2 btn-sm float-right">Back
                                    to Project List</a>
                                <a href="{{ route('project_edit', $project->id) }}"
                                    class="btn btn-primary btn-sm float-right mb-2 mr-2">Edit Project</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
