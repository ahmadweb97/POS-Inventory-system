@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Products</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-products') }}">Products</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">


                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Products</h3>

                        </div>
                        <div class="panel-body">
                            <a href="{{ route('add.product') }}" class="btn btn-md btn-link pull-right">Add New {{ $addNew }}
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                                <br><br>
                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Code</th>
                                                <th>Selling Price</th>
                                                <th>Image</th>
                                                <th>Garage</th>
                                                <th>Buy Date</th>
                                                <th>Expire Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($product as $pro)

                                            <tr>
                                                <td>{{ $pro->name }}</td>
                                                <td>{{ $pro->product_code }}</td>
                                                <td>{{ $pro->selling_price }}</td>
                                                <td>
                                                    @if(isset($pro->photo) && $pro->photo !== '')
                                                    <img src="{{ $pro->photo }}" alt="{{ $pro->name }}" style="height: 70px; width: 70px" class="img-rounded">
                                                  @else
                                                   <h5 class="alert alert-warning">No data available!</h5>
                                                  @endif

                                                </td>

                                                    <td>{{ $pro->product_garage }}</td>
                                                    <td>{{ $pro->buy_date }}</td>
                                                    <td>{{ $pro->expire_date }}</td>

                                              <td>
                                                <a href="{{ url('edit-product/'.$pro->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('view-product/'.$pro->id) }}" class="btn btn-sm btn-info" title="View Details" >
                                                    <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                  </a>

                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete" title="Delete" module="product" moduleid="{{ $pro->id }}">
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
