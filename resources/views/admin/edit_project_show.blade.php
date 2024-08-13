@extends('admin.layout.template')

@section('title', 'Edit Project')

@section('content')
    <!-- Main page content body part -->
    <div id="main-content" style='width: calc(100% - 279px);'>
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Edit Project</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Extra</li>
                            <li class="breadcrumb-item active">Edit Project</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Form to edit an existing project -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('edit_project') }}" method="POST">
                                @csrf
                                <!-- Project Title -->
                                <div class="form-group">
                                    <label for="title">Project Title</label>
                                    <input type="text" class="form-control" value="{{ old('title', $project->title) }}"
                                        id="title" name="title" placeholder="Enter project title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Project Description -->
                                <div class="form-group">
                                    <label for="description">Project Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4"
                                        placeholder="Enter project description">{{ old('description', $project->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <!-- Start Date -->
                                    <div class="col-md-6">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" class="form-control"
                                            value="{{ old('start_date', $project->start_date) }}" id="start_date"
                                            name="start_date">
                                        @error('start_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Due Date -->
                                    <div class="col-md-6">
                                        <label for="due_date">Due Date</label>
                                        <input type="date" class="form-control"
                                            value="{{ old('due_date', $project->due_date) }}" id="due_date"
                                            name="due_date">
                                        @error('due_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Priority -->
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <select class="form-control" id="priority" name="priority">
                                        <option value="low"
                                            {{ old('priority', $project->priority) == 'low' ? 'selected' : '' }}>Low
                                        </option>
                                        <option value="medium"
                                            {{ old('priority', $project->priority) == 'medium' ? 'selected' : '' }}>Medium
                                        </option>
                                        <option value="high"
                                            {{ old('priority', $project->priority) == 'high' ? 'selected' : '' }}>High
                                        </option>
                                        <option value="urgent"
                                            {{ old('priority', $project->priority) == 'urgent' ? 'selected' : '' }}>Urgent
                                        </option>
                                        <option value="critical"
                                            {{ old('priority', $project->priority) == 'critical' ? 'selected' : '' }}>
                                            Critical</option>
                                    </select>
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Project Category -->
                                <div class="form-group">
                                    <label for="project_category">Project Category</label>
                                    <select class="form-control" id="project_category" name="project_category">
                                        <option value="laravel"
                                            {{ old('project_category', $project->project_category) == 'laravel' ? 'selected' : '' }}>
                                            Laravel</option>
                                        <option value="flutter"
                                            {{ old('project_category', $project->project_category) == 'flutter' ? 'selected' : '' }}>
                                            Flutter</option>
                                        <option value="react"
                                            {{ old('project_category', $project->project_category) == 'react' ? 'selected' : '' }}>
                                            React</option>
                                        <option value="nodejs"
                                            {{ old('project_category', $project->project_category) == 'nodejs' ? 'selected' : '' }}>
                                            Node JS</option>
                                        <option value="ui/ux"
                                            {{ old('project_category', $project->project_category) == 'ui/ux' ? 'selected' : '' }}>
                                            UI/UX</option>
                                    </select>
                                    @error('project_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Budget -->
                                <div class="form-group">
                                    <label for="budget">Budget</label>
                                    <input type="number" value="{{ old('budget', $project->budget) }}"
                                        class="form-control" id="budget" name="budget"
                                        placeholder="Enter project budget">
                                    @error('budget')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active"
                                            {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="in_progress"
                                            {{ old('status', $project->status) == 'in_progress' ? 'selected' : '' }}>In
                                            Progress</option>
                                        <option value="completed"
                                            {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <input type="hidden" name="id" value="{{ $project->id }}">

                                <!-- Dynamic User-Role Section -->
                                <div id="user-role-section">
                                    {{-- @dd($project->users); --}}
                                    @foreach ($project->users as $index => $user)
                                        <div class="user-role-pair border p-3 mb-3 rounded">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user-select">Select User</label>
                                                        <select class="form-control user-select"
                                                            name="user_roles[{{ $index }}][user_id]">
                                                            <option value="">Select User</option>
                                                            {{-- @dd($users); --}}
                                                            @foreach ($users as $userOption)
                                                                <option value="{{ $userOption->id }}"
                                                                    {{ $user->id == $userOption->id ? 'selected' : '' }}>
                                                                    {{ $userOption->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error("user_roles.{$index}.user_id")
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="role-select">Assign Role</label>
                                                        <select class="form-control role-select"
                                                            name="user_roles[{{ $index }}][role_id]">
                                                            <option value="">Select Role</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}"
                                                                    {{ $user->pivot->role_id == $role->id ? 'selected' : '' }}>
                                                                    {{ $role->role_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error("user_roles.{$index}.role_id")
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <button type="button"
                                                        class="btn btn-danger js-sweetalert btn-sm delete-btn"> <i
                                                            class="fa fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                                <button type="button" id="add-user-role" class="btn btn-secondary">Add Another User
                                    Role</button>

                                <button type="submit" class="btn btn-primary">Edit Project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let pairCount = {{ $project->users->count() }};

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

    <!-- JavaScript for handling delete functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Confirm deletion
                    if (confirm('Are you sure you want to delete this user-role pair?')) {
                        // Remove the parent .user-role-pair element
                        this.closest('.user-role-pair').remove();
                    }
                });
            });
        });
    </script>
@endsection
