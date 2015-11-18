<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaProvince extends Model {

	protected $fillable = ['code', 'name', 'sort'];
	
	public $timestamps = false;
	
	//default scope
	public function newQuery($excludeDeleted = true) 
	{ 
		$query = parent::newQuery();
		if(!$this->dirty) 
		{ 
			$query->whereIn('code', array(110000)); 
		} 
		return $query; 
	}
	
	public function cities()
	{
		return $this->hasMany('App\AreaCity', 'area_cities', 'provincecode')->orderBy('is_hot', 'DESC')->orderBy('sort', 'ASC');
	}
	
}
