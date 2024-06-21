<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id', 'title', 'description', 'minimum_cgpa', 'quota', 'deadline', 'start_date', 'end_date', 'status', 'avatar'


    ];


    public function department(){

        return $this->belongsTo(Department::class);
    }
}
