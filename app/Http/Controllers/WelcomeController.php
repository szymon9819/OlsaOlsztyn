<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Post;
use App\Models\Season;
use App\Services\ScoreboardService;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postsPerPage = 6;
        $posts = Post::latest()->where('status', '=', 1)->paginate($postsPerPage);

        $leagues = League::all();
        $lastSeason = Season::orderBy('created_at', 'desc')->first();

        $scoreboards = (new ScoreboardService())->getScoreboards($leagues, $lastSeason);

        return view('home', compact('posts','scoreboards'));
    }
}
