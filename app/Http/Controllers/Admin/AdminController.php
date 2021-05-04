<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\MatchResult;
use App\Models\Season;
use App\Services\AdminDashboardService;
use App\Services\ScoreboardService;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagues = League::with('teams')->get();
//        $leagues = League::all();
        $lastSeason = Season::orderBy('created_at', 'desc')->first();

        $matches=AdminDashboardService::matchesForEnterScoreForAllLeagues($leagues,$lastSeason);
        $scoreboards = ScoreboardService::getScoreboards($leagues, $lastSeason);


        return view('admin.dashboard', compact( 'matches', 'scoreboards'));
    }

}
