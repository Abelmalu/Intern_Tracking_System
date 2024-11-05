<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminIndex()
    {
        return view('pages.admin.admin_index');
    }

    public function schoolIndex()
    {
        return view('home');
    }

    public function userIndex()
    {
        return view('pages.user.user_home');
    }
}
