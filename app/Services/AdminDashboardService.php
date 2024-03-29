<?php

namespace App\Services;

use App\Models\Match;
use App\Models\MatchResult;
use App\Models\Season;
use Carbon\Carbon;

class AdminDashboardService
{
//    public static function getMatchWithoutResult($leagues, $season)
//    {
//        $matches = collect([]);
//        foreach ($leagues as $league) {
//            if (!empty($league->seasons()->find($season->id))) {
//                $tmp = [];
//                //get all macthes for specify league if season is newest, and match day is less than actual day
//                foreach ($league->seasons()->find($season->id)->matches()
//                             ->whereIn('home_id', $league->teams()->pluck('id')->toArray())
//                             ->whereDate('match_day', '<', Carbon::now())->get() as $match) {
//                    if (empty($match->matchResult)) {
//                        array_push($tmp, ['home' => $match->homeTeam,
//                            'guest' => $match->awayTeam,
//                            'match_id' => $match->id
//                        ]);
//                    }
//                }
//                if (!empty($tmp)) {
//                    $matches->push([
//                        'league' => $league,
//                        'matches' => $tmp
//                    ]);
//                }
//            }
//        }
//        return $matches;
//    }

    public static function
    playedMatchesForAllLeagues($leagues, $season)
    {
        $matches = [];
        foreach ($leagues as $league) {
            $matches[$league->name] = MatchResult::allResultsForSeason($league, $season)->toArray();
        }
        return $matches;
    }

    public static function matchesForEnterScoreForAllLeagues($leagues, $season)
    {
        $matches = [];
        foreach ($leagues as $league) {
            $matches[$league->name] = Match::playedMatchesWithoutResult($season, $league)->toArray();
        }

        return $matches;
    }

}
