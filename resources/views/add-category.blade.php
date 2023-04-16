@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add Category</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-categories') }}">Categories</a></li>
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
                                <div class="panel-heading"><h3 class="panel-title  text-white">Category</h3></div>
                                <div class="panel-body">

                                    <form role="form" method="post" action="{{ url('/insert-category') }}" >
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Category Name">
                                            @error('name')
                                            <div class="text text-danger">{{ $message }}</div>
                                          @enderror
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


@endsection
