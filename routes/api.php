<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::get('categories','CategoryController@index');
    Route::get('categories/random/{count}','CategoryController@random');
    Route::get('books/top/{count}','BookController@top');
    Route::get('books', 'BookController@index');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'AuthController@logout');
    });

    Route::get('book/{id}', 'BookController@view')->where('id', '[0-9]+');
});