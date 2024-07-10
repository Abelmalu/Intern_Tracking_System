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
        'department_id', 'title', 'description', 'minimum_cgpa', 'quota', 'deadline', 'start_date', 'end_date', 'status', 'avatar'


    ];


    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id')->withTrashed();
    }

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }



    public function prerequisites(){


        return $this->hasMany(internship_prerequisites::class);
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


}
