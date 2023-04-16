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


                         <!-- Basic example -->
                         <div class="col-md-2"></div>
                         <div class="col-md-8">
                            <div class="panel panel-purple">
                                <div class="panel-heading"><h3 class="panel-title  text-white">Add Product
                                <a href="{{ route('import.product') }}" class="btn btn-success pull-right">Import Product</a>
                                </h3></div>
                                <div class="panel-body">

                                    <form role="form" method="post" action="{{ url('/insert-product') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Product Name" >
                                            @error('name')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">Product Code</label>
                                            <input type="text" class="form-control" name="product_code" placeholder="Product Code" >
                                            @error('product_code')
                                            <div class="text text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            @php
                                                $category=DB::table('categories')->get();
                                            @endphp
                                            <select name="category_id" id="" class="form-control">

                                                <option value="0" disabled selected>--Select Category--</option>
                                                @foreach ($category as $cat )
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                                                @endforeach

                                            </select>
                                            @error('category_id')
                                            <div class="text text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier</label>
                                            @php
                                            $supplier=DB::table('suppliers')->get();
                                           @endphp
                                            <select class="form-control"  name="supplier_id" id="" cols="15" rows="5">
                                                <option value="0" disabled selected>--Select Supplier--</option>
                                                @foreach ($supplier as $sup )
                                                <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('supplier_id')
                                            <div class="text text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="product_garage">Garage</label>
                                            <input type="text" class="form-control" name="product_garage" placeholder="Product Garage">
                                            @error('product_garage')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="product_route">Product Route</label>
                                            <input type="text" class="form-control" name="product_route" placeholder="Product Area">

                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                           <textarea name="description" id="" cols="15" rows="5" placeholder="Product Description" class="form-control">
                                           </textarea>
                                           @error('description')
                                           <div class="text text-danger">{{ $message }}</div>
                                       @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="buy_date">Buying Date</label>
                                            <input type="date" class="form-control" name="buy_date" placeholder="Buying Date">
                                            @error('buy_date')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="expire_date">Expiry Date</label>
                                            <input type="date" class="form-control" name="expire_date" placeholder="Expiry Date">
                                            @error('expire_date')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="buying_price">Buying Price($)</label>
                                            <input type="text" class="form-control" name="buying_price" placeholder="Buying Price">
                                            @error('buying_price')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selling_price">Selling Price($)</label>
                                            <input type="text" class="form-control" name="selling_price" placeholder="Selling Price">
                                            @error('selling_price')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <input type="file" class="form-control" name="photo" accept="image/*" class="upload"  onchange="readURL(this);">
                                            @error('photo')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
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
