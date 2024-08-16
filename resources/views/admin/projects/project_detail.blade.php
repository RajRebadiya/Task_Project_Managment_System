@extends('admin.layout.template')

@section('title', 'Project Detail')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        .multiselect-dropdown {
            width: 80%;
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

            <div class="col-lg-12 col-md-12">
                <div class="card ">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home">Project
                                    Info</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile">User Detail</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">Task</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="Home">
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
                                        <h4 class="card-title">Developer Details</h4>
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
                            <div class="tab-pane" id="Contact">
                                <div class="card mt-4">
                                    <div class="card-header bg-secondary text-white">
                                        <h4 class="card-title">Task Details</h4>
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
    <script src='{{ url('assets/js/jquery-3.7.1.js') }}'></script>

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
        });
    </script>


@endsection
