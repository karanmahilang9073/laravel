<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;


Route::get('/', [HomeController::class, 'index']);

Route::resource('students', StudentController::class);