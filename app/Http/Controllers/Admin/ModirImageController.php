<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modir;

class ModirImageController extends Controller
{
    public function upload($avatar)
    {
        $fileNamePrimaryImage = generateFileName($avatar->getClientOriginalName());

        $avatar->move(public_path(env('MODIR_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);



        return ['fileNamePrimaryImage' => $fileNamePrimaryImage];
    }

    public function edit(Modir $modir)
    {
        return view('admin.modirs.edit_images', compact('modir'));
    }
}
