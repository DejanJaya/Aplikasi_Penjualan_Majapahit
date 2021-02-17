<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/trans/{id_produk}', [TransaksiController::class, 'pembayaran']);

Route::get('hadiah', [ApiController::class, 'get_all_hadiah']);
Route::get('point', [ApiController::class, 'get_point']);
Route::post('hadiah/tambah_hadiah', [ApiController::class, 'insert_data_hadiah']);
Route::put('hadiah/update/{id_hadiah}', [ApiController::class, 'update_data_hadiah']);
Route::delete('hadiah/delete/{id_hadiah}', [ApiController::class, 'delete_data_hadiah']);
