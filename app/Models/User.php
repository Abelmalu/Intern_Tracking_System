<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_staff',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    //    Relationships

    public function information()
    {

        return $this->hasOne(User_information::class);
    }


    public function department()
    {

        return $this->hasOne(Department::class, 'head_id', 'id');
    }


    public function school()
    {

        return $this->hasOne(Department::class, 'head_id', 'id');
    }

    public function applications()
    {

        return $this->hasMany(User_application::class);
    }
    //relationships end here


    public function getName() {}

    public function programs()
    {


        return $this->belongsToMany(Program::class);
    }


    public function hasInternship()
    {

        if ($this->applications) {

            $flag = false;
            foreach ($this->applications as $application) {

                if ($application->status == 1) {

                    $flag = true;
                    break;
                }

                return $flag;
            }
        } else {
            return false;
        }
    }


    public function alreadyApplied(Internship $intenrship)
    {

        if ($this->applications) {

            $flag = false;

            foreach ($this->applications as $application) {
                if ($intenrship->id == $application->internship_id) {

                    $flag = true;
                    break;
                }
            }

            return $flag;
        } else {

            return false;
        }
    }

    public function isEligibleToApply(Internship $internship): array
    {
        /**
         * errors list
         *
         * @var array $errors
         */
        $errors = [];
        if ($this->information) {


            if (!$this->information->student_id) {
                $errors[] = ['You didn\'t fill Student Id!'];
            }
            if (!$this->information->cgpa) {
                $errors[] = ['You didn\'t fill Cumulative GPA!'];
            }
            if (!$this->information->university) {
                $errors[] = ['You didn\'t fill University!'];
            }
            if (!$this->information->application_letter_file_path) {
                $errors[] = ['You didn\'t upload application letter!'];
            }
            if (!$this->information->application_acceptance_file_path) {
                $errors[] = ['You didn\'t upload application acceptance form!'];
            }
            if (!$this->information->student_id_file_path) {
                $errors[] = ['You didn\'t upload student id!'];
            }
            if ($this->information->cgpa < $internship->minimum_cgpa) {
                $errors[] = ['Your Cumulative GPA is lower then the minimum required Cumulative GPA'];
            }
        } else {
            $errors[] = ['Your don\'t have any information filled, please fill first!'];
        }


        return $errors;
    }


}
