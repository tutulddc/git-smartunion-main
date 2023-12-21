<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Tbl_user_info;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class login_controller extends Controller
{
    function login_panel(){

        $users = User::select('department')->distinct('department')->get();
        // dd($users->department);
        // print_r($users);
        // die();
        // $users = User::all();
        // session(['user_infos' => $users]);
        // return view('login_panel');
        return view('login_panel',[
            'user_infos' => $users,
        ]);
    }

    function admin_login(Request $request){

        // $value = session('user_infos');
        // $user_type = $request->user_type;
        // $users_info = User::find($id);
                // $users_info = User::where('user_type', $request->user_type)->first();
                // dd($request->all());
                // $users_info = User::where('department', $request->department)->first();
                $users_info = User::where('department', $request->department)->first();
        // print_r($users_info);
        // die();

        return view('admin.admin_login_customize',[
            'users_info' => $users_info,
        ]);
    }

    function admin_login_confirm(Request $request){

        // $request->validate([
        //     'name' => 'required',
        //     'password' => 'required',
        // ]);

        if(User::where('name', $request->name)->exists()){
            // $name = $request->name;
            if(Auth::guard('web')->attempt(['department' => $request->department, 'name' => $request->name, 'password' => $request->password])){
                // if(Auth::guard('user')->user()->email_verified_at == null){
                //     Auth::guard('user')->logout();
                //     return back()->with('notverified','Please verify Your Email');
                // }else{
                //     return redirect()->route('index');
                // }
                return redirect()->route('dashboard');
                // return $name;
                // return view('dashboard', compact('name'));
                // return redirect()->route('dashboard', [$name]);
                // return redirect('/dashboard')->with('status', 'Profile updated!');
            }
            else{
                return back()->with('exist', 'Wrong Password');

                // return "Plsease put the write User Name and Password";
                // return Session::flash('exist', 'This is a message!');
                // return redirect('/admin/login')->with('exist', 'This is a message!');
            }
        }
        else{
            // return back()->with('exist', 'User does not exist');
            // redirect('admin.login')->with('exist', 'User does not exist!');
            echo "The User does not exist";
        }


    }

}
