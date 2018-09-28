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
//Route::get('/tag/search', function () {
//    return 'Hello';
//});
Auth::routes();
Route::get('/tag/search', 'TagController@Search');

Route::get('/home', 'HomeController@test');

Route::resources([
    'question'=> 'QuestionController',
    'tag'=> 'TagController',

]);
Route::get('/tag/search', 'TagController@Search');
