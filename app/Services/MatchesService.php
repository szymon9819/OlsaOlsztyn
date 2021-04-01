<?php

namespace App\Services;

use Illuminate\Support\Collection;

class MatchesService
{
//    public static function getPlayedMatches($season, $leagues)
//    {
//        $matches = new Collection();
//        foreach ($leagues as $league)
////            $matches = $matches->merge($league->playedMatches($season)->get());
//            $matches = $matches->merge($league->matchesSeason($season)->has('matchResult')->get());
//
//        return $matches;
//    }

    public static function getMatchesByDay($matches)
    {
        $preparedMatches = [];
        foreach ($matches as $match) {
            !array_key_exists($match->match_day, $preparedMatches) ?
                $preparedMatches[$match->match_day] = array($match) :
                array_push($preparedMatches[$match->match_day], $match);
        }

        return $preparedMatches;
    }

}
