<?php

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

Route::get('/', function () {
    $articles = \App\Models\Article::all();
    return view('pages.home', compact('articles'));
})->name('pages.home');

Route::get('articles', \App\Http\Controllers\ArticlesController::class)
    ->name('articles.index');

Route::get('articles/{article:slug}', \App\Http\Controllers\ArticleController::class)
    ->name('articles.show');

Route::get('categories/{category:slug}', \App\Http\Controllers\CategoryController::class)
    ->name('categories.show');
