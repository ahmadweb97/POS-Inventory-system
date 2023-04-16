@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Deliverd Orders</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/delivered/order') }}">Orders(Delivered)</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">


                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Delivered Orders</h3>

                        </div>
                        <div class="panel-body">


                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Date</th>
                                                <th>Quantity</th>
                                                <th>Total Amount($)</th>
                                                <th>Payment Status</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($delivered as $del)

                                            <tr>
                                                <td>{{ $del->name }}</td>
                                                <td>{{ $del->order_date }}</td>
                                                <td>{{ $del->total_products }}</td>
                                                    <td>{{ $del->total }}</td>
                                                    <td>{{ $del->payment_status }}</td>
                                                    <td><span class="badge badge-success"> {{ $del->order_status }}</span></td>

                                              <td>
                                           {{--      <a href="{{ url('edit-product/'.$del->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                                                </a> --}}
                                                <a href="{{ url('view-order-status/'.$del->id) }}" class="btn btn-sm btn-info" title="View Details" >
                                                    <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                  </a>

                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete" title="Delete" module="delivered" moduleid="{{ $del->id }}">
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
