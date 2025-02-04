<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [PageController::class, 'index']); // This will use the controller's method
Route::get('/about', [PageController::class, 'about']);
Route::get('/translate', [PageController::class, 'translate']);
