<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;

class CategoryController extends Controller
{
    public function index($id){
        $category=PostCategory::findOrFail($id);
        $posts= $category->posts()->where('status', '=', 1)->get();

        return view('category.index',compact('category','posts'));
    }
}
