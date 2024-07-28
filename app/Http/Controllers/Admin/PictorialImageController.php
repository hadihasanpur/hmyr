<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pictorial;
use Illuminate\Http\Request;
use App\Models\PictorialImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PictorialImageController extends Controller
{
   public function upload($primaryImage, $images)
    {

        // if ($primaryImage) {
            $fileNamePrimaryImage = generateFileName($primaryImage->getClientOriginalName());
            $primaryImage->move(public_path(env('PICTORIAL_IMAGES_UPLOAD_PATH')),$fileNamePrimaryImage);
        // }
//dd($images);
        $fileNameImages = [];
        if (is_array($images) || is_object($images)) {
            foreach ($images as $image) {
                $fileNameImage = generateFileName($image->getClientOriginalName());
                $image->move(public_path(env('PICTORIAL_IMAGES_UPLOAD_PATH')),$fileNameImage);
                array_push($fileNameImages, $fileNameImage);
            }
        }
        return [
            'fileNamePrimaryImage' => $fileNamePrimaryImage,
            'fileNameImages' => $fileNameImages,
        ];
    }
    public function edit(Pictorial $pictorial)
    {
        return view('admin.pictorials.edit_images', compact('pictorial'));
    }
    public function destroy(Request $request,PictorialImage $pictorialImage)
    {
        $request->validate([
            'image_id' => 'required|exists:pictorial_images,id',
        ]);
        $pictorialImage = PictorialImage::findOrFail($request->image_id);

       // dd($pictorialImage);
        PictorialImage::destroy($request->image_id);
        File::delete(
                    public_path(env('PICTORIAL_IMAGES_UPLOAD_PATH')) .
                    $pictorialImage->image
                );
        alert()->success('تصویر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }
    public function setPrimary(Request $request, Pictorial $pictorial)
    {
        $pictorialImage = PictorialImage::findOrFail($request->image_id);
                            $temp1 = $pictorialImage->image;
        $pictorialImage->update([
            'image' => $pictorialImage->pictorial->primary_image
                ]);
        $pictorial->update([
            'primary_image' => $temp1,
        ]);
        alert()->success('ویرایش تصویر اصلی گزارش تصویری با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }
    public function add(Request $request, Pictorial $pictorial)
    {
        $request->validate([
            'primary_image' => 'nullable|mimes:jpg,jpeg,png,svg',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,svg',
        ]);
        if ($request->primary_image == null && $request->images == null) {
            return redirect()
                ->back()
                ->withErrors(['msg' => 'تصویر یا تصاویر خبر الزامی هست']);
        }
        try {
            DB::beginTransaction();
            if ($request->has('primary_image')) {
                $fileNamePrimaryImage = generateFileName($request->primary_image->getClientOriginalName());
                $request->primary_image->move(public_path(env('PICTORIAL_IMAGES_UPLOAD_PATH')),$fileNamePrimaryImage
                );
                $pictorial->update([
                    'primary_image' => $fileNamePrimaryImage,
                ]);
            }
            if ($request->has('images')) {
                foreach ($request->images as $image)
                {
                    $fileNameImage = generateFileName($image->getClientOriginalName());
                    $image->move(public_path(env('PICTORIAL_IMAGES_UPLOAD_PATH')), $fileNameImage );
                    
                    PictorialImage::create([
                        'pictorial_id' => $pictorial->id,
                        'image' => $fileNameImage,
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()
                ->error('مشکل در ویرایش تصویر گزارش تصویری', $ex->getMessage())
                ->persistent('حله');
            return redirect()->back();
        }
        alert()->success(' تصویر با موفقیت اضافه گردید', 'باتشکر');
        return redirect()->back();
    }
}
