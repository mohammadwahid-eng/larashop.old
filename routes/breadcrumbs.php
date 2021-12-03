<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Admin Home
Breadcrumbs::for('admin.home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('admin.home'));
});

// Home > Categories
Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Categories', route('admin.categories.index'));
});


// Home > Categories > Create
Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories.index');
    $trail->push('Create', route('admin.categories.create'));
});

// Home > Categories > Name
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('admin.categories.index');
    $trail->push($category->name, route('admin.categories.edit', $category));
});



// Home > Tags
Breadcrumbs::for('admin.tags.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Tags', route('admin.tags.index'));
});


// Home > Tags > Create
Breadcrumbs::for('admin.tags.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.tags.index');
    $trail->push('Create', route('admin.tags.create'));
});

// Home > Tags > Name
Breadcrumbs::for('admin.tags.edit', function (BreadcrumbTrail $trail, $tag) {
    $trail->parent('admin.tags.index');
    $trail->push($tag->name, route('admin.tags.edit', $tag));
});



// Home > Attributes
Breadcrumbs::for('admin.attributes.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Attributes', route('admin.attributes.index'));
});


// Home > Attributes > Create
Breadcrumbs::for('admin.attributes.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.attributes.index');
    $trail->push('Create', route('admin.attributes.create'));
});

// Home > Attributes > Name
Breadcrumbs::for('admin.attributes.edit', function (BreadcrumbTrail $trail, $attribute) {
    $trail->parent('admin.attributes.index');
    $trail->push($attribute->name, route('admin.attributes.edit', $attribute));
});