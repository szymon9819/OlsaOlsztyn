<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class PostService
{
    public function prepareData($request)
    {
        $data = $request->all();
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('thumbnail')) {
            $originalImage = $request->file('thumbnail');
            $thumbnail = Image::make($originalImage);
            $thumbnailDirectory = 'images/postThumbnails/';
            $thumbnailName = ($thumbnailDirectory . time() . $originalImage->getClientOriginalName());
            $thumbnail->resize(50, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnailName);
            $data['thumbnail'] = $thumbnailName;
        }
        return $data;
    }

    public function getImages($postContent)
    {
        preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $postContent, $images);
        $imagesPath = [];
        foreach ($images[1] as $img)
            array_push($imagesPath, explode(':8000/', $img)[1]);
        return $imagesPath;
    }

}
