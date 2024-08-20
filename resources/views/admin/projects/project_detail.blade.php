@extends('admin.layout.template')

@section('title', 'Project Detail')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">



    <style>
        .task-table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        .task-table th,
        .task-table td {
            padding: 10px;
            text-align: left;
        }

        .task-table thead {
            background-color: #f8f8f8;
        }

        .task-table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        .task-table tbody tr:last-child {
            border-bottom: none;
        }

        .task-table .btn {
            border-radius: 4px;
        }

        .add-task {
            text-align: left;
            color: #888;
            cursor: pointer;
        }

        .add-task i {
            margin-right: 5px;
        }

        .task-table .fas {
            margin-right: 5px;
        }

        .btn.btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        s .multiselect-dropdown {
            width: 80%;
        }

        .task-form .btn-icon {
            padding: 6px 10px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .task-form .input-group-text {
            background-color: #f0f0f0;
            border-color: #f0f0f0;
        }

        .task-form .form-control {
            border-color: #f0f0f0;
            padding-left: 1.5rem;
        }

        .task-form .btn-primary {
            padding-left: 20px;
            padding-right: 20px;
        }

        .task-form .btn-light {
            border: none;
            font-weight: bold;
        }

        .card-header {
            padding: 0px 1.25rem;
            margin-bottom: 10px;
            padding-top: 5px;
        }

        .priority-cell {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .dropdown-menu a {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
        }

        .dropdown-menu a:hover {
            background-color: #f0f0f0;
        }

        .due-date-cell {
            position: relative;
        }

        .due-date-input {
            width: 100%;
            box-sizing: border-box;
        }

        .tag-input {
            width: 100%;
            box-sizing: border-box;
        }

        .tag-suggestions {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            list-style: none;
            padding: 0;
            margin: 0;
            z-index: 1000;
        }

        .tag-suggestions li {
            padding: 8px 12px;
            cursor: pointer;
        }

        .tag-suggestions li:hover {
            background-color: #f0f0f0;
        }

        .tag-suggestions .selected {
            background-color: #007bff;
            color: white;
        }

        .task-table td {
            padding: 0;
        }
    </style>
@endsection
@section('content')


    <!-- Main page content body part -->
    <div id="main-content" style='width: calc(100% - 279px);'>
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>View Project Detail</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                        class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Extra</li>
                            <li class="breadcrumb-item active">View Project</li>
                        </ul>
                    </div>
                </div>
            </div>

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="col-lg-12 col-md-12">
                <div class="card ">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#Home">Project
                                    Info</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile">Project Membar</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Contact">Task</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="Home">
                                <!-- Project Information -->
                                <div class="card mt-4">
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
                                            <label for="description"
                                                class="col-md-3 col-form-label font-weight-bold">Project
                                                Description:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-plaintext">{{ $project->description }}</p>
                                            </div>
                                        </div>

                                        <!-- Start Date and Due Date -->
                                        <div class="form-group row">
                                            <label for="start_date" class="col-md-3 col-form-label font-weight-bold">Start
                                                Date:</label>
                                            <div class="col-md-3">
                                                <p class="form-control-plaintext">{{ $project->start_date }}</p>
                                            </div>

                                            <label for="due_date" class="col-md-3 col-form-label font-weight-bold">End
                                                Date:</label>
                                            <div class="col-md-3">
                                                <p class="form-control-plaintext">{{ $project->end_date }}</p>
                                            </div>
                                        </div>

                                        <!-- Project Category -->
                                        <div class="form-group row">
                                            <label for="project_category"
                                                class="col-md-3 col-form-label font-weight-bold">Project Category:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-plaintext">{{ $project->project_category }}</p>
                                            </div>
                                        </div>

                                        <!-- Budget -->
                                        <div class="form-group row">
                                            <label for="budget"
                                                class="col-md-3 col-form-label font-weight-bold">Budget:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-plaintext">{{ $project->budget }}</p>
                                            </div>
                                        </div>

                                        <!-- Status -->
                                        <div class="form-group row">
                                            <label for="status"
                                                class="col-md-3 col-form-label font-weight-bold">Status:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-plaintext">{{ $project->status }}</p>
                                            </div>
                                        </div>

                                        <!-- Back to Project List Button -->
                                        <div class="form-group">
                                            <a href="{{ route('projects') }}"
                                                class="btn btn-secondary btn-sm mb-3 float-right">Back to Project List</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Profile">
                                <!-- Developer Details -->
                                <div class="card mt-4">
                                    <div class="card-header bg-secondary text-white">
                                        <h4 class="card-title">Project Member</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            @foreach ($project->users as $index => $user)
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="body w_user">
                                                            <img class="rounded-circle" style="margin-top: -11px;"
                                                                @if ($project->getRoleNameById($user->pivot->role_id) == 'developer') src="{{ url('assets/images/sm/avatar1.jpg') }}" 
                                    @else 
                                        src="{{ url('assets/images/sm/avatar2.jpg') }}" @endif
                                                                alt="">
                                                            <div class="wid-u-info">
                                                                <h6>{{ $user->name }}</h6>
                                                                <p class="text-muted mb-0">
                                                                    {{ $project->getRoleNameById($user->pivot->role_id) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        @php
                                            $developers = [];
                                            foreach ($project->users as $index => $user) {
                                                if ($project->getRoleNameById($user->pivot->role_id) == 'developer') {
                                                    $developers[] = $user->id;
                                                }
                                            }
                                        @endphp

                                        <!-- Developers Dropdown -->
                                        <div class="form-group" id='developers' style='display: none; width: 80%;'>
                                            <label for="data">Developers:</label>
                                            <select id="data" name="developers[]" multiselect-search='true'
                                                multiselect-select-all='true' multiple="multiple" style="width: 80%;">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ in_array($user->id, $developers) ? 'selected' : '' }}>
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="form-group">
                                            <a class="btn btn-primary btn-sm float-right mb-2 mr-2" id='add-user'>Add or
                                                Remove User</a>
                                            <a class="btn btn-primary btn-sm float-right mb-2 mr-2" style='display: none'
                                                id='update-user'>Update User</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane  show active " id="Contact">
                                <div class="container mt-4">
                                    <div class="card bor" style="border:none;">
                                        <div class="card-header bg-secondary text-white">
                                            <h4 class="card-title">Task</h4>
                                        </div>
                                        <div class="card-body p-0">
                                            <form id='task-form' method='POST' action='{{ route('add-task') }}'
                                                class="task-form d-flex align-items-center">
                                                @csrf
                                                <!-- Task Name -->
                                                <div class="input-group flex-grow-1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title"
                                                        placeholder="Add Task">
                                                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                                                </div>

                                                <!-- Icons representing task attributes -->
                                                {{-- <div class="ml-3 d-flex">
                                                    <button type="button" class="btn btn-light btn-icon mr-2">
                                                        <i class="fa fa-tag"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-icon mr-2">
                                                        <i class="fa fa-user"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-icon mr-2">
                                                        <i class="fa fa-flag"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-icon mr-2">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-icon mr-2">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-icon mr-2">
                                                        <i class="fa fa-bell"></i>
                                                    </button>
                                                </div> --}}

                                                <!-- Cancel and Save Buttons -->
                                                <div class="ml-3 d-flex">
                                                    <button type="reset" class="btn btn-light mr-2">Cancel</button>
                                                    <button type="submit" id='save'
                                                        class="btn btn-primary">Save</button>
                                                </div>
                                            </form>

                                            <!-- Task Table -->
                                            <h5 class="mt-3 text-primary" style='margin: 0px;'>Todo Task</h5>
                                            <div id="todo-section" class="task-design  mar-pad">
                                                <table class="task-table">
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            @if ($item->status == 'todo')
                                                                <tr>
                                                                    <td class='mar-pad' contenteditable="false">
                                                                        {{ $item->title }}</td>
                                                                    <td class="status-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="status-display">{{ ucfirst($item->status) }}</span>
                                                                        <select class="status-select"
                                                                            style="display: none;">
                                                                            <option value="todo"
                                                                                {{ $item->status == 'todo' ? 'selected' : '' }}>
                                                                                Todo</option>
                                                                            <option value="in_progress"
                                                                                {{ $item->status == 'in_progress' ? 'selected' : '' }}>
                                                                                In Progress</option>
                                                                            <option value="completed"
                                                                                {{ $item->status == 'completed' ? 'selected' : '' }}>
                                                                                Completed</option>
                                                                            <option value="uat"
                                                                                {{ $item->status == 'uat' ? 'selected' : '' }}>
                                                                                UAT</option>
                                                                            <option value="rejected"
                                                                                {{ $item->status == 'rejected' ? 'selected' : '' }}>
                                                                                Rejected</option>
                                                                        </select>
                                                                    </td>

                                                                    <td>
                                                                        @php
                                                                            $userCount = count($developers);
                                                                            $displayUsers =
                                                                                $userCount > 3
                                                                                    ? array_slice($developers, 0, 3)
                                                                                    : $developers;
                                                                        @endphp

                                                                        <ul class="list-unstyled team-info d-flex">
                                                                            @foreach ($displayUsers as $userId)
                                                                                @php
                                                                                    $user = $users->firstWhere(
                                                                                        'id',
                                                                                        $userId,
                                                                                    );
                                                                                @endphp
                                                                                @if ($user)
                                                                                    <li style="display: inline-block; cursor: pointer;"
                                                                                        onclick="toggleSelect(this, '{{ $user->id }}')">
                                                                                        <img src="{{ url('assets/images/xs/avatar2.jpg') }}"
                                                                                            alt="{{ $user->name }}"
                                                                                            title="{{ $user->name }}"
                                                                                            style="width: 20px; height: 20px; border-radius: 50%;">
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach

                                                                            @if ($userCount > 3)
                                                                                <span
                                                                                    title="{{ $userCount - 3 }} more users">+{{ $userCount - 3 }}</span>
                                                                            @endif
                                                                        </ul>

                                                                        {{-- <select name="developers[]" id="developers"
                                                                                multiple="multiple" style="display: none;">
                                                                                @foreach ($users as $user)
                                                                                    <option value="{{ $user->id }}"
                                                                                        {{ in_array($user->id, $developers) ? 'selected' : '' }}>
                                                                                        {{ $user->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select> --}}
                                                                    </td>




                                                                    <td id="priority-cell-{{ $item->id }}"
                                                                        class="priority-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        @if ($item->priority == 'low')
                                                                            <i class="fa fa-flag" style="color:blue;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @elseif ($item->priority == 'medium')
                                                                            <i class="fa fa-flag"
                                                                                style="color:orange;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @else
                                                                            <i class="fa fa-flag" style="color:red;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @endif
                                                                        <div class="dropdown-menu"
                                                                            id="priority-dropdown-{{ $item->id }}"
                                                                            style="display: none;">
                                                                            <a href="#" data-priority="low">Low</a>
                                                                            <a href="#"
                                                                                data-priority="medium">Medium</a>
                                                                            <a href="#"
                                                                                data-priority="high">High</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="due-date-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="due-date-display">{{ $item->due_date }}</span>
                                                                        <input type="date" class="due-date-input"
                                                                            value="{{ $item->due_date }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="estimated-time-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <span
                                                                            class="estimated-time-display">{{ $item->estimated_time }}
                                                                            hours</span>
                                                                        <input type="text" class="estimated-time-input"
                                                                            value="{{ $item->estimated_time }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="tag-cell" data-id="{{ $item->id }}">
                                                                        <i class="fa fa-tags"></i>
                                                                        <div class="tag-container">
                                                                            @foreach (explode(',', $item->tag) as $tag)
                                                                                <span
                                                                                    class="tag-item">{{ $tag }}</span>
                                                                            @endforeach
                                                                            <input type="text" class="tag-input"
                                                                                style="display: none;"
                                                                                placeholder="Add tag">
                                                                        </div>
                                                                        <ul class="tag-suggestions"
                                                                            style="display: none;"></ul>
                                                                    </td>




                                                                    <td>
                                                                        <a href='javascript:void(0);'
                                                                            data-url="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            class="btn btn-outline-danger js-sweetalert"
                                                                            data-type="confirm">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>

                                                                        <!-- Hidden form for deletion -->
                                                                        <form id="delete-form-{{ $item->id }}"
                                                                            action="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                            @method('GET')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <h5 style='margin:0px;' class='text-warning'>In Progress</h5>
                                            <div id="in_progress-section" class="task-design ">
                                                <table class="task-table">
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            @if ($item->status == 'in_progress')
                                                                <tr>
                                                                    <td contenteditable="false">{{ $item->title }}</td>
                                                                    <td class="status-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="status-display">{{ ucfirst($item->status) }}</span>
                                                                        <select class="status-select"
                                                                            style="display: none;">
                                                                            <option value="todo"
                                                                                {{ $item->status == 'todo' ? 'selected' : '' }}>
                                                                                Todo</option>
                                                                            <option value="in_progress"
                                                                                {{ $item->status == 'in_progress' ? 'selected' : '' }}>
                                                                                In Progress</option>
                                                                            <option value="completed"
                                                                                {{ $item->status == 'completed' ? 'selected' : '' }}>
                                                                                Completed</option>
                                                                            <option value="uat"
                                                                                {{ $item->status == 'uat' ? 'selected' : '' }}>
                                                                                UAT</option>
                                                                            <option value="rejected"
                                                                                {{ $item->status == 'rejected' ? 'selected' : '' }}>
                                                                                Rejected</option>
                                                                        </select>
                                                                    </td>

                                                                    <td>
                                                                        @php
                                                                            $userCount = count($developers);
                                                                            $displayUsers =
                                                                                $userCount > 3
                                                                                    ? array_slice($developers, 0, 3)
                                                                                    : $developers;
                                                                        @endphp

                                                                        <ul class="list-unstyled team-info d-flex">
                                                                            @foreach ($displayUsers as $userId)
                                                                                @php
                                                                                    $user = $users->firstWhere(
                                                                                        'id',
                                                                                        $userId,
                                                                                    );
                                                                                @endphp
                                                                                @if ($user)
                                                                                    <li style="display: inline-block; cursor: pointer;"
                                                                                        onclick="toggleSelect(this, '{{ $user->id }}')">
                                                                                        <img src="{{ url('assets/images/xs/avatar2.jpg') }}"
                                                                                            alt="{{ $user->name }}"
                                                                                            title="{{ $user->name }}"
                                                                                            style="width: 20px; height: 20px; border-radius: 50%;">
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach

                                                                            @if ($userCount > 3)
                                                                                <span
                                                                                    title="{{ $userCount - 3 }} more users">+{{ $userCount - 3 }}</span>
                                                                            @endif
                                                                        </ul>

                                                                        {{-- <select name="developers[]" id="developers"
                                                                    multiple="multiple" style="display: none;">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}"
                                                                            {{ in_array($user->id, $developers) ? 'selected' : '' }}>
                                                                            {{ $user->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select> --}}
                                                                    </td>




                                                                    <td id="priority-cell-{{ $item->id }}"
                                                                        class="priority-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        @if ($item->priority == 'low')
                                                                            <i class="fa fa-flag" style="color:blue;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @elseif ($item->priority == 'medium')
                                                                            <i class="fa fa-flag"
                                                                                style="color:orange;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @else
                                                                            <i class="fa fa-flag" style="color:red;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @endif
                                                                        <div class="dropdown-menu"
                                                                            id="priority-dropdown-{{ $item->id }}"
                                                                            style="display: none;">
                                                                            <a href="#" data-priority="low">Low</a>
                                                                            <a href="#"
                                                                                data-priority="medium">Medium</a>
                                                                            <a href="#"
                                                                                data-priority="high">High</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="due-date-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="due-date-display">{{ $item->due_date }}</span>
                                                                        <input type="date" class="due-date-input"
                                                                            value="{{ $item->due_date }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="estimated-time-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <span
                                                                            class="estimated-time-display">{{ $item->estimated_time }}
                                                                            hours</span>
                                                                        <input type="text" class="estimated-time-input"
                                                                            value="{{ $item->estimated_time }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="tag-cell" data-id="{{ $item->id }}">
                                                                        <i class="fa fa-tags"></i>
                                                                        <div class="tag-container">
                                                                            @foreach (explode(',', $item->tag) as $tag)
                                                                                <span
                                                                                    class="tag-item">{{ $tag }}</span>
                                                                            @endforeach
                                                                            <input type="text" class="tag-input"
                                                                                style="display: none;"
                                                                                placeholder="Add tag">
                                                                        </div>
                                                                        <ul class="tag-suggestions"
                                                                            style="display: none;"></ul>
                                                                    </td>


                                                                    <td>
                                                                        <a href='javascript:void(0);'
                                                                            data-url="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            class="btn btn-outline-danger js-sweetalert"
                                                                            data-type="confirm">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>

                                                                        <!-- Hidden form for deletion -->
                                                                        <form id="delete-form-{{ $item->id }}"
                                                                            action="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                            @method('GET')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <h5 style='margin: 0px;' class='text-success'>Compeleted Tasks</h5>
                                            <div id="completed-section" class="task-design">
                                                <table class="task-table">
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            @if ($item->status == 'completed')
                                                                <tr>
                                                                    <td contenteditable="false">{{ $item->title }}</td>
                                                                    <td class="status-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="status-display">{{ ucfirst($item->status) }}</span>
                                                                        <select class="status-select"
                                                                            style="display: none;">
                                                                            <option value="todo"
                                                                                {{ $item->status == 'todo' ? 'selected' : '' }}>
                                                                                Todo</option>
                                                                            <option value="in_progress"
                                                                                {{ $item->status == 'in_progress' ? 'selected' : '' }}>
                                                                                In Progress</option>
                                                                            <option value="completed"
                                                                                {{ $item->status == 'completed' ? 'selected' : '' }}>
                                                                                Completed</option>
                                                                            <option value="uat"
                                                                                {{ $item->status == 'uat' ? 'selected' : '' }}>
                                                                                UAT</option>
                                                                            <option value="rejected"
                                                                                {{ $item->status == 'rejected' ? 'selected' : '' }}>
                                                                                Rejected</option>
                                                                        </select>
                                                                    </td>

                                                                    <td>
                                                                        @php
                                                                            $userCount = count($developers);
                                                                            $displayUsers =
                                                                                $userCount > 3
                                                                                    ? array_slice($developers, 0, 3)
                                                                                    : $developers;
                                                                        @endphp

                                                                        <ul class="list-unstyled team-info d-flex">
                                                                            @foreach ($displayUsers as $userId)
                                                                                @php
                                                                                    $user = $users->firstWhere(
                                                                                        'id',
                                                                                        $userId,
                                                                                    );
                                                                                @endphp
                                                                                @if ($user)
                                                                                    <li style="display: inline-block; cursor: pointer;"
                                                                                        onclick="toggleSelect(this, '{{ $user->id }}')">
                                                                                        <img src="{{ url('assets/images/xs/avatar2.jpg') }}"
                                                                                            alt="{{ $user->name }}"
                                                                                            title="{{ $user->name }}"
                                                                                            style="width: 20px; height: 20px; border-radius: 50%;">
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach

                                                                            @if ($userCount > 3)
                                                                                <span
                                                                                    title="{{ $userCount - 3 }} more users">+{{ $userCount - 3 }}</span>
                                                                            @endif
                                                                        </ul>

                                                                        {{-- <select name="developers[]" id="developers"
                                                                    multiple="multiple" style="display: none;">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}"
                                                                            {{ in_array($user->id, $developers) ? 'selected' : '' }}>
                                                                            {{ $user->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select> --}}
                                                                    </td>




                                                                    <td id="priority-cell-{{ $item->id }}"
                                                                        class="priority-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        @if ($item->priority == 'low')
                                                                            <i class="fa fa-flag" style="color:blue;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @elseif ($item->priority == 'medium')
                                                                            <i class="fa fa-flag"
                                                                                style="color:orange;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @else
                                                                            <i class="fa fa-flag" style="color:red;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @endif
                                                                        <div class="dropdown-menu"
                                                                            id="priority-dropdown-{{ $item->id }}"
                                                                            style="display: none;">
                                                                            <a href="#" data-priority="low">Low</a>
                                                                            <a href="#"
                                                                                data-priority="medium">Medium</a>
                                                                            <a href="#"
                                                                                data-priority="high">High</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="due-date-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="due-date-display">{{ $item->due_date }}</span>
                                                                        <input type="date" class="due-date-input"
                                                                            value="{{ $item->due_date }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="estimated-time-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <span
                                                                            class="estimated-time-display">{{ $item->estimated_time }}
                                                                            hours</span>
                                                                        <input type="text" class="estimated-time-input"
                                                                            value="{{ $item->estimated_time }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="tag-cell" data-id="{{ $item->id }}">
                                                                        <i class="fa fa-tags"></i>
                                                                        <div class="tag-container">
                                                                            @foreach (explode(',', $item->tag) as $tag)
                                                                                <span
                                                                                    class="tag-item">{{ $tag }}</span>
                                                                            @endforeach
                                                                            <input type="text" class="tag-input"
                                                                                style="display: none;"
                                                                                placeholder="Add tag">
                                                                        </div>
                                                                        <ul class="tag-suggestions"
                                                                            style="display: none;"></ul>
                                                                    </td>


                                                                    <td>
                                                                        <a href='javascript:void(0);'
                                                                            data-url="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            class="btn btn-outline-danger js-sweetalert"
                                                                            data-type="confirm">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>

                                                                        <!-- Hidden form for deletion -->
                                                                        <form id="delete-form-{{ $item->id }}"
                                                                            action="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                            @method('GET')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <h5 style='margin: 0px' class='text-danger'>Rejected Tasks</h5>
                                            <div id="rejected-section" class="task-design ">
                                                <table class="task-table">
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            @if ($item->status == 'rejected')
                                                                <tr>
                                                                    <td contenteditable="false">{{ $item->title }}</td>
                                                                    <td class="status-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="status-display">{{ ucfirst($item->status) }}</span>
                                                                        <select class="status-select"
                                                                            style="display: none;">
                                                                            <option value="todo"
                                                                                {{ $item->status == 'todo' ? 'selected' : '' }}>
                                                                                Todo</option>
                                                                            <option value="in_progress"
                                                                                {{ $item->status == 'in_progress' ? 'selected' : '' }}>
                                                                                In Progress</option>
                                                                            <option value="completed"
                                                                                {{ $item->status == 'completed' ? 'selected' : '' }}>
                                                                                Completed</option>
                                                                            <option value="uat"
                                                                                {{ $item->status == 'uat' ? 'selected' : '' }}>
                                                                                UAT</option>
                                                                            <option value="rejected"
                                                                                {{ $item->status == 'rejected' ? 'selected' : '' }}>
                                                                                Rejected</option>
                                                                        </select>
                                                                    </td>

                                                                    <td>
                                                                        @php
                                                                            $userCount = count($developers);
                                                                            $displayUsers =
                                                                                $userCount > 3
                                                                                    ? array_slice($developers, 0, 3)
                                                                                    : $developers;
                                                                        @endphp

                                                                        <ul class="list-unstyled team-info d-flex">
                                                                            @foreach ($displayUsers as $userId)
                                                                                @php
                                                                                    $user = $users->firstWhere(
                                                                                        'id',
                                                                                        $userId,
                                                                                    );
                                                                                @endphp
                                                                                @if ($user)
                                                                                    <li style="display: inline-block; cursor: pointer;"
                                                                                        onclick="toggleSelect(this, '{{ $user->id }}')">
                                                                                        <img src="{{ url('assets/images/xs/avatar2.jpg') }}"
                                                                                            alt="{{ $user->name }}"
                                                                                            title="{{ $user->name }}"
                                                                                            style="width: 20px; height: 20px; border-radius: 50%;">
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach

                                                                            @if ($userCount > 3)
                                                                                <span
                                                                                    title="{{ $userCount - 3 }} more users">+{{ $userCount - 3 }}</span>
                                                                            @endif
                                                                        </ul>

                                                                        {{-- <select name="developers[]" id="developers"
                                                                    multiple="multiple" style="display: none;">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}"
                                                                            {{ in_array($user->id, $developers) ? 'selected' : '' }}>
                                                                            {{ $user->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select> --}}
                                                                    </td>




                                                                    <td id="priority-cell-{{ $item->id }}"
                                                                        class="priority-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        @if ($item->priority == 'low')
                                                                            <i class="fa fa-flag" style="color:blue;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @elseif ($item->priority == 'medium')
                                                                            <i class="fa fa-flag"
                                                                                style="color:orange;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @else
                                                                            <i class="fa fa-flag" style="color:red;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @endif
                                                                        <div class="dropdown-menu"
                                                                            id="priority-dropdown-{{ $item->id }}"
                                                                            style="display: none;">
                                                                            <a href="#" data-priority="low">Low</a>
                                                                            <a href="#"
                                                                                data-priority="medium">Medium</a>
                                                                            <a href="#"
                                                                                data-priority="high">High</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="due-date-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="due-date-display">{{ $item->due_date }}</span>
                                                                        <input type="date" class="due-date-input"
                                                                            value="{{ $item->due_date }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="estimated-time-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <span
                                                                            class="estimated-time-display">{{ $item->estimated_time }}
                                                                            hours</span>
                                                                        <input type="text" class="estimated-time-input"
                                                                            value="{{ $item->estimated_time }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="tag-cell" data-id="{{ $item->id }}">
                                                                        <i class="fa fa-tags"></i>
                                                                        <div class="tag-container">
                                                                            @foreach (explode(',', $item->tag) as $tag)
                                                                                <span
                                                                                    class="tag-item">{{ $tag }}</span>
                                                                            @endforeach
                                                                            <input type="text" class="tag-input"
                                                                                style="display: none;"
                                                                                placeholder="Add tag">
                                                                        </div>
                                                                        <ul class="tag-suggestions"
                                                                            style="display: none;"></ul>
                                                                    </td>

                                                                    <td>
                                                                        <a href='javascript:void(0);'
                                                                            data-url="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            class="btn btn-outline-danger js-sweetalert"
                                                                            data-type="confirm">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>

                                                                        <!-- Hidden form for deletion -->
                                                                        <form id="delete-form-{{ $item->id }}"
                                                                            action="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                            @method('GET')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <h5 style='margin: 0px' class='text-secondary'>UAT Tasks</h5>
                                            <div id="uat-section" class="task-design ">
                                                <table class="task-table">
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            @if ($item->status == 'uat')
                                                                <tr>
                                                                    <td contenteditable="false">{{ $item->title }}</td>
                                                                    <td class="status-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="status-display">{{ ucfirst($item->status) }}</span>
                                                                        <select class="status-select"
                                                                            style="display: none;">
                                                                            <option value="todo"
                                                                                {{ $item->status == 'todo' ? 'selected' : '' }}>
                                                                                Todo</option>
                                                                            <option value="in_progress"
                                                                                {{ $item->status == 'in_progress' ? 'selected' : '' }}>
                                                                                In Progress</option>
                                                                            <option value="completed"
                                                                                {{ $item->status == 'completed' ? 'selected' : '' }}>
                                                                                Completed</option>
                                                                            <option value="uat"
                                                                                {{ $item->status == 'uat' ? 'selected' : '' }}>
                                                                                UAT</option>
                                                                            <option value="rejected"
                                                                                {{ $item->status == 'rejected' ? 'selected' : '' }}>
                                                                                Rejected</option>
                                                                        </select>
                                                                    </td>

                                                                    <td>
                                                                        @php
                                                                            $userCount = count($developers);
                                                                            $displayUsers =
                                                                                $userCount > 3
                                                                                    ? array_slice($developers, 0, 3)
                                                                                    : $developers;
                                                                        @endphp

                                                                        <ul class="list-unstyled team-info d-flex">
                                                                            @foreach ($displayUsers as $userId)
                                                                                @php
                                                                                    $user = $users->firstWhere(
                                                                                        'id',
                                                                                        $userId,
                                                                                    );
                                                                                @endphp
                                                                                @if ($user)
                                                                                    <li style="display: inline-block; cursor: pointer;"
                                                                                        onclick="toggleSelect(this, '{{ $user->id }}')">
                                                                                        <img src="{{ url('assets/images/xs/avatar2.jpg') }}"
                                                                                            alt="{{ $user->name }}"
                                                                                            title="{{ $user->name }}"
                                                                                            style="width: 20px; height: 20px; border-radius: 50%;">
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach

                                                                            @if ($userCount > 3)
                                                                                <span
                                                                                    title="{{ $userCount - 3 }} more users">+{{ $userCount - 3 }}</span>
                                                                            @endif
                                                                        </ul>

                                                                        {{-- <select name="developers[]" id="developers"
                                                                            multiple="multiple" style="display: none;">
                                                                            @foreach ($users as $user)
                                                                                <option value="{{ $user->id }}"
                                                                                    {{ in_array($user->id, $developers) ? 'selected' : '' }}>
                                                                                    {{ $user->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select> --}}
                                                                    </td>




                                                                    <td id="priority-cell-{{ $item->id }}"
                                                                        class="priority-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        @if ($item->priority == 'low')
                                                                            <i class="fa fa-flag" style="color:blue;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @elseif ($item->priority == 'medium')
                                                                            <i class="fa fa-flag"
                                                                                style="color:orange;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @else
                                                                            <i class="fa fa-flag" style="color:red;"></i>
                                                                            {{ strtoupper($item->priority) }}
                                                                        @endif
                                                                        <div class="dropdown-menu"
                                                                            id="priority-dropdown-{{ $item->id }}"
                                                                            style="display: none;">
                                                                            <a href="#" data-priority="low">Low</a>
                                                                            <a href="#"
                                                                                data-priority="medium">Medium</a>
                                                                            <a href="#"
                                                                                data-priority="high">High</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="due-date-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <span
                                                                            class="due-date-display">{{ $item->due_date }}</span>
                                                                        <input type="date" class="due-date-input"
                                                                            value="{{ $item->due_date }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="estimated-time-cell"
                                                                        data-id="{{ $item->id }}">
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <span
                                                                            class="estimated-time-display">{{ $item->estimated_time }}
                                                                            hours</span>
                                                                        <input type="text" class="estimated-time-input"
                                                                            value="{{ $item->estimated_time }}"
                                                                            style="display: none;">
                                                                    </td>

                                                                    <td class="tag-cell" data-id="{{ $item->id }}">
                                                                        <i class="fa fa-tags"></i>
                                                                        <div class="tag-container">
                                                                            @foreach (explode(',', $item->tag) as $tag)
                                                                                <span
                                                                                    class="tag-item">{{ $tag }}</span>
                                                                            @endforeach
                                                                            <input type="text" class="tag-input"
                                                                                style="display: none;"
                                                                                placeholder="Add tag">
                                                                        </div>
                                                                        <ul class="tag-suggestions"
                                                                            style="display: none;"></ul>
                                                                    </td>


                                                                    <td>
                                                                        <a href='javascript:void(0);'
                                                                            data-url="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            class="btn btn-outline-danger js-sweetalert"
                                                                            data-type="confirm">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>

                                                                        <!-- Hidden form for deletion -->
                                                                        <form id="delete-form-{{ $item->id }}"
                                                                            action="{{ route('task-delete', ['id' => $item->id]) }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                            @method('GET')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>
    </div>
    <script src='{{ asset('assets/js/jquery-3.7.1.js') }}'></script>
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#add-user').on('click', function() {
                $('#developers').show();
                $('.multiselect-dropdown').css('width', '80%');
                $('#add-user').hide(1000);
                $('#update-user').show(2000);

            });

            $('#update-user').on('click', function() {
                var developers = $('#data').val();

                $.ajax({
                    url: "{{ route('update-user') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        developers: developers,
                        project_id: "{{ $project->id }}",
                    },
                    success: function(data) {
                        window.location.href = "{{ route('projects') }}";
                    },
                    error: function(xhr, status, error) {
                        console.error('Error occurred:', error);
                    }
                });

                $('#developers').hide();
                $('.multiselect-dropdown').css('width', '50%');
                $('#update-user').hide(
                    1000);
                $('#add-user').show(2000);
            });

            const cells = document.querySelectorAll('.priority-cell');

            cells.forEach(cell => {
                cell.addEventListener('click', function() {
                    const dropdown = document.getElementById('priority-dropdown-' + this.dataset
                        .id);
                    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
                });
            });

            document.querySelectorAll('.dropdown-menu a').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const cellId = this.closest('.priority-cell').dataset.id;
                    const priority = this.dataset.priority;
                    const cell = document.getElementById('priority-cell-' + cellId);
                    const dropdown = document.getElementById('priority-dropdown-' + cellId);

                    // Update the priority display
                    let color;
                    if (priority === 'low') color = 'blue';
                    else if (priority === 'medium') color = 'orange';
                    else color = 'red';

                    cell.innerHTML =
                        `<i class="fa fa-flag" style="color:${color};"></i> ${priority.toUpperCase()}`;
                    dropdown.style.display = 'none';

                    // Send an AJAX request to update the priority in the database
                    $.ajax({
                        url: '{{ route('update-priority') }}', // Use your route name here
                        method: 'POST',
                        data: {
                            id: cellId,
                            priority: priority,
                            project_id: "{{ $project->id }}",
                            _token: $('meta[name="csrf-token"]').attr(
                                'content') // CSRF token
                        },
                        success: function(response) {
                            // Optionally handle the response if needed
                            console.log('Priority updated:', response);
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                        }
                    });
                });
            });

            // Close dropdown if clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.priority-cell')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.style.display = 'none';
                    });
                }
            });

            const sells = document.querySelectorAll('.due-date-cell');

            sells.forEach(cell => {
                cell.addEventListener('click', function() {
                    const display = this.querySelector('.due-date-display');
                    const input = this.querySelector('.due-date-input');

                    // Toggle between display and input
                    if (input.style.display === 'none') {
                        input.style.display = 'block';
                        display.style.display = 'none';
                        input.focus();
                    } else {
                        input.style.display = 'none';
                        display.style.display = 'block';
                    }
                });

                const input = cell.querySelector('.due-date-input');
                input.addEventListener('change', function() {
                    const cellId = cell.dataset.id;
                    const newDueDate = this.value;
                    const display = cell.querySelector('.due-date-display');

                    // Update the display with the new value
                    display.textContent = newDueDate;

                    // Send an AJAX request to update the due date in the database
                    $.ajax({
                        url: '{{ route('update-due_date') }}', // Use your route name here
                        method: 'POST',
                        data: {
                            id: cellId,
                            due_date: newDueDate,
                            project_id: "{{ $project->id }}",
                            _token: $('meta[name="csrf-token"]').attr(
                                'content') // CSRF token
                        },
                        success: function(response) {
                            // Optionally handle the response if needed
                            console.log('Due date updated:', response);
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                        }
                    });
                });
            });

            // Close input if clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.due-date-cell')) {
                    document.querySelectorAll('.due-date-input').forEach(input => {
                        input.style.display = 'none';
                        const display = input.closest('.due-date-cell').querySelector(
                            '.due-date-display');
                        display.style.display = 'block';
                    });
                }
            });
            const times = document.querySelectorAll('.estimated-time-cell');

            times.forEach(cell => {
                const input = cell.querySelector('.estimated-time-input');
                const display = cell.querySelector('.estimated-time-display');

                cell.addEventListener('click', function() {
                    input.style.display = 'block';
                    display.style.display = 'none';
                    input.focus();
                });

                input.addEventListener('blur', function() {
                    const newValue = this.value.trim();
                    if (newValue && newValue !== display.textContent.replace(' hours', '')) {
                        updateEstimatedTime(newValue);
                    } else {
                        // Revert to display if no changes or invalid input
                        input.style.display = 'none';
                        display.style.display = 'block';
                    }
                });

                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        this.blur(); // Trigger blur to save changes
                    }
                });

                function updateEstimatedTime(newValue) {
                    // Update the display
                    display.textContent = `${newValue} hours`;
                    input.style.display = 'none';
                    display.style.display = 'block';

                    // Send AJAX request to update the estimated time in the database
                    $.ajax({
                        url: '{{ route('update-estimated_time') }}', // Your route to update estimated time
                        method: 'POST',
                        data: {
                            id: cell.dataset.id,
                            estimated_time: newValue,
                            project_id: "{{ $project->id }}",
                            _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                        },
                        success: function(response) {
                            console.log('Estimated time updated:', response);
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                        }
                    });
                }
            });

            // Close input if clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.estimated-time-cell')) {
                    document.querySelectorAll('.estimated-time-input').forEach(input => {
                        input.style.display = 'none';
                        const display = input.closest('.estimated-time-cell').querySelector(
                            '.estimated-time-display');
                        display.style.display = 'block';
                    });
                }
            });

            document.querySelectorAll('.status-cell').forEach(function(cell) {
                const statusDisplay = cell.querySelector('.status-display');
                const statusSelect = cell.querySelector('.status-select');

                // Show dropdown on click
                statusDisplay.addEventListener('click', function() {
                    statusDisplay.style.display = 'none';
                    statusSelect.style.display = 'inline-block';
                });

                // Handle status change
                statusSelect.addEventListener('change', function() {
                    const taskId = cell.getAttribute('data-id');
                    const newStatus = statusSelect.value;

                    // Update the status via AJAX
                    $.ajax({
                        url: `{{ route('update-task-status') }}`,
                        type: 'POST',
                        data: {
                            id: taskId,
                            status: newStatus,
                            project_id: "{{ $project->id }}",
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log('Status updated:', response);

                            if (response.success) {
                                // Move the task to the corresponding section
                                const taskRow = cell.closest('tr');
                                const targetSection = document.querySelector(
                                    `#${newStatus}-section .task-table tbody`);
                                targetSection.appendChild(taskRow);

                                // Reset the dropdown
                                statusSelect.style.display = 'none';
                                statusDisplay.textContent = statusSelect.options[
                                    statusSelect.selectedIndex].text;
                                statusDisplay.style.display = 'inline-block';
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating status:', error);
                        }
                    });
                });
            });


            document.querySelectorAll('.js-sweetalert').forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default action
                    const url = this.getAttribute('data-url'); // Get the URL from data attribute
                    const formId = 'delete-form-' + url.split('/')
                        .pop(); // Generate form ID based on URL
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(formId)
                                .submit(); // Submit the form if confirmed
                        }
                    });
                });
            });

            const tags = document.querySelectorAll('.tag-cell');

            tags.forEach(cell => {
                const input = cell.querySelector('.tag-input');
                const display = cell.querySelector('.tag-display');
                const suggestions = cell.querySelector('.tag-suggestions');
                const tagContainer = cell.querySelector('.tag-container');
                let selectedIndex = -1;

                cell.addEventListener('click', function() {
                    input.style.display = 'block';
                    display.style.display = 'none';
                    input.focus();
                });

                input.addEventListener('input', function() {
                    const query = this.value.trim();

                    if (query.length > 0) {
                        $.ajax({
                            url: '{{ route('get-tags') }}', // Your route to get tag suggestions
                            method: 'GET',
                            data: {
                                query: query
                            },
                            success: function(response) {
                                suggestions.innerHTML = '';
                                selectedIndex = -1;
                                response.tags.forEach((tag, index) => {
                                    const li = document.createElement('li');
                                    li.textContent = tag.name;
                                    li.dataset.index = index;
                                    li.addEventListener('click', function() {
                                        addTagToTask(query, tag.name);
                                    });
                                    suggestions.appendChild(li);
                                });
                                suggestions.style.display = 'block';
                            },
                            error: function(xhr) {
                                console.error('Error:', xhr.responseText);
                            }
                        });
                    } else {
                        suggestions.style.display = 'none';
                    }
                });

                input.addEventListener('keydown', function(e) {
                    const items = suggestions.querySelectorAll('li');

                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        if (selectedIndex < items.length - 1) {
                            selectedIndex++;
                            updateSelection();
                        }
                    } else if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        if (selectedIndex > 0) {
                            selectedIndex--;
                            updateSelection();
                        }
                    } else if (e.key === 'Enter') {
                        e.preventDefault();
                        if (selectedIndex >= 0 && selectedIndex < items.length) {
                            addTagToTask(getTags(tagContainer), items[selectedIndex].textContent);
                        }
                    }
                });

                function updateSelection() {
                    const items = suggestions.querySelectorAll('li');
                    items.forEach(item => item.classList.remove('selected'));
                    if (selectedIndex >= 0 && selectedIndex < items.length) {
                        items[selectedIndex].classList.add('selected');
                        items[selectedIndex].scrollIntoView({
                            block: 'nearest'
                        });
                    }
                }

                function addTagToTask(currentTags, newTag = null) {
                    const tag = newTag || input.value.trim();
                    if (!tag) return;

                    // Check if the tag is already present
                    if (currentTags.includes(tag)) {
                        input.value = ''; // Clear the input field
                        return;
                    }

                    // Update the UI to add the new tag
                    $('<span class="tag-item">' + tag + '</span>').insertBefore(input);
                    input.value = '';

                    // Update the tags via AJAX
                    updateTaskTags(cell.dataset.id, getTags(tagContainer));
                }

                // AJAX request to update tags in the database
                function updateTaskTags(taskId, tags) {
                    $.ajax({
                        url: '{{ route('update-task-tags') }}',
                        type: 'POST',
                        data: {
                            id: taskId,
                            tags: tags.join(','),
                            project_id: '{{ $project->id }}',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success('Tags updated successfully.');
                        },
                        error: function(xhr) {
                            toastr.error('Failed to update tags.');
                        }
                    });
                }

                // Utility function to get current tags from the UI
                function getTags($tagContainer) {
                    const tags = [];
                    $($tagContainer).find('.tag-item').each(function() {
                        tags.push($(this).text().trim());
                    });
                    return tags;
                }
            });

            // Close input if clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.tag-cell')) {
                    document.querySelectorAll('.tag-input').forEach(input => {
                        input.style.display = 'none';
                        const display = input.closest('.tag-cell').querySelector('.tag-display');
                        display.style.display = 'block';
                    });
                }
            });

        });
    </script>



@endsection
