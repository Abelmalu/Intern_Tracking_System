<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\User;
use GrahamCampbell\ResultType\Success;

class SchoolController extends Controller
{
    //

    public function index()
    {

        $schools = School::all();


        $heads = [

            '#'=>'#',
            'School Name' => 'name',
            'School Head'=>'head_id',
            'Department Count',
            'Actions'





        ];


        return view('pages.admin.school.list',compact('heads','schools'));
    }


    public function create()
    {
        $staffs = User::where('is_staff', 1)->get();


        return view('pages.admin.school.add', ['staffs' => $staffs]);
    }

    public function store(Request $request)
    {

        //  $request->validate([
        //     'name'=> 'string|required ',
        //     'description'=>'string|nullable '
        // ]);

        $request->validate(
            [
                'head_id' => 'nullable|exists:\App\Models\User,id|integer',
                'name' => 'string|required',
                'description' => 'nullable|string'
            ]
        );


        $data = new School($request->all());
        $school_head = User::find($request->get('head_id'));

        if (!empty($school_head)) {
            $school_head->assignRole('school');
        }

        if ($data->save()) {

            return redirect()->route('school.create')->with('success', 'successfully created');
        } else {

            return redirect()->route('school.create')->with('error', 'not created');
        }
    }

    public function show(School $school)
    {

        return view('pages.admin.school.view', ['school' => $school]);
    }

    public function edit(School $school)
    {
        $staffs = User::where('is_staff', 1)->get();
        return view('pages.admin.school.edit', ['staffs' => $staffs, 'school' => $school]);
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'head_id' => 'exists:\App\Models\User,id|integer|nullable',
            'name' => 'string|nullable',
            'description' => 'string|nullable'
        ]);


        $school_head = User::find($request->get('head_id'));
        $previous_school_head = $school->head;

        if (!empty($school_head) && !empty($previous_school_head)) {
            // dd($school_head);
            $school_head->assignRole('school');
            $previous_school_head->removeRole('school');
        } elseif (empty($school_head) && empty($previous_school_head)) {

            $school_head = null;
        } elseif (empty($school_head)) {

            $previous_school_head->removeRole('school');
        }



        if ($school->update($request->all())) {

            return redirect()->route('school.index')->with('success', 'school updated successfully');
        } else {

            return redirect()->route('school.index')->with('error', 'school not updated successfully');
        }
    }

    public function destroy(School $school)
    {
        $school->delete();

        return redirect()->route('school.index')->with('Success', 'successfully deleted');
    }
}
