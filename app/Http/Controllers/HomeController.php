<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Post;
use App\Models\Season;
use App\Services\ScoreboardService;
use App\Services\SearchPostService;
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
        $postsPerPage = 10;
        $parameter=$request->parameter;
        $posts = Post::latest()->where('status', '=', 1)->paginate($postsPerPage);

        if(!empty($parameter))
            $posts= (new SearchPostService())->matchPosts($posts,$parameter);

        if(empty($posts))
            $parameter='';

        $leagues = League::all();
        $lastSeason = Season::orderBy('created_at', 'desc')->first();

        $scoreboards = (new ScoreboardService())->getScoreboards($leagues, $lastSeason);

        return view('home', compact('posts','scoreboards','parameter'));
    }
}
