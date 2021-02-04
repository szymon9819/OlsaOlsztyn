<?php

namespace App\Http\Controllers;

use App\Models\Post;

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
        $posts=Post::latest()->where('status', '=', 1)->paginate($postsPerPage);
//        $posts=Post::latest()->paginate($postsPerPage);
        return view('home',compact('posts'));
    }
}
