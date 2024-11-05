<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_information;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

class UserInformationController extends Controller
{

    public ?string $current_route = null;

    public function __construct() {
        $this->current_route = explode('.', Route::currentRouteName())[0];
    }

    public function   index (){

    }
    public function   create (){



    }
    // public function store(Request $request)
    // {
    //     /**
    //      * getting user
    //      *
    //      * @var User $user
    //      */


    //     $user = User::find($request->user_id);



    //     if($user->information){


    //         return $this->update($request, $user->information);
    //     }else{

    //         // validating request
    //         $validator = $request->validate([
    //             'user_id' => 'exists:\App\Models\User,id|integer|required',
    //             'student_id' => 'string|nullable',
    //             'cgpa' => 'numeric|nullable|min:0.0|max:4.0',
    //             'year_of_study' => 'integer|nullable',
    //             'phone_number' => 'string|nullable',
    //             'city' => 'string|nullable',
    //             'university' => 'string|nullable',
    //             'department' => 'string|nullable',
    //             'degree' => 'string|nullable',
    //             'about_me' => 'string|nullable',
    //         ]);




    //         $data = new User_information($validator);


    //         // saving new instance in db and returning
    //         if($data->save()){

    //             return redirect()->route('userProfile.detail')->with(['success' => "User Information created successfully", 'setting_page' => true]);
    //         }else{

    //             return redirect()->route('userProfile.detail')->with(['error' => 'Something went wrong, please try again!', 'setting_page' => true]);
    //         }
    //     }

    // }



    public function store(Request $request)
    {
        /**
         * getting user
         *
         * @var User $user
         */
        $user = User::find($request->user_id);

        if($user->information){

             $this->update($request, $user->information);
            return redirect()->route('userProfile.detail')->with(['success' => "User Information updated successfully", 'setting_page' => true]);

        }

        else{
            // validating request
            $validator = Validator::make($request->all(),[
                'user_id' => 'exists:\App\Models\User,id|integer|required',

                'student_id' => 'string|nullable',
                'cgpa' => 'numeric|nullable|min:0.0|max:4.0',
                'year_of_study' => 'integer|nullable',
                'phone_number' => 'string|nullable',
                'city' => 'string|nullable',
                'university' => 'string|nullable',
                'department' => 'string|nullable',
                'degree' => 'string|nullable',
                'about_me' => 'string|nullable',
            ]);

            // check if the validator failed
            if($validator->fails()){
                return redirect()->route($this->current_route.'.profile')->withErrors($validator)->withInput()->with(['setting_page' => true]);
            }

            // creating new instance
            $data = new User_information($request->all());

            // saving new instance in db and returning
            if($data->save()){
                return redirect()->route('userProfile.detail')->with(['success' => "User Information created successfully", 'setting_page' => true]);
            }else{
                return redirect()->route('userProfile.detail')->with(['error' => 'Something went wrong, please try again!', 'setting_page' => true]);
            }
        }

    }
    public function  show  (){

    }
    public function   update (Request $request, User_information $information){

        $request->validate(
            [
                'user_id' => 'exists:\App\Models\User,id|integer|required',

                'student_id' => 'string|nullable',
                'cgpa' => 'numeric|nullable|min:0.0|max:4.0',
                'year_of_study' => 'integer|nullable',
                'phone_number' => 'string|nullable',
                'city' => 'string|nullable',
                'university' => 'string|nullable',
                'department' => 'string|nullable',
                'degree' => 'string|nullable',
                'about_me' => 'string|nullable',
            ]
            );

            if ($information->update($request->all())) {

                return redirect()->route('userProfile.detail')->with('success', 'school updated successfully');
            } else {

                return redirect()->route('userProfile.detail')->with('error', 'school not updated successfully');
            }

    }

    public function upload(Request $request): RedirectResponse
    {
        // validating request
        $validator = Validator::make($request->all(), [
            'application_letter_file_path'  => 'file|nullable|mimes:jpeg,png,jpg,pdf,doc,docx',
            'application_acceptance_file_path'  => 'file|nullable|mimes:jpeg,png,jpg,pdf,doc,docx',
            'student_id_file_path' => 'file|nullable|mimes:jpeg,png,jpg,pdf,doc,docx'
        ]);

        // check if the validator failed
        if ($validator->fails()) {
            return redirect()->route($this->current_route . '.profile')->withErrors($validator)->withInput()->with(['upload_page' => true]);
        }


        /**
         * check files
         *
         * @var bool $flag
         */
        $flag = false;

        if ($request->file('application_letter_file_path')) {
            $file = $request->file('application_letter_file_path');
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $destinationPath = public_path('/uploads/application_letter');
            $file->move($destinationPath, $filename);
            if (auth()->user()->information->application_letter_file_path) {
                if (file_exists(public_path('/uploads/application_letter/' . auth()->user()->information->application_letter_file_path))) {
                    unlink(public_path('/uploads/application_letter/' . auth()->user()->information->application_letter_file_path));
                }
            }
            if (auth()->user()->information->update(['application_letter_file_path' => $filename])) {
                $flag = true;
            }
        }

        if ($request->file('application_acceptance_file_path')) {
            $file = $request->file('application_acceptance_file_path');
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $destinationPath = public_path('/uploads/application_acceptance');
            $file->move($destinationPath, $filename);
            if (auth()->user()->information->application_acceptance_file_path) {
                if (file_exists(public_path('/uploads/application_acceptance/' . auth()->user()->information->application_acceptance_file_path))) {
                    unlink(public_path('/uploads/application_acceptance/' . auth()->user()->information->application_acceptance_file_path));
                }
            }
            if (auth()->user()->information->update(['application_acceptance_file_path' => $filename])) {
                $flag = true;
            }
        }

        if ($request->file('student_id_file_path')) {
            $file = $request->file('student_id_file_path');
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $destinationPath = public_path('/uploads/student_id');
            $file->move($destinationPath, $filename);
            if (auth()->user()->information->student_id) {
                if (file_exists(public_path('/uploads/student_id/' . auth()->user()->information->student_id))) {
                    unlink(public_path('/uploads/student_id/' . auth()->user()->information->student_id));
                }
            }
            if (auth()->user()->information->update(['student_id_file_path' => $filename])) {
                $flag = true;
            }
        }



        // uploading file and returning
        if ($flag) {
            return redirect()->route('userProfile.detail')->with(['success' => "File uploaded successfully", 'upload_page' => true]);
        } else {
            return redirect()->route('userProfile.detail')->with(['error' => 'Something went wrong, please try again!', 'upload_page' => true]);
        }
    }
    public function   edit (){

    }
    public function   destroy (){

    }
}
