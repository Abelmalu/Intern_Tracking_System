<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_information extends Model
{
    use HasFactory;

    protected $fillabale = [
        'user_id', 'student_id', 'cgpa', 'year_of_study', 'phone_number', 'city', 'university', 'department', 'degree', 'about_me', 'application_letter_file_path', 'application_acceptance_file_path', 'student_id_file_path'
    ];

 


    public function user(){

        return $this->belongsTo(User::class);
    }
}
