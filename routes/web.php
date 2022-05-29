<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BannerController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
