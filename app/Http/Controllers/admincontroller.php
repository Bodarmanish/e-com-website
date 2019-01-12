<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Hash;

class admincontroller extends Controller
{
     //use AuthenticatesUsers;

    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->input();
            //$user = User::where('email', $request->email)->first();
            
            
           // dd($data);
           if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
           {

                Session::put('adminSession',$data['email']);
                return redirect('/admin/dashboard');

            }
            else
            {
                return redirect('/admin')->with('flash_message_error','Invalid Username Or Password');

                
                
            }
           
            
            
        }
        return view('admin.login');
    }


    public function dashboard()
    {
        if(Session::has('adminSession'))
        {
           //perform all dashborard task
        }
        else
        {
         return redirect('/admin')->with('flash_message_logout','Please Login To Access');
        }
        return view ('admin.dashboard');
    }

    public function logout()
    {
        session::flush();
        return redirect('/admin')->with('flash_message_logout','Logout Successful');

    }
    public function settings()
    {
        if(Session::has('adminSession'))
        {
           //perform all settings task
        }
        else
        {
         return redirect('/admin')->with('flash_message_logout','Please Login To Access');
        }
        return view ('admin.settings');
    }

    public function chkpassword(Request $request)
    {
            $data = $request->all();
            $current_password = $data['current_Pwd'];
            $check_password = User::where(['id'])->first();
            dd($check_password);
            if(Hash::check($current_password,$check_password->password))
            {
                echo "true";die;
            }
            else
            {
                echo "false";die;
            }
    }
    public function updatepassword(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_Pwd'];
            if(Hash::check($current_password,$check_password->password))
            {
                $password = bcrypt($data['new_Pwd']);
                User::where('id')->Update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_update','Password Update Successful');
            }
            else
            {
                return redirect('/admin/settings')->with('flash_message_update',' Current Password Incorrect ');
            }

        }

    }
}
 