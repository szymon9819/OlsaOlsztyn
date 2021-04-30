<?php

namespace App\Services;


use App\Models\MatchResult;

class ScoreboardService
{
//    return [[if match win 0 esle 1, pts],[if match win 0 esle 1, pts]]
//    private static function getPoints($match)
//    {
//        if ($match->home == 3 && $match->guest < 2)
//            return [[1, 3], [0, 0]];
//        else if ($match->home == 3 && $match->guest == 2)
//            return [[1, 2], [0, 1]];
//        else if ($match->home == 2 && $match->guest == 3)
//            return [[0, 1], [1, 2]];
//        else if ($match->home < 2 && $match->guest == 3)
//            return [[0, 0], [1, 3]];
//    }
//
    private static function getPoints($home, $guest)
    {
        if ($home == 3 && $guest < 2)
            return [[1, 3], [0, 0]];
        else if ($home == 3 && $guest == 2)
            return [[1, 2], [0, 1]];
        else if ($home == 2 && $guest == 3)
            return [[0, 1], [1, 2]];
        else if ($home < 2 && $guest == 3)
            return [[0, 0], [1, 3]];
    }

//    private static function getScoreboard($league, $season)
//    {
////        $matches = $league->playedMatches($season);
//        $matches = $league->matchesSeason($season)->has('matchResult')->get();
//
//        $scoreboard = array_fill_keys($league->teams->pluck('name')->toArray(), [
//            'wins' => 0,
//            'matches' => 0,
//            'pts' => 0,
//            'sw' => 0,
//            'sl' => 0
//        ]);
//
//        foreach ($matches as $match) {
//            if (array_key_exists($match->homeTeam->name, $scoreboard)) {
//                $scoreboard[$match->homeTeam->name]['wins'] += self::getPoints($match->matchResult)[0][0];
//                $scoreboard[$match->homeTeam->name]['matches'] += 1;
//                $scoreboard[$match->homeTeam->name]['pts'] += self::getPoints($match->matchResult)[0][1];
//                $scoreboard[$match->homeTeam->name]['sw'] += $match->matchResult->home;
//                $scoreboard[$match->homeTeam->name]['sl'] += $match->matchResult->guest;
//
//                $scoreboard[$match->awayTeam->name]['wins'] += self::getPoints($match->matchResult)[1][0];
//                $scoreboard[$match->awayTeam->name]['matches'] += 1;
//                $scoreboard[$match->awayTeam->name]['pts'] += self::getPoints($match->matchResult)[1][1];
//                $scoreboard[$match->awayTeam->name]['sw'] += $match->matchResult->guest;
//                $scoreboard[$match->awayTeam->name]['sl'] += $match->matchResult->home;
//            }
//        }
//        uasort($scoreboard, function ($a, $b) {
//            return -($a['pts'] <=> $b['pts']);
//        });
//
//        return $scoreboard;
//    }

    private static function getScoreboard($league, $season)
    {
//        $matches = $league->playedMatches($season);
        $matches = MatchResult::allResultsForSeason($league,$season);

        $scoreboard = array_fill_keys($league->teams->pluck('name')->toArray(), [
            'wins' => 0,
            'matches' => 0,
            'pts' => 0,
            'sw' => 0,
            'sl' => 0
        ]);

        foreach ($matches as $match) {
            if (array_key_exists($match->home_team, $scoreboard)) {
                $scoreboard[$match->home_team]['wins'] += self::getPoints($match->home,$match->guest)[0][0];
                $scoreboard[$match->home_team]['matches'] += 1;
                $scoreboard[$match->home_team]['pts'] += self::getPoints($match->home,$match->guest)[0][1];
                $scoreboard[$match->home_team]['sw'] += $match->home;
                $scoreboard[$match->home_team]['sl'] += $match->guest;

                $scoreboard[$match->guest_team]['wins'] += self::getPoints($match->home,$match->guest)[1][0];
                $scoreboard[$match->guest_team]['matches'] += 1;
                $scoreboard[$match->guest_team]['pts'] += self::getPoints($match->home,$match->guest)[1][1];
                $scoreboard[$match->guest_team]['sw'] += $match->guest;
                $scoreboard[$match->guest_team]['sl'] += $match->home;
            }
        }
        uasort($scoreboard, function ($a, $b) {
            return -($a['pts'] <=> $b['pts']);
        });

        return $scoreboard;
    }

    public static function getScoreboards($leagues, $season)
    {
        $scoreboards = [];
        foreach ($leagues as $league) {
            self::getScoreboard($league, $season) != null ? $scoreboards[$league->name] = self::getScoreboard($league, $season) : '';
        }

        return $scoreboards;
    }
}
