<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level2Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Level2ImageController;

class Level2Controller extends Controller
{
 public function index()
    {
        $level2s = Level2::orderBy('priority', 'asc')->paginate(10);
        return view('admin.level2s.index', compact('level2s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level2s = Level2::all();
        $Mylevel1s = Level1::all();
        return view('admin.level2s.create', compact('level2s','Mylevel1s'));
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
        $level1s = Level1::all();
          // dd($departments);
    //  dd($request);
        foreach ($level1s as $level1) {

            if (strcmp($level1->name , $request->Mylevel1) == 0)
            {
            //    dd(strcmp($department->name , $request->Mydepartment));
                $level1_id = $level1->id;
              //  dd($department_id);
                //break;
                try {
            DB::beginTransaction();
            $level2ImageController = new Level2ImageController();
            $fileNameImages = $level2ImageController->upload($request->avatar, $request->images);
            $level2 = Level2::create([
                'user_id' => $request->user()->id,
                'level1_id' =>   $level1->id,
                'name' => $request->name,
                'description' => $request->description,
                'fax' => $request->fax,
                'email' => $request->email,
                'address' => $request->email,
                'priority' => $request->priority,

            ]);
            foreach ($fileNameImages['fileNameImages'] as $fileNameImage) {
                Level2Image::create([
                    'level1_id' => $level2->id,
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
            }
        }


        return redirect()->route('admin.level2s.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Level2 $level2)
    {
        $images = $level2->images;
        return view('admin.level2s.show', compact('level2', 'images'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SetUnderImage(Level2 $level2)
    {
        $images = $level2->images;
        return view('admin.level2s.show', compact('level2', 'images'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Level2 $level2)
    {
         $Mylevel1s = Level1::all();
        return view('admin.level2s.edit', compact('level2','Mylevel1s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Level2 $level2)
    {
        try {
            DB::beginTransaction();
            $level2->update([
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
        return redirect()->route('admin.level2s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Level2 $level2)
    {

        Level2::destroy($level2->id);
        alert()->success('تصویر خبر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }
}
