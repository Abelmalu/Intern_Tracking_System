<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User_application extends Model
{
    use HasFactory;

    public function internship()
    {
        return $this->belongsTo(Internship::class, 'internship_id', 'id');
    }

    public function user(){


        return $this->belongsTo(User::class);
    }

    public function prerequisiteResponses(): HasMany
    {
        return $this->hasMany(UserPrerequisiteResponse::class, 'user_application_id', 'id');
    }

}
