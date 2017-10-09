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

Route::get('/', function(){
  return view('welcome');
});


Route::group(['middleware'=>'auth'], function(){
  Route::get('/register', ['uses'=>'UserController@register']);
  Route::post('/user/store', ['uses'=>'UserController@store']);  
  Route::get('/user/list', ['uses'=>'UserController@index']);
  Route::post('/user/edit', ['uses'=>'UserController@edit']);
  Route::post('/user/update', ['uses'=>'UserController@update']);
 
});

Auth::routes();
Route::get('/home', 'HomeController@index');
