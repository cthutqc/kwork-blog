<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('pages.home'));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('categories.show', $category));
});
