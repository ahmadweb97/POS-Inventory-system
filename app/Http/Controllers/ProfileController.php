<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function profile()
    {
        $user = DB::table('users')->where('id', Auth::id())->first();
        $setting=DB::table('settings')->first();

        if ($user) {
            return view('profile', compact('user', 'setting'));
        } else {
            return redirect('/')->with('error', 'User not found');
        }
    }



    public function updateProfile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



       $profile = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'password' => $request->filled('password') ? bcrypt($request->input('password')) : null,
            ]);

            if ($profile) {
                $notification = array(
                    'message' => 'Successfully Profile updated!',
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
