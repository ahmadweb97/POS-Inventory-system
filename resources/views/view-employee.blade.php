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
                            <div class="panel panel-primary">
                                <div class="panel-heading"><h3 class="panel-title">View Employee Details</h3></div>
                                <div class="panel-body">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                           <p>{{ $singleEmployee->name }}</p>

                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                         <p>{{ $singleEmployee->email }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                         <p>{{ $singleEmployee->phone }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>

                                           <p>{{ $singleEmployee->address }}</p>

                                        </div>
                                        <div class="form-group">
                                            <label for="experience">Experience</label>
                                            <p>{{ $singleEmployee->experience }}</p>
                                        </div>

                                    </div>


                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="nid_no">NID NO.</label>
                                            <p>{{ $singleEmployee->nid_no }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="salary">Salary($)</label>
                                            <p>{{ $singleEmployee->salary }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="vacation">Vacation/Year</label>
                                            <p>{{ $singleEmployee->vacation }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <p>{{ $singleEmployee->city }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Photo</label>

                                        </div>
                                        <img id="image" src="{{ URL::to($singleEmployee->photo) }}" width="150" height="150" alt="" class="img-rounded">

                                    </div>

                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->
            </div>
        </div>
    </div>
</div>


<script>

</script>

@endsection
