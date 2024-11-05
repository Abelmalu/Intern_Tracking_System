<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;

class UserApplicationController extends Controller
{
    //


    public function   index (){

    }
    public function   create (){

        return view('pages.user.internship.apply');

    }
    public function    store(Request $request, Internship $internship){



    }
    public function  show  (){

    }
    public function   update (){

    }
    public function   edit (){

    }
    public function   destroy (){

    }

}
