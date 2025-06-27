<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

// Item routes
Route::resource('items', ItemController::class);
Route::get('items/search', [ItemController::class, 'search'])->name('items.search');
