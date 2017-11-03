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
  Route::get('/select', ['uses'=>'UserController@select']);
  Route::get('/change-password', ['uses'=>'UserController@changepassword']);
  Route::post('/user/change-password', ['uses'=>'UserController@userChangePassword']);
  Route::post('/user/reset-password', ['uses'=>'UserController@resetUserPasswordGetUserDetails']);
  Route::post('/user/reset-password/post', ['uses'=>'UserController@resetUserPasswordPost']);
 
  Route::get('course/list', ['uses'=>'CourseController@index']);
  Route::post('course/store', ['uses'=>'CourseController@store']);
  Route::post('course/edit', ['uses'=>'CourseController@edit']);
  Route::post('course/update', ['uses'=>'CourseController@update']);
  Route::get('course/select', ['uses'=>'CourseController@select']);

  Route::get('subject/list', ['uses'=>'SubjectController@index']);
  Route::get('subject/select', ['uses'=>'SubjectController@select']);
  Route::post('subject/store', ['uses'=>'SubjectController@store']);
  Route::get('subject/edit', ['uses'=>'SubjectController@edit']);
  Route::post('subject/update', ['uses'=>'SubjectController@update']);

  Route::post('topic/list', ['uses'=>'SyllabusController@select']);
  Route::post('topic/store', ['uses'=>'SyllabusController@store']);
  Route::get('topic/edit', ['uses'=>'SyllabusController@edit']);
  Route::post('topic/update', ['uses'=>'SyllabusController@update']);
  Route::get('topic/delete', ['uses'=>'SyllabusController@destroy']);

  Route::get('ica-subject/list', ['uses'=>'IcaSubjectController@index']);
  Route::get('ica-subject/select', ['uses'=>'IcaSubjectController@select']);
  Route::post('ica-subject/store', ['uses'=>'IcaSubjectController@store']);
  Route::get('ica-subject/subjects/select', ['uses'=>'IcaSubjectController@subjectsSelect']);

  Route::get('lecturer/dashboard', ['uses'=>'IcaSubjectController@lecturerDashboard']);
  Route::get('lecturer/ica-subject/select', ['uses'=>'IcaSubjectController@lecturerIcaSubjSelect']);
  Route::get('lecturer/ica-subject/{id}', ['uses'=>'IcaSubjectController@lecturerIcaSubjSelect']);
});

Auth::routes();
Route::get('/home', 'HomeController@index');
