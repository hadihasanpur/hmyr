<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level1;
use App\Models\Level1Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class Level1ImageController extends Controller
{
    public function upload($images)
    {
        $fileNameImages = [];
        if (is_array($images) || is_object($images)) {
            foreach ($images as $image) {
                $fileNameImage = generateFileName($image->getClientOriginalName());
                $image->move(public_path(env('LEVEL1_IMAGES_UPLOAD_PATH')), $fileNameImage);
                array_push($fileNameImages,  $fileNameImage);
            }
    }
        return ['fileNameImages' => $fileNameImages];
    }
    public function edit(Level1 $level1)
    {
        return view('admin.level1s.edit_images', compact('level1'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'level1_id' => 'required|exists:level1_images,id'
        ]);
        $pictorialImage = Level1Image::findOrFail($request->level1_id);

        Level1Image::destroy($request->level1_id);
        File::delete(
                    public_path(env('LEVEL1_IMAGES_UPLOAD_PATH')) .
                    $pictorialImage->image
                );
        alert()->success('تصویر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }

    public function underImage(Request $request, Level1Image $levelImage)
    {
        $request->validate([
        'underImage' => 'required'
        ]);
        $level1Image = Level1Image::findOrFail($request->level1_id);
        $level1Image->update([
            'underImage' => $request->underImage,
        ]);
        alert()->success('ویرایش متن توضیحی تصویر با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }

    public function add(Request $request, Level1 $level1)
    {
        $request->validate([
            'images.*' => 'nullable|mimes:jpg,jpeg,png,svg',
        ]);
     //  dd($request->images);

        if ($request->images == null) {
            return redirect()->back()->withErrors(['msg' => 'تصویر یا تصاویر خبر الزامی هست']);
        }
        try {
            DB::beginTransaction();
            if ($request->has('images'))
            {
                foreach ($request->images as $image)
                {
                    $fileNameImage = generateFileName($image->getClientOriginalName());
                    $image->move(public_path(env('LEVEL1_IMAGES_UPLOAD_PATH')), $fileNameImage );
                    Level1Image::create([
                        'level1_id' => $level1->id,
                        'image' => $fileNameImage
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد خبر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('ویرایش تصویر اصلی خبر با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }
}
