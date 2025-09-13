<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
Route::resource('posts', PostController::class);
Route::get('/', function () {
    return view('posts.index', ['posts' => \App\Models\Post::all()]);
});