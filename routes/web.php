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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/links', 'LinksController@index')->name('links.index');
Route::get('/links/create', 'LinksController@create')->name('links.create');
Route::post('/links', 'LinksController@store')->name('links.store');

Route::get('/links/{link}/delete', 'LinksController@destroy')->name('links.delete');
Route::get('/{link}', 'LinksController@update')->name('links.update');
