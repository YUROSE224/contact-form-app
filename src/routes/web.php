<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use laravel\Fortify\Fortify;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/thanks', [ContactController::class, 'store'])->name('store');
Route::get('/register', [ContactController::class, 'register'])->name('register');
Route::get('/admin',[Authcontroller::class,'admin']);
Route::get('/login',[ContactController::class,'login'])->name('login');

Fortify::registerView(function () {
    return view('auth.register');
});

Fortify::loginView(function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'admin']);
});
