<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }



    // protected $redirectTo = 'home';


    // protected function redirectTo()
    // {

    //     if (Auth::user()->role == 'admin'){

    //         return   '/home';


    //     }
    //     if (Auth::user()->role == 'department'){

    //         return   '/dashboard';


    //     }
    //     else{

    //         return '/else';
    //     }


    //     }


    public function redirectTo()
    {

        $redirects = [
            'admin' => '/home',
            'department' => '/dashboard',
            'user' => '/userHome'

        ];

        $roles = Auth()->user()->roles->map->name;

        foreach ($redirects as $role => $url) {
            if ($roles->contains($role)) {
                return $url;
            }
        }
        return '/login';
    }




    }








