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

}
