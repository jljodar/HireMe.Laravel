<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    // We can create companies here because of the previous function that link users with companies
    public function publish(Company $company) {
        // We use save instead of create because we already have an existing instance of Company
        $this->companies()->save($company);
    }
}
