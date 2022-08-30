<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function(){
    // Route users
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/create', [UserController::class, 'post'])->name('user.post');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
    });
    // Route santri
    Route::prefix('santri')->group(function(){
        Route::get('/', [SantriController::class, 'index'])->name('santri.index');
        Route::get('/create', [SantriController::class, 'create'])->name('santri.create');
        Route::post('/create', [SantriController::class, 'post'])->name('santri.post');
        Route::get('/{id}/edit', [SantriController::class, 'edit'])->name('santri.edit');
        Route::post('/{id}/update', [SantriController::class, 'update'])->name('santri.update');
        Route::delete('/{id}/delete', [SantriController::class, 'delete'])->name('santri.delete');
    });
    // Route transaksi
    Route::prefix('transaksi')->group(function(){
        Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/create', [TransaksiController::class, 'post'])->name('transaksi.post');
        Route::get('/{id}/check', [TransaksiController::class, 'check'])->name('transaksi.check');
    });
    // Route topup
    Route::prefix('topup')->group(function(){
        Route::get('/', [TopupController::class, 'index'])->name('topup.index');
        Route::get('/create', [TopupController::class, 'create'])->name('topup.create');
        Route::post('/create', [TopupController::class, 'post'])->name('topup.post');
    });
});