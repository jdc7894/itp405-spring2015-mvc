<?php namespace App\Http\Controllers; 

use DB;
use Illuminate\Http\Request;
use App\Models\Song; 
class SongController extends Controller {

	public function create() 
	{
		$artists = DB::table('artists')->get(); 
		$genres = DB::table('genres')->get(); 

		return view('songform', [
			'artists' => $artists,
			'genres' => $genres
		]);
	}

	public function storeSong(Request $request)
	{
		$validation = Song::validate($request->all());	// model
		if($validation->passes())
		{
			Song::create([
				'title' => $request->input('title'),
				'artist_id' => $request->input('artist_id'),
				'genre_id' => $request->input('genre_id'),
				'price' => $request->input('price')
			]);
			
			return redirect('/songs/new')->with('success', 'Song successfully saved');
		}
		else 
		{
			// redirect with error message
			return redirect('/songs/new')
				->withInput()
				->withErrors($validation); 
		}
	}
}