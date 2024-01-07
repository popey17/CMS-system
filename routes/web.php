<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceRecordController;
use App\Http\Controllers\TempFileController;

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

Route::get('/test', [TestController::class, 'index']);

Auth::routes();

Route::get('/user/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/user/register', [RegisterController::class, 'register'])->name('register');

//Company
Route::get('/company/register', [CompanyController::class, 'showCompanyRegistrationForm'])->name('company.register');
Route::post('/company/register', [CompanyController::class, 'signup'])->name('company.register');
Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
Route::post('/company/edit/{id}', [CompanyController::class, 'update'])->name('company.edit');


//Customer
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/customer/fetch_data', [CustomerController::class, 'fetch_data']);
Route::get('/customer/sort', [CustomerController::class, 'sort'])->name('sort');
Route::get('/customer/search', [CustomerController::class, 'search'])->name('search');
Route::get('/customer/{id}/delete', [CustomerController::class, 'sendToBin']);
Route::get('/customer/{id}/restore', [CustomerController::class, 'removeFromBin']);
Route::get('/customer/bin', [CustomerController::class, 'bin'])->name('bin');
Route::get('/customer/bin/sort', [CustomerController::class, 'binSort'])->name('binSort');
Route::get('/customer/bin/search', [CustomerController::class, 'binSearch'])->name('binSearch');
Route::get('/customer/{id}/purge', [CustomerController::class, 'purge']);
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customer/{id}/edit', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/{id}/detail', [CustomerController::class, 'detail'])->name('customer.detail');


// Sale
Route::get('/sale', [SaleController::class, 'index'])->name('sale');
Route::get('/sale/sort', [SaleController::class, 'sort'])->name('sale.sort');
Route::get('/sale/fetch_data', [SaleController::class, 'fetch_data']);
Route::get('/sale/{id}/delete', [SaleController::class, 'sendToBin']);
Route::get('/sale/bin', [SaleController::class, 'bin'])->name('sale.bin');
Route::get('/sale/bin/sort', [SaleController::class, 'binSort'])->name('binSort');
Route::get('/sale/{id}/purge', [SaleController::class, 'purge']);
Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
Route::post('/sale/create', [SaleController::class, 'store'])->name('sale.store');
Route::get('/sale/search', [SaleController::class, 'search'])->name('search');
Route::get('/sale/bin/search', [SaleController::class, 'binSearch'])->name('binSearch');
Route::get('/sale/{id}/detail', [SaleController::class, 'detail'])->name('customer.detail');



//service records
Route::get('/service-record', [ServiceRecordController::class, 'index'])->name('service');
Route::get('/service-record/create', [ServiceRecordController::class, 'create'])->name('service.create');




//dropdown Ajax
Route::get('/sale/getStore', [SaleController::class, 'getStoreList']);



//Admin Dashboard
Route::get('/dashboard', [AdminController::class, 'show'])->name('dashboard')->middleware('auth');


//User
Route::get('user', [UserController::class, 'index'])->name('users');
Route::get('/user/{id}/detail', [UserController::class, 'show']);
Route::get('/user/fetch_data', [UserController::class, 'fetch_data']);
Route::get('/user/{id}/delete', [UserController::class, 'delete']);
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('edit');
Route::post('/user/{id}/edit', [UserController::class, 'update'])->name('update');
Route::get('/user/search', [UserController::class, 'search'])->name('search');
Route::get('/user/sort', [UserController::class, 'sort'])->name('sort');

//Sidebar Session
Route::post('/save-sidebar-state', [SidebarController::class, 'store']);
// Route::post('/save-right-sidebar-state', [SidebarController::class, 'rightStore']);

//test

Route::post('/testSubmit', [TestController::class, 'testSubmit'])->name('test.submit');


//fildpond
Route::post('/temp-upload', [TempFileController::class, 'upload'])->name('temp.upload');
Route::delete('/temp-delete', [TempFileController::class, 'delete'])->name('temp.delete');