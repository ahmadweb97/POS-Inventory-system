@extends('layouts.admin')
@section('content')


  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page ">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row ">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{ url('/dashboard') }}">Home</a></li>
                                    <li><a href="{{ url('/pos') }}">POS</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div id="invoice">

                        <div class="row">
                            <div class="col-md-12 printable">
                                <div class="panel panel-default">
                                     <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div>
                                    <div class="panel-body ">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img class="img-circle" src="{{ asset($settings->company_logo )}}" width="65px" height="65px" alt="{{ $settings->company_name }}">{{ $settings->company_name }}</h4>

                                            </div>
                                            <div class="pull-right">
                                                <h4>Order Date: <br>
                                                    <strong>On {{ $order->order_date }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name: {{ $order->name }}</strong><br>
                                                      @if(isset($order->shop_name))
                                                      <strong>Shop Name: {{ $order->shop_name }}</strong><br>
                                                      @endif
                                                      Address: {{ $order->address }}<br>
                                                      City: {{ $order->city }}<br>
                                                      <b title="Phone#">Call:</b> {{ $order->phone }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Today: </strong> {{ date('d F 20y') }}</p>
                                                    @if ($order->order_status == 'delivered')
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-success">Delivered</span></p>
                                                    @else
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-danger">Pending</span></p>
                                                    @endif
                                                    <p class="m-t-10"><strong>Order ID: </strong>
                                                      {{ $order->id }}
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>

                                                            <tr><th>#</th>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $sn=1;
                                                            @endphp
                                                            @foreach ($orderDetails as $orderDet )

                                                            <tr>
                                                                <td>{{ $sn++ }}</td>
                                                                <td>{{ $orderDet->name }}</td>
                                                                <td>{{ $orderDet->product_code }}</td>
                                                                <td>{{ $orderDet->quantity }}</td>
                                                                <td>{{ $orderDet->unit_cost }}</td>
                                                                <td>{{  $orderDet->unit_cost*$orderDet->quantity }} </td>

                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-9 m-t-20">
                                                <h3 > Payment By: {{ $order->payment_status }}</h3>
                                                <h4 class="text-success"> Payment Amount: ${{ $order->pay }}</h4>
                                                <h4 class="text-danger"> Due: ${{ $order->due }}</h4>
                                            </div>
                                            <div class="col-md-3 ">
                                                <p class="text-right"><b>Sub-total:</b> {{ $order->sub_total }}</p>
                                                <p class="text-right"><b> VAT:</b> {{ $order->vat }}</p>
                                                <hr>
                                                <h3 class="text-right">Total: ${{ $order->total }}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        @if ($order->order_status == 'delivered')
                                        @else
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-inverse waves-effect waves-light" onclick="window.print();"><i class="fa fa-print"></i></a>
                                                <a href="{{ url('/pos-confirm/'.$order->id) }}" class="btn btn-primary waves-effect waves-light" >Confirm</a>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>

                            </div>

                        </div>
                        </div>

            </div> <!-- container -->

                </div> <!-- content -->

            </div>




@endsection
