<?php


namespace App\Services;


class SearchPostService
{
    public static function matchPosts($posts,$parameter){
        $matchedPosts=[];
        foreach($posts as $post)
            if(str_contains(strtolower($post->title), strtolower($parameter)))
                $matchedPosts[]=$post;

        return $matchedPosts;
    }

}
