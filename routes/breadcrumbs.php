<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\ProductCategory;
use App\Models\ProductTag;

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
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, ProductCategory $category) {
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
Breadcrumbs::for('admin.tags.edit', function (BreadcrumbTrail $trail, ProductTag $tag) {
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
Breadcrumbs::for('admin.attributes.edit', function (BreadcrumbTrail $trail, ProductAttribute $attribute) {
    $trail->parent('admin.attributes.index');
    $trail->push($attribute->name, route('admin.attributes.edit', $attribute));
});



// Home > Attributes > Name
Breadcrumbs::for('admin.attributes.values.index', function (BreadcrumbTrail $trail, ProductAttribute $attribute) {
    $trail->parent('admin.attributes.index');
    $trail->push($attribute->name, route('admin.attributes.values.index', $attribute));
});

// Home > Attributes > Name > Create
Breadcrumbs::for('admin.attributes.values.create', function (BreadcrumbTrail $trail, ProductAttribute $attribute) {
    $trail->parent('admin.attributes.values.index', $attribute);
    $trail->push("Create", route('admin.attributes.values.create', $attribute));
});

// Home > Attributes > Name > Edit
Breadcrumbs::for('admin.attributes.values.edit', function (BreadcrumbTrail $trail, ProductAttribute $attribute, ProductAttributeValue $value) {
    $trail->parent('admin.attributes.values.index', $attribute);
    $trail->push($value->name, route('admin.attributes.values.edit', [$attribute, $value]));
});