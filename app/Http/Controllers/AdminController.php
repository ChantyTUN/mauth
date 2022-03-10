<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    } // end method

    public function Dashboard(){
        return view('admin.index');
    } // end method

    public function Login(Request $request){
        $check = $request->all();
        // dd($check);
        if(Auth::guard('admin')->attempt([
            'email' => $check['email'],
            'password' => $check['password']
            ]))
        {
            return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
        }else{
            return back()->with('error','Invaild Email and Password');
        }
    } // end method

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Admin Logout Successfully');
    } // end method


}
