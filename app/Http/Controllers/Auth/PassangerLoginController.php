<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PassangerLoginController extends Controller
{   
	public function __construct()
	{
        $this->middleware('guest')->except('passangerlogout');
		//$this->middleware('guest:passanger',['except' => ['passangerlogout']] );	
	}
    public function showLogInForm()
    {
    	return view('passangers.login');
    }

    public function login( Request $request )
    {
    	$credential = $this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);
        
         if( Auth::guard('passanger')->attempt($credential, $request->remember) ) {
            // if successfull, redirect to their intended location
        //if come from chekout page, send him back there
            if (\Session::has('bookings')) {
                return redirect()->intended(route('passanger.dashboard'));
                // should be this
                //return redirect()->intended('/booknow');
            }
             return redirect()->intended(route('passanger.dashboard'));
         }
            //if fail, then rederect to the login with the form data
           // return redirect()->back()->withErrors(['You have entered wrong credential']);

            return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function passangerlogout(Request $request)
    {
        Auth::guard('passanger')->logout();
       // $request->session()->invalidate();
        return redirect('/');
    }
}
