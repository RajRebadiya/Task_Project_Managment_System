@extends('admin.layout.template')

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
                                            <th>Prograss</th>
                                            <th>Team</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="badge badge-success">Active</span>
                                            </td>
                                            <td class="project-title">
                                                <h6><a href="javascript:void(0);">InfiniO 4.1</a></h6>
                                                <small>Created 14.Mar.2018</small>
                                            </td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="48"
                                                        aria-valuemin="0" aria-valuemax="100" style="width: 48%;"></div>
                                                </div>
                                                <small>Completion with: 48%</small>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled team-info">
                                                    <li><img src="{{ url('assets/images/xs/avatar1.jpg') }}" alt="Avatar">
                                                    </li>
                                                    <li><img src="{{ url('assets/images/xs/avatar2.jpg') }}" alt="Avatar">
                                                    </li>
                                                    <li><img src="{{ url('assets/images/xs/avatar3.jpg') }}" alt="Avatar">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project-actions">
                                                <a href="javascript:void(0);" class="btn btn-outline-danger"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                                        class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
