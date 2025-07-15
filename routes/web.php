<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\batch\AdminBatchController;
use App\Http\Controllers\batch\BoBatchController;
use App\Http\Controllers\dashboard\AdminDashboardController;
use App\Http\Controllers\dashboard\BoDashboardController;
use App\Http\Controllers\dashboard\CustomerDashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\hologram\BoHologramController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\produk\AdminProdukController;
use App\Http\Controllers\produk\BoProdukController;
use App\Http\Controllers\token\CustomerTokenController;
use App\Http\Controllers\users\AdminBrandOwnerController;
use App\Http\Controllers\users\AdminCustomerController;
use App\Http\Controllers\users\AdminUserController;
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

// LOGIN CUSTOMER
Route::get('/check-session/{kode}', [AuthController::class,'cekLogin'])->name('cek.session');

Route::get('/login-customer/{kode}', [AuthController::class,'loginCustomer'])->name('login.customer');
Route::post('/authenticate-customer/{kode}', [AuthController::class,'authenticateCustomer'])->name('authenticate.customer');

// REGISTER CUSTOMER
Route::get('/register-customer/{kode}', [AuthController::class,'registerCustomer'])->name('register.customer');
Route::post('/action-register-customer/{kode}', [AuthController::class,'actionRegisterCustomer'])->name('action.register.customer');


// HOLOGRAM
Route::get('/verifikasi/{kode}', [BoHologramController::class, 'verifikasi'])->name('hologram.verify');
Route::post('/simpan-lokasi', [BoHologramController::class, 'simpanLokasi'])->name('hologram.location');

Route::middleware(['auth'])->group(function () {
    
    
    // Route prefix untuk Produsen

    Route::prefix('admin')->name('admin.')->middleware('CekUserLogin:1')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // USERS
        Route::get('/users', [AdminUserController::class, 'index'])->name('users');
        Route::post('/users/store', [AdminUserController::class, 'store'])->name('users.store');
        Route::put('/users/update/{id}', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('/users/delete/{id}', [AdminUserController::class, 'delete'])->name('users.delete');

        // BRAND OWNER
        Route::get('/brand-owner', [AdminBrandOwnerController::class, 'index'])->name('brandowner');
        Route::put('/brand-owner/update/{id}', [AdminBrandOwnerController::class, 'update'])->name('brandowner.update');

        Route::get('/brand-owner/produk/{id}', [AdminProdukController::class, 'produk'])->name('brandowner.produk');

        // CUSTOMER
        Route::get('/customer', [AdminCustomerController::class, 'index'])->name('customer');
        Route::put('/customer/update/{id}', [AdminCustomerController::class, 'update'])->name('customer.update');

        // PRODUK
        Route::get('/produk/all', [AdminProdukController::class, 'index'])->name('produk');
        Route::get('/produk/kepemilikan-produk', [AdminProdukController::class, 'kepemilikanProduk'])->name('kepemilikan.produk');

        // BATCH PRODUK
        Route::get('/batch-produk/{id}', [AdminBatchController::class, 'index'])->name('batch');
        Route::post('/batch-produk/status/{id}', [AdminBatchController::class, 'updateStatus'])->name('batch.status');

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
        Route::post('/batch-produk/store', [BoBatchController::class, 'store'])->name('batch.store');
        Route::put('/batch-produk/update/{id}', [BoBatchController::class, 'update'])->name('batch.update');
        Route::delete('/batch-produk/delete/{id}', [BoBatchController::class, 'delete'])->name('batch.delete');
        Route::get('/batch-produk/detail/{id}', [BoBatchController::class, 'detail'])->name('batch.detail');

        // HOLOGRAM
        Route::get('/hologram/cetak/{id}', [BoHologramController::class, 'cetak'])->name('hologram.print');
        

    });
    
    Route::prefix('customer')->name('c.')->middleware('CekUserLogin:3')->group(function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');


        Route::get('/token', [CustomerTokenController::class, 'index'])->name('token');
        Route::get('/token/{kode}', [CustomerTokenController::class, 'indexWithCode'])->name('token.with.kode');
        Route::post('/token/claim/{kode}', [CustomerTokenController::class, 'klaimToken'])->name('token.claim');
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