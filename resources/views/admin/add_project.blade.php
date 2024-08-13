@extends('admin.layout.template')

@section('title', 'Add Project')

@section('content')
    <!-- Main page content body part -->
    <div id="main-content" style='width: calc(100% - 279px);'>
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Add Project</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                            <li class="breadcrumb-item">Extra</li>
                            <li class="breadcrumb-item active">Add Project</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Form to add a new project -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('add_project') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Project Title</label>
                                    <input type="text" class="form-control" value='{{ old('title') }}' id="title"
                                        name="title" placeholder="Enter project title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Project Description</label>
                                    <textarea class="form-control" id="description" value='{{ old('description') }}' name="description" rows="4"
                                        placeholder="Enter project description"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" class="form-control" value="{{ old('start_date') }}"
                                            id="start_date" name="start_date">

                                        @error('start_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="due_date">Due Date</label>
                                        <input type="date" class="form-control" value="{{ old('due_date') }}"
                                            id="due_date" name="due_date">

                                        @error('due_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <select class="form-control" id="priority" value='{{ old('priority') }}'
                                        name="priority">
                                        <option value="">Select priority</option>
                                        @foreach ($priorities as $priority)
                                            <option value="{{ $priority }}">{{ $priority }}</option>
                                        @endforeach
                                    </select>
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="project_category">Project Category</label>
                                    <select class="form-control" value='{{ old('project_category') }}'
                                        id="project_category" name="project_category">
                                        <option value="">Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                    @error('project_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="budget">Budget</label>
                                    <input type="number" value='{{ old('budget') }}' class="form-control" id="budget"
                                        name="budget" placeholder="Enter project budget">
                                    @error('budget')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" value='{{ old('status') }}' id="status" name="status">
                                        <option value="">Select status</option>
                                        @foreach ($status_data as $status)
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Dynamic User-Role Selection -->
                                <div id="user-role-section">
                                    <div class="user-role-pair">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="user-select">Select User</label>
                                                    <select class="form-control user-select" value='{{ old('user_id') }}'
                                                        name="user_roles[0][user_id]">
                                                        <option value="">Select User</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_roles.0.user_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role-select">Assign Role</label>
                                                    <select class="form-control role-select" name="user_roles[0][role_id]"
                                                        value='{{ old('role_id') }}'>
                                                        <option value="">Select Role</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->role_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_roles.0.role_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="add-user-role" class="btn btn-secondary">Add Another User
                                    Role</button>

                                <button type="submit" class="btn btn-primary">Add Project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let pairCount = 1;

            document.getElementById('add-user-role').addEventListener('click', function() {
                const container = document.getElementById('user-role-section');

                // Create a new user-role pair
                const newPair = document.createElement('div');
                newPair.classList.add('user-role-pair');
                newPair.innerHTML = `
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-select">Select User</label>
                                <select class="form-control user-select" name="user_roles[${pairCount}][user_id]" >
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role-select">Assign Role</label>
                                <select class="form-control role-select" name="user_roles[${pairCount}][role_id]" >
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                `;

                container.appendChild(newPair);
                pairCount++;
            });
        });
    </script>

@endsection
