<?php namespace App\Http\Controllers; 
//Controller  
use Illuminate\Http\Request; 
use DB;
use App\Models\SongQuery;

class SongsController extends Controller {
	public function search() 
	{
		return view('search');
	}

	public function results(Request $request) 
	{
		if (!$request->input('song_title')) {
			return redirect('/songs/search');
		}
		$query = new SongQuery(); 
		$songs = $query->search($request->input('song_title')); 

		return view('results',[
			'song_title' => $request->input('song_title'),
			'songs' => $songs
		]);
	}
}



