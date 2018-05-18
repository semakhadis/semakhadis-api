<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'cors', 'prefix' => '/v1'], function () {
    // Route::get('/user')
    // Route::get('reference/{slug}', ['as'=>'reference.slug','uses'=>'ReferenceController@getReferenceBySlug']);
    Route::apiResource('hadith', 'HadithController');
    Route::apiResource('narrator', 'NarratorController');
    Route::apiResource('tag', 'TagController');
    Route::apiResource('reference', 'ReferenceController');
    Route::post('/login', 'UserController@authenticate');
    Route::post('/register', 'UserController@register');
    Route::get('/logout/{api_token}', 'UserController@logout');
});