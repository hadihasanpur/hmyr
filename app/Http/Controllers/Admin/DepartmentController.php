<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\DepartmentImageController;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::latest()->paginate(20);
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.departments.create', compact('departments'));
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
            'description' => 'required',
            'manager' => 'required',
            'ad' => 'required', //academic degree
            'post' => 'required',
            'avatar' => 'required|mimes:jpg,jpeg,png,svg',
        ]);
        try {
            DB::beginTransaction();
            $departmentImageController = new DepartmentImageController();
            $fileNameImages = $departmentImageController->upload($request->avatar, $request->images);
            $department = Department::create([
                'title' => $request->title,
                'description' => $request->description,
                'manager' => $request->manager,
                'ad' => $request->ad,
                'post' => $request->post,
                'avatar' => $fileNameImages['fileNamePrimaryImage'],
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'mobile' => $request->mobile,
                'fax' => $request->fax,

            ]);
            foreach ($fileNameImages['fileNameImages'] as $fileNameImage) {
                DepartmentImage::create([
                    'department_id' => $department->id,
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
        return redirect()->route('admin.departments.index');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $images = $department->images;
        return view('admin.departments.show', compact('department', 'images'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SetUnderImage(Department $department)
    {
        //dd($department->images);
        $images = $department->images;
        return view('admin.departments.show', compact('department', 'images'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Department $department)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'manager' => 'required',

        ]);
        try {
            DB::beginTransaction();
            $department->update([
                'title' => $request->title,
                'description' => $request->description,
                'manager' => $request->manager,
                'ad' => $request->ad,
                'post' => $request->post,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'mobile' => $request->mobile,
                'fax' => $request->fax,
                'address' => $request->address,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش خبر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('خبر مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:departments,id'
        ]);
        Department::destroy($request->id);
        alert()->success('تصویر خبر مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }
}
