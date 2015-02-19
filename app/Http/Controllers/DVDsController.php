<?php namespace App\Http\Controllers; 
//Controller  
use Illuminate\Http\Request; 
use DB;
use App\Models\Dvd;


class DVDsController extends Controller {
	public function search() 
	{
		$query = new Dvd();
		$genres = $query->getAllGenres();
		$ratings = $query->getAllRatings();
        return view('search', [
        	'genres' => $genres,
        	'ratings' => $ratings
        ]);
    }

	public function results(Request $request) 
	{ 
		$query = new Dvd(); 
	    $dvds = $query->search($request->input('dvd_title'), $request->input('genre_id'), $request->input('rating_id'));		// get user input
	    $dvd_title = $request->input('dvd_title');
	    if ($request->input('genre_id') != 0)
            $genre = $query->getGenreName($request->input('genre_id'))->genre_name;
        else $genre = 'All';

      	if ($request->input('rating_id') != 0)
      		$rating = $query->getRatingName($request->input('rating_id'))->rating_name;
      	else $rating = 'All';
	    return view('result_dvd', [
			'dvds' => $dvds,
			'dvd_title' => $dvd_title,
			'rating_select' => $rating, 
			'genre_select' => $genre	    	
	    ]);
	}
}



