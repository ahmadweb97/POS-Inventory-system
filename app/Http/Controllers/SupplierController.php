<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('add-supplier');
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
            'type' => 'required',
            'photo' => 'nullable|image',

        ]);


        $validatedData = $validator->validated();


        $data = new Supplier();
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
        $data->type = $request->type;
      //  $data->photo = $request->photo;


        $uploadPath = 'uploads/suppliers/';
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/suppliers/', $fileName);

            $data->photo =  $uploadPath.$fileName;
        }else{
            $data->photo = 'default.jpg';
        }

        $data->save();

        return redirect('/all-suppliers')->with('message', 'supplier is added successfully!');

    }


    public function show()
    {
        $supplier=DB::table('suppliers')->get();
        $addNew = 'Supplier';

        return view('all-suppliers', compact('supplier', 'addNew'));
    }


    public function viewSupplier($id)
    {
        $singleSupplier=DB::table('suppliers')->where('id',$id)->first();

        return view('view-supplier', compact('singleSupplier'));
    }

    public function deleteSupplier($id)
    {
        $deleteSupplier = DB::table('suppliers')->where('id', $id)->first();
        $photo = $deleteSupplier->photo;

        $dltuser = DB::table('suppliers')->where('id', $id)->delete();

        if ($dltuser) {
            $notification = array(
                'message' => 'Successfully supplier deleted!',
                'alert-type' => 'success'
            );

            if ($photo && file_exists($photo)) {
                unlink($photo);
            }

            return redirect()->route('all.suppliers')->with($notification);
        } else {
            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }


    public function editSupplier($id)
    {
        $editSupplier=DB::table('suppliers')->where('id',$id)->first();
        return view('edit-supplier', compact('editSupplier'));
    }


    public function updateSupplier(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' =>  'required',
            'phone' => 'required|max:15',
            'address' => 'required',
            'type' => 'required',

        ]);


        $validatedData = $validator->validated();
        $data=Supplier::find($id);
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
        $data->type = $request->type;

        $uploadPath = 'uploads/suppliers/';
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/suppliers/', $fileName);

            $data->photo =  $uploadPath.$fileName;
        }
        if ($request->has('remove_photo')) {
            // Delete the current photo
            Storage::delete($data->photo);
            $data->photo = 'default.jpg';
        }

        $data->save();

        return redirect('/all-suppliers')->with('message', 'Supplier is updated successfully!');


    }
}
