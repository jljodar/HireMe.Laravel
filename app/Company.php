<?php

namespace App;

class Company extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }


    public function scopeFilter($query, $filters) {
        if($search = $filters['search'] ?? "") {
            $words = explode(" ", $search);

            foreach($words as $word) {
                $query->Where('name', 'LIKE', '%' . $word . '%');
            }
        }

        // Open positions filter
        if($filters['openPositions'] ?? "" == "true") {
            $query->whereHas('offers', function ($q) {
                $q->whereDate('offers.started_at', '<=', new \DateTime())
                    ->whereDate('offers.ended_at', '>=', new \DateTime());
            });
        } else if($filters['noOpenPositions'] ?? "" == "true") {
            $query->whereDoesntHave('offers', function ($q) {
                $q->whereDate('offers.started_at', '<=', new \DateTime())
                    ->whereDate('offers.ended_at', '>=', new \DateTime());
            });
        }
    }

    public function scopeActiveOffers() {
        return $this->offers->where('isActive', true);
    }
}
