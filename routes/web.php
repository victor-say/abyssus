<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Middleware\CheckIfIsAdmin;

//users
Route::get('/users',[UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{user}/details', [UserController::class, 'show'])->name('users.show');
Route::delete('/user/{user}/destroy',[UserController::class, 'destroy'])->name('users.destroy')->middleware(CheckIfIsAdmin::class);


//users->password
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/admin/password/update', [PasswordController::class, 'update'])->name('password.update');
});



//breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//welcome
Route::get('/', function () {
    return view('welcome');
});




require __DIR__.'/auth.php';
