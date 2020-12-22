<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
//        $posts=Post::latest()->where('status', '=', 0)->paginate($postsPerPage);
        $posts=Post::latest()->paginate($postsPerPage);
        return view('article.index',compact('posts'));
    }
}
