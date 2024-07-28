<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    public function upload($photo)
    {
        $fileNamePrimaryImage = generateFileName($photo->getClientOriginalName());

        $photo->move(public_path(env('GALLERY_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);



        return ['fileNamePrimaryImage' => $fileNamePrimaryImage];
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit_images', compact('gallery'));
    }
    
}
