<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',  'title', 'description', 'minimum_cgpa', 'quota', 'deadline', 'start_date', 'end_date', 'status', 'avatar'


    ];


    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class);
    }


    public function prerequisites(){


        return $this->hasMany(internship_prerequisites::class);
    }


    public function applications(){

        return $this->hasMany(User_application::class);
    }

    public function isDeadlinePassed(){

        return  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->deadline)->isPast();
    }


    public function isStarted(){

        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->start_date)->isPast();
    }


    public function isEnded(): bool
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->end_date)->isPast();
    }

    public function getInterns(){

        $userApplications = User_application::where('internship_id',$this->id)->where('status', '1')->get();


        $users = [];

        foreach ($userApplications as $userApplication) {
            $users[] = $userApplication->user;
        }

        return $users;


    }

    public function updateStatus(int $status = null): bool
    {
        if ($status == null) {
            if ($this->isDeadlinePassed()) {
                if ($this->status == 1 || $this->status == 3 || $this->status == 2 || $this->status == 0) {
                    if (!$this->isEnded() && !$this->isStarted()) {
                        $this->update(['status' => 3]);
                    }
                }

                if ($this->isEnded() && $this->status == 3) {
                    $this->update(['status' => 4]);
                }
            } else {
                $this->update(['status' => 1]);
            }
        }
        return true;
    }

}
