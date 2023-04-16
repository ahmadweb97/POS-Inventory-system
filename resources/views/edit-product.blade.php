@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Edit Products</h4>
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
                            <div class="panel panel-primary">
                                <div class="panel-heading"><h3 class="panel-title">Edit Product</h3></div>
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
                                    <form role="form" method="post" action="{{ url('/update-product/'.$editProduct->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $editProduct->name }}" >

                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">Product Code</label>
                                            <input type="text" class="form-control" name="product_code" value="{{ $editProduct->product_code }}" >

                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            @php
                                                $category=DB::table('categories')->get();
                                            @endphp
                                            <select name="category_id" id="" class="form-control">

                                                @foreach ($category as $cat )
                                                <option value="{{ $cat->id }}" <?php if ($editProduct->category_id==$cat->id) {
                                                    echo "selected";
                                                } ?> >{{ $cat->name }}</option>

                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier</label>
                                            @php
                                            $supplier=DB::table('suppliers')->get();
                                           @endphp
                                            <select class="form-control"  name="supplier_id" id="" cols="15" rows="5">

                                                @foreach ($supplier as $sup )
                                                <option value="{{ $sup->id }}" <?php if ($editProduct->supplier_id==$sup->id) {
                                                    echo "selected";
                                                } ?>>{{ $sup->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="product_garage">Garage</label>
                                            <input type="text" class="form-control" name="product_garage" value="{{ $editProduct->product_garage }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="product_route">Product Route</label>
                                            <input type="text" class="form-control" name="product_route" value="{{ $editProduct->product_route }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                           <textarea name="description" id="" cols="15" rows="5" class="form-control">{{ $editProduct->description }}
                                           </textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="buy_date">Buying Date</label>
                                            <input type="date" class="form-control" name="buy_date" value="{{ $editProduct->buy_date }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="expire_date">Expiry Date</label>
                                            <input type="date" class="form-control" name="expire_date" value="{{ $editProduct->expire_date }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="buying_price">Buying Price($)</label>
                                            <input type="text" class="form-control" name="buying_price" value="{{ $editProduct->buying_price }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="selling_price">Selling Price($)</label>
                                            <input type="text" class="form-control" name="selling_price" value="{{ $editProduct->selling_price }}">

                                        </div>
                                        <div class="form-group">
                                        @if (isset($editProduct->photo))
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
                                        <img src="{{ url($editProduct->photo) }}" name="old_img" style="100px" height="100px" class="img-rounded"  alt="">
                                        <input type="hidden" name="old_photo" value="{{ url($editProduct->photo) }}">
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
