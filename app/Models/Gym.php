<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gym extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
        'open_time_at' => 'datetime:H:i',
        'closed_time_at' => 'datetime:H:i',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($gym) {
            if (empty($gym->slug)) {
                $gym->slug = \Illuminate\Support\Str::slug($gym->name);
            }
        });
    }

    public function setNameAttributes(string $name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = \Illuminate\Support\Str::slug($name);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Relasi Many-to-Many dengan Facility
     */
    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'gym_facilities', 'gym_id', 'facility_id')
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

    public function gymTestimonials(): HasMany
    {
        return $this->hasMany(GymTestimonial::class);
    }

    public function gymPhotos(): HasMany
    {
        return $this->hasMany(GymPhoto::class);
    }
}
