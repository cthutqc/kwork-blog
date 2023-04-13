<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Article $article):View
    {
        $article->load('tags');

        return view('articles.show', compact('article'));
    }
}
