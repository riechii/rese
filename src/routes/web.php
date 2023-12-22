<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CustomRegisteredUserController;

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
        // Route::get('/thanks', [ShopController::class, 'thanks']);
});
Route::get('/', [ShopController::class, 'index']);
Route::get('/upload/form', [ShopController::class, 'uploadForm']);
Route::post('/upload', [ShopController::class, 'upload'])->name('upload');
Route::post('/upload/area', [ShopController::class, 'uploadArea']);
Route::post('/upload/genre', [ShopController::class, 'uploadGenre']);
Route::get('/after_menu', [ShopController::class, 'afterMenu'])->name('afterMenu');
Route::get('/before_menu', [ShopController::class, 'beforeMenu'])->name('beforeMenu');
Route::get('/search', [ShopController::class, 'searchArea'])->name('searchArea');
Route::get('/search/genre', [ShopController::class, 'searchGenre'])->name('searchGenre');
Route::get('/search/shop', [ShopController::class, 'searchShop'])->name('searchShop');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('detail');
Route::post('/favorite', [ShopController::class, 'favorite'])->name('favorite');
Route::post('/detail/crate', [ShopController::class, 'reservation'])->name('reservation');
Route::get('/done', [ShopController::class, 'done'])->name('done');
Route::get('/thanks', [ShopController::class, 'thanks'])->name('thanks');

Route::get('/register', [CustomRegisteredUserController::class, 'create'])->middleware(['guest'])->name('register');

Route::post('/register', [CustomRegisteredUserController::class, 'store'])->middleware(['guest']);