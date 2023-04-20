<?php

namespace App\Http\Controllers;

use App\Actions\MetaAction;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Page $page, MetaAction $action)
    {
        $action->handle($page);

        return view('pages.show', compact('page'));
    }
}
