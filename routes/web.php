<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WebController::class, 'index'])->name('index');

Route::resource('category', CategoryController::class);
Route::resource('post',PostController::class);