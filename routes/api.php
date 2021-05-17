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

// posts
Route::get('/post', 'Api\PostController@index');
Route::get('/post/{slug?}', 'Api\PostController@show');
Route::get('/event', 'Api\EventController@index');
Route::get('/event/{slug?}', 'Api\EventController@show');
Route::get('/slider', 'Api\SliderController@index');
Route::get('/category', 'Api\CategoryController@index');
Route::get('/category/{slug?}', 'Api\CategoryController@show');
Route::get('/photo', 'Api\PhotoController@index');
Route::get('/video', 'Api\VideoController@index');
