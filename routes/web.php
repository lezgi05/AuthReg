<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;



Route::get('/', [MainController::class, 'welcome'])->name('home');
Route::get('/cabinet', [AuthController::class, 'cabinet'])->name('cabinet');

Route::post('/registr', [AuthController::class, 'registr']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/exit', [AuthController::class, 'exit']);



