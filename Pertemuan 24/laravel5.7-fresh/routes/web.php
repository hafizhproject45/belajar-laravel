<?php

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
Route::get('/kelas', [KelasController::class, 'kelas']);
Route::get('/biodata', [SiswaController::class, 'biodata']);
Route::get('/lorem', [SiswaController::class, 'lorem']);
Route::get('/nama', [SiswaController::class, 'nama']);