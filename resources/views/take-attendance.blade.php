@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Take Attendances</h4>
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
                            <h3 class="panel-title">Take Attendance</h3>
                        </div>
                        <h3 class="text-success" align="center">Today: {{ date("d F 20y") }}</h3>
                        <div class="panel-body">
                            <div class="panel-body">
                                @if($errors->any())
                                <div class="text text-danger">

                                    <ul>
                                        @foreach ($errors->all() as $error )
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                 @endif
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table {{-- id="datatable"  --}}class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Attendance</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <form action="{{ url('/insert-attendance') }}" method="post">
                                                @csrf
                                                @foreach ($employee as $emp)
                                                <tr>
                                                    <td>{{ $emp->name }}</td>
                                                    <td>
                                                        <img src="{{ $emp->photo }}" alt="{{ $emp->name }}" style="height: 70px; width: 70px" class="img-rounded">
                                                    </td>
                                                    <input type="hidden" name="employee_id[]" value="{{ $emp->id }}">
                                                    <td>
                                                        <input type="radio" name="attendance[{{ $emp->id }}]" value="Present" {{ isset($request->attendance[$emp->id]) && $request->attendance[$emp->id] == "Present" ? "checked" : "" }}> Present
                                                        &nbsp;&nbsp;&nbsp;
                                                        <input type="radio"  name="attendance[{{ $emp->id }}]" value="Absent" {{ !isset($request->attendance[$emp->id]) || $request->attendance[$emp->id] == "Absent" ? "checked" : "" }}> Absent
                                                    </td>
                                              <input type="hidden" name="att_date" value="{{ date("d/m/y") }}">
                                              <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                              <input type="hidden" name="month" value="{{ date("F") }}">

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-success pull-right" >Take Attendance</button>
                                </form>

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
