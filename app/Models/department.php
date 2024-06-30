<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [

        'school_id', 'head_id', 'name', 'description'

    ];

    public function internships(): HasMany
    {
        return $this->hasMany(Internship::class, 'department_id', 'id');
    }

    public function head(){

        return $this->belongsTo(User::class, 'head_id', 'id');
    }

    public function school(){

        return $this->belongsTo(School::class);
    }
}
