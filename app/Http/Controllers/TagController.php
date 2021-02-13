<?php

namespace App\Http\Controllers;

use App\Models\PostTag;


class TagController extends Controller
{
    public function index($id){
        $tag=PostTag::findOrFail($id);
        $posts= $tag->posts()->where('status', '=', 1)->get();

        return view('tag.index',compact('tag','posts'));
    }
}
