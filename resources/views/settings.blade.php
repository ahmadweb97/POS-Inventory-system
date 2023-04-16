@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Settings</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/dashboard') }}">Home</a></li>
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
                                <div class="panel-heading"><h3 class="panel-title">Edit Company Details</h3></div>
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

                                    <form role="form" method="post" action="{{ url('/update-website/'.$company_setting->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Company Name</label>
                                            <input type="text" class="form-control" name="company_name" value="{{ $company_setting->company_name }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="email">Company Email</label>
                                            <input type="email" class="form-control" name="company_email" value="{{ $company_setting->company_email }}" >

                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Company Phone#</label>
                                            <input type="text" class="form-control" name="company_phone" value="{{ $company_setting->company_phone }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Company Mobile#</label>
                                            <input type="text" class="form-control" name="company_mobile" value="{{ $company_setting->company_mobile }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>

                                            <textarea class="form-control"  name="company_address" id="" cols="15" rows="5" >{{ $company_setting->company_address }}</textarea>

                                        </div>

                                        <div class="form-group">
                                            <label for="nid_no">City</label>
                                            <input type="text" class="form-control" name="company_city" value="{{ $company_setting->company_city }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="salary">Country</label>
                                            <input type="text" class="form-control" name="company_country" value="{{ $company_setting->company_country }}">

                                        </div>

                                        <div class="form-group">
                                            <img id="image" src="#" alt=""  class="img-rounded">
                                            <label for="photo">New Logo</label>
                                            <input type="file" class="form-control" name="company_logo" accept="image/*" class="upload"  onchange="readURL(this);">

                                        </div>
                                        <div class="form-group">
                                            <img src="{{ url($company_setting->company_logo) }}"  style="100px" height="100px" class="img-rounded"  alt="">
                                            <input type="hidden" name="old_img" value="{{ $company_setting->company_logo }}">
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
