<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    function index(){

        $staffs = User::where('is_staff',1)->get();


        return view('pages.admin.staff.list',['staffs'=>$staffs]);




    }

    function create(){

        return view('pages.admin.staff.add');

    }

    function store(Request $request)
    {

        $request->validate([
            'name'=>'required | string',
            'email'=> 'required||unique:\App\Models\User,email',
            'password'=>'confirmed|string|min:8'


        ]);

        $user = new USer([
            'name'=> $request->get('name'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password')),
            'is_staff'=>'1'


        ]);

        if($user->save()){


            return redirect()->route('staff.create')->with('success','staff stored successfully');
        }

        else{

            return redirect()->route('staff.create')->with('error','staff not created!');
        }


    }


    function show(User $staff)
    {
        return view('pages.admin.staff.view',['staff'=>$staff]);

    }

    function edit(User $user){


    }



    function update(User $user, Request $request){


    }

    function destroy(User $staff){

        $staff->delete();
        return redirect()->route('staff.list')->with('success','staff deleted successfully');


    }

}
