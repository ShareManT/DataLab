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
Route::get('/project', ['uses' => 'ProjectController@index', 'as' => 'project.index']);

// HTML5
Route::get('/auth/{slug}', ['uses' => 'Html5Controller@auth', 'as' => 'html5.auth']);
Route::get('/auth/share/{slug}/{code}', ['uses' => 'Html5Controller@authShare', 'as' => 'html5.auth.share']);
Route::post('/auth/check/{slug}', ['uses' => 'Html5Controller@authCheck', 'as' => 'html5.auth.check']);
Route::get('/view/{slug}', ['uses' => 'Html5Controller@viewIndex', 'as' => 'html5.view']);
Route::get('/view/{slug}/main', ['uses' => 'Html5Controller@viewMain', 'as' => 'html5.view.main']);
Route::get('/webView/', ['uses' => 'Html5Controller@webView', 'as' => 'html.webView']);


// App
Route::get('/', ['uses' => 'AppController@index', 'as' => 'index']);

// Page
Route::get('/{link}', ['uses' => 'PageController@item', 'as' => 'page.item']);


