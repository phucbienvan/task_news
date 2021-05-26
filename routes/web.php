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


Route::get('admin/login', 'UserController@getLoginAdmin');
Route::post('admin/login', 'UserController@postLoginAdmin');
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
        Route::get('edit/{id}', 'NewsController@getEdit');
        Route::post('edit/{id}', 'NewsController@postEdit');
        Route::get('add', 'NewsController@getAdd');
        Route::post('add', 'NewsController@postAdd');
        Route::get('delete/{id}', 'NewsController@getDelete');

    });

    //  comment
    Route::group(['prefix'=>'comment'], function(){
//        Route::get('list', 'CommentController@getList');
        Route::get('delete/{id}/{news_id}', 'CommentController@getDelete');

    });

    // Slide
    Route::group(['prefix'=>'slide'], function(){
        Route::get('list', 'SlideController@getList');
        Route::get('edit/{id}', 'SlideController@getEdit');
        Route::post('edit/{id}', 'SlideController@postEdit');
        Route::get('add', 'SlideController@getAdd');
        Route::post('add', 'SlideController@postAdd');
        Route::get('delete/{id}', 'SlideController@getDelete');

    });

    // User
    Route::group(['prefix'=>'user'], function(){
        Route::get('list', 'UserController@getList');

        Route::get('edit/{id}', 'UserController@getEdit');
        Route::post('edit/{id}', 'UserController@postEdit');

        Route::get('add', 'UserController@getAdd');
        Route::post('add', 'UserController@postAdd');

        Route::get('delete/{id}', 'UserController@getDelete');


    });
});
