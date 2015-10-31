<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaProvince extends Model {

	public function cities()
	{
		return $this->hasMany('App\AreaCity', 'area_cities', 'provincecode')->orderBy('hot', 'DESC')->orderBy('sort', 'ASC');
	}
	
}
