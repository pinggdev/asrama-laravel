<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\Auth\RegisterController;

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



// Route::post('register', [RegisterController::class, 'register']);
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');


// Route::group(['middleware' => ['auth', 'checkRole:admin']])->group(function () {
//     Route::resource('users', UserController::class);
// });
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::resource('users', UserController::class);
    Route::resource('asrama', AsramaController::class);
    Route::resource('siswa', SiswaController::class);
});

// Route::middleware(['auth:sanctum', 'role:siswa'])->group(function () {
//     // route untuk siswa
// });

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
