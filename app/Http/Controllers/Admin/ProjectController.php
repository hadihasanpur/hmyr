<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $projects = Project::all();
        return view('admin.projects.create', compact('projects'));
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
            'project' => 'required',
            'employer' => 'required',
            'consultant' => 'required',
            'location' => 'required',
            'cost' => 'required',
            'Projectstart' => 'required',
            'Projectend' => 'required'
        ]);
        try {
           DB::beginTransaction();
            $project = Project::create([
                'project' => $request->project,
                'employer' => $request->employer,
                'consultant' => $request->consultant,
                'location' => $request->location,
                'cost' => $request->cost,
                'Projectstart' => convertShamsiToGregorianDate($request->Projectstart),
                'Projectend' => convertShamsiToGregorianDate($request->Projectend)
            ]);
//dd($project);
            
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل اساسی در ایجاد پروژه', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('پروژه مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
       return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Project $project)
    {
        try {
            DB::beginTransaction();
            $project->update([
                'project' => $request->project,
                'employer' => $request->employer,
                'consultant' => $request->consultant,
                'location' => $request->location,
                'cost' => $request->cost,
                'Projectstart' => convertShamsiToGregorianDate($request->Projectstart),
                'Projectend' => convertShamsiToGregorianDate($request->Projectend)

            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش \روژه', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('پروژه مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        project::destroy($project->id);
        alert()->success('پروژه  مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }
}
