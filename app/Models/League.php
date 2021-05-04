<?php

namespace App\Models;

use App\Models\Pivots\LeaguesHasSeasons;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['name'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function stadiums()
    {
        return $this->hasMany(Stadium::class);
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'league_has_seasons', 'league_id', 'season_id');
    }

    //returns matches for all leagues ... not for this league
    public function matchesSeason($season)
    {
        return $this->hasManyThrough(Match::class, LeaguesHasSeasons::class,
            'league_id', 'season_id', 'id', 'season_id')
            ->where('league_has_seasons.season_id', $season->id);
    }


//    public function playedMatches($season)
//    {
//        dd( $this);
//        dd(League::find(1)->teams->flatMap->awayMatches->flatMap->matchResult);
//        dd(League::find(1));
//        dd(League::find(1)->teams()->has('awayMatches.matchResult')->get()->toArray());
//        dd(League::find(2)->matchesTeams);

//        $matches = collect();
//        //temporary solution
//        foreach ($this->teams()->pluck('id')->toArray() as $id)
//            foreach ($season->matches()->where('home_id', $id)->get() as $match)
//                if (!empty($match->matchResult))
//                    $matches->push($match);
//
//        return $matches;
//
//
//        return Match::whereHas('season', function ($query) use ($season) {
//            $query->where('id', $season->id);
//        })->has('matchResult')->whereHas(
//            'awayTeam.league', function ($leagueQuery) {
//            //team in specify league
//            $leagueQuery->where('id', $this->id);
//        });
//
//    }
}
