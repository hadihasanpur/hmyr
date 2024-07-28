<?php

namespace App\Http\Controllers\Admin;

use App\Models\Modir;
use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;
use App\Models\Level1Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Admin\Level1ImageController;

class Level1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level1s = Level1::orderBy('priority', 'asc')->with('modir')->paginate(10);
        return view('admin.level1s.index', compact('level1s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modirs = Modir::all();
        $Mylevel1s = Level1::all();
        $Mylevel2s = Level2::all();
        $Mylevel3s = Level3::all();
        return view('admin.level1s.create', compact('modirs', 'Mylevel1s', 'Mylevel2s','Mylevel3s'));
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
            'name' => 'required',
            'tel1' => 'max:11',
            'tel2' => 'max:11',
            'tel3' => 'max:2',
            'fax' => 'max:11',
        ]);
        try {
            DB::beginTransaction();
            $level1 = Level1::create([
                'user_id' => $request->user()->id,
                'name' => $request->name,
                'description' => $request->description,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'tel3' => $request->tel3,
                'fax' => $request->fax,
                'email' => $request->email,
                'address' => $request->address,
                'priority' => $request->priority,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()
                ->error('مشکل در ایجاد بخش مورذ نظر', $ex->getMessage())
                ->persistent('حله');
            return redirect()->back();
        }
        alert()->success('بخش مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.level1s.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Level1 $level1)
    {
        $images = $level1->images;
        $personnelImages = $level1->personnels;
    // dd($personnelImages);
        return view('admin.level1s.show', compact('level1', 'images','personnelImages'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SetUnderImage(Level1 $level1)
    {
        //dd($level1->images);
        $images = $level1->images;
        return view('admin.level1s.show', compact('level1', 'images'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Level1 $level1)
    {
        return view('admin.level1s.edit', compact('level1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level1 $level1)
    {
        try {
            DB::beginTransaction();
            $level1->update([
                'name' => $request->name,
                'description' => $request->description,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'tel3' => $request->tel3,
                'fax' => $request->fax,
                'email' => $request->email,
                'address' => $request->address,
                'priority' => $request->priority,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()
                ->error('   مشکل در ویرایش بخش مورد نظر! واحد تعیین شود', $ex->getMessage())
                ->persistent('حله');
            return redirect()->back();
        }
        alert()->success('بخش مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.level1s.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level1 $level1)
    {
        foreach ($level1->images as $level1Image) {
                    File::delete(public_path(env('LEVEL1_IMAGES_UPLOAD_PATH')) . $level1Image->image);
        }
        Level1::destroy($level1->id);
        alert()->success(' بخش مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }
}
