
@extends('layouts.admin')
@section('content')

<div class="wrapper-page">
    <div class="ex-page-content text-center">
        <h1>404!</h1>
        <h2>Sorry, page not found</h2><br>
        <p>You better try our awesome search:</p>
        <div class="row">

        </div><br>
        <a class="btn btn-purple waves-effect waves-light" href="{{ url('/dashboard') }}"><i class="fa fa-angle-left"></i> Back to Dashboard</a>
    </div>
</div>





@endsection

