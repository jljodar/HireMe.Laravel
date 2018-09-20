<?php

namespace App;

class Offer extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'started_at',
        'ended_at',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applicances()
    {
        return $this->hasMany(Applicance::class);
    }


    // This is an accessor, allowing to call  $offer->isActive
    public function getIsActiveAttribute()
    {
        return ($this->started_at->isPast() && $this->ended_at->isFuture());
    }
}
