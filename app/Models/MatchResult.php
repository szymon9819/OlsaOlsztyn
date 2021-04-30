<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MatchResult extends Model
{
    protected $fillable = ['home', 'guest', 'match_id'];

    public function match()
    {
        return $this->belongsTo(Match::class);
    }


    public static function allResultsForSeason(Season $season)
    {
        $results = DB::table('match_results AS mr')
            ->join('matches AS m', 'mr.match_id', '=', 'm.id')
            ->join('teams AS t1', 'm.home_id', '=', 't1.id')
            ->join('teams AS t2', 'm.guest_id', '=', 't2.id')
            ->join('leagues AS l', 't1.league_id', '=', 'l.id')
            ->join('seasons AS s', function ($join) use ($season) {
                $join->on('m.season_id','=','s.id');
                $join->on('s.id','=', DB::raw($season->id));
            })->select(
                'mr.home', 'mr.guest', 't1.name as home_team',
                't2.name as guest_team', 'l.name as league_name', 's.season'
            )->get();

        return $results;
    }
}
