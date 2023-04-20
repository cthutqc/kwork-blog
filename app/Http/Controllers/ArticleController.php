<?php

namespace App\Http\Controllers;

use App\Actions\MetaAction;
use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Article $article, MetaAction $action):View
    {
        $action->handle($article);

        $article->load('tags', 'comments.user');

        return view('articles.show', compact('article'));
    }
}
