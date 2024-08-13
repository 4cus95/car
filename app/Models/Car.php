<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Car extends Model
{
    use HasFactory;

    public function comfortClass()
    {
        return $this->belongsTo(ComfortClass::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function driver() {
        return $this->hasOne(Driver::class);
    }

    public function scopeUserPositionCars(Builder $query) {
        $user = auth('sanctum')->user();
        $userPositionId = $user->position->id;

        $query->whereHas('comfortClass.positions', function ($query) use ($userPositionId) {
            $query->where('position_id', $userPositionId);
        });
    }
}
