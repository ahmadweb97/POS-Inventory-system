<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function addProduct()
    {
        return view('add-product');
    }


    public function show()
    {
        $product=DB::table('products')->get();
        $addNew = 'Product';
        return view('all-products', compact('product', 'addNew'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'product_garage' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg',
            'description' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',

        ]);

        $validatedData = $validator->validated();


       $data = new Product();
       $data->name = $request->name;
       $data->supplier_id = $request->supplier_id;
       $data->category_id = $request->category_id;
       $data->product_code = $request->product_code;
       $data->product_garage = $request->product_garage;
       $data->product_route = $request->product_route;
       $data->description = $request->description;
       $data->buy_date = $request->buy_date;
       $data->expire_date = $request->expire_date;
       $data->buying_price = $request->buying_price;
       $data->selling_price = $request->selling_price;
       $data->photo = $request->photo;

       $uploadPath = 'uploads/products/';
       if($request->hasFile('photo')){
           $file = $request->file('photo');
           $ext = $file->getClientOriginalExtension();
           $fileName = time().'.'.$ext;
           $file->move('uploads/products/', $fileName);

           $data->photo =  $uploadPath.$fileName;
       }else{
        $data->photo = 'default.jpg';
    }

       $data->save();

       return redirect('/all-products')->with('message', 'Product is added successfully!');
    }

    public function deleteProduct($id)
    {
        $deleteProduct = DB::table('products')->where('id', $id)->first();
        $photo = $deleteProduct->photo;

        $dltprod = DB::table('products')->where('id', $id)->delete();

        if ($dltprod) {
            $notification = array(
                'message' => 'Successfully product deleted!',
                'alert-type' => 'success'
            );

            if ($photo && file_exists($photo)) {
                unlink($photo);
            }

            return redirect()->route('all.products')->with($notification);
        } else {
            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }
    }

    public function viewProduct($id)
    {
        $singleProduct=DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->select('categories.name as category_name', 'products.*', 'suppliers.name as supplier_name')
            ->where('products.id', $id)
            ->first();

        return view('view-product', compact('singleProduct'));
    }

    public function editProduct($id)
    {

        $editProduct=DB::table('products')->where('id', $id)->first();

        return view('edit-product', compact('editProduct'));
    }


    public function updateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'product_garage' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg',
            'description' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',

        ]);

        $validatedData = $validator->validated();


        $data=Product::find($id);
       $data->name = $request->name;
       $data->supplier_id = $request->supplier_id;
       $data->category_id = $request->category_id;
       $data->product_code = $request->product_code;
       $data->product_garage = $request->product_garage;
       $data->product_route = $request->product_route;
       $data->description = $request->description;
       $data->buy_date = $request->buy_date;
       $data->expire_date = $request->expire_date;
       $data->buying_price = $request->buying_price;
       $data->selling_price = $request->selling_price;
      // $data->photo = $request->photo;

       $uploadPath = 'uploads/products/';
       if($request->hasFile('photo')){
           $file = $request->file('photo');
           $ext = $file->getClientOriginalExtension();
           $fileName = time().'.'.$ext;
           $file->move('uploads/products/', $fileName);

           $data->photo =  $uploadPath.$fileName;
       }
       if ($request->has('remove_photo')) {
           // Delete the current photo
           Storage::delete($data->photo);
           $data->photo = 'default.jpg';
       }

       $data->save();

       return redirect('/all-products')->with('message', 'Product is updated successfully!');


    }

    // import products

    public function importProduct()
    {
        return view('import-product');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }

    public function import(Request $request)
    {

        $request->validate([
            'import_file' => 'required|mimes:xlsx,xls|max:2048|filled|size:1'

        ], $this->messages());


       $import = Excel::import(new ProductsImport, $request->file('import_file'));

       if ($import) {
        $notification = array(
            'message' => 'Product imported successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.products')->with($notification);
    } else {
        $notification = array(
            'message' => 'error',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

}
    }
    public function messages()
{
    return [
        'import_file.required' => 'Please select a file to upload.',
        'import_file.mimes' => 'The file must be an Excel file.',
        'import_file.max' => 'The file size must not exceed 2 MB.',
        'import_file.filled' => 'The Excel file is empty or corrupt.',
        'import_file.size' => 'The Excel file must not be empty(make sure that the first line is filled).',
    ];
}


}
