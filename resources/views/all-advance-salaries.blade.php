@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Advanced Salary for employees</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-employees') }}">Employees</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">


                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Advanced Salary</h3>
                        </div>
                        <div class="panel-body">

                            <a href="{{ route('add.advanceSalary') }}" class="btn btn-md btn-link pull-right">Add New {{ $addNew }}
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                                <br><br>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Salary($)</th>
                                                <th>Month</th>
                                                <th>Advanced</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($salary as $sal)

                                            <tr>
                                                <td>{{ $sal->name }}</td>
                                                <td>
                                                    <img src="{{ $sal->photo }}" alt="{{ $sal->name }}" style="height: 70px; width: 70px" class="img-rounded">
                                                </td>
                                                <td>{{ $sal->salary }}</td>
                                                <td>{{ $sal->month }}</td>
                                                <td>{{ $sal->advanced_salary }}</td>
                                              <td>
                                                <a href="{{ url('edit-employee/'.$sal->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('view-employee/'.$sal->id) }}" class="btn btn-sm btn-info" title="View Details" >
                                                    <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                  </a>

                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete" title="Delete" module="advance_salary" moduleid="{{ $sal->id }}">
                                                  <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                                </a>

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
    </div>
</div>

@endsection
