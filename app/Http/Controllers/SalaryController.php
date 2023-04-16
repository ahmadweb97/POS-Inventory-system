<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addAdvanceSalary()
    {
        return view('add-advance-salary');
    }


    public function show()
    {
        $salary=DB::table('advance_salaries')
                    ->join('employees', 'advance_salaries.employee_id', 'employees.id')
                    ->select('advance_salaries.*','employees.name', 'employees.salary', 'employees.photo')
                    ->orderBy('id', 'DESC')
                    ->get();
        $addNew = 'Advance Salary';
        return view('all-advance-salaries', compact('salary','addNew'));
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'month' =>  'required',
            'year' => 'required',
            'advanced_salary' => 'required',

        ]);


        $validatedData = $validator->validated();

        $month = $request->month;
        $employee_id = $request->employee_id;

        $advanced = DB::table('advance_salaries')
                    ->where('month', $month)
                    ->where('employee_id', $employee_id)
                    ->first();

        if ($advanced === NULL) {
            $data=array();
            $data['employee_id']=$request->employee_id;
            $data['month']=$request->month;
            $data['advanced_salary']=$request->advanced_salary;
            $data['year']=$request->year;


            $advanced=DB::table('advance_salaries')->insert($data);

            if ($advanced) {
             $notification = array(
                 'message' => 'Successfully advanced paid!',
                 'alert-type' => 'success'
             );

             return redirect()->route('all.advanceSalaries')->with($notification);
         } else {
             $notification = array(
                 'message' => 'error',
                 'alert-type' => 'error'
             );

             return redirect()->back()->with($notification);

     }
        }else{
            $notification = array(
                'message' => 'Advance payment are already paid for this month!',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        }

    }

    public function paySalary()
    {
        $month = date("F", strtotime('-1 month'));

        $empSalary=DB::table('advance_salaries')
        ->join('employees', 'advance_salaries.employee_id', 'employees.id')
        ->select('advance_salaries.*','employees.name', 'employees.salary', 'employees.photo')
        ->where('month', $month)
        ->get();

        $employee=DB::table('employees')->get();
        return view('pay-salary', compact('employee', 'empSalary', 'month'));

    }


}
