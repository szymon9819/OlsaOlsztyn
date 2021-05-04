<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Services\MatchesService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index(){

//        $matches= Match::all()->where('match_day', '>',Carbon::today()->format('Y-m-d'));
        $matches= Match::with('homeTeam','awayTeam','matchResult')
            ->where('match_day', '>',Carbon::today()->format('Y-m-d'))
            ->get();
        $matches= MatchesService::getMatchesByDay($matches);

        return view('match.index', compact('matches'));
    }
}
