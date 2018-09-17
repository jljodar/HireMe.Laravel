<?php

namespace App;

class Offer extends Model
{
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
}
