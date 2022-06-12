<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LatestController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TeachController;
use App\Http\Controllers\TeachPicController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\InfoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// -------------- 登入 -------------- //
Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     // dd(session()->all());
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// -------------- 前台路由 -------------- //
Route::get('/', [MainController::class, 'index']);
Route::get('/course', [MainController::class, 'course']);
Route::get('/gallery', [MainController::class, 'gallery']);
Route::get('/health', [MainController::class, 'health']);
Route::get('/appointment', [MainController::class, 'appointment']);


// -------------- 後台路由 -------------- //
Route::prefix('/banner')->middleware(['auth'])->group(function(){
    Route::get('/', [BannerController::class, 'index']);
    Route::get('/create', [BannerController::class, 'create']);
    Route::post('/store', [BannerController::class, 'store']);
    Route::post('/delete/{target}', [BannerController::class, 'delete']);
    Route::get('/edit/{target}', [BannerController::class, 'edit']);
    Route::post('/update/{target}', [BannerController::class, 'update']);

    Route::post('/upmove/{target}', [BannerController::class, 'upmove']);
    Route::post('/downmove/{target}', [BannerController::class, 'downmove']);
});

Route::prefix('/latest')->middleware(['auth'])->group(function(){
    Route::get('/', [LatestController::class, 'index']);
    Route::get('/create', [LatestController::class, 'create']);
    Route::post('/store', [LatestController::class, 'store']);
    Route::post('/delete/{target}', [LatestController::class, 'delete']);
    Route::get('/edit/{target}', [LatestController::class, 'edit']);
    Route::post('/update/{target}', [LatestController::class, 'update']);

    Route::post('/upmove/{target}', [LatestController::class, 'upmove']);
    Route::post('/downmove/{target}', [LatestController::class, 'downmove']);
});

Route::prefix('/service')->middleware(['auth'])->group(function(){
    Route::get('/', [ServiceController::class, 'index']);
    Route::get('/create', [ServiceController::class, 'create']);
    Route::post('/store', [ServiceController::class, 'store']);
    Route::post('/delete/{target}', [ServiceController::class, 'delete']);
    Route::get('/edit/{target}', [ServiceController::class, 'edit']);
    Route::post('/update/{target}', [ServiceController::class, 'update']);

    Route::post('/upmove/{target}', [ServiceController::class, 'upmove']);
    Route::post('/downmove/{target}', [ServiceController::class, 'downmove']);
});

Route::prefix('/faq')->middleware(['auth'])->group(function(){
    Route::get('/', [FaqController::class, 'index']);
    Route::get('/create', [FaqController::class, 'create']);
    Route::post('/store', [FaqController::class, 'store']);
    Route::post('/delete/{target}', [FaqController::class, 'delete']);
    Route::get('/edit/{target}', [FaqController::class, 'edit']);
    Route::post('/update/{target}', [FaqController::class, 'update']);

    Route::post('/upmove/{target}', [FaqController::class, 'upmove']);
    Route::post('/downmove/{target}', [FaqController::class, 'downmove']);
});

Route::prefix('/teach_item')->middleware(['auth'])->group(function(){
    Route::get('/', [TeachController::class, 'index']);
    Route::get('/create', [TeachController::class, 'create']);
    Route::post('/store', [TeachController::class, 'store']);
    Route::post('/delete/{target}', [TeachController::class, 'delete']);
    Route::get('/edit/{target}', [TeachController::class, 'edit']);
    Route::post('/update/{target}', [TeachController::class, 'update']);

    Route::post('/upmove/{target}', [TeachController::class, 'upmove']);
    Route::post('/downmove/{target}', [TeachController::class, 'downmove']);
});

Route::prefix('/teach_pic')->middleware(['auth'])->group(function(){
    Route::get('/', [TeachPicController::class, 'index']);
    Route::get('/create', [TeachPicController::class, 'create']);
    Route::post('/store', [TeachPicController::class, 'store']);
    Route::post('/delete/{target}', [TeachPicController::class, 'delete']);
    Route::get('/edit/{target}', [TeachPicController::class, 'edit']);
    Route::post('/update/{target}', [TeachPicController::class, 'update']);

    Route::post('/upmove/{target}', [TeachPicController::class, 'upmove']);
    Route::post('/downmove/{target}', [TeachPicController::class, 'downmove']);
});

Route::prefix('/photo')->middleware(['auth'])->group(function(){
    Route::get('/', [GalleryController::class, 'index']);
    Route::get('/create', [GalleryController::class, 'create']);
    Route::post('/store', [GalleryController::class, 'store']);
    Route::post('/delete/{target}', [GalleryController::class, 'delete']);
    Route::get('/edit/{target}', [GalleryController::class, 'edit']);
    Route::post('/update/{target}', [GalleryController::class, 'update']);
    Route::delete('/del_sec_img/{sec_tar}', [GalleryController::class, 'del_secimg_func']);

    // For datatable
    Route::post('/upmove/{target}', [GalleryController::class, 'upmove']);
    Route::post('/downmove/{target}', [GalleryController::class, 'downmove']);

    // For Image
    Route::post('/frontmove/{target}', [GalleryController::class, 'frontmove']);
    Route::post('/backmove/{target}', [GalleryController::class, 'backmove']);

    // 尚未使用
    Route::post('/mystore/{target}', [GalleryController::class, 'mystore']);
});

Route::prefix('/notice')->middleware(['auth'])->group(function(){
    Route::get('/', [NoticeController::class, 'index']);
    Route::get('/create', [NoticeController::class, 'create']);
    Route::post('/store', [NoticeController::class, 'store']);
    Route::post('/delete/{target}', [NoticeController::class, 'delete']);
    Route::get('/edit/{target}', [NoticeController::class, 'edit']);
    Route::post('/update/{target}', [NoticeController::class, 'update']);
});

Route::prefix('/info')->middleware(['auth'])->group(function(){
    Route::get('/', [InfoController::class, 'index']);
    Route::get('/create', [InfoController::class, 'create']);
    Route::post('/store', [InfoController::class, 'store']);
    Route::post('/delete/{target}', [InfoController::class, 'delete']);
    Route::get('/edit/{target}', [InfoController::class, 'edit']);
    Route::post('/update/{target}', [InfoController::class, 'update']);
});

require __DIR__.'/auth.php';
