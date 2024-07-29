<?php

use App\Models\User;
use App\Notifications\OTPSms;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ModirController;
use App\Http\Controllers\Admin\Level1Controller;
use App\Http\Controllers\Admin\Level2Controller;
use App\Http\Controllers\Admin\Level3Controller;
use App\Http\Controllers\Admin\AuctionController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PersonnelController;
use App\Http\Controllers\Admin\PictorialController;
use App\Http\Controllers\Admin\PostImageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Home\UserProfileController;
use App\Http\Controllers\Admin\Level1ImageController;
use App\Http\Controllers\Admin\Level2ImageController;
use App\Http\Controllers\Admin\Level3ImageController;
use App\Http\Controllers\Home\UsersProfileController;
use App\Http\Controllers\Admin\AuctionFilesController;
use App\Http\Controllers\Admin\ProjectImageController;
use App\Http\Controllers\Admin\PictorialImageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/admin-panel/dashboard', function () {
//    return view('admin.dashboard');}
//)->name('dashboard');
        Route::get('/admin-panel/dashboard/', [Controller::class,'index'])->name('dashboard');
        Route::prefix('admin-panel/management')
            ->name('admin.')
            ->middleware(['role:admin', 'verified'])
            ->group(function () {
        Route::resource('posts', PostController::class);
        Route::resource('pictorials', PictorialController::class);
        Route::resource('auctions', AuctionController::class);
        Route::resource('level1s', Level1Controller::class);
        Route::resource('level2s', Level2Controller::class);
        Route::resource('level3s', Level3Controller::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('modirs', ModirController::class);
        Route::resource('links', LinkController::class);
        Route::resource('personnels', PersonnelController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('users', UserController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('roles', RoleController::class);
        // Edit Post Image created by myself
        Route::get('/posts/{post}/images-edit', [PostImageController::class,'edit', ])->name('posts.images.edit');
        Route::get('/posts/{postImage}/images-edit', [PostImageController::class,'edit',])->name('posts.images.edit1');
        Route::delete('/posts/{post}/images-destroy', [PostImageController::class,'destroy',])->name('posts.images.destroy');
        Route::put('/posts/{post}/images-set-primary', [PostImageController::class,'setPrimary',])->name('posts.images.set_primary');
        Route::post('/posts/{post}/images-add', [PostImageController::class,'add',])->name('posts.images.add');
        // Edit Auction Image created by myself
        Route::get('/auctions/{auction}/files-edit', [AuctionFilesController::class,'edit',])->name('auctions.files.edit');
        Route::delete('/auctions/{auction}/files-destroy', [AuctionFilesController::class,'destroy',])->name('auctions.files.destroy');
        Route::post('/auctions/{auction}/files-add', [AuctionFilesController::class,'add',])->name('auctions.files.add');
         // Edit Pictorial Image created by mysel
        Route::get('/pictorials/{pictorial}/images-edit', [PictorialImageController::class,'edit', ])->name('pictorials.images.edit');
        Route::get('/pictorials/{pictorialImage}/images-edit', [PictorialImageController::class,'edit',])->name('pictorials.images.edit1');
        Route::delete('/pictorials/{pictorial}/images-destroy', [PictorialImageController::class,'destroy',])->name('pictorials.images.destroy');
        Route::put('/pictorials/{pictorial}/images-set-primary', [PictorialImageController::class,'setPrimary',])->name('pictorials.images.set_primary');
        Route::post('/pictorials/{pictorial}/images-add', [PictorialImageController::class,'add',])->name('pictorials.images.add');
        // Edit Level1 Image created by Level1ImageController
        Route::post('/level1s/{level1}/images-add',           [Level1ImageController::class,'add',       ])->name('level1s.images.add'        );
        Route::get('/level1s/{level1}/images-edit',           [Level1ImageController::class,'edit',      ])->name('level1s.images.edit'       );
        Route::put('/level1s/{level1}/images-set-primary',    [Level1ImageController::class,'setPrimary',])->name('level1s.images.set_primary');
        Route::put('/level1s/{level1}/images-set-underImage', [Level1ImageController::class,'underImage',])->name('level1s.images.underImage' );
        Route::delete('/level1s/{level1}/images-destroy',     [Level1ImageController::class,'destroy',   ])->name('level1s.images.destroy'    );
        // Edit Level2 Image created by myself
        Route::get('/level2s/{level2}/images-edit', [Level2ImageController::class,'edit',])->name('level2s.images.edit');
        Route::delete('/level2s/{level2}/images-destroy', [Level2ImageController::class,'destroy',])->name('level2s.images.destroy');
        Route::put('/level2s/{level2}/images-set-primary', [Level2ImageController::class,'setPrimary',])->name('level2s.images.set_primary');
        Route::put('/level2s/{level2}/images-set-underImage', [Level2ImageController::class,'underImage',])->name('level2s.images.underImage');
        Route::post('/level2s/{level2}/images-add', [Level2ImageController::class,'add',])->name('level2s.images.add');
        Route::post('/level2s/{level2}/store-Avatar', [Level2ImageController::class,'add',])->name('level2s.images.storeAvatar');
         // Edit Level3 Image created by myself
        Route::get('/level3s/{level3}/images-edit', [Level3ImageController::class,'edit',])->name('level3s.images.edit');
        Route::delete('/level3s/{level3}/images-destroy', [Level3ImageController::class,'destroy',])->name('level3s.images.destroy');
        Route::put('/level3s/{level3}/images-set-primary', [Level3ImageController::class,'setPrimary',])->name('level3s.images.set_primary');
        Route::put('/level3s/{level3}/images-set-underImage', [Level3ImageController::class,'underImage',])->name('level3s.images.underImage');
        Route::post('/level3s/{level3}/images-add', [Level3ImageController::class,'add',])->name('level3s.images.add');
        Route::post('/level3s/{level3}/store-Avatar', [Level3ImageController::class,'add',])->name('level3s.images.storeAvatar');
    });
////Route::any('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forgot-password', function () {   return view('auth.forgot-password');})->name('forgot-password');
Route::get('/reset-password', function () { return view('auth.reset-password');})->name('reset-password');
Route::prefix('profile')->name('home.')->group(function () {Route::get('/', [UserProfileController::class, 'index'])->name('users_profile.index' );
});
Route::get('/login/{provider}', [ AuthController::class,'redirectToProvider',])->name('provider.login');
Route::get('/login/{provider}/callback', [ AuthController::class,'handleProviderCallback',]);
Route::get('/logout/', [AuthController::class, 'logout']);
Route::middleware(['auth', 'verified'])->get('/profile', function () {
    return view('home.profile');}) ->name('profile');
    Route::middleware(['auth', 'verified'])->get('/password', function () {
        return view('home.password');
    })->name('password');
Route::get('/',                      [HomeController::class,'index'        ])->name('home.index'        );
Route::get('allposts',               [HomeController::class,'allposts'     ])->name('home.allposts'     );
Route::get('allauctions',            [HomeController::class,'auctions'     ])->name('home.auctions'     );
Route::get('allpictorials',          [HomeController::class,'allpictorials'])->name('home.allpictorials');
Route::get('/search',                [HomeController::class,'search'       ])->name('home.search'       );
Route::get('links',                  [HomeController::class,'links'        ])->name('home.links'        );
Route::get('projects',               [HomeController::class,'projects'     ])->name('home.projects'     );
Route::get('contactus',              [HomeController::class,'contactus'    ])->name('home.contactus'    );
Route::get('/{content}/',            [HomeController::class,'content'      ])->name('home.content'      );
Route::get('/auction/{auction}/',    [HomeController::class,'auction'      ])->name('home.auction'      );
Route::get('/level1/{level1}/',      [HomeController::class,'level1'       ])->name('home.level1'       );
Route::get('/level2/{level2}/',      [HomeController::class,'level2'       ])->name('home.level2'       );
Route::get('/level3/{level3}/',      [HomeController::class,'level3'       ])->name('home.level3'       );
Route::get('/pictorial/{pictorial}/',[HomeController::class,'pictorial'    ])->name('home.pictorial'    );

Route::get('/test', function ()
{
    auth()->logout();
});