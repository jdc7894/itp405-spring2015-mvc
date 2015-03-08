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
Route::get('instagram/{tag?}', function($tag = 'catsofinstagram') 
{
	if(Cache::has("instagram-$tag")) {
		$jsonString = Cache::get("instagram-$tag");	// get from cache
	} else {		// make api call
		$url = "https://api.instagram.com/v1/tags/$tag/media/recent?client_id=18d3e66a27794277be584c98feaa8b8c";
		$jsonString = file_get_contents($url);		// get request
		Cache::put("instagram-$tag", $jsonString, 10); 
	}

	$instagramData = json_decode($jsonString);
	return view('instagram', [
		'instagrams' => $instagramData->data
	]);
});

Route::get('api/v1/artists',function() 
{
	return Artist::all();
});

Route::get('api/v1/artists/{id}',function($id) 
{
	$artist = Artist::find($id);
	if(!$artist) {
		return Response::json([
			'message' => 'Artist not found'
		], 404);
	}
	return $artist;
});

Route::delete('api/v1/artists/{id}',function($id) 
{
	$artist = Artist::find($id);
	$artist->delete(); 
	return $artist; 

});

Route::get('token', function() {
	echo csrf_token();
});

Route::post('api/v1/artists',function($id) 
{
	$artist = new Artist();
	$artist->artist_name = Request::input('artist_name'); 
	$artist->save(); 
	return $artist; 
});

/* Update */
Route::put('api/v1/artists/{id}', function($id) 
{
	$artist = Artist::find($id);
	if(!$artist) {
		return Response::json([
			'message' => 'Artist not found'
		], 404);
	}
	$artist->artist_name = Request::input('artist_name'); 
	$artist->save(); 
	return $artist; 
});

Route::post('/dvds/insert', 'DVDsController@insert');
Route::get('/dvds/search', 'DVDsController@search');
Route::get('/genres/{genreName}/dvds', 'DvdsController@genre');
Route::get('/dvds/create','DVDsController@create');	
Route::get('/dvds/{id}', 'DVDsController@dvd_details');
Route::get('/dvds','DVDsController@results');	
Route::post('/reviews/new', 'DVDsController@review');
