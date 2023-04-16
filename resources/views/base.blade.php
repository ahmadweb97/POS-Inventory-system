
@extends('layouts.admin')
@section('content')

@php
$today=date('d/m/y');
$today_sales=DB::table('orders')->where('order_date', $today)->select('total')->sum('total');

$total_sales=DB::table('orders')->select('total')->sum('total');

$today_expenses=DB::table('expenses')->where('date', $today)->select('amount')->sum('amount');
$expenses=DB::table('expenses')->select('amount')->sum('amount');

$delivered_orders_count = DB::table('orders')
    ->where('order_status', '=', 'delivered')
    ->where('order_status', '!=', 'pending')
    ->count();

    $pending_orders_count = DB::table('orders')
    ->where('order_status', '=', 'pending')
    ->count();

@endphp
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome to admin dashboard!</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">${{  $today_sales }}</span>


                            Today Sales
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Sales</h5>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-danger"><i class="fa-solid fa-money-bill-wave"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $today_expenses }}</span>
                            Today Expenses
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Expenses </h5>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $orders }}</span>
                            Total Orders
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Orders </h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-success"><i class="fa fa-money" aria-hidden="true"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">${{ $total_sales }}</span>
                            Total Sales
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase"> Sales </h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $customers }}</span>
                           Customers
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Our Customers </h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-inverse"><i class="fa fa-user-tie" aria-hidden="true"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $suppliers }}</span>
                           Suppliers
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Our Suppliers </h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-warning"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $employees }}</span>
                           Employees
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Our Employees </h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-pink"><i class="fa fa-warehouse" aria-hidden="true"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $products }}</span>
                           Products
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Our Products </h5>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-danger"><i class="fas fa-coins"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">${{ $expenses }}</span>
                            Total Expenses
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase"> Expenses </h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-primary"><i class="fa-solid fa-list"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $categories }}</span>
                           Categories
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Our Categories </h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-danger"><i class="fa-solid fa-clipboard-list"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $pending_orders_count }}</span>
                            Pending
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase"> Pending Orders </h5>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-success"><i class="fa-solid fa-clipboard-check"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $delivered_orders_count }}</span>
                            Delivered
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase"> Delivered Orders </h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row-->


    </div> <!-- content -->



</div>



@endsection

