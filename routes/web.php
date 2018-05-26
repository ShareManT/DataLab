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
Auth::routes();

// API
Route::get('/home', ['uses' => 'AppController@home', 'as' => 'home'])->middleware('auth');

// Post
Route::get('/post', ['uses' => 'PostController@index', 'as' => 'post.index']);
Route::get('/post/{id}', ['uses' => 'PostController@item', 'as' => 'post.item']);

// Project
Route::get('/project/{id}', ['uses' => 'ProjectController@item', 'as' => 'project.item'])->where(['id' => '[0-9]+']);
Route::get('/auth/{slug}', ['uses' => 'ProjectController@auth', 'as' => 'project.auth']);
Route::post('/auth/check/{slug}', ['uses' => 'ProjectController@authCheck', 'as' => 'project.auth.check']);
Route::get('/view/{slug}', ['uses' => 'ProjectController@viewIndex', 'as' => 'project.view']);
Route::get('/view/{slug}/main', ['uses' => 'ProjectController@viewMain', 'as' => 'project.view.main']);
Route::get('/project', ['uses' => 'ProjectController@index', 'as' => 'project.index']);

// App
Route::get('/', ['uses' => 'AppController@index', 'as' => 'index']);

// Page
Route::get('/{link}', ['uses' => 'PageController@item', 'as' => 'page.item']);


