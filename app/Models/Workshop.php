<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    public function periods()
    {
        return $this->belongsToMany(Period::class)->withTimestamps();;
    }
}
