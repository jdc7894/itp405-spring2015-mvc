<?php

use App\Models\Dvd;
use App\Models\Artist; 
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::post('/dvds/insert', 'DVDsController@insert');
Route::get('/dvds/search', 'DVDsController@search');
Route::get('/genres/{genreName}/dvds', 'DvdsController@genre');
Route::get('/dvds/create','DVDsController@create');	
Route::get('/dvds/{id}', 'DVDsController@dvd_details');
Route::get('/dvds','DVDsController@results');	
Route::post('/reviews/new', 'DVDsController@review');
