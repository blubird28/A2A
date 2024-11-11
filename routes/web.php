<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;

Route::get('/top-theater', [SalesController::class, 'getTopTheater']);

Route::get('/', function () {
    return view('welcome');
});
