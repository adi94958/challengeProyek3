<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TenanController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\BarangNotaController;


// Barang
Route::get('/barangs', [BarangController::class, 'index']);
Route::get('/barangs/{id}', [BarangController::class, 'show']);
Route::post('/barangs/create', [BarangController::class, 'store']);
Route::put('/barangs/{id}', [BarangController::class, 'update']);
Route::delete('/barangs/delete/{KodeBarang}', [BarangController::class, 'destroy']);

// Kasir
Route::get('/kasirs', [KasirController::class, 'index']);

// Tenan
Route::get('/tenans', [TenanController::class, 'index']);

// Nota
Route::get('/notas', [NotaController::class, 'index']);
Route::get('/notas/{id}', [NotaController::class, 'show']);
Route::post('/notas', [NotaController::class, 'store']);
Route::put('/notas/{id}', [NotaController::class, 'update']);
Route::delete('/notas/{id}', [NotaController::class, 'destroy']);

// Barang Nota
Route::get('/barangnotas', [BarangNotaController::class, 'index']);
Route::get('/barangnotas/{id}', [BarangNotaController::class, 'show']);
Route::post('/barangnotas', [BarangNotaController::class, 'store']);
Route::put('/barangnotas/{id}', [BarangNotaController::class, 'update']);
Route::delete('/barangnotas/{id}', [BarangNotaController::class, 'destroy']);
