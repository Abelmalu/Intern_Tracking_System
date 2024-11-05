<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{



    public function profile(){


        return view('pages.user.profile.base');
    }


    function index(){

        $staffs = User::where('is_staff',1)->get();

        $heads = [
            '#',
            'Staff Name',
            'Status',
            'Actions'
        ];


        return view('pages.admin.staff.list',['staffs'=>$staffs, 'heads'=>$heads]);




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
        return redirect()->route('staff.index')->with('success','staff deleted successfully');


    }





    public function passwordChange(Request $request, User $user)
    {
        // check for authorization
        if ($user->id !== auth()->user()->id) return redirect()->route('userProfile.detail')->with('error', 'You are not Authorized for this action!');
        // validating request
        $validator = Validator::make($request->all(), [
            'old_password' => 'string|required',
            'password' => 'string|required|confirmed|min:8',
        ]);

        // check if the validator failed
        if ($validator->fails()) {
            return redirect()->route('userProfile.detail')->withErrors($validator)->withInput()->with(['password_page' => true]);
        }

        if (Hash::check($request->get('old_password'), $user->password)) {
            $user->update([
                'password' => Hash::make($request->get('password'))
            ]);
            return redirect()->route('userProfile.detail')->with(['success' => 'Password changed successfully.', 'password_page' => true]);
        } else {
            return redirect()->route('userProfile.detail')->with(['error' => 'Old password is incorrect.', 'password_page' => true]);
        }
    }


}

