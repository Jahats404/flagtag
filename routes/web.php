<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\batch\BoBatchController;
use App\Http\Controllers\dashboard\AdminDashboardController;
use App\Http\Controllers\dashboard\BoDashboardController;
use App\Http\Controllers\dashboard\CustomerDashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\produk\BoProdukController;
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


// Route::get('/bitcoin-treasuries', [EducationController::class,'index'])->name('bitcoin');
// Route::get('/crud/bitcoin-treasuries', [EducationController::class,'crud'])->name('bitcoin.crud');
// Route::post('/store/bitcoin-treasuries', [EducationController::class,'store'])->name('bitcoin.store');
// Route::put('/update/bitcoin-treasuries/{id}', [EducationController::class,'update'])->name('bitcoin.update');
// Route::delete('/delete/bitcoin-treasuries/{id}', [EducationController::class,'delete'])->name('bitcoin.delete');
// Route::get('/pricing', [PricingController::class,'index'])->name('pricing');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard-sample', function () {
    return view('prototype.dashboard-sample');
})->name('dashboard.sample');




Route::get('/register-one', [AuthController::class, 'registerOne'])->name('register.one');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/action-register', [AuthController::class, 'actionRegister'])->name('action.register');


Route::get('/', [AuthController::class,'login'])->name('login');
Route::post('/authenticate', [AuthController::class,'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    
    // Route prefix untuk Produsen

    Route::prefix('admin')->name('admin.')->middleware('CekUserLogin:1')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
    

    Route::prefix('brand-owner')->name('bo.')->middleware('CekUserLogin:2')->group(function () {
        Route::get('/dashboard', [BoDashboardController::class, 'index'])->name('dashboard');

        // PRODUK
        Route::get('/produk', [BoProdukController::class, 'index'])->name('produk');
        Route::post('/produk-store', [BoProdukController::class, 'store'])->name('produk.store');
        Route::put('/produk-update/{id}', [BoProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk-delete/{id}', [BoProdukController::class, 'delete'])->name('produk.delete');

        // BATCH PRODUK
        Route::get('/batch-produk/{id}', [BoBatchController::class, 'index'])->name('batch');
    });

    Route::prefix('customer')->name('customer.')->middleware('CekUserLogin:3')->group(function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    });

});

route::get('/dashboard', function () {return view('prototype.dashboard');})->name('dashboard');
route::get('/data-produk', function () {return view('prototype.produk.data-produk');})->name('data.produk');
route::get('/aset-produk', function () {return view('prototype.produk.aset-produk');})->name('aset.produk');
route::get('/kepemilikan-produk', function () {return view('prototype.produk.kepemilikan-produk');})->name('kepemilikan.produk');
route::get('/data-pelanggan', function () {return view('prototype.pelanggan.index');})->name('data.pelanggan');
route::get('/data-distributor', function () {return view('prototype.distributor.index');})->name('data.distributor');
route::get('/data-riyawat', function () {return view('prototype.riwayat.index');})->name('data.riwayat');


route::get('/scan/P001', function () {return view('prototype.scan.index');})->name('scan');