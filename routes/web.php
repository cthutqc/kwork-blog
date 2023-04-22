<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $articles = \App\Models\Article::take(6)->orderByDesc('created_at')->get();
    return view('pages.home', compact('articles'));
})->name('pages.home')
    ->middleware('enable.articles.order');

Route::get('articles', \App\Http\Controllers\ArticlesController::class)
    ->name('articles.index');

Route::get('articles/{article:slug}', \App\Http\Controllers\ArticleController::class)
    ->name('articles.show')
    ->middleware('enable.articles.order');

Route::get('categories/{category:slug}', \App\Http\Controllers\CategoryController::class)
    ->name('categories.show')
    ->middleware('enable.articles.order');

Route::get('search/{q?}', \App\Http\Controllers\SearchController::class)
    ->name('search.show')
    ->middleware('enable.articles.order');

Route::get('profile/{user}', \App\Http\Controllers\ProfileController::class)
    ->name('profile.show')
    ->middleware('enable.articles.order');

Route::get('login', \App\Http\Controllers\LoginController::class)
    ->name('pages.login');

Route::middleware('guest')->group(function () {
    Route::get('/reset-password', function (string $token) {})->name('password.reset');

    Route::get('/reset-password/{token}', function ($token) {
        return view('pages.reset-password', ['token' => $token]);
    })->name('password.reset');
});

Route::middleware('auth')->group(function (){

    Route::prefix('user')->as('users.')->group(function (){

        Route::get('/', \App\Http\Controllers\UserController::class)
            ->name('dashboard');

        Route::get('articles/add', \App\Http\Controllers\StoreArticleController::class)
            ->name('add.article');

        Route::get('chat/{user?}', \App\Http\Controllers\ChatController::class)
            ->name('chat');

    });

});

Route::get('support', \App\Http\Controllers\SupportController::class)
    ->name('pages.support');

Route::get('{page:slug}', \App\Http\Controllers\PageController::class)
    ->name('pages.show');
