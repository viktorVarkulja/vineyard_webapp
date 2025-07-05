<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */
  
  use AuthenticatesUsers;
  
  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  //protected $redirectTo = RouteServiceProvider::HOME;
  public function redirectTo() {
    $admin = Auth::user()->is_admin; 
    switch ($admin) {
      case 1:
        return '/admin';
        break;
        default:
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
            break;
          }
          else{
            return '/home'; 
            break;
          }
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
      $this->middleware('guest')->except('logout');
    }
  }
  