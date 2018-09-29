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

//https://www.getpostman.com/collections/a71398165f123a0645ac

Auth::routes();

Route::group(['middleware' => 'web'], function () {

    Route::auth();


    Route::get('/tag/search', 'TagController@Search');

    Route::get('/question/search', 'QuestionController@Search');
    Route::get('/question/search', 'QuestionController@Search');
    Route::get('/question/getUserQuestion', 'QuestionController@userQuestion');


    Route::resources([
        'question'=> 'QuestionController',
        'tag'=> 'TagController',

    ]);
});