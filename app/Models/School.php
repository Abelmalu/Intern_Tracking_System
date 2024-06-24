<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','head_id'

    ];

    public function departments(){

        return $this->hasMany(Department::class);
    }

    public function head(){


        return $this->belongsTo(User::class, 'head_id', 'id');
    }
}
