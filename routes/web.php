<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $articles = \App\Models\Article::take(6)->get();
    return view('pages.home', compact('articles'));
})->name('pages.home');

Route::get('articles', \App\Http\Controllers\ArticlesController::class)
    ->name('articles.index');

Route::get('articles/{article:slug}', \App\Http\Controllers\ArticleController::class)
    ->name('articles.show');

Route::get('categories/{category:slug}', \App\Http\Controllers\CategoryController::class)
    ->name('categories.show');

Route::get('search/{q?}', \App\Http\Controllers\SearchController::class)
    ->name('search.show');

Route::get('profile/{user}', \App\Http\Controllers\ProfileController::class)
    ->name('profile.show');

Route::middleware('guest')->group(function () {
    Route::get('login', \App\Http\Controllers\LoginController::class)
        ->name('pages.login');

    Route::get('/reset-password', function (string $token) {})->name('password.reset');

    Route::get('/reset-password/{token}', function ($token) {
        return view('pages.reset-password', ['token' => $token]);
    })->name('password.reset');
});

Route::get('{page:slug}', \App\Http\Controllers\PageController::class)
    ->name('pages.show');
