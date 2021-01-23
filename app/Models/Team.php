<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable=['name', 'shortcut'];

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function matches(){
        return $this->hasMany(Match::class);
    }
}
