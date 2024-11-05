<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Internship;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $heads = [
            '#',
            'Department Name',
            'School Name',
            'Department Head',
            'Actions'
        ];

        $departments = Department::all();

        return view('pages.admin.department.list',compact('departments','heads'));
    }

    public function create()
    {

        $staffs = User::where('is_staff', 1)->get();
        $schools = School::all();

        return view('pages.admin.department.add', compact('staffs', 'schools'));
    }
    public function store(Request $request)
    {




        $request->validate(
            [
                'head_id' => 'nullable|exists:\App\Models\User,id|integer',
                'name' => 'string|required',
                'description' => 'nullable|string',
                'school_id' => 'required|exists:\App\Models\School,id|integer'

            ]
        );


        $department = new Department($request->all());
        $department_head = User::find($request->get('head_id'));


        if ($department->save()) {
            if (!empty($department_head)) {
                $department_head->assignRole('department');
            }

            return redirect()->route('department.index')->with('success', 'department succesfully created');
        } else {

            return redirect()->route('department.create')->with('error', 'department not created');
        }
    }
    public function show(Department $department)
    {
        return view('pages.admin.department.view',compact('department'));
    }
    public function edit(Department $department)

    {

        $schools = School::all();


        $staffs = User::where('is_staff', 1)->get();
        return view('pages.admin.department.edit', ['staffs' => $staffs, 'department' => $department, 'schools'=>$schools]);

    }
    public function update(Request $request, Department $department)
    {

        $request->validate(
            [
                'head_id' => 'nullable|exists:\App\Models\User,id|integer',
                'name' => 'string|required',
                'description' => 'nullable|string',
                'school_id' => 'required|exists:\App\Models\School,id|integer'

            ]
        );
        $department_head = User::find($request->get('head_id'));
        $previous_department_head = $department->head;

        if (!empty($department_head) && !empty($previous_department_head)) {
            // dd($department_head);
            $department_head->assignRole('department');
            $previous_department_head->removeRole('department');
        } elseif (empty($department_head) && empty($previous_department_head)) {

            $department_head->removeRole('department');
            $previous_department_head->removeRole('department');
        } elseif (empty($department_head)) {

            $previous_department_head->removeRole('department');
        }
         elseif (!empty($department_head)) {

            $department_head->assignRole('department');
        }



        if ($department->update($request->all())) {

            return redirect()->route('department.index')->with('success', 'department updated successfully');
        } else {

            return redirect()->route('department.index')->with('error', 'department not updated successfully');
        }
    }
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('department.index')->with('Success', 'successfully deleted');

    }

    public function apiIndex(){

        $internships = Internship::all();
    }
}
