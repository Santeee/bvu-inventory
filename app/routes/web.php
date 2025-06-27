<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return redirect()->route('items.index');
});

// Item routes - search must come before resource to avoid conflicts
Route::get('items/search', [ItemController::class, 'search'])->name('items.search');
Route::resource('items', ItemController::class);
