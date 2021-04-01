<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Season;
use App\Services\ScoreboardService;

class ScoreboardController extends Controller
{
    public function index()
    {
        $leagues = League::all();
        $lastSeason = Season::orderBy('created_at', 'desc')->first();
        $scoreboards = ScoreboardService::getScoreboards($leagues, $lastSeason);

        return response()->json(['scoreboards'=>$scoreboards]);
    }

}
