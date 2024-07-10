<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {




    }


    public function create()
    {

        return view('pages.department.internsip.add');

    }

    public function store(Request $request)
    {
    }



    public function show(Internship $internship)
    {
    }

    public function edit(Internship $internship)
    {
    }

    public function update(Request $request, Internship $internship)
    {
    }

    public function destroy(Internship $internship)
    {
    }
}
