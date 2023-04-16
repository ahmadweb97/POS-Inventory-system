@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <h4 class="pull-left page-title">Today Expenses</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/today-expenses') }}">Expenses</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            @php
                 $date= date("d/m/y");
                $expense=DB::table('expenses')->where('date', $date)->sum('amount')
            @endphp
            <!-- Start Widget -->
            <div class="row">


                <div class="col-md-12">
                    <div>
                        <h4 style="background-color: orangered; color: whitesmoke; font-size: 24px; padding: 5px" align="center">Total: ${{  $expense }}</h4>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Today Expenses</h3>
                        </div>
                        <div class="panel-body">

                            <a href="{{ route('add.expense') }}" class="btn btn-md btn-link pull-right">Add New Expense
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                                <br><br>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Amount($)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($today as $tod)

                                            <tr>
                                                <td>{{$tod->detail }}</td>

                                                <td>{{$tod->amount }}</td>
                                              <td>
                                                <a href="{{ url('edit-today-expenses/'.$tod->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                                                </a>

                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete" title="Delete" module="todayexpense" moduleid="{{$tod->id }}">
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
