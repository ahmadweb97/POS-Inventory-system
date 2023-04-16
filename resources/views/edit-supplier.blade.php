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
                        <li><a href="{{ url('/all-suppliers') }}">Suppliers</a></li>
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
                                <div class="panel-heading"><h3 class="panel-title">Edit Supplier</h3></div>
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
                                    <form role="form" method="post" action="{{ url('/update-supplier/'.$editSupplier->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Supplier Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $editSupplier->name }}" >

                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" name="email" value="{{ $editSupplier->email }}" >

                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $editSupplier->phone }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>

                                            <textarea class="form-control"  name="address" id="" cols="15" rows="5" placeholder="Employee Address">{{ $editSupplier->address }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="shop_name">Shop Name</label>
                                            <input type="text" class="form-control" name="shop_name" value="{{ $editSupplier->shop_name }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="account_holder">Account Holder</label>
                                            <input type="text" class="form-control" name="account_holder" value="{{ $editSupplier->account_holder }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="account_number">Account Number</label>
                                            <input type="text" class="form-control" name="account_number" value="{{ $editSupplier->account_number }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name" value="{{ $editSupplier->bank_name }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="bank_branch">Bank Branch</label>
                                            <input type="text" class="form-control" name="bank_branch" value="{{ $editSupplier->bank_branch }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ $editSupplier->city }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select name="type" class="form-control" id="">
                                                <option value="0" disabled>--Select Supplier Type--</option>
                                                <option value="Distributer" {{ $editSupplier->type == 'Distributer' ? 'selected' : '' }}>Distributer</option>
                                                <option value="Whole-Seller" {{ $editSupplier->type == 'Whole-Seller' ? 'selected' : '' }}>Whole Seller</option>
                                                <option value="Brocker" {{ $editSupplier->type == 'Brocker' ? 'selected' : '' }}>Brocker</option>
                                              </select>

                                        </div>
                                        <div class="form-group">
                                            @if (isset($editSupplier->photo))
                                                <img id="image" src="#" alt="" class="img-rounded">
                                                <label for="photo">New Photo</label>
                                                <input type="file" class="form-control" name="photo" accept="image/*" class="upload"  onchange="readURL(this);">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remove_photo" id="remove_photo">
                                                    <label class="form-check-label" for="remove_photo">
                                                        Remove current photo
                                                    </label>
                                                </div>
                                            @else
                                                No data available!
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <img src="{{ url($editSupplier->photo) }}" name="old_img" style="100px" height="100px" class="img-rounded"  alt="">
                                            <input type="hidden" name="old_photo" value="{{ url($editSupplier->photo) }}">
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
