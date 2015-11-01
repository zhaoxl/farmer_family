<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaCity extends Model {

	protected $fillable = ['code', 'name', 'provincecode', 'sort', 'is_hot'];
	
	public $timestamps = false;
	
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
	
	public function streets()
	{
		return $this->hasMany('App\AreaStreet', 'citycode', 'code')->orderBy('sort', 'ASC');
	}
	
	public static function byAreaProvinceCode($provincecode)
	{
		return AreaCity::where('provincecode', '=', $provincecode)->orderBy('is_hot', 'DESC')->orderBy('sort', 'ASC')->get();
	}
	
	public static function hotCities($limit=3, $exclude=null)
	{
		$cities = AreaCity::orderBy('is_hot', 'DESC')->orderBy('sort', 'ASC')->take($limit);
		$cities = is_null($exclude) ? $cities : $cities->where('code', '!=', $exclude);
		
		return $cities->get();
	}
	
	public function isHot(){
		return $this->getAttribute('is_hot') ? '<span style="color: red">是</span>' : '否';
	}
}
