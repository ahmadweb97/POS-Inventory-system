@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Import Products</h4>
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
                                <div class="panel-heading"><h3 class="panel-title">Products Import
                                    <a href="{{ route('export') }}" class="pull-right btn btn-pink">Download Xlsx</a>
                                    </h3></div>

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
                                    <form role="form" method="post" action="{{ route('import') }}" enctype="multipart/form-data" >
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="import_file">Xlsx File Import</label>
                                            <input type="file"  name="import_file" class="form-control" >

                                        </div>


                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Upload</button>
                                    </form>
                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->


            </div>
        </div>
    </div>
</div>


@endsection
