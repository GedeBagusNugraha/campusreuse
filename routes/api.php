<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukAdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk menampilkan semua produk
Route::get('/produk', [ProdukAdminController::class, 'index']);

// Route untuk menampilkan detail produk berdasarkan ID
Route::get('/produk/{id}', [ProdukAdminController::class, 'show']);

// Route untuk membuat produk baru
Route::post('/produk', [ProdukAdminController::class, 'store']);

// Route untuk memperbarui produk berdasarkan ID
Route::post('/produk/{id}', [ProdukAdminController::class, 'update']);

// Route untuk menghapus produk berdasarkan ID
Route::delete('/produk/{id}', [ProdukAdminController::class, 'destroy']);

//Route::prefix('admin')->group(function () {
//    Route::apiResource('produk', ProdukAdminController::class);
//});