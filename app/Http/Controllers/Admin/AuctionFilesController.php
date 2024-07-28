<?php

namespace App\Http\Controllers\Admin;

use SplFileInfo;
use App\Models\Auction;
use App\Models\AuctionFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AuctionFilesController extends Controller
{

    public function upload($files)
    {
        $fileNames = []; //fileNameImages
        foreach ($files as $file)
        {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path(env('AUCTION_FILES_UPLOAD_PATH')), $fileName);
            array_push($fileNames, $fileName);
        }
        return ['fileNames' => $fileNames];
    }

    public function add(Request $request, Auction $auction)
    {
        $request->validate([
            'file.*' => 'required|nullable|mimes:docx,odt,xl,svg',
        ]);
        if ($request->docs == null) {
            return redirect()->back()->withErrors(['msg' => 'درج فایل الزامی هست']);
        }
       // dd($request->docs);
          
        try {
            DB::beginTransaction();
            if ($request->has('docs'))
            {
                foreach (($request->docs) as $doc) {
                    $fileName = $doc->getClientOriginalName();
                    $doc->move(public_path(env('AUCTION_FILES_UPLOAD_PATH')), $fileName);
                    AuctionFile::create([
                        'auction_id' => $auction->id,
                        'file' => $fileName
                    ]);
                }
            }
            $info = new SplFileInfo('photo.jpg');
var_dump($info->getExtension());

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد خبر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success(' فایلها با موفقیت اضافه شدند', 'باتشکر');
        return redirect()->back();
    }


    public function edit(Auction $auction)
    {
        return view('admin.auctions.edit_files', compact('auction'));
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'auction_id' => 'required|exists:auction_files,id',
        ]);
        $auctionFile = AuctionFile::findOrFail($request->auction_id);
        AuctionFile::destroy($request->auction_id);
        File::delete(
                    public_path(env('AUCTION_FILES_UPLOAD_PATH')) .
                    $auctionFile->file
                );
        alert()->success('تصویر محصول مورد نظر حدف شد', 'باتشکر');
        return redirect()->back();
    }
  
}
