<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', [PostController::class, 'index'])->name('posts.index');


Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');


Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category')->middleware('auth');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('feed', [PostController::class, 'feed']);