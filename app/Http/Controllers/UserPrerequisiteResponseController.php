<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPrerequisiteResponseController extends Controller
{
    protected $fillable = [
        'user_application_id',
        'prerequisite_id',
        'response'
    ];

}
