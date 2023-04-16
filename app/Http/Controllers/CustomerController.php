<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('add-customer');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('suppliers', 'email'),
                Rule::unique('users', 'email'),
                Rule::unique('customers', 'email'),
                'max:255',
            ],
            'phone' => 'required|max:15',
            'address' => 'required',

        ]);


        $validatedData = $validator->validated();


        $data = new Customer();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->shop_name = $request->shop_name;
        $data->account_holder = $request->account_holder;
        $data->account_number = $request->account_number;
        $data->bank_name = $request->bank_name;
        $data->bank_branch = $request->bank_branch;
        $data->city = $request->city;
       // $data->photo = $request->photo;


        $uploadPath = 'uploads/customers/';
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/customers/', $fileName);

            $data->photo =  $uploadPath.$fileName;
        }else{
            $data->photo = 'default.jpg';
        }

        $data->save();

        return redirect('/all-customers')->with('message', 'Customer is added successfully!');

    }

    public function show()
    {
        $customer = DB::table('customers')->get();
        $addNew = 'Customer';
        return view('all-customers')->with(['customer' => $customer, 'addNew' => $addNew]);
    }



    public function viewCustomer($id)
    {
        $singleCustomer=DB::table('customers')
                        ->where('id', $id)
                        ->first();
                    return view('view-customer', compact('singleCustomer'));
    }


    public function deleteCustomer($id)
    {

            $deleteCustomer = DB::table('customers')->where('id', $id)->first();
            $photo = $deleteCustomer->photo;

            $dltuser = DB::table('customers')->where('id', $id)->delete();

            if ($dltuser) {
                $notification = array(
                    'message' => 'Successfully customer deleted!',
                    'alert-type' => 'success'
                );

                if ($photo && file_exists($photo)) {
                    unlink($photo);
                }

                return redirect()->route('all.customers')->with($notification);
            } else {
                $notification = array(
                    'message' => 'error',
                    'alert-type' => 'danger'
                );

                return redirect()->back()->with($notification);

        }


        }

        public function editCustomer($id)
        {
            $editCustomer = DB::table('customers')->where('id',$id)->first();

            return view('edit-customer', compact('editCustomer'));
        }


        public function updateCustomer(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required|max:15',
                'address' => 'required',

            ]);


            $validatedData = $validator->validated();

            $data=Customer::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->shop_name = $request->shop_name;
            $data->account_holder = $request->account_holder;
            $data->account_number = $request->account_number;
            $data->bank_name = $request->bank_name;
            $data->bank_branch = $request->bank_branch;
            $data->city = $request->city;
           // $data->photo = $request->photo;


            $uploadPath = 'uploads/customers/';
            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $ext = $file->getClientOriginalExtension();
                $fileName = time().'.'.$ext;
                $file->move('uploads/customers/', $fileName);

                $data->photo =  $uploadPath.$fileName;
            }
            if ($request->has('remove_photo')) {
                // Delete the current photo
                Storage::delete($data->photo);
                $data->photo = 'default.jpg';
            }

            $data->save();

            return redirect('/all-customers')->with('message', 'Customer is updated successfully!');


        }

}
