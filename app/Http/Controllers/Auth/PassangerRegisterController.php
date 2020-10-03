<?php

namespace App\Http\Controllers\Auth;

use App\Passanger;
use App\Mail\WelcomePassanger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;

class PassangerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
        Show Passanger registration form
     */
    
    public function showPassangerRegistrationForm()
    {
        return view('passangers.register');
    }

    public function register( Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $passanger = $this->create($request->all());
        \Mail::to($passanger)->send(new WelcomePassanger($passanger) );
            //auth()->login($passanger);
       return redirect('passanger/login');
    }

    protected function validator(array $data) {

        return Validator::make($data, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email|max:255|unique:passangers',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Passanger
     */
    protected function create(array $data)
    {
        return Passanger::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
