<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::latest()->paginate(10);
        return view('admin.links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $links = Link::all();

        return view('admin.links.create', compact('links'));
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
            'link' => 'required',

        ]);
        try {
            DB::beginTransaction();
            Link::create([
                'user_id' => $request->user()->id,
                'title' => $request->title,
                'link' => $request->link,
                'group' => $request->group,
                'is_active' => $request->is_active,
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();

            alert()->error('مشکل اساسی در ایجاد لینک', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('لبنک مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.links.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link){
        return view('admin.links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Link $link)
    {
       $request->validate([
            'title' => 'required',
            'link' => 'required',

        ]);
        try {
            DB::beginTransaction();
            $link->update([
                'user_id' => $request->user()->id,
                'title' => $request->title,
                'link' => $request->link,
                'group' => $request->group,
                'is_active' => $request->is_active,
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();

            alert()->error('مشکل اساسی در ایجاد لینک', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('لبنک مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();

        alert()->success('لینک مورد نظر حذف شد', 'باتشکر');
        return redirect()->route('admin.links.index');
    }
}
