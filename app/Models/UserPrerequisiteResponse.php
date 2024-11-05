<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserPrerequisiteResponse extends Model
{
    use HasFactory;


    public function userApplication()
    {
        return $this->belongsTo(User_application::class);
    }

    /**
     * Get the internshipPrerequisite that owns the UserPrerequisiteResponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function internshipPrerequisite()
    {
        return $this->belongsTo(internship_prerequisites::class);
    }
}
