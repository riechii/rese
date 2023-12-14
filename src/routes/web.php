<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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

Route::middleware('auth')->group(function () {
        Route::get('/', [ShopController::class, 'index']);
});
// Route::get('/', [ShopController::class, 'index']);
Route::get('/upload_form', [ShopController::class, 'uploadForm']);
Route::post('/upload', [ShopController::class, 'upload'])->name('upload');