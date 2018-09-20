<?php

namespace App;

class Applicance extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'viewed_at',
        'accepted_at',
        'declined_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
