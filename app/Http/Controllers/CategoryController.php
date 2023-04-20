<?php

namespace App\Http\Controllers;

use App\Actions\MetaAction;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category, MetaAction $action):View
    {
        $action->handle($category);

        $articles = Article::withFilters($category->id)->paginate(config('app.per_page'))->withQueryString();

        return view('categories.show', compact('category', 'articles'));
    }
}
