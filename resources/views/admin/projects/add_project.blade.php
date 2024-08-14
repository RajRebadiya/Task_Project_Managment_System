@extends('admin.layout.template')

@section('title', 'Add Project')

<style>
    select {
        width: 100%
    }
</style>
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
                                        <label for="end_date">End Date</label>
                                        <input type="date" class="form-control" value="{{ old('end_date') }}"
                                            id="end_date" name="end_date">
                                        @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="client">Client</label>
                                    <select name="client" id="client" class="form-control">
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->name }}"
                                                {{ old('client') == $client->name ? 'selected' : '' }}>
                                                {{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </select>
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
                                <div>
                                    <label for="project_managers">Project Managers:</label>
                                    <select id="project_managers" multiselect-search="true" multiselect-select-all="true"
                                        name="project_managers[]" multiple>

                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="project_manager_role" name="project_manager_role"
                                        value="3">
                                </div>

                                <div>
                                    <label for="developers">Developers:</label>
                                    <select id="developers" name="developers[]" multiselect-search="true"
                                        multiselect-select-all="true" multiple>

                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="developer_role" name="developer_role" value="2">
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
@endsection
