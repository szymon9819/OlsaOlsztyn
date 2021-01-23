<?php

namespace App\Http\Controllers\Admin\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostImageController extends Controller
{
    function store(Request $request){
        $width=720;

        $originalImage = $request->image;
        $img = Image::make($originalImage);
        $imgDir = 'images/postImages/';
        $imgName = ($imgDir . time() . $originalImage->getClientOriginalName());
        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($imgName);

        return response()->json(["imageUrl" => asset($imgName)]);
    }
}
