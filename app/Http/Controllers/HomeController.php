<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Post;
use App\Models\Season;
use App\Services\ScoreboardService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $postsPerPage = 7;
        $parameter = $request->parameter;

        if (!empty($parameter))
            $posts = Post::latest()->where('title', 'like', '%'.$parameter.'%')->paginate($postsPerPage);
        else
            $posts = Post::latest()->where('status', '=', 1)->paginate($postsPerPage);


        if (empty($posts))
            $parameter = '';

        $leagues = League::with('teams')->get();
        $lastSeason = Season::orderBy('created_at', 'desc')->first();

        $scoreboards = ScoreboardService::getScoreboards($leagues, $lastSeason);

        return view('home', compact('posts', 'scoreboards', 'parameter'));
    }
}
