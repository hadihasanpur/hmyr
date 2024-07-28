<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level2;
use App\Models\Level3;
use App\Models\Level3Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Level3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level3s = Level3::orderBy('priority', 'asc')->paginate(10);
        return view('admin.level3s.index', compact('level3s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $level2s = Level2::all();
         $level3s = Level3::all();
        $Mylevel2s = Level2::all();
        return view('admin.level3s.create', compact('level3s','level2s','Mylevel2s'));
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
        $level2s = Level2::all();
        foreach ($level2s as $level2) {
            if (strcmp($level2->name , $request->Mylevel2) == 0)
            {
                $level2_id = $level2->id;
                break;
            }else{
                $level2_id = null;
            }
        }
                try {
            DB::beginTransaction();
            $level3ImageController = new Level2ImageController();
            $fileNameImages = $level3ImageController->upload($request->images);
            $level3 = Level3::create([
                'user_id' => $request->user()->id,
                'level2_id' =>   $level2_id,
                'name' => $request->name,
                'description' => $request->description,
                'fax' => $request->fax,
                'email' => $request->email,
                'address' => $request->email,
                'priority' => $request->priority,
            ]);
            foreach ($fileNameImages['fileNameImages'] as $fileNameImage) {
                Level3Image::create([
                    'level3_id' => $level3->id,
                    'image' => $fileNameImage
                ]);
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد خبر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('خبر مورد نظر ایجاد شد', 'باتشکر');


        return redirect()->route('admin.level3s.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Level3 $level3)
    {
        $images = $level3->images;
        return view('admin.level3s.show', compact('level3', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Level3 $level3)
    {
        $Mylevel2s = Level2::all();
        return view('admin.level3s.edit', compact('level3','Mylevel2s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Level3 $level3)
    {
        $level2s = Level2::all();
        foreach ($level2s as $level2) {
            if (strcmp($level2->name , $request->Mylevel2) == 0)
            {
                $level2_id = $level2->id;
                break;
            }else{
                $level2_id = null;
            }
        }
        try {
            DB::beginTransaction();
            $level3->update([
                'level2_id' =>   $level2_id,
                'name' => $request->name,
                'description' => $request->description,
                'tel1' => $request->tel1,
                'fax' => $request->fax,
                'email' => $request->email,
                'priority' => $request->priority,
                'address' => $request->address,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش خبر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('خبر مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.level3s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level3 $level3)
    {
        level3::destroy($level3->id);
        alert()->success('تصویر خبر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }
}
