<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable= ['season'];

    public function leagues(){
        return $this->belongsToMany(League::class, 'league_has_seasons','season_id','league_id');
    }

    public function matches(){
        return $this->hasMany(Match::class);
    }

}
