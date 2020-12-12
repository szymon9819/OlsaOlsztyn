<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $fillable=['name'];

    public function Posts(){
        return $this->belongsToMany(Post::class,'tag_post','post_id','tag_id');
    }
}
