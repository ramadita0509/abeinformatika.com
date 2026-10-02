<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StatusControllers;
use App\Http\Controllers\TeknisiControllers;
use App\Http\Controllers\TransaksiControllers;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('welcome');
Route::get('/cek-servis/data', [SiteController::class, 'cekServis'])->middleware('throttle:30,1')->name('site.cek');
Route::get('/cek-servis', [SiteController::class, 'lacak'])->name('site.lacak');
Route::get('/profil', [SiteController::class, 'profil'])->name('site.profil');

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/homeadmin', [AdminController::class, 'index'])->name('homeadmin');
Route::get('/homeuser', [CustomerController::class, 'index'])->name('homeuser');
Route::get('/hometeknisi', [TeknisiControllers::class, 'index1'])->name('hometeknisi');

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/nota', [StatusControllers::class, 'nota'])->name('nota');

    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/users/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/users/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');
});

Route::resource('state', StatusControllers::class);
Route::get('/create', [StatusControllers::class, 'create'])->name('state.create');
Route::get('/index', [StatusControllers::class, 'index2'])->name('state.index2');
Route::get('/invoice', [StatusControllers::class, 'invoice'])->name('invoice');
Route::get('/search', [StatusControllers::class, 'search'])->name('search');
Route::get('/import-status', [StatusControllers::class, 'importStatus'])->name('state.import');
Route::post('/upload-status', [StatusControllers::class, 'uploadStatus'])->name('state.upload');
Route::get('/iocallreport/export-file/{type}', [StatusControllers::class, 'export'])->name('export-file');

Route::resource('trx', TransaksiControllers::class);
Route::get('index2', [TransaksiControllers::class, 'index2'])->name('trx.index2');
Route::get('/trx.search', [TransaksiControllers::class, 'search'])->name('trx.search');
Route::get('/import-transaksi', [TransaksiControllers::class, 'importTransaksi'])->name('trx.import');
Route::post('/upload-transaksi', [TransaksiControllers::class, 'uploadTransaksi'])->name('trx.upload');
Route::get('export/', [TransaksiControllers::class, 'export'])->name('trx.export');
Route::get('/order', [TransaksiControllers::class, 'orderReport'])->name('report.order');
Route::get('/order/pdf/{bulan}', [TransaksiControllers::class, 'orderReportPdf'])->name('report.order_pdf');

Route::resource('teknisi', TeknisiControllers::class);
