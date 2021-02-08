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

    public static function playedMatches($league)
    {
//        $matches = collect();
//        foreach ($league->teams as $team) {
//            foreach ($team->awayMatches->merge($team->homeMatches) as $match)
//                $matches->push($match);
//        }
//        $matches = $matches->unique()->pluck('id')->toArray();
//
//        return MatchResult::whereIn('match_id', $matches)->get();

    }
}
