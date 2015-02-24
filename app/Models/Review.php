<?php
namespace App\Models;
use DB;
use Validator;
class Review
{
	public static function validate($input)
	{
		return \Validator::make($input, [
		'dvd_id' => 'required|integer',
		'rating' => 'required|integer|min:1|max:10',
		'title' => 'required|min:5',
		'description' => 'required|min:20'
		]);
	}

	public static function getReviewForDVD($id)
	{
		$query = DB::table('reviews')
			->where('dvd_id', '=', $id);
		return $query->get();
	}
	
	public static function create($data)
	{
		DB::table('reviews')->insert($data);
	}
}