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

Route::get('/', 'PagesController@home');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('category/{id}','PagesController@category')->name('category.customer');
Route::get('news/{id}','PagesController@news')->name('detail');
Route::get('/login-customer', 'PagesController@getLogin')->name('login.customer');
Route::post('/login-customer', 'PagesController@postLogin')->name('login.customer');
Route::get('/logout-customer', 'PagesController@getLogout')->name('logout.customer');

Route::post('comment/{newsId}','CommentController@postComment')->name('comment.customer');
Route::get('/customer/', 'PagesController@getCustomer')->name('edit.customer');    // chinh sua nguoi dung
Route::post('/customer/', 'PagesController@postCustomer')->name('edit.customer');  //chinh sua nguoi dung
Route::get('/register-customer', 'PagesController@getRegister')->name('register.customer');
Route::post('/register-customer', 'PagesController@postRegister')->name('register.customer');





Route::get('admin','UserController@getLoginAdmin');
Route::get('admin/login','UserController@getLoginAdmin')->name('admin.login');
Route::post('admin/login','UserController@postLoginAdmin');
Route::get('admin/logout','UserController@getLogoutAdmin');

//  Admin
Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function (){

    // Danh muc
    Route::group(['prefix'=>'category'], function(){
        Route::get('/', 'CategoryController@getList')->name('category.list');
        Route::get('list', 'CategoryController@getList')->name('category.list');
        Route::get('edit/{id}', 'CategoryController@getEdit')->name('category.edit');
        Route::post('edit/{id}', 'CategoryController@postEdit')->name('category.edit');
        Route::get('add', 'CategoryController@getAdd')->name('category.add');
        Route::post('add', 'CategoryController@postAdd')->name('category.add');
        Route::get('delete/{id}', 'CategoryController@getDelete')->name('category.delete');


    });

    // tin tuc
    Route::group(['prefix'=>'news'], function(){
        Route::get('list', 'NewsController@getList')->name('news.list');
        Route::get('edit/{id}', 'NewsController@getEdit')->name('news.edit');
        Route::post('edit/{id}', 'NewsController@postEdit')->name('news.edit');
        Route::get('add', 'NewsController@getAdd')->name('news.add');
        Route::post('add', 'NewsController@postAdd')->name('news.add');
        Route::get('delete/{id}', 'NewsController@getDelete')->name('news.delete');

    });

    //  comment
    Route::group(['prefix'=>'comment'], function(){
//        Route::get('list', 'CommentController@getList');
        Route::get('delete/{id}/{news_id}', 'CommentController@getDelete')->name('comment.delete');

    });

    // Slide
    Route::group(['prefix'=>'slide'], function(){
        Route::get('list', 'SlideController@getList')->name('slide.list');
        Route::get('edit/{id}', 'SlideController@getEdit')->name('slide.edit');
        Route::post('edit/{id}', 'SlideController@postEdit')->name('slide.edit');
        Route::get('add', 'SlideController@getAdd')->name('slide.add');
        Route::post('add', 'SlideController@postAdd')->name('slide.add');
        Route::get('delete/{id}', 'SlideController@getDelete')->name('slide.delete');

    });

    // User
    Route::group(['prefix'=>'user'], function(){
        Route::get('list', 'UserController@getList')->name('user.list');

        Route::get('edit/{id}', 'UserController@getEdit')->name('user.edit');
        Route::post('edit/{id}', 'UserController@postEdit')->name('user.edit');

        Route::get('add', 'UserController@getAdd')->name('user.add');
        Route::post('add', 'UserController@postAdd')->name('user.add');

        Route::get('delete/{id}', 'UserController@getDelete')->name('user.delete');


    });
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
