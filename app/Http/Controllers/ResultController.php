<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Season;
use App\Services\MatchesService;

class ResultController extends Controller
{
    public function index()
    {
        $leagues=League::all();
        $season=Season::latest()->first();
        $matches = array_reverse(MatchesService::getMatchesByDay(MatchesService::getPlayedMatches($season,$leagues)));

        return view('result.index', compact('matches'));
    }
}
