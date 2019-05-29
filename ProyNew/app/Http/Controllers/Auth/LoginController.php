<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;

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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        $role = Auth::user()->role; 
        $id=Auth::user()->id;
        Session::put('id', $id);   
    // Check user role
         switch ($role) {
            case 1:
                return 'administrador/horario'; 
            break;
            case 2:
                return 'docente/index';
            break; 
            case 3:
                return 'auxiliar';
            break; 
            default:
                return 'estudiante/inscripcion'; 
            break;
         }   
      
    }
}
