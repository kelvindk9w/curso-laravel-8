<?php

use App\Http\Controllers\{
    PostController
};
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}/show', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::delete('/posts/{id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
Route::put('/post/{id}/update', [PostController::class, 'update'])->name('posts.update');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::any('/post/search', [PostController::class, 'search'])->name('posts.search');

Route::get('/', function () {
    return view('welcome');
});
