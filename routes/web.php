<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['title' => 'Manajement Data']);
});

Route::get('home', function () {
    return view('home.home');
});

Route::get('login', [LoginController::class, 'data'])->name('login');
Route::post('login', [LoginController::class, 'loginProses']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('registerProses', [LoginController::class, 'registerProses'])->name('registerProses');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('data', [DataController::class, 'data'])->name('data');
    Route::get('data/add', [DataController::class, 'add'])->name('data.add');
    Route::post('data', [DataController::class, 'addProcess']);
    Route::get('data/edit/{id}', [DataController::class, 'edit']);
    Route::patch('data/{id}', [DataController::class, 'editProcess']);
    Route::delete('data/{id}', [DataController::class, 'delete']);
});


Route::get('home', function () {
    return view('home.home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
