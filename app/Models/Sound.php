<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Sound extends Model
{
	public function dvds()
	{
		return $this->hasMany('\App\Models\Dvd');
	}
}