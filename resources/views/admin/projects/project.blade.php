@extends('admin.layout.template')

@section('title', 'Project')
<link rel="stylesheet" href="assets/vendor/sweetalert/sweetalert.css" />
<style>
    .dropdown-toggle::after {
        display: none;
        /* Hide the default dropdown arrow */
    }

    .dropdown-menu {
        min-width: 160px;
        /* Set minimum width for the dropdown menu */
    }

    .dropdown-item {
        cursor: pointer;
    }

    .dropdown-item.active {
        font-weight: bold;
        color: #fff;
    }

    .bg-success {
        background-color: #28a745 !important;
        /* Green */
    }

    .bg-warning {
        background-color: #ffc107 !important;
        /* Yellow */
    }

    .bg-danger {
        background-color: #dc3545 !important;
        /* Red */
    }

    .bg-secondary {
        background-color: #6c757d !important;
        /* Gray */
    }

    .text-white {
        color: #fff !important;
    }

    .text-dark {
        color: #343a40 !important;
    }
</style>



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
                                            <th>Budget</th>
                                            <th>Client</th>
                                            <th>Team</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $item)
                                            <tr>
                                                <td>
                                                    @php
                                                        $status = $item->status;
                                                        // Define the status colors
                                                        $statusColors = [
                                                            'active' => 'bg-success text-white',
                                                            'completed' => 'bg-dark text-white',
                                                            'on_hold' => 'bg-warning text-dark',
                                                            'pending' => 'bg-danger text-white',
                                                            'active' => 'bg-success text-white',
                                                        ];
                                                        $statusClass =
                                                            $statusColors[$status] ?? 'bg-secondary text-white';
                                                    @endphp

                                                    <!-- Form to update the status -->
                                                    <form action="{{ route('update-status') }}" method="POST"
                                                        class="d-inline">
                                                        @csrf

                                                        <!-- Dropdown for selecting status -->
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn {{ $statusClass }} form-control form-control-sm dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{ ucfirst($status) }}
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                @foreach (['active', 'completed', 'on_hold', 'pending'] as $statusOption)
                                                                    @php
                                                                        $statusOptionClass =
                                                                            $statusColors[$statusOption];
                                                                    @endphp
                                                                    <li>
                                                                        <a class="dropdown-item {{ $status == $statusOption ? 'active ' . $statusOptionClass : $statusOptionClass }}"
                                                                            href="javascript:void(0);"
                                                                            onclick="event.preventDefault(); document.getElementById('status-form-{{ $item->id }}-{{ $statusOption }}').submit();">
                                                                            {{ ucfirst($statusOption) }}
                                                                        </a>
                                                                        <form
                                                                            id="status-form-{{ $item->id }}-{{ $statusOption }}"
                                                                            action="{{ route('update-status') }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                            <input type="hidden" name="status"
                                                                                value="{{ $statusOption }}">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $item->id }}">
                                                                        </form>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </form>
                                                </td>


                                                <td class="project-title">
                                                    <h6><a href="javascript:void(0);">{{ $item->title }}</a></h6>
                                                    <small>{{ $item->start_date }}</small>
                                                </td>
                                                <td>
                                                    {{ $item->end_date }}
                                                </td>
                                                <td>
                                                    {{ $item->budget }}
                                                </td>
                                                <td>
                                                    {{ $item->client }}
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

                                                    <a href="{{ route('project_edit', ['id' => $item->id]) }}"
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
                                                    </form>




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
