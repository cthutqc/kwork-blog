<?php

namespace App\Http\Controllers;

use App\Actions\MetaAction;
use App\Models\Page;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(MetaAction $action)
    {
        $page = Page::where('slug', 'support')->first();

        $action->handle($page);

        return view('pages.support', compact('page'));
    }
}
