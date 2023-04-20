<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnableArticleGlobalScope
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Article::addGlobalScope('order', function (Builder $builder) {
            $builder->orderByDesc('created_at')->where('active', true);
        });

        return $next($request);
    }
}
