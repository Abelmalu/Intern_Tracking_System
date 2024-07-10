<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function departmentIndex(){


        return view('pages.department.department_home');
    }
}
