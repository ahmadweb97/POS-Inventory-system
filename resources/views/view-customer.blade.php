@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-customers') }}">Customers</a></li>
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
                                <div class="panel-heading"><h3 class="panel-title">View Customer Details</h3></div>
                                <div class="panel-body">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                           <p>{{ $singleCustomer->name }}</p>

                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                         <p>{{ $singleCustomer->email }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                         <p>{{ $singleCustomer->phone }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>

                                           <p>{{ $singleCustomer->address }}</p>

                                        </div>
                                        <div class="form-group">
                                            <label for="experience">Shop Name</label>
                                            @if ($singleCustomer->shop_name == NULL)
                                            <h5 class="text text-warning">No data available!</h5>
                                            @else
                                            <p>{{ $singleCustomer->shop_name }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="account_holder">Account Holder</label>

                                            @if ($singleCustomer->account_holder == NULL)
                                            <h5 class="text text-warning">No data available!</h5>
                                            @else
                                            <p>{{ $singleCustomer->account_holder }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label for="account_number">Account Number</label>

                                            @if ($singleCustomer->account_number == NULL)
                                            <h5 class="text text-warning">No data available!</h5>
                                            @else
                                            <p>{{ $singleCustomer->account_number }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name </label>


                                            @if ($singleCustomer->bank_name == NULL)
                                            <h5 class="text text-warning">No data available!</h5>
                                            @else
                                            <p>{{ $singleCustomer->bank_name }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_branch">Branch Name</label>


                                            @if ($singleCustomer->bank_branch == NULL)
                                            <h5 class="text text-warning">No data available!</h5>
                                            @else
                                            <p>{{ $singleCustomer->bank_branch }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>


                                            @if ($singleCustomer->city == NULL)
                                            <h5 class="text text-warning">No data available!</h5>
                                            @else
                                            <p>{{ $singleCustomer->city }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Photo</label>

                                        </div>
                                        @if ($singleCustomer->photo == NULL)
                                        <h5 class="text text-warning">No data available!</h5>
                                        @else
                                        <img id="image" src="{{ URL::to($singleCustomer->photo) }}" width="150" height="150" alt="" class="img-rounded">
                                        @endif

                                    </div>

                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->
            </div>
        </div>
    </div>
</div>


<script>

</script>

@endsection
