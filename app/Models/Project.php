<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function camps() {
        return $this->hasMany(Camp::class);
    }
    public function periods() {
        return $this->hasManyThrough(Period::class, Camp::class);
    }
    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }
}
