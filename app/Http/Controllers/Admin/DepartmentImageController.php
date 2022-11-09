<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DepartmentImageController extends Controller
{

    public function upload($avatar, $images)
    {
        $fileNamePrimaryImage = generateFileName($avatar->getClientOriginalName());
        $avatar->move(public_path(env('DEPARTMENT_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);
        $fileNameImages = [];
        if (is_array($images) || is_object($images)) {
            foreach ($images as $image) {
                $fileNameImage = generateFileName($image->getClientOriginalName());
                $image->move(public_path(env('DEPARTMENT_IMAGES_UPLOAD_PATH')), $fileNameImage);
                array_push($fileNameImages,  $fileNameImage);
            }
        }
        return ['fileNamePrimaryImage' => $fileNamePrimaryImage, 'fileNameImages' => $fileNameImages];
    }
    public function edit(Department $department)
    {
        return view('admin.departments.edit_images', compact('department'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:department_images,id'
        ]);
        DepartmentImage::destroy($request->department_id);
        alert()->success('تصویر خبر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }

    public function underImage(Request $request, DepartmentImage $departmentImage)
    {
        $request->validate([
              'underImage' => 'required'
        ]);
    $departmentImage = DepartmentImage::findOrFail($request->department_id);
        $departmentImage->update([
            'underImage' => $request->underImage,
        ]);
        alert()->success('ویرایش متن توضیحی تصویر با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }

    public function add(Request $request, Department $department)
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
                $request->avatar->move(public_path(env('DEPARTMENT_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);
                $department->update([
                    'avatar' => $fileNamePrimaryImage
                ]);
            }
            if ($request->has('images')) {
                foreach ($request->images as $image) {
                    $fileNameImage = generateFileName($image->getClientOriginalName());
                    $image->move(public_path(env('DEPARTMENT_IMAGES_UPLOAD_PATH')), $fileNameImage);
                    DepartmentImage::create([
                        'department_id' => $department->id,
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
