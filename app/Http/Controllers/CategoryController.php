<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function addCategory()
    {
        return view('add-category');
    }


    public function show()
    {
        $category=DB::table('categories')->get();
        $addNew = 'Category';
        return view('all-categories', compact('category', 'addNew'));
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        $validatedData = $validator->validated();


        $data = array();
        $data['name']=$request->name;
       $category=DB::table('categories')->insert($data);


       if ($category) {
        $notification = array(
            'message' => 'Successfully Category added!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.categories')->with($notification);
    } else {
        $notification = array(
            'message' => 'error',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

}
    }


    public function deleteCategory($id)
    {
        $dlt=DB::table('categories')->where('id', $id)->delete();

        if ($dlt) {
            $notification = array(
                'message' => 'Successfully Category deleted!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.categories')->with($notification);
        } else {
            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }
    }

    public function editCategory($id)
    {
        $editCategory=DB::table('categories')->where('id', $id)->first();

        return view('edit-category')->with('editCategory', $editCategory);
    }


    public function updateCategory(Request $request, $id)
    {
              $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        $validatedData = $validator->validated();

        $data=array();
        $data['name']=$request->name;

        $category=DB::table('categories')->where('id',$id)->update($data);


        if ($category) {
            $notification = array(
                'message' => 'Successfully Category updated!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.categories')->with($notification);
        } else {
            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }

    }
}
