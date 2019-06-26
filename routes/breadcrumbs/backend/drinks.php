<?php

use App\Models\Drink;

Breadcrumbs::for('admin.drinks.index', function ($trail) {
    $trail->push('Refrigerantes', route('admin.drinks.index'));
});

Breadcrumbs::for('admin.drinks.create', function ($trail) {
    $trail->parent('admin.drinks.index');
    $trail->push('Cadastrar Refrigerante', route('admin.drinks.create'));
});

Breadcrumbs::for('admin.drinks.show', function ($trail, $id) {
    $soda = Drink::find($id);
    $trail->parent('admin.drinks.index');
    $trail->push($soda->brand, route('admin.drinks.show', $id));
});

Breadcrumbs::for('admin.drinks.edit', function ($trail, $id) {
    $soda = Drink::find($id);
    $trail->parent('admin.drinks.index');
    $trail->push($soda->brand, route('admin.drinks.edit', $id));
});
