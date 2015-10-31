<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaCity extends Model {
	
	//default scope
	public function newQuery($excludeDeleted = true) 
	{ 
		$query = parent::newQuery();
		if(!$this->dirty) 
		{ 
			$query->whereIn('provincecode', array(110000, 370000)); 
		} 
		return $query; 
	}
	
	public static function byAreaProvinceCode($provincecode)
	{
		return AreaCity::where('provincecode', '=', $provincecode)->orderBy('hot', 'DESC')->orderBy('sort', 'ASC')->get();
	}
	
	public static function hotCities($limit=3, $exclude=null)
	{
		$cities = AreaCity::orderBy('hot', 'DESC')->orderBy('sort', 'ASC')->take($limit);
		$cities = is_null($exclude) ? $cities : $cities->where('code', '!=', $exclude);
		
		return $cities->get();
	}
}
