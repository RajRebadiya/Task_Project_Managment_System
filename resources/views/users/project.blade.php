@extends('users.layout.template')

@section('title', 'Project')

@section('content')
    <!-- mani page content body part -->
    <div id="main-content" style='width: calc(100% - 279px);'>
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Projects List</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                            <li class="breadcrumb-item">Extra</li>
                            <li class="breadcrumb-item active">Projects List</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">

                                <button type="button" class="btn btn-secondary"><i class="fa fa-plus"></i><a
                                        href="{{ route('add_project_show') }}" class='text-white'>Add Project</a></button>
                            </div>
                            <div class="p-2 d-flex">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body project_report">
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Status</th>
                                            <th>Project</th>
                                            <th>Due Date</th>
                                            <th>Role</th>
                                            <th>Priority</th>
                                            <th>Team</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($project as $item)
                                            <tr>
                                                <td>
                                                    @php
                                                        $status = $item->status;
                                                    @endphp

                                                    <span
                                                        class="badge 
                                                        @if ($status == 'active') badge-primary
                                                        @elseif($status == 'completed')
                                                            badge-success
                                                        @elseif($status == 'in_progress')
                                                            badge-warning
                                                        @else
                                                            badge-secondary @endif
                                                    ">
                                                        {{ $status }}
                                                    </span>
                                                </td>
                                                <td class="project-title">
                                                    <h6><a href="javascript:void(0);">{{ $item->title }}</a></h6>
                                                    <small>{{ $item->start_date }}</small>
                                                </td>
                                                <td>
                                                    {{ $item->due_date }}
                                                </td>
                                                <td>
                                                    {{ $item->role_name }}
                                                </td>
                                                <td>
                                                    @php
                                                        $priority = $item->priority;
                                                    @endphp

                                                    <!-- Define the color codes or labels for each priority level -->
                                                    <span class="priority-level priority-{{ $priority }}">
                                                        @switch($priority)
                                                            @case('low')
                                                                Low
                                                            @break

                                                            @case('medium')
                                                                Medium
                                                            @break

                                                            @case('high')
                                                                High
                                                            @break

                                                            @case('urgent')
                                                                Urgent
                                                            @break

                                                            @case('critical')
                                                                Critical
                                                            @break

                                                            @default
                                                                Unknown
                                                        @endswitch
                                                    </span>
                                                </td>

                                                <td>
                                                    <ul class="list-unstyled team-info">
                                                        <li><img src="{{ url('assets/images/xs/avatar1.jpg') }}"
                                                                alt="Avatar">
                                                        </li>
                                                        <li><img src="{{ url('assets/images/xs/avatar2.jpg') }}"
                                                                alt="Avatar">
                                                        </li>
                                                        <li><img src="{{ url('assets/images/xs/avatar3.jpg') }}"
                                                                alt="Avatar">
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="project-actions">
                                                    <a href="{{ route('project_detail', ['id' => $item->id]) }}"
                                                        class="btn btn-outline-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    {{-- <a href="{{ route('project_edit', ['id' => $item->id]) }}"
                                                        class="btn btn-outline-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-danger js-sweetalert" data-type="confirm"
                                                        data-url="{{ route('delete_project', ['id' => $item->id]) }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    <!-- Hidden form for deletion -->
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('delete_project', ['id' => $item->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('GET')
                                                    </form> --}}




                                                </td>
                                            </tr>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
@endsection
