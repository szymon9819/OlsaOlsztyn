<?php


namespace App\Services;


use Carbon\Carbon;

class AdminDashboardService
{
    public function getMatchWithoutResult($leagues,$lastSeason)
    {
        $matches = collect([]);
        foreach ($leagues as $league) {
            if (!empty($league->seasons()->where('id', $lastSeason->id)->first())) {
                $tmp = [];
                //get all macthes for specify league if season is newest, and match day is less than actual day
                foreach ($league->seasons()->where('id', $lastSeason->id)->first()->matches()
                             ->whereIn('home_id', $league->teams()->pluck('id')->toArray())
                             ->whereDate('match_day', '<', Carbon::now())->get() as $match) {
                    if (empty($match->matchResult)) {
                        array_push($tmp, ['home' => $match->homeTeam,
                            'guest' => $match->awayTeam,
                            'match_id'=>$match->id
                        ]);
                    }
                }
                if(!empty($tmp)) {
                    $matches->push([
                        'league' => $league,
                        'matches' => $tmp
                    ]);
                }
            }
        }
        return $matches;
    }
}
