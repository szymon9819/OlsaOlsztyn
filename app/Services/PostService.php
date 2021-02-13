<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class PostService
{
    public static function prepareData($request)
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

        if ($request->hasFile('images')) {
            $imageDirectory= 'images/postGaleryImages/';
            $data['images']= [];
            foreach($request->file('images') as $image){
                $originalImage = $image;
                $image = Image::make($originalImage);
                $imageName= ($imageDirectory . time() . $originalImage->getClientOriginalName());
                $image->save($imageName);
                array_push($data['images'],['name'=>$imageName]);
            }
        }

        return $data;
    }

    public static function getImages($postContent)
    {
        preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $postContent, $images);
        $imagesPath = [];
        foreach ($images[1] as $img)
            array_push($imagesPath, explode(':8000/', $img)[1]);
        return $imagesPath;
    }

}
