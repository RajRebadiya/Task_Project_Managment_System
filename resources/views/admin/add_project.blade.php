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
                                    <textarea class="form-control" id="description" name="description" rows="4"
                                        placeholder="Enter project description">{{ old('description') }}</textarea>
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
                                    <select class="form-control" id="priority" name="priority">
                                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium
                                        </option>
                                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High
                                        </option>
                                        <option value="urgent" {{ old('priority') == 'urgent' ? 'selected' : '' }}>
                                            Urgent</option>
                                        <option value="critical" {{ old('priority') == 'critical' ? 'selected' : '' }}>
                                            Critical</option>

                                    </select>
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="project_category">Project Category</label>
                                    <select class="form-control" id="project_category" name="project_category">
                                        <option value="laravel"
                                            {{ old('project_category') == 'laravel' ? 'selected' : '' }}>Laravel
                                        </option>
                                        <option value="flutter"
                                            {{ old('project_category') == 'flutter' ? 'selected' : '' }}>
                                            Flutter</option>
                                        <option value="react" {{ old('project_category') == 'react' ? 'selected' : '' }}>
                                            React
                                        </option>
                                        <option value='nodejs' {{ old('project_category') == 'nodejs' ? 'selected' : '' }}>
                                            Node JS</option>
                                        <option value='ui/ux' {{ old('project_category') == 'ui/ux' ? 'selected' : '' }}>
                                            UI/UX</option>
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
                                    <select class="form-control" id="status" name="status">
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>
                                            In Progress</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
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
                                                    <select class="form-control user-select" name="user_roles[0][user_id]">
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
                                                    <select class="form-control role-select"
                                                        name="user_roles[0][role_id]">
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
