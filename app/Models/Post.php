<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'post_category_id',
        'status',
    ];

    public function category(){
        return $this->belongsTo(PostCategory::class);
    }

    public function tags(){
        return $this->belongsToMany(PostTag::class,'tag_post','post_id','tag_id');
    }
}
