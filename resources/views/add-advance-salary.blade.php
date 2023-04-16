@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Advanced salaries for employees</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-advance-salaries') }}">Advance Salary</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">


                         <!-- Basic example -->
                         <div class="col-md-2"></div>
                         <div class="col-md-8">
                            <div class="panel panel-purple">
                                <div class="panel-heading"><h3 class="panel-title  text-white">Advanced Salary Provide</h3></div>
                                <div class="panel-body">

                                    <form role="form" method="post" action="{{ url('/insert-advanced-salary') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            @php
                                                $employee=DB::table('employees')->get()
                                            @endphp
                                        <select name="employee_id" class="form-control" id="">
                                            <option value="0" disabled selected>--Select Employee--</option>
                                            @foreach ($employee as $emp)
                                            <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="month">Month</label>
                                           <select name="month" class="form-control" id="">
                                                 <option value="0" disabled selected>--Select Month --</option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                           </select>
                                           @error('month')
                                           <div class="text text-danger">{{ $message }}</div>
                                         @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="advanced_salary">Advanced Salary for Employee($)</label>
                                            <input type="text" class="form-control" name="advanced_salary" placeholder="Advance Salary">
                                            @error('advanced_salary')
                                            <div class="text text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <input type="text" class="form-control" name="year" placeholder="Advance Salary">
                                            @error('year')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                    </form>
                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->


            </div>
        </div>
    </div>
</div>


@endsection
