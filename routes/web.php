<?php

use App\Http\Controllers\SidebarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/customer', function () {
    return view('customer.index');
})->name('customer')->middleware('auth');

Auth::routes();

Route::get('/user/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/user/register', [RegisterController::class, 'register'])->name('register');


//User
Route::get('/user', [UserController::class, 'index']);

Route::get('/fetch-user-data', [UserController::class, 'getUserData']);

//Sidebar Session
Route::post('/save-sidebar-state', [SidebarController::class, 'store']);

//Redirect Urls
Route::get('/', function () { 
    return redirect('/customer');
});
