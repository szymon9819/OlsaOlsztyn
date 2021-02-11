<?php

namespace App\Models;

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

    public function playedMatches($season)
    {
        $matches = collect();

        //temporary solution
        foreach ($this->teams()->pluck('id')->toArray() as $id)
            foreach ($season->matches()->where('home_id', $id)->get() as $match)
                if (!empty($match->matchResult))
                    $matches->push($match);

        return $matches;
    }
}
