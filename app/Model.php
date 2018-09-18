<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

// If we make the rest of the models inherits from this one, all of them will get guarded
class Model extends Eloquent
{
    // List of attributes that we don't want to be mass assignable
    //   It is the opposite of $fillable
    protected $guarded = ['created_at', 'updated_at', 'deleted_at', 'user_id'];
}
