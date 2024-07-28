<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level3;
use App\Models\Level3Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Level3ImageController extends Controller
{
    public function upload($images)
    {
        $fileNameImages = [];
        if (is_array($images) || is_object($images)) {
            foreach ($images as $image) {
                $fileNameImage = generateFileName($image->getClientOriginalName());
                $image->move(public_path(env('LEVEL3_IMAGES_UPLOAD_PATH')), $fileNameImage);
                array_push($fileNameImages,  $fileNameImage);
            }
        }
        return ['fileNameImages' => $fileNameImages];
    }
    public function edit(Level3 $level3)
    {
        return view('admin.level3s.edit_images', compact('level3'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'level3_id' => 'required|exists:level3_images,id'
        ]);
        Level3Image::destroy($request->level3_id);
        alert()->success('تصویر خبر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }

    public function underImage(Request $request, Level3Image $level3Image)
    {
        $request->validate([
              'underImage' => 'required'
        ]);
    $level3Image = Level3Image::findOrFail($request->department_id);
        $level3Image->update([
            'underImage' => $request->underImage,
        ]);
        alert()->success('ویرایش متن توضیحی تصویر با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }

    public function add(Request $request, Level3 $level3)
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
                $request->avatar->move(public_path(env('UNIT_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);
                $level3->update([
                    'avatar' => $fileNamePrimaryImage
                ]);
            }
            if ($request->has('images')) {
                foreach ($request->images as $image) {
                    $fileNameImage = generateFileName($image->getClientOriginalName());
                    $image->move(public_path(env('UNIT_IMAGES_UPLOAD_PATH')), $fileNameImage);
                    Level3Image::create([
                        'level3_id' => $level3->id,
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
