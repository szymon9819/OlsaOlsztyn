<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function playedMatchesWithoutResult(Season $season,League $league){

        $result=DB::table('matches AS m')
            ->leftJoin('match_results as mr','m.id','=','mr.match_id')
            ->join('teams as t1','m.home_id','=','t1.id')
            ->join('teams as t2','m.guest_id','=','t2.id')
            ->whereNull('mr.match_id')
            ->where('m.match_day','<',Carbon::now())
            ->where('m.season_id','=',DB::raw($season->id))
            ->where('t1.league_id','=',DB::raw($league->id))
            ->select('t1.name as home_name' ,'t2.name as guest_name','m.match_day','m.id')->get();

            return $result;
    }
}
