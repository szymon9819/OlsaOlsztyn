<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Match;
use App\Models\Season;
use App\Models\Team;
use App\Services\AdminDashboardService;
use App\Services\ScoreboardService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagues = League::all();
        $lastSeason = Season::orderBy('created_at', 'desc')->first();

        $matches = (new AdminDashboardService())->getMatchWithoutResult($leagues, $lastSeason);

        $scoreboard=(new ScoreboardService())->scoreboard($leagues[1], $lastSeason);
//        dd($scoreboard);
//        dd($scoreboard);

        return view('admin.dashboard', compact('leagues', 'matches','scoreboard'));
    }

}
