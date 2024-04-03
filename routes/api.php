<?php

use App\Http\Controllers\PostreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/crear-postre', [PostreController::class, 'store'])->name('postre.store');
Route::get('/postres', [PostreController::class, 'index'])->name('postre.index');

Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::delete('/delete/postre/{postre}', [PostreController::class, 'destroy'])->middleware('can:delete,postre')->name('postre.destroy');
