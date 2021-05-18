<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->name('admin.')->group(function () {    
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
            
            Route::prefix('user')->name('user.')->group(function () {
                Route::get('/', 'Admin\UserController@index')->name('index');
                Route::post('/', 'Admin\UserController@store')->name('store');
                Route::put('/', 'Admin\UserController@update')->name('update');
                Route::delete('/{id}', 'Admin\UserController@delete')->name('delete');
            });
            Route::prefix('category')->name('category.')->group(function () {
                Route::get('/', 'Admin\CategoryController@index')->name('index');
                Route::post('/', 'Admin\CategoryController@store')->name('store');
                Route::put('/', 'Admin\CategoryController@update')->name('update');
                Route::delete('/{id}', 'Admin\CategoryController@delete')->name('delete');
            });
            Route::prefix('post')->name('post.')->group(function () {
                Route::get('/', 'Admin\PostController@index')->name('index');
                Route::get('/create', 'Admin\PostController@create')->name('create');
                Route::post('/', 'Admin\PostController@store')->name('store');
                Route::get('/edit/{id}', 'Admin\PostController@edit')->name('edit');
                Route::get('/detail/{id}', 'Admin\PostController@detail')->name('detail');
                Route::put('/', 'Admin\PostController@update')->name('update');
                Route::delete('/{id}', 'Admin\PostController@delete')->name('delete');
            });
            Route::prefix('event')->name('event.')->group(function () {
                Route::get('/', 'Admin\EventController@index')->name('index');
                Route::post('/', 'Admin\EventController@store')->name('store');
                Route::put('/', 'Admin\EventController@update')->name('update');
                Route::delete('/{id}', 'Admin\EventController@delete')->name('delete');
            });
            Route::prefix('photo')->name('photo.')->group(function () {
                Route::get('/', 'Admin\PhotoController@index')->name('index');
                Route::post('/', 'Admin\PhotoController@store')->name('store');
                Route::put('/', 'Admin\PhotoController@update')->name('update');
                Route::delete('/{id}', 'Admin\PhotoController@delete')->name('delete');
            });
            Route::prefix('video')->name('video.')->group(function () {
                Route::get('/', 'Admin\VideoController@index')->name('index');
                Route::get('/detail/{id}', 'Admin\VideoController@detail')->name('detail');
                Route::post('/', 'Admin\VideoController@store')->name('store');
                Route::put('/', 'Admin\VideoController@update')->name('update');
                Route::delete('/{id}', 'Admin\VideoController@delete')->name('delete');
            });
            Route::prefix('slider')->name('slider.')->group(function () {
                Route::get('/', 'Admin\SliderController@index')->name('index');
                Route::post('/', 'Admin\SliderController@store')->name('store');
                Route::put('/', 'Admin\SliderController@update')->name('update');
                Route::delete('/{id}', 'Admin\SliderController@delete')->name('delete');
            });
        });
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::group(['middleware' => 'pengguna'], function () {
            Route::get('/dashboard', 'User\DashboardController@index')->name('dashboard.index');
            Route::prefix('category')->name('category.')->group(function () {
                Route::get('/', 'Admin\CategoryController@index')->name('index');
            });
            Route::prefix('post')->name('post.')->group(function () {
                Route::get('/', 'Admin\PostController@index')->name('index');
                Route::get('/detail/{id}', 'Admin\PostController@detail')->name('detail');
            });
            Route::prefix('event')->name('event.')->group(function () {
                Route::get('/', 'Admin\EventController@index')->name('index');
            });
            Route::prefix('photo')->name('photo.')->group(function () {
                Route::get('/', 'Admin\PhotoController@index')->name('index');
            });
            Route::prefix('video')->name('video.')->group(function () {
                Route::get('/', 'Admin\VideoController@index')->name('index');
                Route::get('/detail/{id}', 'Admin\VideoController@detail')->name('detail');
            });
            Route::prefix('slider')->name('slider.')->group(function () {
                Route::get('/', 'Admin\SliderController@index')->name('index');
            });
        });
    });
});