<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//registro

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

//books CRUD
// Rutas para BookController
Route::middleware('auth')->group(function () {  
    Route::get('/books', [BookController::class, 'index'])->name('books.show');

    Route::get('/books', [BookController::class, 'show'])->name('books.show');
    Route::get('/books/crear', [BookController::class, 'crear'])->name('books.crear');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');


    // Eliminar libros
    Route::delete('/books/{id}/eliminar', [BookController::class, 'destroy'])->name('books.destroy')->whereNumber('id');
    // buscar
    Route::get('/books/search', [BookController::class, 'search'])->name('books.search');


});
