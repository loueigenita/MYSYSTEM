<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::post('deleteSelected', [App\Http\Controllers\UserController::class, 'deleteSelected'])->name('delete');

Route::resource('users', App\Http\Controllers\UserController::class);

Route::get('/barcode-scanner', [App\Http\Controllers\BarcodeController::class, 'scanner'])->name('barcode-scanner');




