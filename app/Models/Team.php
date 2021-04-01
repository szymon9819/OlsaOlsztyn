<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable=['name', 'shorthand'];

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function awayMatches(){
        return $this->hasMany(Match::class, 'guest_id');
    }

    public function homeMatches(){
        return $this->hasMany(Match::class, 'home_id');
    }
}
