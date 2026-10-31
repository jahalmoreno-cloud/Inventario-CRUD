<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoreController;
Route::resource('stores', StoreController::class);

Route::get('/', function () {
    return view('welcome');
});
