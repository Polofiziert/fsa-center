<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'charge', 'charge_reduced', 'age_start', 'age_end', 'type', 'project_id'];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
