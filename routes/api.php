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
Route::group([
    'prefix' => 'unauth'
],function(){
    Route::post('/login', [App\Http\Controllers\User\UserController::class, 'login']);

});


/**
 |------------------------------------------------------------
 |auth endpoints with abilities
 |------------------------------------------------------------
 |The `abilities` middleware may be assigned to a route to verify that the incoming request's token has all of the listed abilities:
 |The `ability` middleware may be assigned to a route to verify that the incoming request's token has at least one of the listed abilities:
 |- Users
 |- Company
 |- Article
 */
Route::group([
    'prefix'        => 'users',
    'middleware'    => 'auth:sanctum',
    'ability'       => 'user:create'
], function(){
    Route::post('/register', [App\Http\Controllers\User\UserController::class, 'register']);
});

Route::group([
    'prefix'        => 'company',
    'middleware'    => 'auth:sanctum',
    'abilities'     => 'company:create,company:edit,company:delete'
], function(){
    Route::get('/', [App\Http\Controllers\Company\CompanyController::class, 'getCompanies']);
    Route::get('/{company_id?}', [App\Http\Controllers\Company\CompanyController::class, 'getCompany']);
    Route::post('/', [App\Http\Controllers\Company\CompanyController::class, 'addCompany']);
});

