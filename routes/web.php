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

Route::get('/', 'HomeController@index');

Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/{slug}', 'ProjectsController@details')->name('project.details');

Route::get('/media', 'MediaController@index');
Route::get('/media/{slug}', 'MediaController@post');

Route::get('/awards', 'AwardsController@index');

Route::get ('/{page}/', 'PagesController@page');
