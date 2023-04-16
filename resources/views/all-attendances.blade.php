@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Employees Attendances</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-attendances') }}">Attendance</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">


                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Attendances</h3>
                        </div>
                        <div class="panel-body">

                            <a href="{{ route('take.attendances') }}" class="btn btn-md btn-link pull-right">Take {{ $addNew }}
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                                <br><br>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $sn=1 ?>
                                            @foreach ($all_attendances as $all_att)

                                            <tr>
                                                <td>{{$sn++ }}</td>

                                                <td>{{$all_att->edit_date }}</td>
                                              <td>
                                                <a href="{{ url('edit-attendance/'.$all_att->edit_date) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('view-attendance/'.$all_att->edit_date) }}" class="btn btn-sm btn-info" title="View Details">
                                                    <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                </a>

                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete" title="Delete" module="attendance" moduleid="{{$all_att->edit_date }}">
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
