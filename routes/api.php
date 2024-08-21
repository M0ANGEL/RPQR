<?php

use App\Http\Controllers\Api\GroupRestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*Route::resource('/groups', GroupRestController::class);*/


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
