<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FaqController;

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

Route::get('/login', [MainController::class, 'login_func']);
Route::get('/', [MainController::class, 'login_func']);

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
