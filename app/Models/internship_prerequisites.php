<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class internship_prerequisites extends Model
{
    use HasFactory;


    public function internship(){

        return $this->belongsTo(internship::class);
    }
}