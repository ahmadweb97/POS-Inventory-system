<?php

namespace App\Http\Controllers;

use App\Rules\RemoveCommas;
use Illuminate\Http\Request;
use App\Rules\CheckTotalAmount;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $data=array();

        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;
        $data['tax'] = 10; // the tax is 10% | you can change it here and in config/cart.php

        $add=Cart::add($data);

        if ($add) {
            $notification = array(
                'message' => 'Successfully Product added!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'error, Something went wrong! ',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }

    }

    public function updateCart(Request $request, $rowId)
    {
        $qty=$request->qty;
       $update =  Cart::update($rowId, $qty);

       if ($update) {
        $notification = array(
            'message' => 'Product quantity updated!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } else {
        $notification = array(
            'message' => 'error, Something went wrong! ',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

}
    }

    public function removeCart($rowId)
    {
        $remove = Cart::remove($rowId);

        if ($remove !== false) { // check if $remove is not false
            $notification = array(
                'message' => 'Product item is removed!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Error: Could not remove product item',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function createInvoice(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',

        ],
        [
            'customer_id.required' => 'Select a customer first!'
        ]
    );

        $customer_id=$request->customer_id;
        $customer=DB::table('customers')->where('id', $customer_id)->first();
        $contents=Cart::content();
        $order = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status', 'delivered')->get();
        $settings=DB::table('settings')->first();


        return view('invoice', compact('customer', 'contents', 'order', 'settings'));
    }

    public function finalInvoice(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'order_date' => 'required',
            'order_status' => 'required',
            'total_products' => 'required',
            'sub_total' => ['required', new RemoveCommas],
            'vat' => ['required', 'numeric', new RemoveCommas],
            'total' => ['required', new RemoveCommas],
            'payment_status' => 'required',
            'pay' => 'required|integer',
            'due' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    $total = (int)str_replace(',', '', $request->input('total'));
                    $pay = (int)$request->input('pay');
                    $due = (int)$request->input('due');

                    if ($pay + $due !== $total) {
                        return $fail('The sum of due and pay must be equal to the total amount.');
                    }
                },
            ],
        ]);


            $data=array();
            $data['customer_id']=$request->customer_id;
            $data['order_date']=$request->order_date;
            $data['order_status']=$request->order_status;
            $data['total_products']=$request->total_products;
            $data['sub_total'] = str_replace(',', '', $request->sub_total);
            $data['vat']=$request->vat;
            $data['total'] = str_replace(',', '', $request->total);
            $data['payment_status']=$request->payment_status;
            $data['pay']=$request->pay;
            $data['due']=$request->due;

            $order_id=DB::table('orders')->insertGetId($data);
            $contents=Cart::content();

            $orderData=array();

            foreach ($contents as $content) {
                $orderData['order_id']=$order_id;
                $orderData['product_id']=$content->id;
                $orderData['quantity']=$content->qty;
                $orderData['unit_cost']=$content->price;
                $orderData['total']=$content->total;

                $insert=DB::table('order_details')->insert($orderData);
            }

            if ($insert) {
                $notification = array(
                    'message' => 'Successfully Invoice created! | Please deliver the products and confirm the status',
                    'alert-type' => 'success'
                );
                Cart::destroy();
                return redirect()->route('dashboard')->with($notification);
            } else {
                $notification = array(
                    'message' => 'error, Something went wrong! ',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);

        }

    }

}
