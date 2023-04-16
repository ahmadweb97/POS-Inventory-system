@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <h4 class="pull-left page-title">View All Yearly Expenses</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/yearly-expenses') }}">Expenses</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            @php
                 $year= date("Y");
                $total=DB::table('expenses')->where('year', $year)->sum('amount')
            @endphp
            <!-- Start Widget -->
            <div class="row">


                <div class="col-md-12">
                    <div>
                        <h4 style="background-color: orangered; color: whitesmoke; font-size: 24px; padding: 5px" align="center">Total: ${{  $total }}</h4>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" style="width: 50%" align="center">
                            <h3 class="panel-title bg bg-warning text-dark" >({{ date("Y") }}) All Expenses</h3>
                        </div>
                        <div class="panel-body">


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Amount($)</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($yearly as $year)

                                            <tr>
                                                <td>{{$year->detail }}</td>

                                                <td>{{$year->amount }}</td>

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
