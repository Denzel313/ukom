<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamController;
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

    //Route Export
    Route::get('import_export', 'importExport');
    Route::post('import', 'import')->name('import');
    Route::get('export', 'export')->name('export');

    // Route Barang Masuk
    Route::get('/barang-masuk', [BarangController::class, 'barang_masuk'])->name('barang-masuk')->middleware('permission:entri_barang_masuk'); 
    Route::get('/create-masuk', [BarangController::class, 'create_masuk'])->name('barang-masuk.create-masuk')->middleware('permission:entri_barang_masuk'); 
    Route::post('/proses-masuk', [BarangController::class, 'proses_masuk'])->name('barang-masuk.proses-masuk')->middleware('permission:entri_barang_masuk'); 

    Route::delete('/delete-masuk/{id}', [BarangController::class, 'delete_masuk'])->name('delete.barang-masuk')->middleware('permission:entri_barang_masuk'); 

    // Route Barang Keluar
    Route::get('/barang-keluar', [BarangController::class, 'barang_keluar'])->name('barang-keluar')->middleware('role:admin|manajemen'); 
    Route::get('/create-keluar', [BarangController::class, 'create_keluar'])->name('barang-keluar.create-keluar')->middleware('permission:entri_barang_keluar'); 
    Route::post('/proses-keluar', [BarangController::class, 'proses_keluar'])->name('barang-keluar.proses-keluar')->middleware('permission:entri_barang_keluar'); 

    Route::delete('/delete-keluar/{id}', [BarangController::class, 'delete_keluar'])->name('delete.barang-keluar')->middleware('permission:entri_barang_keluar'); 

    // Route Peminjaman
    Route::get('/peminjaman', [PeminjamController::class, 'index'])->name('peminjaman')->middleware('permission:entri_peminjam');
    Route::get('/create-peminjam', [PeminjamController::class, 'create'])->name('peminjam.create')->middleware('permission:entri_peminjam');
    Route::post('/store-peminjam', [PeminjamController::class, 'store'])->name('peminjam.store')->middleware('permission:entri_peminjam');

    Route::get('/edit-peminjam/{id}', [PeminjamController::class, 'edit'])->name('peminjam.edit')->middleware('permission:edit_peminjam'); 
    Route::put('/update-peminjam/{id}', [PeminjamController::class, 'update'])->name('peminjam.update')->middleware('permission:edit_peminjam'); 
    Route::delete('/delete-peminjam/{id}', [PeminjamController::class, 'destroy'])->name('peminjam.delete')->middleware('permission:edit_peminjam'); 

    // Route Penyedia
    Route::get('/penyedia', [PenyediaController::class, 'index'])->name('penyedia')->middleware('permission:entri_penyedia'); 
    Route::get('/create-penyedia', [PenyediaController::class, 'create'])->name('penyedia.create')->middleware('permission:entri_penyedia'); 
    Route::get('/edit-penyedia/{id}', [PenyediaController::class, 'edit'])->name('penyedia.edit')->middleware('permission:entri_penyedia'); 
    
    Route::post('/proses-penyedia', [PenyediaController::class, 'store'])->name('penyedia.proses')->middleware('permission:entri_penyedia'); 
    Route::put('/update-penyedia/{id}', [PenyediaController::class, 'update'])->name('penyedia.update')->middleware('permission:entri_penyedia'); 
    Route::delete('/delete-penyedia/{id}', [PenyediaController::class, 'destroy'])->name('penyedia.delete')->middleware('permission:entri_penyedia'); 

    // Route ALat Bahan
    Route::get('/alat-bahan', [AlatController::class, 'index'])->name('alat-bahan')->middleware('role:admin|manajemen');
    Route::get('/create-alat', [AlatController::class, 'create'])->name('create.alat-bahan')->middleware('permission:edit_alat_bahan'); 
    Route::post('/store-alat', [AlatController::class, 'store'])->name('store.alat-bahan')->middleware('permission:edit_alat_bahan'); 

    Route::get('/edit-alat/{id}', [AlatController::class, 'edit'])->name('edit.alat-bahan')->middleware('permission:edit_alat_bahan'); 
    Route::put('/update-alat/{id}', [AlatController::class, 'update'])->name('update.alat-bahan')->middleware('permission:edit_alat_bahan'); 
    Route::delete('/delete-alat/{id}', [AlatController::class, 'delete'])->name('delete.alat-bahan')->middleware('permission:edit_alat_bahan'); 

    // Route Index
    Route::get('/user', [HomeController::class, 'index'])->name('index')->middleware('permission:entri_user'); 
    Route::get('/create', [HomeController::class, 'create'])->name('user.create')->middleware('permission:entri_user'); 
    Route::post('/store', [HomeController::class, 'store'])->name('user.store')->middleware('permission:entri_user'); 

    
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit')->middleware('permission:entri_user'); 
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update')->middleware('permission:entri_user'); 
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete')->middleware('permission:entri_user'); 

    // Route DataTables
    Route::get('/clientside', [DataTableController::class, 'clientside'])->name('clientside');
    Route::get('/serverside', [DataTableController::class, 'serverside'])->name('serverside');
});