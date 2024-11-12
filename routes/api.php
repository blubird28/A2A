<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SalesController;

Route::get('/top-theater', [SalesController::class, 'getTopTheater']);
