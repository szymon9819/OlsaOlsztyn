<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Services\MatchesService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $matches = Match::all()->where('match_day', '<', Carbon::today()->format('Y-m-d'));
        $matches = array_reverse((new MatchesService())->getMatchesByDay($matches));

        return view('result.index', compact('matches'));
    }
}
