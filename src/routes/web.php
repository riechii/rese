<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthorityController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\StripeController;
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
        Route::get('/mypage', [ShopController::class, 'mypage'])->name('mypage');
        Route::post('/mypage/delete', [ReservationController::class, 'delete'])->name('delete');
        Route::post('/mypage/update', [ReservationController::class, 'update'])->name('update');

});
Route::get('/', [ShopController::class, 'index'])->name('shopList');
Route::get('/upload/form', [ShopController::class, 'uploadForm'])->name('uploadForm');
Route::post('/upload', [ShopController::class, 'upload'])->name('upload');

Route::get('/upload/edit/{id}', [ShopController::class, 'showUploadEdit'])->name('showUploadEdit');
Route::post('/upload/edit/{id}', [ShopController::class, 'uploadEdit'])->name('uploadEdit');
Route::get('/upload/reservation/{id}', [ReservationController::class, 'showReservation'])->name('showReservation');


Route::post('/upload/area', [ShopController::class, 'uploadArea']);
Route::post('/upload/genre', [ShopController::class, 'uploadGenre']);

Route::get('/user', [AuthorityController::class, 'userList'])->name('userList');
Route::get('/user/edit/{id}', [AuthorityController::class, 'showUserEdit'])->name('showUserEdit');
Route::post('/user/edit/{id}', [AuthorityController::class, 'userEdit'])->name('userEdit');
Route::post('/user/revoke/{id}', [AuthorityController::class, 'revokeRoles'])->name('revokeRoles');


Route::get('/after_menu', [ShopController::class, 'afterMenu'])->name('afterMenu');
Route::get('/before_menu', [ShopController::class, 'beforeMenu'])->name('beforeMenu');
Route::get('/search', [ShopController::class, 'searchArea'])->name('searchArea');
Route::get('/search/genre', [ShopController::class, 'searchGenre'])->name('searchGenre');
Route::get('/search/shop', [ShopController::class, 'searchShop'])->name('searchShop');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('detail');
Route::post('/favorite', [FavoriteController::class, 'favorite'])->name('favorite');
Route::post('/detail/crate', [ReservationController::class, 'reservation'])->name('reservation');
Route::get('/reservation/qrcode/{reservation_id}', [ReservationController::class, 'generateQrCode'])->name('generateQrCode');

Route::get('/done', [ReservationController::class, 'done'])->name('done');
Route::get('/thanks', [ShopController::class, 'thanks'])->name('thanks');
Route::get('/review/form/{store_id}', [ReviewController::class, 'showReviewForm'])->name('showReviewForm');
Route::post('/review/form', [ReviewController::class, 'reviewForm']);
Route::get('/review/{store_id}', [ReviewController::class, 'review'])->name('review');

Route::get('/charge/form', [StripeController::class, 'showCharge'])->name('showCharge');
Route::post('/charge', [StripeController::class, 'charge'])->name('charge');


Route::get('/register', [CustomRegisteredUserController::class, 'create'])->middleware(['guest'])->name('register');

Route::post('/register', [CustomRegisteredUserController::class, 'store'])->middleware(['guest']);