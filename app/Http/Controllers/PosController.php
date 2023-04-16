<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $product = DB::table('products')
        ->join('categories', 'products.category_id', 'categories.id')
        ->select('categories.name AS category_name', 'products.name AS product_name', 'products.*')
        ->get();

        $customer = DB::table('customers')->get();
        $categories=DB::table('categories')->get();
        return view('pos', compact('product', 'customer', 'categories'));
    }

    public function pendingOrder()
    {
        $pending = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status', 'pending')->get();

        return view('pending-order', compact('pending'));
    }

    public function viewOrder($id)
    {
        $order = DB::table('orders')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->select('orders.id', 'orders.order_date', 'customers.name', 'customers.email', 'customers.address', 'customers.city', 'customers.phone', 'orders.payment_status', 'orders.pay', 'orders.due', 'orders.sub_total', 'orders.vat', 'orders.total', 'orders.order_status')
        ->where('orders.id', $id)
        ->first();

        $orderDetails=DB::table('order_details')
        ->join('products','order_details.product_id','products.id')
        ->select('order_details.*','products.name','products.product_code')
        ->where('order_id',$id)->get();
        $settings=DB::table('settings')->first();


        return view('order-confirmation', compact('order', 'orderDetails', 'settings'));

    }

    public function posConfirm($id)
    {
        $approve = DB::table('orders')->where('id', $id)->update(['order_status' => 'delivered']);

        if ($approve) {
            $notification = array(
                'message' => 'Successfully order confirmed, all products delivered!',
                'alert-type' => 'success'
            );

            return redirect()->route('pending.orders')->with($notification);
        } else {
            $notification = array(
                'message' => 'error, Something went wrong!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }     }


    public function deliveredOrder()
    {
        $delivered = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status', 'delivered')->get();

        return view('delivered-orders', compact('delivered'));
    }

    public function deletePending($id)
    {
        $dlt=DB::table('orders')->where('id', $id)->delete();

        if ($dlt) {
            $notification = array(
                'message' => 'Successfully order deleted!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }
    }

    public function deleteDeliverd($id)
    {
        $dlt=DB::table('orders')->where('id', $id)->delete();

        if ($dlt) {
            $notification = array(
                'message' => 'Successfully order deleted!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }
    }
}
