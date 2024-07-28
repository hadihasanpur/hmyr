<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\User;
use App\Models\Modir;
use App\Models\Auction;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
            $post1 = Post::where('is_active', 1)->orderBy('created_at', 'desc')->where('is_active','1')->first();
            $postcount = Post::where('is_active', 1)->count();
            $auctioncount = Auction::where('is_active', 1)->count();
            $modircount = Modir::where('is_active', 1)->count();
            $usercount = User::where('status', 1)->count();
            $auctioncount = Auction::where('is_active', 1)->count();
           $posts10 = DB::table('posts')->orderBy('created_at', 'desc')->paginate(10);
            // $posts10 =DB::table('posts')
            // ->select(['posts.title','posts.abstract','posts.id','posts.created_at'])->andWhere(['like', 'abstract', $text])
            // ->orderBy('posts.date desc')
            // ->paginate(10);
                return view('admin.dashboard', compact('post1','postcount','auctioncount','usercount','modircount','usercount','posts10',));
    }
}
