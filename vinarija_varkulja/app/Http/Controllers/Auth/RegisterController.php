<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
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
    */
    
    use RegistersUsers;
    
    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() 
    {
        session_start();
        $i = 0;
        if(isset($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $keys => $values)
            {
                $i++;
            }
            
            if($i>0)
            {
                return '/shop';
            }
            else{
                return '/home'; 
            }
        }
    }
    
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
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255']
        ]);
    }
    
    /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \App\Models\User
    */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address']
        ]);
    }
}
