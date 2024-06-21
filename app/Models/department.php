<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class department extends Model
{
    use HasFactory;

    protected $fillable = [

        'school_id', 'head_id', 'name', 'description'

    ];


    public function internships(){


        return $this->hasMany(Internship::class);
    }

    public function head(){

        return $this->belongsTo(User::class, 'head_id', 'id')->withTrashed();
    }

    public function school(){

        return $this->belongsTo(School::class);
    }
}
