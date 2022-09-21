<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostImageController extends Controller
{

    public function upload($primaryImage, $images)
    {
        $fileNamePrimaryImage = generateFileName($primaryImage->getClientOriginalName());

        $primaryImage->move(public_path(env('POST_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);

        $fileNameImages = [];
        foreach ($images as $image) {
            $fileNameImage = generateFileName($image->getClientOriginalName());

            $image->move(public_path(env('POST_IMAGES_UPLOAD_PATH')), $fileNameImage);

            array_push($fileNameImages,  $fileNameImage);
        }

        return ['fileNamePrimaryImage' => $fileNamePrimaryImage, 'fileNameImages' => $fileNameImages];
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit_images', compact('post'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'image_id' => 'required|exists:post_images,id'
        ]);

        PostImage::destroy($request->image_id);

        alert()->success('تصویر خبر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }

    public function setPrimary(Request $request, Post $post)
    {
        $request->validate([
            'image_id' => 'required|exists:post_images,id'
        ]);

        $postImage = PostImage::findOrFail($request->image_id);
        $post->update([
            'primary_image' => $postImage->image
        ]);
        alert()->success('ویرایش تصویر اصلی خبر با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }

    public function add(Request $request, Post $post)
    {
        $request->validate([
            'primary_image' => 'nullable|mimes:jpg,jpeg,png,svg',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,svg',
        ]);

        if ($request->primary_image == null && $request->images == null) {
            return redirect()->back()->withErrors(['msg' => 'تصویر یا تصاویر خبر الزامی هست']);
        }

        try {
            DB::beginTransaction();

            if ($request->has('primary_image')) {

                $fileNamePrimaryImage = generateFileName($request->primary_image->getClientOriginalName());
                $request->primary_image->move(public_path(env('POST_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);

                $post->update([
                    'primary_image' => $fileNamePrimaryImage
                ]);
            }

            if ($request->has('images')) {

                foreach ($request->images as $image) {
                    $fileNameImage = generateFileName($image->getClientOriginalName());

                    $image->move(public_path(env('POST_IMAGES_UPLOAD_PATH')), $fileNameImage);

                    PostImage::create([
                        'postt_id' => $post->id,
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