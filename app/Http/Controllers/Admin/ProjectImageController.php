<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectImageController extends Controller
{
     public function upload($images)
    {
        $fileNameImages = [];
        if (is_array($images) || is_object($images)) {
            foreach ($images as $image) {
                $fileNameImage = generateFileName($image->getClientOriginalName());
                $image->move(public_path(env('PROJECT_IMAGES_UPLOAD_PATH')), $fileNameImage);
                array_push($fileNameImages,  $fileNameImage);
            }
        }
        return ['fileNameImages' => $fileNameImages];
    }
    public function edit(Project $project)
    {
        return view('admin.projects.edit_images', compact('project'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:project_images,id'
        ]);
        ProjectImage::destroy($request->project_id);
        alert()->success('تصویر  مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }

    public function underImage(Request $request, ProjectImage $projectImage)
    {
        $request->validate([
              'underImage' => 'required'
        ]);
        $projectImage = ProjectImage::findOrFail($request->department_id);
        $projectImage->update([
            'underImage' => $request->underImage,
        ]);
        alert()->success('ویرایش متن توضیحی تصویر با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }

    public function add(Request $request, Project $peoject)
    {
        $request->validate([
            'images.*' => 'nullable|mimes:jpg,jpeg,png,svg',
        ]);
        if ($request->images == null) {
            return redirect()->back()->withErrors(['msg' => 'تصویر یا تصاویر خبر الزامی هست']);
        }
        try {
            DB::beginTransaction();
            if ($request->has('avatar')) {
                $fileNamePrimaryImage = generateFileName($request->avatar->getClientOriginalName());
                $request->avatar->move(public_path(env('PROJECT_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);
                $peoject->update([
                    'avatar' => $fileNamePrimaryImage
                ]);
            }
            if ($request->has('images')) {
                foreach ($request->images as $image) {
                    $fileNameImage = generateFileName($image->getClientOriginalName());
                    $image->move(public_path(env('PROJECT_IMAGES_UPLOAD_PATH')), $fileNameImage);
                    ProjectImage::create([
                       // 'project_id' => $project->id,????????????????//
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
