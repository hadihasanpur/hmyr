<?php

namespace App\Http\Controllers\Admin;

use App\Models\Modir;
use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Admin\ModirImageController;

class ModirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modirs = Modir::latest()->paginate(10);
        return view('admin.modirs.index', compact('modirs'));
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

        return view(
            'admin.modirs.create',
            compact('modirs', 'Mylevel1s', 'Mylevel2s', 'Mylevel3s')
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Modir $modir)
    {
        $request->validate([
            'name' => 'required',
            'avatar' => 'required',
        ]);

        $level1s = Level1::all();
        $level2s = Level2::all();
        $level3s = Level3::all();
        if (isset($request->Mylevel1)) {
            foreach ($level1s as $level1)
            {
                    if (strcmp($level1->name, $request->Mylevel1) == 0)
                    {
                            $level2_id = $level3_id = null;
                            $level1_id = $level1->id;
                            break;
                    }else{
                        $level1_id = null;
                    }
            }
            foreach ($level2s as $level2)
            {
                    if (strcmp($level2->name, $request->Mylevel1) == 0)
                    {
                        $level1_id = $level3_id = null;
                        $level2_id = $level2->id;
                        break;
                    }else{
                        $level2_id = null;
                    }
            }
            foreach ($level3s as $level3)
            {
                    if (strcmp($level3->name, $request->Mylevel1) == 0)
                    {
                            $level1_id = $level2_id = null;
                            $level3_id = $level3->id;
                            break;
                    }else{
                        $level3_id = null;
                    }
            }
        }else{
            $level1_id = $level2_id = $level3_id = null;
        }

        try {
            DB::beginTransaction();
            $modirImageController = new ModirImageController();
            $fileNameImages = $modirImageController->upload($request->avatar);
            Modir::create([
                'user_id' => $request->user()->id,
                'level1_id' => $level1_id,
                'level2_id' => $level2_id,
                'level3_id' => $level3_id,
                'name' => $request->name,
                'avatar' => $fileNameImages['fileNamePrimaryImage'],
                'title' => $request->title,
                'category' => $request->category,
                'description' => $request->description,
                'ad' => $request->ad,
                'is_active' => $request->is_active,
                'started_at' => convertShamsiToGregorianDate(
                    $request->started_at
                ),
                'finished_at' => convertShamsiToGregorianDate(
                    $request->finished_at
                ),
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()
                ->error('مشکل اساسی در ایجاد مدیر', $ex->getMessage())
                ->persistent('Ok');
            return redirect()->back();
        }
        alert()->success('مدیر مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.modirs.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Modir $modir)
    {
        return view('admin.modirs.show', compact('modir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Modir $modir)
    {
        $Mylevel1s = Level1::all();
        $Mylevel2s = Level2::all();
        $Mylevel3s = Level3::all();
        return view(
            'admin.modirs.edit',
            compact('modir', 'Mylevel1s', 'Mylevel2s', 'Mylevel3s')
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modir $modir)
    {
                $level1s = Level1::all();
                $level2s = Level2::all();
                $level3s = Level3::all();
        if (isset($request->Mylevel1)) {
            foreach ($level1s as $level1)
            {
                    if (strcmp($level1->name, $request->Mylevel1) == 0)
                    {
                            $level2_id = $level3_id = null;
                            $level1_id = $level1->id;
                            break;
                    }else{
                        $level1_id = null;
                    }
            }
            foreach ($level2s as $level2)
            {
                    if (strcmp($level2->name, $request->Mylevel1) == 0)
                    {
                        $level1_id = $level3_id = null;
                        $level2_id = $level2->id;
                        break;
                    }else{
                        $level2_id = null;
                    }
            }
            foreach ($level3s as $level3)
            {
                    if (strcmp($level3->name, $request->Mylevel1) == 0)
                    {
                            $level1_id = $level2_id = null;
                            $level3_id = $level3->id;
                            break;
                    }else{
                        $level3_id = null;
                    }
            }
        }
        try {
            DB::beginTransaction();
                 //HadiHasanpur
            if ($request->has('avatar')) {
                File::delete(
                    public_path(env('MODIR_IMAGES_UPLOAD_PATH')) .
                    $modir->avatar
                );
                $modirImageController = new ModirImageController();
                $fileNameImages = $modirImageController->upload($request->avatar );
                $modir->update([
                'avatar' => $fileNameImages['fileNamePrimaryImage'],
                ]);
            }
            $modir->update([
                'level1_id' => $level1_id,
                'level2_id' => $level2_id,
                'level3_id' => $level3_id,
                'category' => $request->category,
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'ad' => $request->ad,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'is_active' => $request->is_active,
                'priority' => $request->priority,
                'started_at' => convertShamsiToGregorianDate($request->started_at ),
                'finished_at' => convertShamsiToGregorianDate($request->finished_at ),
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()
                ->error('مشکل در ویرایش مدیر', $ex->getMessage())
                ->persistent('حله');
            return redirect()->back();
        }
        alert()->success('مدیر مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.modirs.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modir $modir)
    {
                File::delete(public_path(env('MODIR_IMAGES_UPLOAD_PATH')) .$modir->avatar);
                $modir->delete();
        alert()->success('مدیر مورد نظر حذف شد', 'باتشکر');
        return redirect()->route('admin.modirs.index');
    }
}
