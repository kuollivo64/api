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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($route){
    Route::post('register', 'App\Http\Controllers\UserController@register');
    Route::post('login', 'App\Http\Controllers\UserController@login');
    Route::post('logout', 'App\Http\Controllers\UserController@logout');
});

Route::group(['middleware' => ['jwt.verify']], function(){
    /**
     * TABLA CLIENTES
     */
    Route::get('/clients', 'App\Http\Controllers\ClientController@index');
    Route::post('/clients', 'App\Http\Controllers\ClientController@store');
    Route::put('/clients/{client}', 'App\Http\Controllers\ClientController@update');
    Route::get('/clients/{client}', 'App\Http\Controllers\ClientController@show');
    Route::delete('/clients/{client}', 'App\Http\Controllers\ClientController@destroy');
    /**
     * TABLA SERVICIOS
     */
    Route::get('/services', 'App\Http\Controllers\ServiceController@index');
    Route::post('/services', 'App\Http\Controllers\ServiceController@store');
    Route::put('/services/{service}', 'App\Http\Controllers\ServiceController@update');
    Route::get('/services/{service}', 'App\Http\Controllers\ServiceController@show');
    Route::delete('/services/{service}', 'App\Http\Controllers\ServiceController@destroy');
});
