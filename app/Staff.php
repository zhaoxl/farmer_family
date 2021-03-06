<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model {
  protected $table = 'staffs';
	protected $fillable = ['user_id', 'work_category_id', 'work_category_name', 'start_at', 'end_at', 'province', 'city', 'street', 'area_name', 'address', 'title', 'contacts', 'mobile'];
	

	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	
	public function workCategory()
	{
		return $this->belongsTo('\App\WorkCategory');
	}
	
	public function industry()
	{
		return $this->belongsTo('\App\Industry');
	}
	
	public function isTop(){
		return $this->getAttribute('is_top') ? '<span style="color: red">是</span>' : '否';
	}
	
	public function starCount()
	{
		return \App\StaffEvaluate::where('staff_id', '=', $this->id)->avg('star');
	}
	
	public function workCategoryName()
	{
		$category = $this->workCategory;
		if(!is_null($category))
		{
			return $category->name;
		}
	}
	
	public function industryName()
	{
		$industry_tmp = $this->industry;
		if(!is_null($industry_tmp))
		{
			return $industry_tmp->full_name;
		}
	}
	
	public function cityName()
	{
		$city = \App\AreaCity::where('code', '=', $this->city)->first();
		if(!is_null($city))
		{
			return $city->name;
		}
		return "北京市";
	}

}
