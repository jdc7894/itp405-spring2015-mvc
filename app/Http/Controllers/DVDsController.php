<?php namespace App\Http\Controllers; 
//Controller  
use Illuminate\Http\Request; 
use DB;
use App\Models\Dvd;
use App\Models\Review;


class DVDsController extends Controller {
	public function search() 
	{
		$query = new Dvd();
		$genres = $query->getGenres();
		$ratings = $query->getRatings();
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
      		$rating = $query->getRatingsgName($request->input('rating_id'))->rating_name;
      	else $rating = 'All';
	    return view('result_dvd', [
			'dvds' => $dvds,
			'dvd_title' => $dvd_title,
			'rating_select' => $rating, 
			'genre_select' => $genre	    	
	    ]);
	}

	public function dvd_details($id)
	{
		 $dvd = Dvd::getDVD($id);

		 $reviews = Review::getReviewForDVD($id);
		 return view('dvd_details', [
		 		'dvd' => $dvd,
		 		'reviews' => $reviews
		 	]);
	}
	public function review(Request $request) 
	{
		$validation = Review::validate($request->all());
		
		if ($validation->passes())
		{
			Review::create([
			  'dvd_id'		=> $request->input('dvd_id'),
			  'rating'		=> $request->input('rating'),
			  'title'		=> $request->input('title'),
			  'description'	=> $request->input('description') 
			]);
			return redirect('/dvds/' . $request->input('dvd_id'))
				->with('success', 'Review was successfully saved.');
		}
		else   // invalid input
		{
			return redirect('/dvds/' . $request->input('dvd_id'))
				->withInput()
				->withErrors($validation);
		}
	}
}



