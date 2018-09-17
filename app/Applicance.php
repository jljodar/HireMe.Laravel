<?php

namespace App;

class Applicance extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
