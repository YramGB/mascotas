<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('mascota', MascotaController::class)->middleware('auth');
Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [MascotaController::class, 'index'])->name('home');

Route::prefix(['middleware' => 'auth'], function () {
    
    Route::get('/home', [MascotaController::class, 'index'])->name('home');

});
