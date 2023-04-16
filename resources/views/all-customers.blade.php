@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Customers</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-customers') }}">Customers</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">


                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Customers</h3>

                        </div>
                        <div class="panel-body">
                            <a href="{{ route('add.customer') }}" class="btn btn-md btn-link pull-right">Add New {{ $addNew }}
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                                <br><br>
                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Image</th>
                                                <th>City</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($customer as $cust)

                                            <tr>
                                                <td>{{ $cust->name }}</td>
                                                <td>{{ $cust->phone }}</td>
                                                <td>{{ $cust->address }}</td>
                                                <td>
                                                    @if(isset($cust->photo) && $cust->photo !== '')
                                                    <img src="{{ $cust->photo }}" alt="{{ $cust->name }}" style="height: 70px; width: 70px" class="img-rounded">
                                                  @else
                                                   <h5 class="alert alert-warning">No data available!</h5>
                                                  @endif

                                                </td>
                                                <td>
                                                    @if(isset($cust->city) && $cust->city !== '')
                                                      {{ $cust->city }}
                                                    @else
                                                     <h5 class="alert alert-warning">No data available!</h5>
                                                    @endif
                                                  </td>
                                              <td>
                                                <a href="{{ url('edit-customer/'.$cust->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('view-customer/'.$cust->id) }}" class="btn btn-sm btn-info" title="View Details" >
                                                    <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                  </a>

                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete" title="Delete" module="customer" moduleid="{{ $cust->id }}">
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
