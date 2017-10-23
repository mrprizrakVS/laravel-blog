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
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', 'Auth\RegisterController@showRegistrationform')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');

});

Route::group(['middelware' => 'auth'], function(){
    Route::get('/logout', function(){
        \Auth::logout();
        return redirect(route('login'));
    })->name('logout');
    Route::get('/my/account', 'AccountController@index')->name('account');
    
    /*====POST====*/
    Route::get('/', "PostController@index")->name('posts');
    Route::get('/post/create', "PostController@create");
    Route::post('/post/create', "PostController@store");
    Route::get('/post/{id}', "PostController@show");
    Route::get('/post/edit/{id}', "PostController@edit");
    Route::patch('/post/edit/{id}', "PostController@update");
    
    /*====Categories====*/
    Route::get('/admin/categories', "Admin\CategoriesController@index")->name('categories');
    Route::get('/admin/categories/create', "Admin\CategoriesController@create")->name('cat_create');
    Route::post('/admin/categories/create', "Admin\CategoriesController@store");
    Route::get('/admin/categories/edit/{id}', "Admin\CategoriesController@edit")->name('editcat');
    Route::patch('/admin/categories/edit/{id}', "Admin\CategoriesController@update");


    Route::group(['middelware' => 'admin'], function(){
        Route::get('/admin', 'Admin\AccountController@index')->name('admin');
    });
    
});




