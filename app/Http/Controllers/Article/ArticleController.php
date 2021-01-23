<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('article.show',compact('post'));
    }
}
