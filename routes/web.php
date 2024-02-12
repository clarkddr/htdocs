<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

/* Este es una funcion que nos ayuda a ver cuales consultas se estan ejecutando en la visa. */
// DB::listen(function ($query) {
//     dump($query->sql);
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
    Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
