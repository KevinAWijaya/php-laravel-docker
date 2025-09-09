<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'about',
        'name',
        'thumbnail',
        'is_open',
    ];

    /**
     * Relasi Many-to-Many dengan Gym
     */
    public function gyms()
    {
        return $this->belongsToMany(Gym::class, 'gym_facilities', 'facility_id', 'gym_id')
            ->withTimestamps()
            ->withPivot('id');
    }

    /**
     * Relasi ke GymFacility (hasMany)
     */
    public function gymFacilities()
    {
        return $this->hasMany(GymFacility::class);
    }
}
