<?php

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

// Route::group(['prefix' => 'auth'], function () {
//     Route::post('register', '\App\Http\Controllers\API\AuthController@register');
//     Route::post('login', '\App\Http\Controllers\API\AuthController@login')->name('login');

//     // Route::group(['middleware' => 'auth:api'], function () {
//     //     // Route::get('logout', 'AuthController@logout');
//     //     Route::get('user', '\App\Http\Controllers\API\AuthController@details');
//     // });
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group(function () {
    Route::get('/logout', '\App\Http\Controllers\API\AuthController@logout');
    // Route::get('user', '\App\Http\Controllers\API\AuthController@details');
    Route::apiResource('boards', '\App\Http\Controllers\API\BoardController');

    Route::apiResource('lists', '\App\Http\Controllers\API\ListController');
    Route::apiResource('tasks', '\App\Http\Controllers\API\TaskController');

    Route::get('getList', '\App\Http\Controllers\API\ListController@getByBoardId');
});

Route::post('/register', '\App\Http\Controllers\API\AuthController@register');
Route::post('/login', '\App\Http\Controllers\API\AuthController@login');
