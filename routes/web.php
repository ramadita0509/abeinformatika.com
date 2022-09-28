<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\EmployeeController;



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

// Route::get('/', function () {
   // return redirect('welcome')->route('login'); });
Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('welcome');
Route::get('/profil', [App\Http\Controllers\SiteController::class, 'profil'])->name('site.profil');

Auth::routes(['register' => false]);

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Profile Routes
// Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
  //  Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
  //  Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
  //  Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
 // });



// Roles
// Route::resource('roles', App\Http\Controllers\RolesController::class);

// Permissions
// Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

// role



    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/users/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/users/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');

    Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
        Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
        Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
        Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
    });



 Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   Route::get('/homeadmin', [App\Http\Controllers\AdminController::class, 'index'])->name('homeadmin');

   Route::resource('state', App\Http\Controllers\StatusControllers::class);
   Route::get('/create', [App\Http\Controllers\StatusControllers::class, 'create'])->name('state.create');
   Route::get('/search', [App\Http\Controllers\StatusControllers::class, 'search'])->name('search');
   Route::get('/index', [App\Http\Controllers\StatusControllers::class, 'index'])->name('state.index');
   Route::get('/invoice', [App\Http\Controllers\StatusControllers::class, 'invoice'])->name('invoice');
   Route::get('/nota', [App\Http\Controllers\StatusControllers::class, 'nota'])->name('nota');
   Route::get('/iocallreport/export-file/{type}',[App\Http\Controllers\StatusControllers::class, 'export'])->name('export-file');
   Route::get('export/', [App\Http\Controllers\TransaksiControllers::class, 'export'])->name('trx.export');

   Route::get('/import-status', [App\Http\Controllers\StatusControllers::class, 'importStatus'])->name('state.import');
   Route::post('/upload-status', [App\Http\Controllers\StatusControllers::class, 'uploadStatus'])->name('state.upload');
   Route::get('/index', [App\Http\Controllers\StatusControllers::class, 'index2'])->name('state.index2');

   Route::resource('trx',App\Http\Controllers\TransaksiControllers::class);
   // Route::get('/search', [App\Http\Controllers\TransaksiControllers::class, 'search'])->name('search');
   Route::get('export/', [App\Http\Controllers\TransaksiControllers::class, 'export'])->name('trx.export');
   Route::get('index2', [App\Http\Controllers\TransaksiControllers::class, 'index2'])->name('trx.index2');
   Route::get('/import-transaksi', [App\Http\Controllers\TransaksiControllers::class, 'importTransaksi'])->name('trx.import');
    Route::post('/upload-transaksi', [App\Http\Controllers\TransaksiControllers::class, 'uploadTransaksi'])->name('trx.upload');

   Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('edit');
   Route::put('/users/update/{user}', [UserController::class, 'update'])->name('update');
   Route::delete('/users/delete/{user}', [UserController::class, 'delete'])->name('destroy');
   Route::get('/users/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');
   Route::get('/order', [App\Http\Controllers\TransaksiControllers::class, 'orderReport'])->name('report.order');
   Route::get('/order/pdf/{daterange}', [App\Http\Controllers\TransaksiControllers::class, 'orderReportPdf'])->name('report.order_pdf');

 });


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/homeuser', [App\Http\Controllers\CustomerController::class, 'index'])->name('homeuser');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('state', App\Http\Controllers\StatusControllers::class);
    Route::get('/create', [App\Http\Controllers\StatusControllers::class, 'create'])->name('state.create');
    Route::get('/search', [App\Http\Controllers\StatusControllers::class, 'search'])->name('search');
    Route::get('/index', [App\Http\Controllers\StatusControllers::class, 'index'])->name('state.index');
    Route::get('/invoice', [App\Http\Controllers\StatusControllers::class, 'invoice'])->name('invoice');
    Route::get('/nota', [App\Http\Controllers\StatusControllers::class, 'nota'])->name('nota');
    Route::get('/iocallreport/export-file/{type}',[App\Http\Controllers\StatusControllers::class, 'export'])->name('export-file');
    Route::get('export/', [App\Http\Controllers\TransaksiControllers::class, 'export'])->name('trx.export');

    Route::get('/import-status', [App\Http\Controllers\StatusControllers::class, 'importStatus'])->name('state.import');
    Route::post('/upload-status', [App\Http\Controllers\StatusControllers::class, 'uploadStatus'])->name('state.upload');
    Route::get('/index', [App\Http\Controllers\StatusControllers::class, 'index2'])->name('state.index2');

    Route::resource('trx',App\Http\Controllers\TransaksiControllers::class);
    // Route::get('/search', [App\Http\Controllers\TransaksiControllers::class, 'search'])->name('search');
    Route::get('export/', [App\Http\Controllers\TransaksiControllers::class, 'export'])->name('trx.export');
    Route::get('index2', [App\Http\Controllers\TransaksiControllers::class, 'index2'])->name('trx.index2');
    Route::get('/import-transaksi', [App\Http\Controllers\TransaksiControllers::class, 'importTransaksi'])->name('trx.import');
    Route::post('/upload-transaksi', [App\Http\Controllers\TransaksiControllers::class, 'uploadTransaksi'])->name('trx.upload');

    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/users/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/users/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');
    Route::get('/order', [App\Http\Controllers\TransaksiControllers::class, 'orderReport'])->name('report.order');
    Route::get('/order/pdf/{daterange}', [App\Http\Controllers\TransaksiControllers::class, 'orderReportPdf'])->name('report.order_pdf');



});


 Route::middleware(['auth', 'role:teknisi'])->group(function () {
    Route::get('/hometeknisi', [App\Http\Controllers\TeknisiControllers::class, 'index1'])->name('hometeknisi');
    Route::get('/homeuser', [App\Http\Controllers\CustomerController::class, 'index'])->name('homeuser');
    Route::get('/homeadmin', [App\Http\Controllers\AdminController::class, 'index'])->name('homeadmin');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/iocallreport/export-file/{type}',[App\Http\Controllers\StatusControllers::class, 'export'])->name('export-file');

    Route::resource('teknisi', App\Http\Controllers\TeknisiControllers::class);
   // Route::post('/update', [App\Http\Controllers\TeknisiControllers::class, 'update'])->name('teknisi.update');
    Route::get('index', [App\Http\Controllers\TeknisiControllers::class, 'index'])->name('teknisi.index');
    Route::resource('state', App\Http\Controllers\StatusControllers::class);
    Route::resource('trx',App\Http\Controllers\TransaksiControllers::class);
    Route::get('/index', [App\Http\Controllers\StatusControllers::class, 'index2'])->name('state.index2');

 });

 Route::get('/hometeknisi', [App\Http\Controllers\TeknisiControllers::class, 'index1'])->name('hometeknisi');
 Route::get('/homeuser', [App\Http\Controllers\CustomerController::class, 'index'])->name('homeuser');
 Route::get('/homeadmin', [App\Http\Controllers\AdminController::class, 'index'])->name('homeadmin');
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::resource('state', App\Http\Controllers\StatusControllers::class);
 Route::get('/create', [App\Http\Controllers\StatusControllers::class, 'create'])->name('state.create');
 Route::get('/index', [App\Http\Controllers\StatusControllers::class, 'index2'])->name('state.index2');
// Route::get('/create', [App\Http\Controllers\StatusControllers::class, 'create'])->name('state.create');
// Route::get('/state/show', [App\Http\Controllers\StatusControllers::class, 'show'])->name('state.show');
 Route::get('/invoice', [App\Http\Controllers\StatusControllers::class, 'invoice'])->name('invoice');
 Route::get('index2', [App\Http\Controllers\TransaksiControllers::class, 'index2'])->name('trx.index2');
 Route::resource('trx',App\Http\Controllers\TransaksiControllers::class);
 Route::resource('teknisi',App\Http\Controllers\TeknisiControllers::class);
 Route::get('/import-transaksi', [App\Http\Controllers\TransaksiControllers::class, 'importTransaksi'])->name('trx.import');
 Route::post('/upload-transaksi', [App\Http\Controllers\TransaksiControllers::class, 'uploadTransaksi'])->name('trx.upload');
 Route::get('/iocallreport/export-file/{type}',[App\Http\Controllers\StatusControllers::class, 'export'])->name('export-file');
 Route::post('/upload-status', [App\Http\Controllers\StatusControllers::class, 'uploadStatus'])->name('state.upload');
 Route::get('/import-status', [App\Http\Controllers\StatusControllers::class, 'importStatus'])->name('state.import');
 Route::get('/order', [App\Http\Controllers\TransaksiControllers::class, 'orderReport'])->name('report.order');
 Route::get('/order/pdf/{daterange}', [App\Http\Controllers\TransaksiControllers::class, 'orderReportPdf'])->name('report.order_pdf');
 Route::get('export/', [App\Http\Controllers\TransaksiControllers::class, 'export'])->name('trx.export');





// Users
// Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
 //   Route::get('/', [UserController::class, 'index'])->name('index');
 //   Route::get('/create', [UserController::class, 'create'])->name('create');
//   Route::post('/store', [UserController::class, 'store'])->name('store');
 //   Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
  //  Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
  //  Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
  //  Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');


  //  Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
 //   Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');

//    Route::get('export/', [UserController::class, 'export'])->name('export');

   // });

