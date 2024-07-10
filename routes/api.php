<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 |-------------------------------------------------------------------------------------------------------------------------------------------------
 |unauth endpoints
 |-------------------------------------------------------------------------------------------------------------------------------------------------
 */
Route::group([
    'prefix' => 'unauth'
],function(){
    Route::post('/login', [App\Http\Controllers\User\UserController::class, 'login']);

});


/**
 |-------------------------------------------------------------------------------------------------------------------------------------------------
 |auth endpoints with abilities
 |-------------------------------------------------------------------------------------------------------------------------------------------------
 |The `abilities` middleware may be assigned to a route to verify that the incoming request's token has all of the listed abilities:
 |The `ability` middleware may be assigned to a route to verify that the incoming request's token has at least one of the listed abilities:
 |- Users
 |- Company
 |- Article
 |-------------------------------------------------------------------------------------------------------------------------------------------------
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
    Route::post('/', [App\Http\Controllers\Company\CompanyController::class, 'addCompany']);
    Route::get('/', [App\Http\Controllers\Company\CompanyController::class, 'getCompanies']);
    Route::get('/{company_id?}', [App\Http\Controllers\Company\CompanyController::class, 'getCompany']);
});

Route::group([
    'prefix'        => 'article',
    'middleware'    => 'auth:sanctum',
    'ability'       => 'article:create,article:edit,'
], function(){
    Route::post('/', [App\Http\Controllers\Article\ArticleController::class, 'addArticle']);
    Route::patch('/{article_id?}', [App\Http\Controllers\Article\ArticleController::class, 'forEdit']);
    Route::patch('/{article_id?}/publish', [App\Http\Controllers\Article\ArticleController::class, 'publish']);
    Route::patch('/{article_id?}/save', [App\Http\Controllers\Article\ArticleController::class, 'save']);
});
