<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KucingController;

Route::get('/', function () {
    return redirect('/kucing');
});

// daftar kucing
Route::get('/kucing', [KucingController::class, 'index'])->name('kucing.index');

// detail kucing
Route::get('/kucing/{id}', [KucingController::class, 'show'])->name('kucing.show');
