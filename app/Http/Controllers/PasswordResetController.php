<?php

namespace App\Http\Controllers;

use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\ResetPassword;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Notifications\notify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
     public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user)
        {
            // return response()->json([
            //     'message' => ' We did not find a user with that e-mail address.'
            // ], 404);
        	
        	return redirect('password/forgotpwd')->with('flash_message_user','We did not find a user with that E-mail address.');
        }
         $passwordReset = ResetPassword::updateOrCreate(

                                                        ['email' => $user->email],

                                                        [
                                                            'email' => $user->email,
                                                            'token' => str_random(60)
                                                        ]

                                                       );
        if ($user && $passwordReset)
        {
	            $user->notify(
	                new PasswordResetRequest($passwordReset->token)
	            );
	        
    	}
    		 return redirect('/admin')->with('flash_message_logout','We have e-mailed your password reset link');
    	// return response()->json([
	    //         'message' => 'We have e-mailed your password reset link!'
	    //     ]);
    }

    public function forgotpwd()
    {
    	return view('admin.forgotpwd');
    }
    public function message()
    {
            return view('admin.createpwd');

    }


    // public function createpwd()
    // {
    //     return view('admin.createpwd');
    // }
    
    public function find(Request $request,$token)
    {

        $passwordReset = ResetPassword::where('token', $token)
            ->first();
        if (!$passwordReset)
            return back()->with('message', 'his password reset token is invalid.');
            
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(120)->isPast()) {
            $passwordReset->delete();
            return redirect()->back()->with('message', 'his password reset token is invalid.');
        }
            
                return view('admin.createpwd')->with(['token' => $token, 'email' => $request->email]
                                            );                             

                    //response()->json($passwordReset);
    }
    

    public function pwdreset(Request $request)
    {
    	
        //dd($request);
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required'
        ]);
        $passwordReset = ResetPassword::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();

        if (!$passwordReset){
            return back()->with('message', 'We did not find a user with that E-mail address.');
        }
            
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user){

            return redirect()->back()->with('message', 'We did not find a user with that E-mail address.');
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return redirect('/admin')->with('flash_message_logout','Password Reset Successfuly!');
        //return response()->json($user);
    }


    


}
