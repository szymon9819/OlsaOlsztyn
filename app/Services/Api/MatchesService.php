<?php

namespace App\Services\Api;

use App\Models\Match;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class MatchesService
{

    public static function playedMatchesForCurrentSeason($leagues, $season)
    {
        $matches = new Collection();
        foreach ($leagues as $league)
            $matches = $matches->merge($league->playedMatches($season));
        $outputMatches=[];
        foreach ($matches->toArray() as $match)
            $outputMatches+=self::matchToArray($match);

        return $outputMatches;
    }


    public static function playedMatches($leagues, $seasons)
    {
        $matches = [];
        foreach ($seasons as $season) {
            $seasonMatches = new Collection();
            foreach ($leagues as $league)
                $seasonMatches = $seasonMatches->merge($league->playedMatches($season));
            $matches[$season->season] = $seasonMatches->toArray();
        }

        return self::playedMatchesToArray($matches);
    }

    public static function allMatches($matches){
        dd($matches);

        return $matches;
    }

    private static function playedMatchesToArray($seasonMatches)
    {
        $matches = [];
        foreach ($seasonMatches as $seasonName => $season) {
            $matches[$seasonName] = [];
            foreach ($season as $match)
                $matches[$seasonName] += self::matchToArray($match);
        }
        return $matches;
    }

    private static function matchToArray($match){
        return array(
            $match['id'] => array(
                'match_day' => $match['match_day'],
                'time' => $match['time'],
                'home_score' => $match['match_result']['home'],
                'guest_score' => $match['match_result']['guest']
            )
        );
    }

}
