<?php

namespace App\Http\Controllers\Admin\Media;

use App\Http\Controllers\Controller;

use App\Http\Requests\Post\StorePostRequest;
use App\Models\PostImage;
use App\Services\PostService;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Support\Facades\File;

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
        $posts = Post::with('category')->latest()->paginate($postsPerPage);

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
        $data = PostService::prepareData($request);
        $post = Post::create($data);
        if (!empty($data['tags']))
            $post->tags()->attach($data['tags']);

        if (!empty($data['images']))
            foreach ($data['images'] as $img) {
                PostImage::create([
                    'name' => $img['name'],
                    'post_id' => $post->id
                ]);
            }

        return redirect('admin/posts')->with('message', 'Dodano Post');
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
        $data = PostService::prepareData($request);
        $post = Post::findOrFail($id);
        if (!empty($post->thumbnail)) {
            File::delete($post->thumbnail);
            $post->thumbnail = '';
        }

        if (!empty($data['images'])){
            File::delete($post->images()->pluck('name')->toArray());
            $post->images()->delete();
            foreach ($data['images'] as $img) {
                PostImage::create([
                    'name' => $img['name'],
                    'post_id' => $post->id
                ]);
            }
        }



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
        $images = PostService::getImages($post->content);
        array_push($images, $post->thumbnail);
        File::delete($images);

        File::delete($post->images()->pluck('name')->toArray());
        $post->images()->delete();

        $post->delete();

        return redirect('admin/posts')->with('message', 'Usunięto Post');
    }

}
