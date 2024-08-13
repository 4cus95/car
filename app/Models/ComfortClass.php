<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComfortClass extends Model
{
    use HasFactory;

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
