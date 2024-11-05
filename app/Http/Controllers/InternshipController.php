<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Resources\InternshipResource;

class InternshipController extends Controller
{

    public function apiIndex(){

        $internships = Internship::all();

        $data = [];


        foreach($internships as $internship){

            $data[] = new InternshipResource($internship);


        }

        return $data;






    }
    public function index()
    {

        $internships = Internship::all();
        $heads = [

            '#' => '#',
            'Title',
            'Quota ',
            'Deadline',
            'Status',
            'Actions'

        ];

        return view('pages.department.internsip.list', compact('internships', 'heads'));
    }


    public function create()
    {
        $programs = Program::all();

        return view('pages.department.internsip.add', compact('programs'));
    }

    public function store(Request $request)
    {
        //   dd(auth()->user()->department->id,auth()->user()->department->name);
        $validatedData =  $request->validate([
            'department_id' => 'exists:\App\Models\Department,id|required|integer',
            'program_id' => 'exists:\App\Models\Program,id|array|required',
            'title' => 'string|required',
            'description' => 'required|string',
            'minimum_cgpa' => 'nullable|numeric|min:0.0|max:4.0',
            'quota' => 'nullable|integer',
            'deadline' => 'date_format:Y-m-d H:i:s|required|after:tomorrow',
            'start_date' => 'required|date_format:Y-m-d H:i:s|after:deadline',
            'end_date' => 'required|date_format:Y-m-d H:i:s|after:start_date',


        ]);

        // dd('on the way to save');

        // creating internship

        $internship = new Internship([
            'department_id' => $validatedData['department_id'],
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'minimum_cgpa' => $validatedData['minimum_cgpa'],
            'quota' => $validatedData['quota'] ?? 0, // Set quota to 0 if not provided
            'deadline' => $validatedData['deadline'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        $savedInternship = $internship->save();

        $internship->programs()->attach($validatedData['program_id']);

        if ($savedInternship) {
            if ($request->prerequisite != null) {
                $prerequisite = array_filter($request->prerequisite, function ($k) {
                    return $k['pre_key'] != '' || $k['pre_key'] != null;
                });
                if (!empty($prerequisite)) {
                    // saving prerequisites

                    $internship->prerequisites()->createMany($prerequisite);
                }
            }
            return redirect()->route('internship.index')->with('success', 'Internship has been stored successfully!');
        } else {
            return redirect()->route('internship.create')->with('error', 'Something went wrong, please try again!');
        }
    }



    public function show(Internship $internship)
    {
        return view('pages.user.internship.view', compact('internship'));
    }

    public function edit(Internship $internship)
    {
        $programs = Program::all();
        return view('pages.department.internsip.edit', compact('internship', 'programs'));
    }

    public function update(Request $request, Internship $internship)
    {
        // check authorization

        // validating request
        $request->validate([
            'department_id' => 'exists:\App\Models\Department,id|integer',
            'title' => 'string',
            'program_id' => 'exists:\App\Models\Program,id|array|required',
            'description' => 'required|string',
            'minimum_cgpa' => 'nullable|numeric|min:0.0|max:4.0',
            'quota' => 'nullable|integer',
            'deadline' => 'date_format:Y-m-d H:i:s|after:tomorrow',
            'start_date' => 'nullable|date_format:Y-m-d H:i:s|after:deadline',
            'end_date' => 'nullable|date_format:Y-m-d H:i:s|after:start_date'
        ]);

        /**
         * check if the data is updated
         *
         * @var bool $flag
         */
        $flag = $internship->update([
            'department_id' => ($request->department_id) ? $request->department_id : $internship->department_id,
            'title' => ($request->title) ? $request->title : $internship->title,
            'description' => ($request->description) ? $request->description : $internship->description,
            'minimum_cgpa' => ($request->minimum_cgpa) ? $request->minimum_cgpa : $internship->minimum_cgpa,
            'quota' => ($request->quota) ? $request->quota : $internship->quota,
            'deadline' => ($request->deadline) ? $request->deadline : $internship->deadline,
            'start_date' => ($request->start_date) ? $request->start_date : $internship->start_date,
            'end_date' => ($request->end_date) ? $request->end_date : $internship->end_date
        ]);
        $internship->programs()->sync($request['program_id']);

        if ($flag) {
            return redirect()->route('internship.index')->with('success', 'Internship has been updated successfully!');
        } else {
            return redirect()->route('internship.index')->with('error', 'Something went wrong, please try again!');
        }
    }


    public function destroy(Internship $internship)
    {

        $internship->delete();

        return redirect()->route('internship.index')->with('Success', 'successfully deleted');
    }

    public function start(Internship $internship)
    {
        // check authorization

        //check status

        if (!$internship->isEnded() && $internship->isStarted() && $internship->status != '2') {
            // if (count($internship->getInterns()) > 0) {
                if ($internship->update(['status' => '2'])) {

                    return redirect()->route('internship.index',)->with('success', "internship has been Started successfully!");
                } else {
                    return redirect()->route('internship.index')->with('error', 'Something went wrong, please try again!');
                }
            // } else {
            //     return redirect()->route('internship.index')->with('error', 'No available Intern!');
            // }
        } else {
        }
    }
}
