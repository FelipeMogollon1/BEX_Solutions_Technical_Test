<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('v1/microsite', micrositeController::class);
