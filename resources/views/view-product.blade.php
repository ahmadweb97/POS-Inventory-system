@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">View Products</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-products') }}">Products</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">


                         <!-- Basic example -->
                         <div class="col-md-2"></div>
                         <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h3 class="panel-title">View Product</h3></div>
                                <div class="panel-body">
                                    <img src="{{ url($singleProduct->photo) }}" height="200px" width="50%" alt="">
                                    <br><br>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <p>{{ $singleProduct->name }}</p>

                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">Product Code</label>
                                            <p>{{ $singleProduct->product_code }}</p>

                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <p>{{ $singleProduct->category_name  }}</p>

                                        </div>
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier</label>
                                            <p>{{ $singleProduct->supplier_name  }}</p>

                                        </div>
                                        <div class="form-group">
                                            <label for="product_garage">Garage</label>
                                            <p>{{ $singleProduct->product_garage }}</p>


                                        </div>
                                        <div class="form-group">
                                            <label for="product_route">Product Route</label>
                                            @if ($singleProduct->product_route == NULL)
                                            <h5 class="text text-warning">No data available!</h5>
                                            @else
                                            <p>{{ $singleProduct->product_route }}</p>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <p>{{ $singleProduct->description }}</p>


                                        </div>
                                        <div class="form-group">
                                            <label for="buy_date">Buying Date</label>
                                            <p>{{ $singleProduct->buy_date }}</p>


                                        </div>
                                        <div class="form-group">
                                            <label for="expire_date">Expiry Date</label>
                                            <p>{{ $singleProduct->expire_date }}</p>


                                        </div>
                                        <div class="form-group">
                                            <label for="buying_price">Buying Price($)</label>
                                            <p>{{ $singleProduct->buying_price }}</p>


                                        </div>
                                        <div class="form-group">
                                            <label for="selling_price">Selling Price($)</label>
                                            <p>{{ $singleProduct->selling_price }}</p>


                                        </div>
                                    </div>

                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->


            </div>
        </div>
    </div>
</div>

@endsection
