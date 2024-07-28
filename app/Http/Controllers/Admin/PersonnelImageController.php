<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelImageController extends Controller
{
     public function upload($avatar)
    {
        $fileNamePrimaryImage = generateFileName($avatar->getClientOriginalName());

        $avatar->move(public_path(env('PERSONNEL_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);



        return ['fileNamePrimaryImage' => $fileNamePrimaryImage];
    }

    public function edit(Personnel $personnel)
    {
        return view('admin.personnels.edit_images', compact('personnel'));
    }
}
