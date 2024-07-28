<?php

namespace App\Http\Controllers\Home;

use SplFileInfo;
use App\Models\Post;
use App\Models\Modir;
use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;
use App\Models\Auction;
use App\Models\Personnel;
use App\Models\Pictorial;
use Illuminate\Http\Request;
use App\Models\PersonnelImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $post1 = Post::where('is_active', 1)->orderBy('created_at', 'desc')->first();
        $modir = Modir::where('is_active', 1)
            ->where('title', 'مدیر عامل سازمان')
            ->first();
        $pictorial = Pictorial::orderBy('created_at', 'desc')->with('pictorialImage')->where('is_active',1)->first();
        //منوی معاونتها
        $menu = Level1::with(['level2s.level3s','level3s'])
            ->orderBy('priority', 'asc')
            ->get();
        $posts = Post::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $posts2 = Post::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->offset(1)
            ->limit(2) //LIMIT [offset,] row_count; products->offset(0)->limit(10)->get();
            ->get(); 
        $carousels = Post::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->offset(1)
            ->limit(2) //LIMIT [offset,] row_count; products->offset(0)->limit(10)->get();
            ->get();
         
            
        $posts4 = DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->where('is_active',1)
            ->offset(3)
            ->limit(4) //LIMIT [offset,] row_count; products->offset(0)->limit(10)->get();
            ->get();
        $hotels = DB::table('galleries')
            ->where('category', 'hotel')
            ->orderBy('created_at', 'desc')
            ->get();
        $betons = DB::table('galleries')
            ->where('category', 'beton')
            ->orderBy('created_at', 'desc')
            ->get();
        $javans = DB::table('galleries')
            ->where('category', 'javan')
            ->orderBy('created_at', 'desc')
            ->get();
        $omrans = DB::table('galleries')
            ->where('category', 'omrani')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('home.index', compact('posts','post1','posts2','posts4',
        'modir','hotels', 'betons','javans','omrans','menu','pictorial','carousels'))
        ->with('menu', $menu);
    }

    public function content(Post $content, Level1 $level1)
    {
        $menu = Level1::with('level2s')
            ->orderBy('priority', 'desc')
            ->get();
        $level1s = Level1::where('is_active', 1)
            ->orderBy('created_at', 'asc')
            ->get();
         //   DD($content);
        $images = $content->postImages;
        $level1Menus = Level1::where('is_active', 1)
            ->orderBy('priority', 'desc')
            ->get(); 
        return view('home.content',compact('content','level1Menus','images','level1s','menu',) );
    }

    public function pictorial(Pictorial $pictorial, Level1 $level1)
    {
        $menu = Level1::with('level2s')
            ->orderBy('priority', 'desc')
            ->get();
       // DD($pictorial);
        $level1s = Level1::where('is_active', 1)
            ->orderBy('created_at', 'asc')
            ->get();
        $images = $pictorial->pictorialImage;
        $level1Menus = Level1::where('is_active', 1)
            ->orderBy('priority', 'desc')
            ->get(); 
        return view('home.pictorial',compact('pictorial','level1Menus','images','level1s','menu',) );
    }

    public function allposts()
    {
                $allposts = DB::table('posts')->orderBy('created_at', 'desc')->where('is_active','1')->paginate(10);
                $menu = Level1::with(['level2s.level3s','level3s'])->orderBy('priority', 'asc')->get();
            return view('home.allposts',compact('allposts','menu'));
    }

    public function search(Request $request)
    {
    $search = $request->input('search');
    $menu = Level1::with(['level2s.level3s','level3s'])->orderBy('priority', 'asc')->get();
    $posts = DB::table('posts')
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('abstract', 'LIKE', "%{$search}%")
        ->get();
    return view('home.search', compact('posts','menu'));
    }

    public function allpictorials()
    {
                $allpictorials = DB::table('pictorials')->orderBy('created_at', 'desc')->where('is_active','1')->paginate(10);
                $menu = Level1::with(['level2s.level3s','level3s'])->orderBy('priority', 'asc')->get();
            return view('home.allpictorials',compact('allpictorials','menu'));
    }

    public function auctions()
    {
                $auctions = DB::table('auctions')->orderBy('created_at', 'desc')->where('is_active','1')->paginate(5);
                $menu = Level1::with(['level2s.level3s','level3s'])->orderBy('priority', 'asc')->get();
            return view('home.allauctions',compact('auctions','menu'));
    }

    public function auction(Auction $auction, Level1 $level1)
    {
        $menu = Level1::with('level2s')
            ->orderBy('priority', 'desc')
            ->get();
        $level1s = Level1::where('is_active', 1)
            ->orderBy('created_at', 'asc')
            ->get();
        $files = $auction->files;
        $level1Menus = Level1::where('is_active', 1)
            ->orderBy('priority', 'desc')
            ->get(); 
        return view('home.auction',compact('auction','level1Menus','files','level1s','menu',) );
    }

    public function links()
    {
                $links = DB::table('links')->orderBy('Projectstart', 'desc')->get(); 
                $menu = Level1::with(['level2s.level3s','level3s'])->orderBy('priority', 'asc')->get();
            return view('home.links',compact('links','menu'));
    } 
    public function projects()
    {
                $projects = DB::table('projects')->orderBy('Projectstart', 'asc')->get(); 
                $menu = Level1::with(['level2s.level3s','level3s'])->orderBy('priority', 'asc')->get();
            return view('home.projects',compact('projects','menu'));
    } 
    public function contactus()
    {
                $menu = Level1::with(['level2s.level3s','level3s'])->orderBy('priority', 'asc')->get();
             // dd($links);
            return view('home.contactus',compact('menu'));
    }

    public function level1(Level1 $level1, Personnel $personnel)
    {
        $menu = Level1::with('level2s')->orderBy('priority', 'asc')->get(); //necessary in menu section
        $images = $level1->images;
        $personnels = Personnel::where([['is_active', 1],['level1_id','!=','NULL'],['level1_id',$level1->id]])
        ->orderBy('priority', 'asc')->get();
         //   dd($personnels);
        return view('home.level1',compact('level1','images','personnels', 'menu') );
    }
    public function level2(Level2 $level2, Personnel $personnel)
    {
        $menu = Level1::with('level2s')->orderBy('priority', 'asc')->get();
        $images = $level2->images;
        $personnels = Personnel::where([['is_active', 1],['level2_id','!=','NULL'],['level2_id',$level2->id]])
            ->orderBy('priority', 'asc')->get();

        return view('home.level2',compact('level2', 'images', 'personnels', 'menu'));
    }
    public function level3(Level3 $level3, PersonnelImage $personnel)
    {
        $menu = Level1::with('level2s')->get();
        $images = $level3->images;
            $personnels = Personnel::where([['is_active', 1],['level3_id','!=','NULL'],['level3_id',$level3->id]])
            ->orderBy('priority', 'asc')->get();
        return view('home.level3',compact('level3', 'images', 'personnels', 'menu'));
    }
}
