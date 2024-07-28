<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level2;
use App\Models\Level2Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Level2ImageController extends Controller
{
    //
    public function upload($images)
    {
        $fileNameImages = [];
        if (is_array($images) || is_object($images)) {
            foreach ($images as $image) {
                $fileNameImage = generateFileName($image->getClientOriginalName());
                $image->move(public_path(env('LEVEL2_IMAGES_UPLOAD_PATH')), $fileNameImage);
                array_push($fileNameImages,  $fileNameImage);
            }
        }
        return ['fileNameImages' => $fileNameImages];
    }
    public function edit(Level2 $level2)
    {
        return view('admin.level2s.edit_images', compact('level2'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'level2_id' => 'required|exists:level2_images,id'
        ]);
        Level2Image::destroy($request->level2_id);
        alert()->success('تصویر خبر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }

    public function underImage(Request $request, Level2Image $level2Image)
    {
        $request->validate([
        'underImage' => 'required'
        ]);
    $level2Image = Level2Image::findOrFail($request->department_id);
        $level2Image->update([
            'underImage' => $request->underImage,
        ]);
        alert()->success('ویرایش متن توضیحی تصویر با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }

    public function add(Request $request, Level2 $level2)
    {
        $request->validate([
            'avatar' => 'nullable|mimes:jpg,jpeg,png,svg',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,svg',
        ]);
        if ($request->avatar == null && $request->images == null) {
            return redirect()->back()->withErrors(['msg' => 'تصویر یا تصاویر خبر الزامی هست']);
        }
        try {
            DB::beginTransaction();
            if ($request->has('avatar')) {
                $fileNamePrimaryImage = generateFileName($request->avatar->getClientOriginalName());
                $request->avatar->move(public_path(env('LEVEL2_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);
                $level2->update([
                    'avatar' => $fileNamePrimaryImage
                ]);
            }
            if ($request->has('images')) {
                foreach ($request->images as $image) {
                    $fileNameImage = generateFileName($image->getClientOriginalName());
                    $image->move(public_path(env('LEVEL2_IMAGES_UPLOAD_PATH')), $fileNameImage);
                    Level2Image::create([
                        'level2_id' => $level2->id,
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
