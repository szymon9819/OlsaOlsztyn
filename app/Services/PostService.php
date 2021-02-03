<?php

namespace App\Services;


use App\Http\Requests\Post\StorePostRequest;
use Intervention\Image\Facades\Image;

class PostService
{
    public function prepareData(StorePostRequest $request)
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


}
