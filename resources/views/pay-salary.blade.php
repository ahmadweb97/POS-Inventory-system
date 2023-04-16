@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">All Salaries for employees</h4>

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
                            <h3 class="panel-title" >Pay Salary  <span class="pull-right text-success">{{ date("F Y") }}</span></h3>
                        </div>
                        <div class="panel-body">

                         {{--    <a href="{{ route('add.advanceSalary') }}" class="btn btn-md btn-link pull-right">Add New {{ $addNew }}
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </a> --}}
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


                                  {{--        @php
                                        $month = date("F", strtotime('-1 month'));

                                        $empSalary=DB::table('advance_salaries')
                                        ->join('employees', 'advance_salaries.employee_id', 'employees.id')
                                        ->select('advance_salaries.*','employees.name', 'employees.salary', 'employees.photo')
                                        ->where('month', $month)
                                        ->get();
                                        @endphp --}}

                                        <tbody>
                                            @foreach ($employee as $emp)

                                            <tr>
                                                <td>{{ $emp->name }}</td>
                                                <td>
                                                    <img src="{{ $emp->photo }}" alt="{{ $emp->name }}" style="height: 70px; width: 70px" class="img-rounded">
                                                </td>
                                                <td>{{ $emp->salary }}</td>
                                                <td> <span class="badge badge-success">{{ date("F", strtotime('-1 months')) }}</span>
                                                </td>
                                                <td>
                                                @foreach($empSalary as $salary)
                                                <div class="employee">
                                                    <p> ${{ $salary->advanced_salary }}</p>
                                                </div>
                                            @endforeach
                                        </td>
                                              <td>
                                                <a href="" class="btn btn-sm btn-success" title="Pay Now">
                                                    <i class="fa fa-money fa-lg" aria-hidden="true"></i>
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
