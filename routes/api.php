<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

/**
 |------------------------------------------------------------
 |unauth endpoints
 |-------------------------------------------------------------
 */
Route::group(
    [
        'prefix' => 'unauth'
    ],
    function(){
        Route::post('/login', [App\Http\Controllers\User\UserController::class, 'login']);
    });
