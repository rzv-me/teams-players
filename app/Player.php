<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $fillable = ['first_name', 'last_name'];

    function team()
    {
        return $this->belongsTo(Team::class);
    }
}
