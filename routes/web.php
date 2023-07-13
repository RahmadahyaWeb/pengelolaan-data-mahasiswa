<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProfileController;
use App\Models\Mahasiswa;
use App\Models\Nilai;
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


Route::middleware(['auth'])->group(function () {
    // Route Dashboard
    Route::get('/', function () {
        return view('dashboard', [
            'mahasiswa' => Mahasiswa::count(),
            'nilai'     => Nilai::count()
        ]);
    });

    // Route Data Mahasiswa
    Route::resource('/mahasiswa', MahasiswaController::class);

    // Route Data Nilai
    Route::resource('/nilai', NilaiController::class);

    // Route Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    // Route Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'indexPassword'])->name('profile.password');
    Route::put('/profile/password/update', [ProfileController::class, 'password'])->name('profile.passwordUpdate');
});


Route::middleware(['guest'])->group(function () {
    // Route Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
