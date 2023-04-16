<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addExpense()
    {
        return view('add-expense');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'detail' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'month' => 'required',
            'year' => 'required',

        ]);

        $validatedData = $validator->validated();

        $data=array();
        $data['detail']=$request->detail;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $expense = DB::table('expenses')->insert($data);

            if ($expense) {
                $notification = array(
                    'message' => 'Successfully expense added!',
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

    public function todayExpenses()
    {
        $date= date("d/m/y");
        $today=DB::table('expenses')->where('date', $date)->get();

        return view('today-expenses', compact( 'today'));

    }

    public function editTodayExpenses($id)
    {
        $editTodayExpenses=DB::table('expenses')->where('id', $id)->first();

        return view('edit-today-expenses', compact('editTodayExpenses'));
    }


    public function updateExpense(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'detail' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'month' => 'required',
            'year' => 'required',

        ]);

        $validatedData = $validator->validated();

        $data=array();
        $data['detail']=$request->detail;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $expense = DB::table('expenses')->where('id', $id)->update($data);

            if ($expense) {
                $notification = array(
                    'message' => 'Successfully expense updated!',
                    'alert-type' => 'success'
                );

                return redirect()->route('today.expenses')->with($notification);
            } else {
                $notification = array(
                    'message' => 'error',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);

        }

    }

    public function editMonthlyExpenses($id)
    {
        $editMonthlyExpenses=DB::table('expenses')->where('id', $id)->first();

        return view('edit-monthly-expenses', compact('editMonthlyExpenses'));
    }


    public function updateMonthlyExpense(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'detail' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'month' => 'required',
            'year' => 'required',

        ]);

        $validatedData = $validator->validated();

        $data=array();
        $data['detail']=$request->detail;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $expense = DB::table('expenses')->where('id', $id)->update($data);

            if ($expense) {
                $notification = array(
                    'message' => 'Successfully expense updated!',
                    'alert-type' => 'success'
                );

                return redirect()->route('monthly.expenses')->with($notification);
            } else {
                $notification = array(
                    'message' => 'error',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);

        }
    }

    public function deleteTodayExpense($id)
    {
        $dlt=DB::table('expenses')->where('id', $id)->delete();

        if ($dlt) {
            $notification = array(
                'message' => 'Successfully expenses deleted!',
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

    public function deleteMonthlyExpense($id)
    {
        $dlt=DB::table('expenses')->where('id', $id)->delete();

        if ($dlt) {
            $notification = array(
                'message' => 'Successfully expenses deleted!',
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

    public function monthlyExpenses()
    {
         $month=date("F");
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');



        return view('monthly-expenses', compact('monthly', 'total'));
    }


    public function yearlyExpenses()
    {
        $year=date("Y");
        $yearly=DB::table('expenses')->where('year', $year)->get();

        return view('yearly-expenses', compact('yearly'));
    }

    public function janExpenses()
    {
        $month="January";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }

    public function febExpenses()
    {
        $month="February";
        $monthly=DB::table('expenses')->where('month', $month)->get();


        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');


        return view('monthly-expenses', compact('monthly', 'total'));
    }

    public function marExpenses()
    {
        $month="March";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }


    public function aprExpenses()
    {
        $month="April";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }

    public function mayExpenses()
    {
        $month="May";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }

    public function junExpenses()
    {
        $month="June";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }



    public function julExpenses()
    {
        $month="July";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }

    public function augExpenses()
    {
        $month="August";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }

    public function sepExpenses()
    {
        $month="September";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }



    public function octExpenses()
    {
        $month="October";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }



    public function novExpenses()
    {
        $month="November";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }



    public function decExpenses()
    {
        $month="December";
        $monthly=DB::table('expenses')->where('month', $month)->get();

        $total = DB::table('expenses')
        ->when($month, function ($query) use ($month) {
            return $query->where('month', $month);
        })
        ->sum('amount');

        return view('monthly-expenses', compact('monthly', 'total'));
    }





}
