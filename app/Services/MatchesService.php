<?php


namespace App\Services;


class MatchesService
{
    public function getMatchesByDay($matches)
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
