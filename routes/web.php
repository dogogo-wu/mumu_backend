<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TeachController;

use App\Http\Controllers\GalleryController;

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

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/login', [MainController::class, 'login_func']);

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

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

Route::prefix('/environment')->middleware(['auth'])->group(function(){
    Route::get('/', [EnvironmentController::class, 'index']);
    Route::get('/create', [EnvironmentController::class, 'create']);
    Route::post('/store', [EnvironmentController::class, 'store']);
    Route::post('/delete/{target}', [EnvironmentController::class, 'delete']);
    Route::get('/edit/{target}', [EnvironmentController::class, 'edit']);
    Route::post('/update/{target}', [EnvironmentController::class, 'update']);

    Route::post('/upmove/{target}', [EnvironmentController::class, 'upmove']);
    Route::post('/downmove/{target}', [EnvironmentController::class, 'downmove']);
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

Route::prefix('/teach')->middleware(['auth'])->group(function(){
    Route::get('/', [TeachController::class, 'index']);
    Route::get('/create', [TeachController::class, 'create']);
    Route::post('/store', [TeachController::class, 'store']);
    Route::post('/delete/{target}', [TeachController::class, 'delete']);
    Route::get('/edit/{target}', [TeachController::class, 'edit']);
    Route::post('/update/{target}', [TeachController::class, 'update']);

    Route::post('/upmove/{target}', [TeachController::class, 'upmove']);
    Route::post('/downmove/{target}', [TeachController::class, 'downmove']);
});

Route::prefix('/photo')->middleware(['auth'])->group(function(){
    Route::get('/', [GalleryController::class, 'index']);
    Route::get('/create', [GalleryController::class, 'create']);
    Route::post('/store', [GalleryController::class, 'store']);
    Route::post('/delete/{target}', [GalleryController::class, 'delete']);
    Route::get('/edit/{target}', [GalleryController::class, 'edit']);
    Route::post('/update/{target}', [GalleryController::class, 'update']);
    Route::delete('/del_sec_img/{sec_tar}', [GalleryController::class, 'del_secimg_func']);

    Route::post('/mystore/{target}', [GalleryController::class, 'mystore']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
