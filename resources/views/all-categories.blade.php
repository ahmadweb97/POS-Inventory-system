@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Categories</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/all-categories') }}">Categories</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">


                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Categories</h3>
                        </div>
                        <div class="panel-body">

                            <a href="{{ route('add.category') }}" class="btn btn-md btn-link pull-right">Add New {{ $addNew }}
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                                <br><br>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($category as $cat)

                                            <tr>
                                                <td>{{$cat->id }}</td>

                                                <td>{{$cat->name }}</td>
                                              <td>
                                                <a href="{{ url('edit-category/'.$cat->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                                                </a>


                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete" title="Delete" module="category" moduleid="{{$cat->id }}">
                                                  <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                                </a>

                                              </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
