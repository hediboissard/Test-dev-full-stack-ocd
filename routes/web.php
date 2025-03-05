<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::get('/people/{id}', [PersonController::class, 'show'])->name('people.show');
Route::get('/create', [PersonController::class, 'create'])->name('people.create')->middleware('auth');
Route::post('/store', [PersonController::class, 'store'])->name('people.store')->middleware('auth');
Route::get('/test-degree', [TestParenteController::class, 'testDegree']);
