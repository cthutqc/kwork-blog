<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $articles = Article::withFilters(null, $request->q)->paginate(config('app.per_page'))->withQueryString();

        return view('search.show', compact('articles'));
    }
}
