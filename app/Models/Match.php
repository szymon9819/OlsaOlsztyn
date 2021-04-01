<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['match_day', 'time'];

    public function matchResult()
    {
        return $this->hasOne(MatchResult::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'guest_id');
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }
}
