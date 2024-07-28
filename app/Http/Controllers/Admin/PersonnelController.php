<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = Personnel::latest()->paginate(10);
        return view('admin.personnels.index', compact('personnels'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        $level2 = Level2::where('id', $personnel->level2_id)->first();
        $personnels = Personnel::all();
        return view('admin.personnels.show', compact('personnel', 'level2'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Personnel $personnel)
    {
        $Mylevel1s = Level1::all();
        $Mylevel2s = Level2::all();
        $Mylevel3s = Level3::all();
        $personnels = Personnel::all();
        return view(
            'admin.personnels.create',
            compact('personnels', 'Mylevel1s', 'Mylevel2s', 'Mylevel3s')
        );
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
            'avatar' => 'required',
            'post' => 'required',
        ]);
        $level1s = Level1::all();
        $level2s = Level2::all();
        $level3s = Level3::all();
        if (isset($request->Mylevel1)) {
            foreach ($level1s as $level1) {
                if (strcmp($level1->name, $request->Mylevel1) == 0) {
                    $level2_id = $level3_id = null;
                    $level1_id = $level1->id;
                    break;
                }
                else {
                    $level1_id = null;
                    foreach ($level2s as $level2) {
                        if (strcmp($level2->name, $request->Mylevel1) == 0) {
                            $level1_id = $level3_id = null;
                            $level2_id = $level2->id;
                            break;
                        }
                        else {
                            $level2_id = null;
                            foreach ($level3s as $level3) {
                                if (strcmp( $level3->name, $request->Mylevel1) == 0) {
                                    $level1_id = $level2_id = null;
                                    $level3_id = $level3->id;
                                    break;
                                } else {
                                    $level3_id = null;
                                }
                            }
                        }
                    }
                }
            }
        }
      //  dd($level1_id,$level2_id,$level3_id); 
        try {
            DB::beginTransaction();
            $personnelImageController = new PersonnelImageController();
            $fileNameImages = $personnelImageController->upload(
                $request->avatar
            );
            Personnel::create([
                'user_id' => $request->user()->id,
                'level1_id' => $level1_id,
                'level2_id' => $level2_id,
                'level3_id' => $level3_id,
                'name' => $request->name,
                'post' => $request->post,
                'description' => $request->description,
                'avatar' => $fileNameImages['fileNamePrimaryImage'],
                'description' => $request->description,
                'ad' => $request->ad,
                'started_at' => $request->started_at,
                'finished_at' => $request->finished_at,
                'priority' => $request->priority,
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
                ->error('مشکل اساسی در ایجاد پرسنل', $ex->getMessage())
                ->persistent('حله');
            return redirect()->back();
        }

        alert()->success('پرسنل مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.personnels.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnel $personnel)
    {
        $Mylevel1s = Level1::all();
        $Mylevel2s = Level2::all();
        $Mylevel3s = Level3::all();
        return view('admin.personnels.edit', compact('personnel','Mylevel1s','Mylevel2s','Mylevel3s'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {
        $level1s = Level1::all();
        $level2s = Level2::all();
        $level3s = Level3::all();
        if (isset($request->Mylevel1)) {
            foreach ($level1s as $level1) {
                if (strcmp($level1->name, $request->Mylevel1) == 0) {
                    $level2_id = $level3_id = null;
                    $level1_id = $level1->id;
                    break;
                }
                else {
                    $level1_id = null;
                    foreach ($level2s as $level2) {
                        if (strcmp($level2->name, $request->Mylevel1) == 0) {
                            $level1_id = $level3_id = null;
                            $level2_id = $level2->id;
                            break;
                        }
                        else {
                            $level2_id = null;
                            foreach ($level3s as $level3) {
                                if (strcmp( $level3->name, $request->Mylevel1) == 0) {
                                    $level1_id = $level2_id = null;
                                    $level3_id = $level3->id;
                                    break;
                                } else {
                                    $level3_id = null;
                                }
                            }
                        }
                    }
                }
            }
        }
        try {
            DB::beginTransaction();
            if ($request->has('avatar')) {
                //hadihasanpur
                $personnelImageController = new PersonnelImageController();
                $fileNameImages = $personnelImageController->upload(
                    $request->avatar
                );
                $personnel->update([
                    'avatar' => $fileNameImages['fileNamePrimaryImage'],
                ]);
            }
            $personnel->update([
                'level1_id' => $level1_id,
                'level2_id' => $level2_id,
                'level3_id' => $level3_id,
                'name' => $request->name,
                'post' => $request->post,
                'description' => $request->description,
                'description' => $request->description,
                'ad' => $request->ad,
                'started_at' => $request->started_at,
                'finished_at' => $request->finished_at,
                'priority' => $request->priority,
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
                ->error('مشکل در ویرایش خبر واحد مشخص گردد', $ex->getMessage())
                ->persistent('حله');
            return redirect()->back();
        }
        alert()->success('خبر مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.personnels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Personnel $personnel)
    {
       // dd($personnel);
        File::delete(public_path(env('PERSONNEL_IMAGES_UPLOAD_PATH')) . $personnel->avatar);

        personnel::destroy($personnel->id);
        alert()->success('تصویر خبر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }
}
