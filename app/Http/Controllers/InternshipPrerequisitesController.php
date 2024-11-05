<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\internship_prerequisites;
use App\Models\Internship;


class InternshipPrerequisitesController extends Controller
{
    //

    public function update(Request $request, Internship $internship){

        $flag = false;
        foreach ($request->prerequisite as $prerequisite) {
            if (isset($prerequisite['id'])) {
                if (isset($prerequisite['deleted'])) {
                    $flag = internship_prerequisites::find($prerequisite['id'])->delete();
                } else {
                    $flag = internship_prerequisites::find($prerequisite['id'])->update([
                        'pre_key' => $prerequisite['pre_key']
                    ]);
                }
            } else {


                $arr = [0 => $prerequisite,
                ];

                // dd($internship->title);
                $flag = $internship->prerequisites()->createMany($arr);
            }
        }
        if ($flag) {
            return redirect()->route('internship.index' )->with('success', 'Internship has been updated successfully!');
        } else {
            return redirect()->route('internship.index')->with('error', 'Something went wrong, please try again!');
        }


    }
}
