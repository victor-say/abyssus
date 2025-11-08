<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\{PasswordController, UserController};
use App\Http\Middleware\CheckIfIsAdmin;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Universe\UniverseController;


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



//Universes
Route::get('/universes',[UniverseController::class, 'index'])->name('universes.index');
Route::get('/universes/create', [UniverseController::class, 'create'])->name('universes.create');
Route::post('/universes', [UniverseController::class, 'store'])->name('universes.store');
Route::get('/universes/{universe}/edit', [UniverseController::class, 'edit'])->name('universes.edit');
Route::put('/universes/{universe}', [UniverseController::class, 'update'])->name('universes.update');
Route::get('/universes/{universe}/delalheis', [UniverseController::class, 'show'])->name('universes.show');
Route::delete('/universes/{universe}/destroy',[UniverseController::class, 'destroy'])->name('universes.destroy');

//Universes
Route::get('/demands',[DemandController::class, 'index'])->name('demands.index');
Route::get('/demands/create', [DemandController::class, 'create'])->name('demands.create');
Route::post('/demands', [DemandController::class, 'store'])->name('demands.store');
Route::get('/demands/{demand}/edit', [DemandController::class, 'edit'])->name('demands.edit');
Route::put('/demands/{demand}', [DemandController::class, 'update'])->name('demands.update');
Route::get('/demands/{demand}/delalheis', [DemandController::class, 'show'])->name('demands.show');
Route::delete('/demands/{demands}/destroy',[DemandController::class, 'destroy'])->name('demands.destroy');

require __DIR__.'/auth.php';
