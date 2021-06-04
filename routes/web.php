<?php

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
    return view('home');
});

Route::get('/articlesbdd', 'App\Http\Controllers\TaskController@index')->name("article_index");

Route::get('/showArticle/{id}', 'App\Http\Controllers\TaskController@show')->name("article_show");

Route::post('/storeArticle', 'App\Http\Controllers\TaskController@create')->name("article_create");

Route::post('/editArticle/{id}', 'App\Http\Controllers\TaskController@edit')->name("article_edit");

Route::post('/deleteArticle/{id}', 'App\Http\Controllers\TaskController@destroy')->name("article_delete");

