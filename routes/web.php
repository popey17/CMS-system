<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
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
Route::post('/save-right-sidebar-state', [SidebarController::class, 'rightStore']);

//Redirect Urls

