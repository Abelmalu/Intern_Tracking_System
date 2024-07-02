<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {

        $programs = Program::all();

        $heads = [

            '#',
            'Name',
            'Actions',

        ];


        return view('pages.admin.program.list', compact('programs', 'heads'));
    }


    public function create()
    {

        return view('pages.admin.program.add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'
        ]);


        $program = new Program($request->all());

        if ($program->save()) {

            return redirect()->route('program.index')->with('success', 'program is successully stored');
        } else {
            return redirect()->route('program.index')->with('error', 'something went wrong try again later');
        }
    }

    public function show(Program $program)
    {

        return view('pages.admin.program.view', compact('program'));
    }

    public function edit(Program $program)
    {

        return view('pages.admin.program.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'
        ]);


        if ($program->update($request->all())) {

            return redirect()->route('program.index')->with('success', 'program updated successfully');
        } else {


            return redirect()->route('program.index')->with('error', 'program not updated successfully');
        }
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('program.index')->with('Success', 'successfully deleted');
    }
}
