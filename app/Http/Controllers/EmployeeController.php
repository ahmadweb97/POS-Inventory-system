<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('add-employee');
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
            'nid_no' => 'required|unique:employees|max:255',
            'address' => 'required',
            'phone' => 'required|max:15',
            'photo' => 'required',
            'salary' => 'required',
        ]);


        $validatedData = $validator->validated();

        $data = new Employee();
       $data->name = $request->name;
       $data->email = $request->email;
       $data->phone = $request->phone;
       $data->address = $request->address;
       $data->experience = $request->experience;
       $data->nid_no = $request->nid_no;
       $data->salary = $request->salary;
       $data->vacation = $request->vacation;
       $data->city = $request->city;
       $data->photo = $request->photo;

       $data->save();

        $uploadPath = 'uploads/employees/';
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/employees/', $fileName);

            $data->photo =  $uploadPath.$fileName;
        }

        $data->save();

        return redirect('/all-employees')->with('message', 'Employee is added successfully!');


    }


    public function show()
    {
        $employees = Employee::all();
        $addNew = 'Employee';
       return view('all-employee', compact('employees','addNew'));
    }


    public function viewEmployee($id)
    {
        $singleEmployee=DB::table('employees')
                        ->where('id', $id)
                        ->first();
                    return view('view-employee', compact('singleEmployee'));
    }


    public function deleteEmployee($id)
    {
       /*  $deleteEmployee=DB::table('employees')
                        ->where('id', $id)
                        ->first();
        $photo=$deleteEmployee->photo;
            unlink($photo);
            $dltuser=DB::table('employees')
                        ->where('id',$id)
                        ->delete();

            if ($dltuser) {
                $notification=array(
                    'message' => 'Successfully employee deleted!',
                    'alert-type'=> 'success'
                );
                return redirect()->route('all.employee')->with($notification);

            }
            else{
                $notification=array(
                    'message' => 'error',
                    'alert-type'=> 'danger'
                );
                return redirect()->back()->with($notification);
            } */

            $deleteEmployee = DB::table('employees')->where('id', $id)->first();
            $photo = $deleteEmployee->photo;

            $dltuser = DB::table('employees')->where('id', $id)->delete();

            if ($dltuser) {
                $notification = array(
                    'message' => 'Successfully employee deleted!',
                    'alert-type' => 'success'
                );

                if ($photo && file_exists($photo)) {
                    unlink($photo);
                }

                return redirect()->route('all.employee')->with($notification);
            } else {
                $notification = array(
                    'message' => 'error',
                    'alert-type' => 'danger'
                );

                return redirect()->back()->with($notification);

        }
    }

        public function editEmployee($id)
        {
            $editEmployee=DB::table('employees')
                            ->where('id',$id)
                            ->first();
            return view('edit-employee', compact('editEmployee'));

        }

        public function updateEmployee(Request $request, $id)
        {
            $data=Employee::find($id);

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'nid_no' => [
                    'required',
                    Rule::unique('employees')->ignore($data->id),
                    'max:255',
                ],
                'address' => 'required',
                'phone' => 'required|max:15',
                'salary' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->experience = $request->experience;
            $data->nid_no = $request->nid_no;
            $data->salary = $request->salary;
            $data->vacation = $request->vacation;
            $data->city = $request->city;


            $uploadPath = 'uploads/employees/';
            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $ext = $file->getClientOriginalExtension();
                $fileName = time().'.'.$ext;
                $file->move('uploads/employees/', $fileName);

                $data->photo =  $uploadPath.$fileName;
            }

            $data->save();

            return redirect('/all-employees')->with('message', 'Employee is updated successfully!');



        }

}
