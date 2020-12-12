<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsPerPage = 9;
        $posts = Post::latest()->paginate($postsPerPage);

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PostCategory::all();
        $tags = PostTag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->all();
        $data['status'] = $request->boolean('status');

        $originalImage = $request->file('thumbnail');
        $thumbnail = Image::make($originalImage);
        $thumbnailDirectory = 'thumbnails/';
        $thumbnailName = ($thumbnailDirectory . time() . $originalImage->getClientOriginalName());
        $thumbnail->resize(150, 150)->save($thumbnailName)->resize(150, 150);

        $data['thumbnail'] = $thumbnailName;
        $post = Post::create($data);
        if (!empty($data['tags']))
            $post->tags()->attach($data['tags']);

        return redirect('admin/posts')->with('message', 'Dodano Post');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = PostCategory::all();
        $tags = PostTag::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->all();
        $data['status'] = $request->boolean('status');
        $post->update($data);
        if (!empty($data['tags']))
            $post->tags()->sync($data['tags']);

        return redirect('admin/posts')->with('message', 'Edytowano Post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('admin/posts')->with('message', 'Usunięto Post');
    }
}
