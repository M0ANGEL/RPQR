<?php

use App\Http\Controllers\Api\GroupRestController;
use App\Http\Controllers\api\UsersController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*Route::resource('/groups', GroupRestController::class);*/

Route::get('/user', function (Request $request) {
    return User::all();


    /* $request->user(); */
})/* ->middleware('auth:sanctum') */;


Route::resource('/users', UsersController::class);
