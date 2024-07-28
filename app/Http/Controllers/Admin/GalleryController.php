<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Admin\GalleryImageController;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.create', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'is_active' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png,svg,webp',
        ]);
        try {
            DB::beginTransaction();
            $galleryImageController = new GalleryImageController();
            $fileNameImages = $galleryImageController->upload($request->photo);
            //dd($fileNameImages);
             Gallery::create([
                'user_id' => $request->user()->id,
                'description' => $request->description,
                'category' => $request->category,
                'photo' => $fileNameImages['fileNamePrimaryImage'],
                'is_active' => $request->is_active,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در افزودن تصویر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('تصویر مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {

        try {
            DB::beginTransaction();
            if ($request->has('photo')) { //hadihasanpur
                $galleryImageController = new GalleryImageController();
                $fileNameImages = $galleryImageController->upload($request->photo);
                $gallery->update([
                    'photo' => $fileNameImages['fileNamePrimaryImage'],
                ]);
            }
            $gallery->update([
                'description' => $request->description,
                'category' => $request->category,
                'is_active' => $request->is_active,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش تصویر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('تصویر مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
         File::delete(
                    public_path(env('GALLERY_IMAGES_UPLOAD_PATH')) .
                    $gallery->photo
                );

        alert()->success('بنر مورد نظر حذف شد', 'باتشکر');
        return redirect()->route('admin.galleries.index');
    }
}
