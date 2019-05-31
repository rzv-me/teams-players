<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
