<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenyediaController;
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

// Route Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'], function(){
    // Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route Barang Masuk
    Route::get('/barang-masuk', [BarangController::class, 'barang_masuk'])->name('barang-masuk');
    Route::get('/create-masuk', [BarangController::class, 'create_masuk'])->name('barang-masuk.create-masuk');
    Route::post('/proses-masuk', [BarangController::class, 'proses_masuk'])->name('barang-masuk.proses-masuk');

    Route::get('/edit-masuk/{id}', [BarangController::class, 'edit_masuk'])->name('edit.barang-masuk');
    Route::put('/update-masuk/{id}', [BarangController::class, 'update'])->name('update.barang-masuk');
    Route::delete('/delete-masuk/{id}', [BarangController::class, 'delete_masuk'])->name('delete.barang-masuk');

    // Route Barang Keluar
    Route::get('/barang-keluar', [BarangController::class, 'barang_keluar'])->name('barang-keluar');
    Route::get('/create-keluar', [BarangController::class, 'create_keluar'])->name('barang-keluar.create-keluar');
    Route::post('/proses-keluar', [BarangController::class, 'proses_keluar'])->name('barang-keluar.proses-keluar');

    // Route Peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');

     // Route Penyedia
    Route::get('/penyedia', [PenyediaController::class, 'index'])->name('penyedia');
    Route::get('/create-penyedia', [PenyediaController::class, 'create'])->name('penyedia.create');
    Route::get('/edit-penyedia/{id}', [PenyediaController::class, 'edit'])->name('penyedia.edit');
    
    Route::post('/proses-penyedia', [PenyediaController::class, 'store'])->name('penyedia.proses');
    Route::put('/update-penyedia/{id}', [PenyediaController::class, 'update'])->name('penyedia.update');
    Route::delete('/delete-penyedia/{id}', [PenyediaController::class, 'destroy'])->name('penyedia.delete');

    // Route ALat
    Route::get('/alat-bahan', [AlatController::class, 'index'])->name('alat-bahan');
    Route::get('/create-alat', [AlatController::class, 'create'])->name('create.alat-bahan');
    Route::post('/store-alat', [AlatController::class, 'store'])->name('store.alat-bahan');

    Route::get('/edit-alat/{id}', [AlatController::class, 'edit'])->name('edit.alat-bahan');
    Route::put('/update-alat/{id}', [AlatController::class, 'update'])->name('update.alat-bahan');
    Route::delete('/delete-alat/{id}', [AlatController::class, 'delete'])->name('delete.alat-bahan');

    // Route Index
    Route::get('/user', [HomeController::class, 'index'])->name('index');
    Route::get('/create', [HomeController::class, 'create'])->name('user.create');
    Route::post('/store', [HomeController::class, 'store'])->name('user.store');

    
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');

    // Route DataTables
    Route::get('/clientside', [DataTableController::class, 'clientside'])->name('clientside');
    Route::get('/serverside', [DataTableController::class, 'serverside'])->name('serverside');
});