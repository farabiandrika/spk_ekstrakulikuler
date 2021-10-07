<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
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

Route::resource('siswa', SiswaController::class)->except(['edit']);
Route::resource('kriteria', KriteriaController::class)->except(['edit']);
Route::resource('ekstrakulikuler', EkstrakulikulerController::class)->except(['edit']);
Route::resource('biodata', BiodataController::class)->except(['edit']);
// Route::get('/siswa/{id}', [SiswaController::class, 'show']);
