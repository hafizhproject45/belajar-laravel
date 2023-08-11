<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

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
Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'storeSiswa']);
Route::get('/siswa/{id}edit', [SiswaController::class, 'edit']);
Route::patch('/siswa/{id}', [SiswaController::class, 'update']);
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
Route::get('/siswa/create', [SiswaController::class, 'createSiswa']);

Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/kelas', [KelasController::class, 'storeKelas']);
Route::get('/kelas/{id}edit', [KelasController::class, 'edit']);
Route::patch('/kelas/{id}', [KelasController  ::class, 'update']);
Route::delete('/kelas/{id}', [KelasController::class, 'destroy']);
Route::get('/kelas/create', [KelasController::class, 'createKelas']);

Route::get('/guru', [GuruController::class, 'index']);
Route::post('/guru', [GuruController::class, 'store']);
Route::get('/guru/{id}edit', [GuruController::class, 'edit']);
Route::patch('/guru/{id}', [GuruController::class, 'update']);
Route::delete('/guru/{id}', [GuruController::class, 'destroy']);
Route::get('/guru/create', [GuruController::class, 'create']);

// Route::get('/biodata', [SiswaController::class, 'biodata']);
// Route::get('/lorem', [SiswaController::class, 'lorem']);
// Route::get('/nama', [SiswaController::class, 'nama']);