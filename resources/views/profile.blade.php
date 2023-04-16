@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Profile</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">

                <div class="content">
             
                    <div class="wraper container-fluid">

                        <div class="row user-tabs">
                            <div class="col-lg-6 col-md-9 col-sm-9">
                                <ul class="nav nav-tabs tabs">
                                <li class="active tab">
                                    <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active">
                                        <span class="visible-xs"><i class="fa fa-home"></i></span>
                                        <span class="hidden-xs">User Details</span>
                                    </a>
                                </li>

                                <li class="tab" >
                                    <a href="#settings-2" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                        <span class="hidden-xs">Edit Profile</span>
                                    </a>
                                </li>
                            <div class="indicator"></div></ul>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                            <div class="tab-content profile-tab-content">
                                <div class="tab-pane active" id="home-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Personal Information</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="about-info-p">
                                                        <strong>Full Name</strong>
                                                        <br/>
                                                        <p class="text-muted">{{ $user->name }}</p>
                                                    </div>
                                                    <div class="about-info-p">
                                                        <strong>Mobile</strong>
                                                        <br/>
                                                        <p class="text-muted">{{ $user->phone }}</p>
                                                    </div>
                                                    <div class="about-info-p">
                                                        <strong>Email</strong>
                                                        <br/>
                                                        <p class="text-muted">{{ $user->email }}
                                                    </div>
                                                    <div class="about-info-p m-b-0">
                                                        <strong>Address</strong>
                                                        <br/>
                                                        <p class="text-muted">{{ $user->address }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Personal-Information -->

                                        </div>


                                    </div>
                                </div>

                                <div class="tab-pane" id="settings-2">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Edit Profile</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" value="{{ old('name', $user->name) }}" id="name" name="name" class="form-control">
                                                    @if ($errors->has('name'))
                                                        <div class="invalid-feedback  text-danger">{{ $errors->first('name') }}</div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" value="{{ old('email', $user->email) }}" id="email" name="email" class="form-control">
                                                    @if ($errors->has('email'))
                                                        <div class="invalid-feedback text-danger">{{ $errors->first('email') }}</div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password">
                                                    @if ($errors->has('password'))
                                                        <div class="invalid-feedback text-danger">{{ $errors->first('password') }}</div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Phone#</label>
                                                    <input type="phone" value="{{ old('phone', $user->phone) }}" id="phone" name="phone" class="form-control">
                                                    @if ($errors->has('phone'))
                                                        <div class="invalid-feedback text-danger">{{ $errors->first('phone') }}</div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea id="address" name="address" class="form-control">{{ old('address', $user->address) }}</textarea>
                                                    @if ($errors->has('address'))
                                                        <div class="invalid-feedback text-danger">{{ $errors->first('address') }}</div>
                                                    @endif
                                                </div>

                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                            </form>

                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
                                </div>
                            </div>
                        </div>
                        </div>
                    </div> <!-- container -->

                    </div> <!-- content -->


            </div>
        </div>
    </div>
</div>




@endsection
