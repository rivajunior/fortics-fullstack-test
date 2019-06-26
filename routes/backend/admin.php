<?php

use App\Http\Controllers\Backend\DrinkController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/drinks', 301);

Route::resource('/drinks', 'DrinkController')->only([
    'index',
    'show',
    'edit',
    'update',
    'create',
    'store',
    'destroy'
]);

Route::delete('/destroy-multiples', [DrinkController::class, 'destroyMultiples'])
    ->name('drinks.destroy_multiples');
