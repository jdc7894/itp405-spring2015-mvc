<?php 
namespace App\Models;
use DB;

Class Dvd 
{
    public function search($term, $genre, $rating)
    {
        $query = DB::table('dvds')
            ->select('*', 'dvds.id as dvd_id')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id');
        
        if ($term)
        {
            $query->where('title', 'LIKE', '%' . $term .'%');
        }
        
        if ($genre != 0)
        {
            $query->where('genre_id', '=', $genre);
        }
        
        if ($rating != 0)
        {
            $query->where('rating_id', '=', $rating);
        }
        
        return $query->get();
    }

     public static function search_details()
    {
        $query = DB::table('dvds')
            ->select('*', 'dvds.id as dvd_id')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id');
        
        return $query;
    }
    
    public function getGenres()
    {
        $query = DB::table('genres');
        return $query->get();
    }
    
    public function getRatings()
    {
        $query = DB::table('ratings');
        return $query->get();
    }
    
    public function getGenreName($genre_id)
    {
        $query = DB::table('genres')
            ->where('id', '=', $genre_id)
            ->select('genre_name');
        return $query->first();
    }
    public function getRatingName($rating_id)
    {
        $query = DB::table('ratings')
            ->where('id', '=', $rating_id)
            ->select('rating_name');
        return $query->first();
    }
    
    public static function getDVD($id)
    {
        $query = DB::table('dvds')
            ->select('*', 'dvds.id as dvd_id')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id');
        $query
            ->where('dvds.id', '=', $id);
        return $query->first();  
    }
}