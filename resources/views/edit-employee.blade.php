@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome again !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-employees') }}">Employees</a></li>
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
                                <div class="panel-heading"><h3 class="panel-title">Edit Employee Details</h3></div>
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

                                    <form role="form" method="post" action="{{ url('/update-employee/'.$editEmployee->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $editEmployee->name }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" name="email" value="{{ $editEmployee->email }}" >

                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $editEmployee->phone }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>

                                            <textarea class="form-control"  name="address" id="" cols="15" rows="5" >{{ $editEmployee->address }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="experience">Experience</label>
                                            <input type="text" class="form-control" name="experience" value="{{ $editEmployee->experience }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="nid_no">NID NO.</label>
                                            <input type="text" class="form-control" name="nid_no" value="{{ $editEmployee->nid_no }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="salary">Salary($)</label>
                                            <input type="text" class="form-control" name="salary" value="{{ $editEmployee->salary }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="vacation">Vacation/Year</label>
                                            <input type="text" class="form-control" name="vacation" value="{{ $editEmployee->vacation }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ $editEmployee->city }}">

                                        </div>
                                        <div class="form-group">
                                            <img id="image" src="#" alt=""  class="img-rounded">
                                            <label for="photo">New Photo</label>
                                            <input type="file" class="form-control" name="photo" accept="image/*" class="upload"  onchange="readURL(this);">

                                        </div>
                                        <div class="form-group">
                                            <img src="{{ url($editEmployee->photo) }}" name="old_img" style="100px" height="100px" class="img-rounded"  alt="">
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
