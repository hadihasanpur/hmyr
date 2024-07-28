<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostImageController extends Controller
{
    public function upload($primaryImage, $images)
    {
        // if ($primaryImage) {
            $fileNamePrimaryImage = generateFileName($primaryImage->getClientOriginalName());
            $primaryImage->move(public_path(env('POST_IMAGES_UPLOAD_PATH')),$fileNamePrimaryImage);
        // }

        $fileNameImages = [];
        if (is_array($images) || is_object($images)) {
            foreach ($images as $image) 
            {
                $fileNameImage = generateFileName($image->getClientOriginalName());
                $image->move(public_path(env('POST_IMAGES_UPLOAD_PATH')),$fileNameImage);
                array_push($fileNameImages, $fileNameImage);
            }
        }
        return ['fileNamePrimaryImage' => $fileNamePrimaryImage,'fileNameImages' => $fileNameImages,];
    }

    public function add(Request $request, Post $post)
    {
        $request->validate([
            'primary_image' => 'nullable|mimes:jpg,jpeg,png,svg,jfif',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,svg,jfif',
        ]);
        if ($request->primary_image == null && $request->images == null) {
            return redirect()->back()->withErrors(['msg' => 'تصویر یا تصاویر خبر الزامی هست']);
        }
        try {
            DB::beginTransaction();
            if ($request->has('primary_image')) {
                $fileNamePrimaryImage = generateFileName($request->primary_image->getClientOriginalName());
                $request->primary_image->move(public_path(env('POST_IMAGES_UPLOAD_PATH')),$fileNamePrimaryImage);
                $post->update(['primary_image' => $fileNamePrimaryImage,]);
            }
            if ($request->has('images')) {
                foreach ($request->images as $image)
                {
                    $fileNameImage = generateFileName($image->getClientOriginalName());
                    $image->move(public_path(env('POST_IMAGES_UPLOAD_PATH')),$fileNameImage);
                    PostImage::create(['post_id' => $post->id,'image' => $fileNameImage,]);
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

    public function edit(Post $post)
    {
        return view('admin.posts.edit_images', compact('post'));
    }

    public function destroy(Request $request,PostImage $postImage)
    {
        $request->validate([
            'image_id' => 'required|exists:post_images,id',
        ]);
                $postImage = PostImage::findOrFail($request->image_id);
        PostImage::destroy($request->image_id);
        File::delete(
                    public_path(env('POST_IMAGES_UPLOAD_PATH')) .
                    $postImage->image
                );
        alert()->success('تصویر خبر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }
    public function setPrimary(Request $request, Post $post)
    {
        $request->validate([
            // 'image_id' => 'required|exists:post_images,id'
        ]);
        $postImage = PostImage::findOrFail($request->image_id);
                            $temp1 = $postImage->image;
       $postImage->update([
            'image' => $postImage->post->primary_image
                ]);
         $post->update([
            'primary_image' => $temp1,
        ]);
        alert()->success('ویرایش تصویر اصلی خبر با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }
   
}
