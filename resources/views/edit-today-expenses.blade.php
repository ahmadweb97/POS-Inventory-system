@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <h4 class="pull-left page-title">Add Expenses</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/today-expenses') }}">Expenses</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                         <!-- Basic example -->
                         <div class="col-md-2"></div>
                         <div class="col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><h3 class="panel-title">Add Expense</h3>

                                </div>

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
                                    <div class="pull-right">
                                        Date: {{ date("d-F-y") }}
                                    </div>
                                    <br>
                                    <div class="pull-right text-dark">
                                        <a href="{{ route('today.expenses') }}" class="btn btn-warning pull-right mb-3">Today
                                        </a>

                                        <a href="{{ route('monthly.expenses') }}" class="btn btn-info pull-right mb-3">This Month</a>

                                    </div>
                                    <br>
                                    <form role="form" method="post" action="{{ url('/update-expense/'.$editTodayExpenses->id) }}" >
                                        @csrf

                                        <div class="form-group">
                                            <label for="detail">Expense Detail</label>
                                         <textarea name="detail" id="" cols="15" rows="5" class="form-control">
                                            {{ $editTodayExpenses->detail }}
                                         </textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Expense Amount($)</label>
                                            <input type="text" class="form-control" name="amount" value="{{ $editTodayExpenses->amount }}">

                                        </div>
                                        <div class="form-group">


                                          <input type="hidden" class="form-control" name="date"  value=" {{ date("d/m/y") }}">

                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="month" value=" {{ date("F") }}">

                                            <input type="hidden" class="form-control" name="year"  value=" {{ date("Y") }}">

                                        </div>



                                        <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                    </form>
                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->


            </div>
        </div>
    </div>
</div>


@endsection
