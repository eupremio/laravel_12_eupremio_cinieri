<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('articles.index');
})->name('home');

Route::resource('articles', ArticleController::class)->only([
    'index',
    'create',
    'store',
    'show',
    'edit',
    'update',
    'destroy',
]);

Route::resource('tags', TagController::class)->only([
    'index',
    'create',
    'store',
    'show',
]);
