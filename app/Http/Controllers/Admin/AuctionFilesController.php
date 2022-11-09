<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auction;
use App\Models\AuctionFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AuctionFilesController extends Controller
{

    public function upload($files)
    {
        $fileNames = []; //fileNameImages
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path(env('AUCTION_FILES_UPLOAD_PATH')), $fileName);
            array_push($fileNames, $fileName);
        }
        return ['fileNames' => $fileNames];
    }

    public function edit(Auction $auction)
    {
        return view('admin.auctions.edit_files', compact('auction'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'auction_id' => 'required|exists:auction_files,id'
        ]);

        AuctionFile::destroy($request->auction_id);

        alert()->success('تصویر محصول مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }

    public function add(Request $request, Auction $auction)
    {


        $request->validate([
            'files.*' => 'nullable|mimes:docx,odt,xl,svg',
        ]);
        if ($request->files == null) {
            $files = array();
            return redirect()->back()->withErrors(['msg' => 'درج فایل الزامی هست']);
        }
        try {
            DB::beginTransaction();
        //  dd($request->files);
            if ($request->has('docs')) {
           //      dd($request->docs);
                foreach (($request->docs) as $doc) {

                    $fileName = $doc->getClientOriginalName();

                    $doc->move(public_path(env('AUCTION_FILES_UPLOAD_PATH')), $fileName);
                    AuctionFile::create([
                        'auction_id' => $auction->id,
                        'file' => $fileName
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد خبر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('ویرایش فایل اصلی خبر با موفقیت انجام شد', 'باتشکر');
        return redirect()->back();
    }
}
