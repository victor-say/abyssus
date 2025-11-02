<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\{PasswordController, UserController};
use App\Http\Middleware\CheckIfIsAdmin;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Author\AuthorController;


//users
Route::get('/users',[UserController::class, 'index'])->name('users.index') ->middleware(CheckIfIsAdmin::class);
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
})->name('home');

//Books
Route::get('/books',[BookController::class, 'index'])->name('books.index');
Route::middleware(CheckIfIsAdmin::class)->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::get('/books/{book}/delalheis', [BookController::class, 'show'])->name('books.show');
    Route::delete('/book/{book}/destroy',[BookController::class, 'destroy'])->name('books.destroy');
});


//Authors
Route::get('/authors',[AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('authors.update');
Route::get('/authors/{author}/delalheis', [AuthorController::class, 'show'])->name('authors.show');
Route::delete('/authors/{author}/destroy',[AuthorController::class, 'destroy'])->name('authors.destroy');



require __DIR__.'/auth.php';
