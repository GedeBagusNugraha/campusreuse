<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukAdminController;
use App\Http\Controllers\ProdukHomeController;
use App\Http\Controllers\RateAdminController;
use App\Http\Controllers\ViewPageController;
use App\Http\Controllers\CartProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/admin', ProdukAdminController::class);
Route::resource('/rate', RateAdminController::class);
Route::resource('/home', ProdukHomeController::class);
Route::resource('/view', ViewPageController::class);
Route::get('/viewmore2', [ViewPageController::class, 'viewmore2'])->name('view.viewmore2');
//Route::get('/cart', [ViewPageController::class, 'cart'])->name('view.cart');
Route::prefix('/cart')->group(function () {
    Route::resource('/cart1', CartProdukController::class);
    Route::get('/add-to-cart/{id}', [CartProdukController::class, 'addToCart'])->name('cart.addToCart');
});


require __DIR__.'/auth.php';
