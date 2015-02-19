<?php namespace App\Models; 

use DB; 
//Model 
class SongQuery {
	public function search($term)
	{
		return DB::table('songs')
		->join('artists', 'artists.id', '=', 'songs.artist_id')
		->join('genres', 'genres.id', '=', 'songs.genre_id')
		->where('title', 'LIKE', '%' . $term . '%')
		->orderBy('artist_name', 'asc')
		->get(); 
	}
}