<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pas', [PASController::class, 'index']);