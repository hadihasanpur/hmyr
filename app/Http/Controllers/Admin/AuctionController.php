<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auction;
use App\Models\AuctionFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Admin\AuctionFilesController;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::latest()->paginate(20);

        return view('admin.auctions.index', compact('auctions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auctions = Auction::all();
        return view('admin.auctions.create', compact('auctions'));
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
            'body' => 'required',
            'file' => 'required',
            'started_at' => 'required',
            'finished_at' => 'required'
        ]);
        //dd($request);
        try {
            DB::beginTransaction();
            $auctionFilesController = new AuctionFilesController();
            $fileNames = $auctionFilesController->upload($request->file);
            $auction = Auction::create([
                'user_id' => $request->user()->id,
                'title' => $request->title,
                'body' => $request->body,
                'is_active' => $request->is_active,
                'started_at' => convertShamsiToGregorianDate($request->started_at),
                'finished_at' => convertShamsiToGregorianDate($request->finished_at)
            ]);
            foreach ($fileNames['fileNames'] as $fileName) {
                AuctionFile::create([
                    'auction_id' => $auction->id,
                    'file' => $fileName
                ]);
            }
            DB::commit();
        } 
        catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل اساسی در ایجاد مزایده', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('مزایده مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.auctions.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        $files = $auction->files;
        // dd($files);
        return view('admin.auctions.show', compact('auction', 'files'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        $files = $auction->files;
        return view('admin.auctions.edit', compact('auction', 'files'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction,AuctionFile $file)
    {
        
    //   dd($request->all());
        try {
            DB::beginTransaction();
            $auction->update([
                'title' => $request->title,
                'body' => $request->body,
                'is_active' => $request->is_active,
                'created_at' => convertShamsiToGregorianDate($request->created_at),
                'started_at' => convertShamsiToGregorianDate($request->started_at),
                'finished_at' => convertShamsiToGregorianDate($request->finished_at),
            ]);
            foreach ($file as $file) {
                $auctionfiles = AuctionFile::all();
                $auctionfiles->add([
                    'file' => $request->file
                ]);
             //   dd($request->all());
        }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش خبر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('خبر مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.auctions.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        foreach ($auction->files as $auctionFile) {
                    File::delete(public_path(env('AUCTION_FILES_UPLOAD_PATH')) . $auctionFile->file);

        }
        $auction->delete();
        alert()->success('مزایده مورد نظر حذف شد', 'باتشکر');
        return redirect()->route('admin.auctions.index');
    }
}
