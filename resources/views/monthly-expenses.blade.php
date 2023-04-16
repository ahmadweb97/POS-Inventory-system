@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <h4 class="pull-left page-title">View All Monthly Expenses ({{ date("Y") }})</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/monthly-expenses') }}">Expenses</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div>
                <a href="{{ route('january.expenses') }}" class="btn btn-sm btn-info">January</a>
                <a href="{{ route('february.expenses') }}" class="btn btn-sm btn-danger">February</a>
                <a href="{{ route('march.expenses') }}" class="btn btn-sm btn-success">March</a>
                <a href="{{ route('april.expenses') }}" class="btn btn-sm btn-primary">April</a>
                <a href="{{ route('may.expenses') }}" class="btn btn-sm btn-warning">May</a>
                <a href="{{ route('june.expenses') }}" class="btn btn-sm btn-purple">June</a>
                <a href="{{ route('july.expenses') }}" class="btn btn-sm btn-default">July</a>
                <a href="{{ route('august.expenses') }}" class="btn btn-sm btn-pink">August</a>
                <a href="{{ route('september.expenses') }}" class="btn btn-sm btn-inverse">September</a>
                <a href="{{ route('october.expenses') }}" class="btn btn-sm btn-danger">October</a>
                <a href="{{ route('november.expenses') }}" class="btn btn-sm btn-warning">November</a>
                <a href="{{ route('december.expenses') }}" class="btn btn-sm btn-purple">December</a>

            </div>

        {{--     @php
                 $month= date("F");
                $total=DB::table('expenses')->where('month', $month)->sum('amount')
            @endphp --}}
            <!-- Start Widget -->
            <div class="row">


                <div class="col-md-12">
                    <div>

                        <h4 style="background-color: orangered; color: whitesmoke; font-size: 24px; padding: 5px" align="center">Total: ${{  $total }}</h4>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" style="width: 50%" align="center">
                            <h3 class="panel-title bg bg-success text-white" >Monthly All Expenses</h3>
                        </div>
                        <div class="panel-body">


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Amount($)</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($monthly as $mon)

                                            <tr>
                                                <td>{{$mon->detail }}</td>

                                                <td>{{$mon->amount }}</td>
                                                <td>{{$mon->date }}</td>
                                                <td>
                                                    <a href="{{ url('edit-monthly-expenses/'.$mon->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                                                    </a>

                                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete" title="Delete" module="monthlyexpense" moduleid="{{$mon->id }}">
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
