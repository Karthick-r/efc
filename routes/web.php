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

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'admincheck'], function(){

Route::get('/home', [

    'uses' => 'HomeController@index'

]);
Route::get('/seeusers', [

    'uses' => 'HomeController@users'

]);
});


