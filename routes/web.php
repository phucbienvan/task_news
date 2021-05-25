<?php

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
    return view('admin.category.list');
});

//  Admin
Route::group(['prefix'=>'admin'], function (){

    // Danh muc
    Route::group(['prefix'=>'category'], function(){
        Route::get('/', 'CategoryController@getList');
        Route::get('list', 'CategoryController@getList');
        Route::get('edit/{id}', 'CategoryController@getEdit');
        Route::post('edit/{id}', 'CategoryController@postEdit');
        Route::get('add', 'CategoryController@getAdd');
        Route::post('add', 'CategoryController@postAdd');
        Route::get('delete/{id}', 'CategoryController@getDelete');


    });

    // tin tuc
    Route::group(['prefix'=>'news'], function(){
        Route::get('list', 'NewsController@getList');
        Route::get('edit', 'NewsController@getEdit');
        Route::get('add', 'NewsController@getAdd');
        Route::post('add', 'NewsController@postAdd');
        Route::get('delete/{id}', 'NewsController@getDelete');

    });

    // Slide
    Route::group(['prefix'=>'slide'], function(){
        Route::get('list', 'SlideController@getList');
        Route::get('edit', 'SlideController@getEdit');
        Route::get('add', 'SlideController@getAdd');

    });

    // User
    Route::group(['prefix'=>'user'], function(){
        Route::get('list', 'UserController@getList');
        Route::get('edit', 'UserController@getEdit');
        Route::get('add', 'UserController@getAdd');

    });
});
