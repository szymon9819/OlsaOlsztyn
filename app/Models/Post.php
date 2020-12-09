<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public function category(){
        return $this->belongsTo(PostCategory::class);
    }

    public function tags(){
//        return $this->belongsToMany(PostTag::class,'CreateTagPostTable');
        return $this->belongsToMany(PostTag::class);
    }
}
