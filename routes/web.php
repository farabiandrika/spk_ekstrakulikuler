<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::middleware(['auth'])->group(function () {
        Route::middleware(['isAdmin'])->group(function () {
            Route::get('/admin', function() { return 'ini admin'; });
            Route::get('/data-siswa', [PagesController::class, 'dataSiswa']);
        });
     
        Route::middleware(['isSiswa'])->group(function () {
            Route::get('/siswa', function() { return 'ini user siswa'; });
        });
     
        Route::get('/logout', function() {
            Auth::logout();
            return redirect('/login');
        });

        Route::get('/', [PagesController::class, 'home']);
    });

	Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    
});