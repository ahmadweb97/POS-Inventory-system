
@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-pink ">
                    <h4 class="pull-left page-title text-white">POS (Point of Sales)</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/dashboard') }}" class=" text-white">Home</a></li>
                        <li class=" text-white" >{{ date('d/m/y') }}</li>
                    </ol>
                </div>
            </div>
            <br>

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="portfolioFilter">
                @foreach ($categories as $cat )

                        <a href="#" data-filter="*" class="current">{{ $cat->name }}</a>
                        @endforeach

                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div>

                        <div class="price_card text-center">

                            <ul class="price-features">
                                <table class="table">
                                    <thead class="bg-inverse">
                                        <tr>
                                            <th class=" text-white">Name</th>
                                            <th class=" text-white">Qty</th>
                                            <th class=" text-white">Unit Price</th>
                                            <th class=" text-white">Sub-total</th>
                                            <th class=" text-white">Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $cart = Cart::content();
                                    @endphp
                                    <tbody>
                                        @foreach ($cart as $c )

                                        <tr>
                                            <th>{{ $c->name }}</th>
                                            <th>
                                                <form action="{{ url('/update-cart/'.$c->rowId) }}" method="post">
                                                    @csrf
                                                <input type="number"  min="1" max="5" name="qty" value="{{ $c->qty }}" style="width: 40px">
                                            <button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px" title="Update Quantity">

                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                            </th>
                                            <th>{{ $c->price }}</th>
                                            <th>{{ $c->price * $c->qty }}</th>
                                            <th>
                                                <a href="{{ url('/remove-cart/'.$c->rowId) }}" title="Remove Item"><i class="fa fa-trash-alt text-danger" aria-hidden="true"></i>
                                                </a>
                                            </th>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </ul>
                            <div class="pricing-footer bg-pink text-white" style="padding: 5px">
                                 <p style="font-size: 18px">Quantity: {{ Cart::count() }}</p>
                                 <p style="font-size: 18px">Sub-Total: ${{ Cart::subtotal() }}</p>
                                <p style="font-size: 18px">vat: ${{ Cart::tax() }}</p>
                                <hr>
                                <p><h2 class="text-white">Total: </h2>
                                <h1 class="text-white">${{ Cart::total() }}</h1>
                                </p>

                                <form action="{{ url('/create-invoice') }}" method="get">
                                    @csrf

                                    <div class="panel">
                                       <br>
                                      @if($errors->any())
                                    <div class="alert alert-danger">

                                            @foreach ($errors->all() as $error )
                                            <li>{{ $error }}</li>
                                            @endforeach

                                    </div>
                                     @endif
                                     <br>
                                        <h4 class="text-pink" style="padding: 2px">Select Customer

                                            <a href="" class="btn btn-danger waves-effect waves-light pull-right " data-toggle="modal" data-target="#con-close-modal">Add New</a> <br>
                                        </h4> <br>
                                        @php
                                            $customer=DB::table('customers')->get();
                                        @endphp
                                        <select class="form-control" name="customer_id">
                                            <option value="0" disabled selected>--Select Customer--</option>
                                            @foreach ($customer as $cus )
                                            <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                            <button type="submit" class="btn btn-inverse">Create Invoice</button>

                        </div> <!-- end Pricing_card -->
                    </div>

                </div>
            </form>
                <div class="col-lg-6">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Product Code</th>
                                <th>Add</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($product as $pro)

                            <tr>
                            <form action="{{ url('/add-cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="id"  value="{{ $pro->id }}">
                                <input type="hidden" name="name"  value="{{ $pro->product_name }}">
                                <input type="hidden" name="qty"  value="1">
                                <input type="hidden" name="price" value="{{ $pro->selling_price }}">
                                <td>
                                    <img src="{{ url($pro->photo) }}" width="70px" height="70px" alt="{{$pro->product_name }}" class="img-rounded"></td>

                                <td>{{$pro->product_name }}</td>
                              <td>
                                {{ $pro->category_name }}
                              </td>
                              <td>{{ $pro->product_code }}</td>
                              <td>
                                <button type="submit" class="btn btn-pink btn-sm">
                                    <i class="fa fa-plus-square fa-lg" aria-hidden="true" title="Add Item"></i>
                                </button>
                              </td>
                            </form>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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
                <h4 class="modal-title">Add a new customer</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                        <div class="panel-body">
                            <br>
                            <form role="form" method="post" action="{{ url('/insert-customer') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Customer Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" >
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                 </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="mail@example.com" >
                                    @error('email')
                                    <div class="text text-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                                    @error('phone')
                                    <div class="text text-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>

                                    <textarea class="form-control"  name="address" id="" cols="15" rows="5" placeholder="Employee Address"></textarea>
                                    @error('address')
                                    <div class="text text-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="shop_name">Shop Name</label>
                                    <input type="text" class="form-control" name="shop_name" placeholder="Shop Name">

                                </div>
                            </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="account_holder">Account Holder</label>
                                    <input type="text" class="form-control" name="account_holder" placeholder="Account Holder">

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" class="form-control" name="account_number" placeholder="Account Number">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name" placeholder="Bank Name">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bank_branch">Bank Branch</label>
                                    <input type="text" class="form-control" name="bank_branch" placeholder="Bank Branch">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" placeholder="City">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <img id="image" src="#" alt="" class="img-circle">
                                </div>
                                <div class="col-md-8">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" name="photo" accept="image/*" class="upload"  onchange="readURL(this);">
                                </div>
                            </div>

                            </div>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            </div>
        </form>

        </div>
    </div>
</div><!-- /.modal -->


<script>
    function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image')
                .attr('src', e.target.result)
                .width(100)
                .height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


@endsection

