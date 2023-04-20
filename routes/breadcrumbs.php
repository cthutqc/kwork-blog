<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('pages.home'));
});

Breadcrumbs::for('page', function (BreadcrumbTrail $trail, $page) {
    $trail->parent('home');
    $trail->push($page->name, route('pages.show', $page));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('categories.show', $category));
});

Breadcrumbs::for('article', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('category', $article->category);
    $trail->push($article->name, route('articles.show', $article));
});
