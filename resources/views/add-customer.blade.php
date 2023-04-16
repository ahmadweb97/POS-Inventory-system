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
                            <div class="panel panel-purple">
                                <div class="panel-heading"><h3 class="panel-title  text-white">Add Customer</h3></div>
                                <div class="panel-body">

                                    <form role="form" method="post" action="{{ url('/insert-customer') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Customer Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Full Name" >
                                            @error('name')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" name="email" placeholder="mail@example.com" >
                                            @error('email')
                                            <div class="text text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                                            @error('phone')
                                            <div class="text text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>

                                            <textarea class="form-control"  name="address" id="" cols="15" rows="5" placeholder="Employee Address"></textarea>
                                            @error('address')
                                            <div class="text text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="shop_name">Shop Name</label>
                                            <input type="text" class="form-control" name="shop_name" placeholder="Shop Name">

                                        </div>
                                        <div class="form-group">
                                            <label for="account_holder">Account Holder</label>
                                            <input type="text" class="form-control" name="account_holder" placeholder="Account Holder">

                                        </div>
                                        <div class="form-group">
                                            <label for="account_number">Account Number</label>
                                            <input type="text" class="form-control" name="account_number" placeholder="Account Number">

                                        </div>
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name" placeholder="Bank Name">

                                        </div>
                                        <div class="form-group">
                                            <label for="bank_branch">Bank Branch</label>
                                            <input type="text" class="form-control" name="bank_branch" placeholder="Bank Branch">

                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" placeholder="City">

                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <input type="file" class="form-control" name="photo" accept="image/*" class="upload"  onchange="readURL(this);">

                                            <img id="image" src="#" alt="" class="img-rounded">
                                        </div>

                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                    </form>
                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->
            </div>
        </div>
    </div>
</div>


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
