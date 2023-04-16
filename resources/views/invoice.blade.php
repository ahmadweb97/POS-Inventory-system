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
                                                <h4>Today Invoice <br>
                                                    <strong>Date: {{ date('d/m/y') }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name: {{ $customer->name }}</strong><br>
                                                      @if(isset($customer->shop_name))
                                                      <strong>Shop Name: {{ $customer->shop_name }}</strong><br>
                                                      @endif
                                                      Address: {{ $customer->address }}<br>
                                                      City: {{ $customer->city }}<br>
                                                      <b title="Phone#">Call:</b> {{ $customer->phone }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> {{ date('d F 20y') }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-danger">Pending</span></p>
                                                    @php
                                                        $order=DB::table('orders')->select('id')->first();
                                                    @endphp
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
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Tax (10%)</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $sn=1;
                                                            @endphp
                                                            @foreach ($contents as $cont )

                                                            <tr>
                                                                <td>{{ $sn++ }}</td>
                                                                <td>{{ $cont->name }}</td>
                                                                <td>{{ $cont->qty }}</td>
                                                                <td>{{ $cont->price }}</td>
                                                                <td>{{  $cont->tax*$cont->qty }} </td>
                                                                <td>{{  $cont->price*$cont->qty+$cont->tax*$cont->qty }} </td>

                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal() }}</p>
                                                <p class="text-right"><b> VAT:</b> {{ Cart::tax() }}</p>
                                                <hr>
                                                <h3 class="text-right">Total: ${{ Cart::total() }}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-inverse waves-effect waves-light" onclick="window.print();"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Place Order</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        </div>

            </div> <!-- container -->

                </div> <!-- content -->

            </div>

            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title text-info">Invoice of {{ $customer->name }}
                        </h4>
                    </div>
                    <div class="modal-body">
                        @if($errors->any())
                        <div class="text text-danger">
                            <ul>
                                @foreach ($errors->all() as $error )
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <h3 class="text-info">
                        <span class="pull-right ">Total: ${{ Cart::total() }}</span></h3> <br>
                        <div class="col-md-12">
                                <div class="panel-body">
                                    <br>
                                    <form  id="final-invoice-form" role="form" method="post" action="{{ url('/final-invoice') }}" >
                                        @csrf
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Payment</label>
                                          <select class="form-control" name="payment_status" id="">
                                            <option value="Hand_Cash">Hand Cash </option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Due">Due</option>
                                          </select>

                                        </div>
                                         </div>
                                         <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pay">Pay</label>
                                            <input type="text" class="form-control" name="pay"  >

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="due">Due</label>
                                            <input type="text" class="form-control" name="due" >

                                        </div>
                                    </div>



                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                    </div>
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <input type="hidden" name="order_date" value="{{ date('d/m/y') }}">
                    <input type="hidden" name="order_status" value="pending">
                    <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                    <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                    <input type="hidden" name="vat" value="{{  Cart::tax() }}">
                    <input type="hidden" name="total" value="{{  Cart::total() }}">


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-success waves-effect waves-light">Submit</button>
                    </div>
                </form>

                </div>
            </div>
        </div><!-- /.modal -->


@endsection
