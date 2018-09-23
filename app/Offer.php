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


    public function scopeFilter($query, $filters) {
        if($search = $filters['search'] ?? "") {
            $words = explode(" ", $search);

            foreach($words as $word) {
                // Construct an equivalent of  WHERE ... AND (x OR y) AND ...
                $query->Where(function($q) use ($word) {
                    $q->Where('title', 'LIKE', '%' . $word . '%')
                        ->orWhere('body', 'LIKE', '%' . $word . '%');
                });
            }
        }

        if($companySearch = $filters['company-search'] ?? "") {
            $query->whereHas('company', function ($query) use ($companySearch) {
                $words = explode(" ", $companySearch);

                foreach($words as $word) {
                    $query->Where('name', 'LIKE', '%' . $word . '%');
                }
            });
        }
    }
}
