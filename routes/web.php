<?php

use App\Models\Auction;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Auctions;
use App\Http\Livewire\Departments;
use App\Http\Livewire\PostShow;
use App\Http\Livewire\AuctionShow;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    // auth()->user()->assignRole('admin');
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
    Route::get('/admin/posts', Posts::class)->name('posts.index');
    //Route::get('/admin/auctions', Auctions::class)->name('auctions.index');
    //  Route::get('/admin/departments', Departments::class)->name('departments.index');
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    // Route::get('/auction', function () {
    //     return view('auction');
    // })->name('auction');
});
Route::get('/posts/{slug}', PostShow::class)->name('posts.show');
//Route::get('/auction/{slug}', AuctionShow::class)->name('auction.show');
