@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"> Edit Employee Attendances</h4>
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
                            <h3 class="panel-title">Edit Attendance</h3>
                        </div>
                        <h3 class="text-success" align="center">Edit Attendance ({{ $date->att_date }})</h3>
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
                                            <form action="{{ url('/update-attendance/'.$editAttendance[0]->edit_date) }}" method="post">
                                                @csrf
                                                @foreach ($editAttendance as $empAtt)
                                                <tr>
                                                    <td>{{ $empAtt->name }}</td>
                                                    <td>
                                                        <img src="{{ url($empAtt->photo) }}" alt="{{ $empAtt->name }}" style="height: 70px; width: 70px" class="img-rounded">
                                                    </td>
                                                    <input type="hidden" name="id[]" value="{{ $empAtt->id }}">
                                                    <td>
                                                        <input type="radio" name="attendance[{{ $empAtt->id }}]" value="Present" <?php if ($empAtt->attendance == 'Present') { echo "checked"; } ?>> Present
                                                        &nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="attendance[{{ $empAtt->id }}]" value="Absent" <?php if ($empAtt->attendance == 'Absent') { echo "checked"; } ?>> Absent
                                                    </td>
                                                             <input type="hidden" name="att_date" value="{{ $editAttendance[0]->att_date }}">
                                                <input type="hidden" name="att_year" value="{{ $editAttendance[0]->att_year }}">
                                                <input type="hidden" name="month" value="{{ $editAttendance[0]->month }}">
                                                </tr>
                                                @endforeach

                                                <button type="submit" class="btn btn-success pull-right">Update Attendance</button> <br><br>
                                            </form>
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
