<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Match;
use App\Models\Season;
use \App\Services\Api\MatchesService;

class MatchController extends Controller
{
    public function playedMatchesForAllSeasons()
    {
        $leagues = League::all();
        $seasons = Season::all();
        $matches = MatchesService::playedMatches($leagues, $seasons);

        return response()->json(['matches' => $matches]);
    }

    public function playedMatches()
    {
        return response()->json(['matches' => Match::has('matchResult')->get()]);
    }

    public function allMatches()
    {
        //
        $matches = MatchesService::allMatches(Match::all()->toArray());

         return response()->json(['matches' => $matches]);
    }
}
