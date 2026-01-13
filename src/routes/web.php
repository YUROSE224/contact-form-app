<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ContactController::class, 'index']);

Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::get('/confirm', function () {
    return redirect('/');
});

Route::post('/thanks', [ContactController::class, 'store'])->name('store');
Route::get('/thanks', function () {
    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'admin'])->name('admin');
    Route::get('/search', [AuthController::class, 'admin'])->name('search');
    Route::get('/reset', function () {
        return redirect('/admin');
    })->name('reset');
    Route::delete('/delete/{id}', [AuthController::class, 'destroy'])->name('delete');
    Route::get('/export', [AuthController::class, 'export'])->name('export');
});