<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    public function camp() {
        return $this->belongsTo(Camp::class);
    }
    
    public function project()
    {
        return $this->hasOneThrough(Project::class, Camp::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class)->withTimestamps();;
    }
}
