<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class internship_prerequisites extends Model
{
    use HasFactory;
    protected $fillable = [
        'internship_id', 'pre_key', 'description'
    ];

    public function internship(){

        return $this->belongsTo(internship::class);
    }

    public function prerequisiteResponses()
    {
        return $this->hasMany(UserPrerequisiteResponse::class, 'user_application_id', 'id');
    }
}
