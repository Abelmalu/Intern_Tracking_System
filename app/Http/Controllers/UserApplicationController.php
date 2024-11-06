<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\UserPrerequisiteResponse;
use App\Models\User_application;
use App\Models\User;


class UserApplicationController extends Controller
{
    //


    public function   index (){

    }
    public function   create (Internship $internship ){

        return view('pages.user.internship.apply',compact('internship'));
    }
    public function store(Request $request, Internship $internship)
    {
        /**
         * user data zx
         *
         * @var \App\Models\User $user_data
         */
        $user_data = User::find($request->get('user_id'));

        //check if the user have internship
        if ($user_data->hasInternship()) {
            return redirect()->route('user.internship.apply', $internship->id)->with('error', 'You have Internship in progress!');
        }

        //check if the user already applied
        if ($user_data->alreadyApplied($internship)) {
            return redirect()->route('user.internship.apply', $internship->id)->with('error', 'You have already applied to this internship!');
        }

        //check if the deadline is passed
        if ($user_data->alreadyApplied($internship)) {
            return redirect()->route('user.internship.apply', $internship->id)->with('error', 'You have already applied to this internship!');
        }

        /**
         * rules for validation
         *
         * @var array $rules
         */
        $rules = [
            'user_id' => 'exists:\App\Models\User,id|integer|required',
            'internship_id' => 'exists:\App\Models\Internship,id|integer|required',
        ];

        foreach ($internship->prerequisites as $prerequisite) {
            $rules['r_' . $prerequisite->id] = 'required';
        }

        // validating request
        $request->validate($rules);

        /**
         * new application data
         *
         * @var \App\Model\UserApplication $data
         */
        $data = new User_application($request->all());

        // saving new instance in db
        if ($data->save()) {
            // checking if the internship have prerequisite
            if ($internship->prerequisites) {

                /**
                 * flag for checking insertions
                 *
                 * @var bool $flag
                 */
                $flag = true;

                foreach ($internship->prerequisites as $prerequisite) {

                    $pre_data = new UserPrerequisiteResponse([
                        'user_application_id' => $data->id,
                        'prerequisite_id' => $prerequisite->id,
                        'response' => $request->get('r_' . $prerequisite->id)
                    ]);

                    if (!$pre_data->save()) $flag = false;
                }

                if ($flag) {
                    return redirect()->route('user.internship.apply', $internship->id)->with('success', 'Successfully applied!');
                } else {
                    return redirect()->route('user.internship.apply', $internship->id)->with('error', 'Something went wrong, please try again!');
                }
            } else {
                return redirect()->route('user.internship.apply', $internship->id)->with('success', 'Successfully applied!');
            }
        } else {
            return redirect()->route('user.internship.apply', $internship->id)->with('error', 'Something went wrong, please try again!');
        }
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
