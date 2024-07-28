<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pictorial;
use Illuminate\Http\Request;
use App\Models\PictorialImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Admin\PictorialImageController;

class PictorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictorials = Pictorial::latest()->paginate(5);
        return view('admin.pictorials.index', compact('pictorials'));
    }

    /*posts*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pictorials = Pictorial::all();
        return view('admin.pictorials.create', compact('pictorials'));
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
            'title' => 'required',
            'primary_image' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $pictorialImageController = new PictorialImageController();
            $fileNameImages = $pictorialImageController->upload($request->primary_image,$request->images);
           // dd($request->user()->id);
            $pictorial = Pictorial::create([
                'user_id' => $request->user()->id,
                'title' => $request->title,
                'primary_image' => $fileNameImages['fileNamePrimaryImage'],
                'is_active' => $request->is_active,
            ]);
                foreach ($fileNameImages['fileNameImages'] as $fileNameImage) {
                    PictorialImage::create([
                        'pictorial_id' => $pictorial->id,
                        'image' => $fileNameImage
                    ]);
                }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد گزارش تصویری', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('گزارش تصویری مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.pictorials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pictorial $pictorial)
    {
        $images = $pictorial->pictorialImage;
        return view('admin.pictorials.show', compact('pictorial', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pictorial $pictorial)
    {

        return view('admin.pictorials.edit', compact('pictorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pictorial $pictorial)
    {
        try {
            DB::beginTransaction();

           // dd($request->user()->id);
            $pictorial->update([
                'user_id' => $request->user()->id,
                'title' => $request->title,
                'is_active' => $request->is_active,
                 'created_at' => convertShamsiToGregorianDate($request->created_at)
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد گزارش تصویری', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('گزارش تصویری مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.pictorials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pictorial $pictorial)
    {
        File::delete(public_path(env('PICTORIAL_IMAGES_UPLOAD_PATH')) . $pictorial->primary_image);
        foreach ($pictorial->pictorialImages as $pictorialImage) {
                    File::delete(public_path(env('PICTORIAL_IMAGES_UPLOAD_PATH')) . $pictorialImage->image);
        }
        $pictorial->delete();
        alert()->success('گزارش تصویری مورد نظر حذف شد', 'باتشکر');
        return redirect()->route('admin.pictorials.index');
    }
}
