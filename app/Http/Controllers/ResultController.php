<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Match;
use App\Models\Season;
use App\Services\MatchesService;

class ResultController extends Controller
{
    public function index()
    {
        $matches = array_reverse(MatchesService::getMatchesByDay(Match::has('matchResult')->get()));
//        $matches = array_reverse(MatchesService::getMatchesByDay($leagues->flatMap->playedMatches($season)));

        return view('result.index', compact('matches'));
    }
}
