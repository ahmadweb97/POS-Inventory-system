<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

    class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function takeAttendance()
    {
        $employee=DB::table('employees')->get();

        return view('take-attendance', compact('employee'));

    }


    public function insertAttendance(Request $request)
    {

        $request->validate([
            'attendance.*' => 'required',

        ]);


        $date=$request->att_date;
        $att_date=DB::table('attendances')->where('att_date', $date)->first();

        if ($att_date) {
            $notification = array(
                'message' => 'Attendance already taken for this day!',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        }
        else{
            foreach ($request->employee_id as $id) {
                $attendance = $request->attendance[$id] ?? null; // set attendance to null if not set in request

                $data[]=[
                    "employee_id"=>$id,
                    "attendance"=>$attendance,
                    "att_date"=>$request->att_date,
                    "att_year"=>$request->att_year,
                    "month"=>$request->month,
                    "edit_date"=>date("d_m_y"),
                ];

            }

            $att=DB::table('attendances')->insert($data);

           if ($att) {
            $notification = array(
                'message' => 'Successfully attendance taken!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.attendances')->with($notification);
        } else {
            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }
        }


    }

    public function allAttendances()
    {
        $all_attendances=DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        $addNew = 'Attendance';
        return view('all-attendances', compact('all_attendances', 'addNew'));

    }


    public function editAttendance($edit_date)
    {
        $date=DB::table('attendances')->where('edit_date', $edit_date)->first();

        $editAttendance=DB::table('attendances')
        ->join('employees','attendances.employee_id','employees.id')
        ->select('employees.name', 'employees.photo','attendances.*')
        ->where('edit_date', $edit_date)->get();

        return view('edit-attendance', compact('editAttendance', 'date'));
    }

    public function updateAttendance(Request $request)
    {
        foreach ($request->id as $id) {

            $data=[
                "attendance"=>$request->attendance[$id],
                "att_date"=>$request->att_date,
                "att_year"=>$request->att_year,
                "month"=>$request->month,
            ];

            $attendance=Attendance::where(['att_date'=>$request->att_date, 'id'=>$id ])->first();
            $attendance->update($data);
        }
        if ($attendance) {
            $notification = array(
                'message' => 'Successfully attendance updated!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.attendances')->with($notification);
        } else {
            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }

    }

    public function viewAttendance($edit_date)
    {
        $date=DB::table('attendances')->where('edit_date', $edit_date)->first();

        $viewAttendance=DB::table('attendances')
        ->join('employees','attendances.employee_id','employees.id')
        ->select('employees.name', 'employees.photo','attendances.*')
        ->where('edit_date', $edit_date)->get();

        return view('view-attendance', compact('viewAttendance', 'date'));
    }


    public function deleteAttendance( $edit_date)
    {
        $dlt=DB::table('attendances')->where('edit_date', $edit_date)->delete();

        if ($dlt) {
            $notification = array(
                'message' => 'Successfully attendance deleted!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.attendances')->with($notification);
        } else {
            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

    }
    }

    public function settings()
    {

        $company_setting=DB::table('settings')->first();
       return view('settings', compact('company_setting'));

    }
    public function updateSettings(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_mobile' => 'required',
            'company_country' => 'required',

        ]);
        $validatedData = $validator->validated();


        $data=Setting::find($id);
        $data->company_name = $request->company_name;
        $data->company_address = $request->company_address;
        $data->company_email = $request->company_email;
        $data->company_phone = $request->company_phone;
        $data->company_mobile = $request->company_mobile;
        $data->company_country = $request->company_country;
        $data->company_city = $request->company_city;


        $uploadPath = 'uploads/company/';
        if($request->hasFile('company_logo')){
            $file = $request->file('company_logo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/company/', $fileName);

            $data->company_logo =  $uploadPath.$fileName;
        }

        $data->save();

        return redirect('/website-settings')->with('message', 'Settings is updated successfully!');

    }
}
