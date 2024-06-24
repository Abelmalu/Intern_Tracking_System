<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    //

    public function index(){
                                
        $schools = School::all();

        return view('pages.admin.school.list',['schools'=>$schools]);



    }


    public function create(){

        return view('pages.admin.school.add');

    }

    public function store(Request $request){

        //  $request->validate([
        //     'name'=> 'string|required ',
        //     'description'=>'string|nullable '
        // ]);

        $request->validate(
            [
                'name' => 'string|required',
                'description' => 'nullable|string'
            ]
        );


        $data = new School($request->all());

        if($data->save()){

            return redirect()->route('school.create')->with('success','successfully created');
        }

        else{

            return redirect()->route('school.create')->with('error','not created');
        }


    }

    public function show(School $school){

    }

    public function edit(School $school){

    }

    public function update(Request $request, School $school){

    }

    public function destroy(School $school){

    }


}
