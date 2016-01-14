<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model {

	protected $fillable = ['user_id','industry_id','sub_industry_id', 'industry_name', 'work_category_id', 'sub_work_category_id', 'work_category_name', 'price', 'people_number', 'start_at', 'end_at', 'province', 'city', 'street', 'area_name', 'address', 'title', 'content', 'contacts', 'mobile', 'gender', 'age_start', 'age_end', 'work_experience'];

	
	public function workCategory()
	{
		return $this->belongsTo('\App\WorkCategory');
	}
	
	public function industry()
	{
		return $this->belongsTo('\App\Industry');
	}
	
	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	
	public function company()
	{
		return $this->hasOne('\App\Company', 'user_id', 'user_id');
	}
	
	public function companyName()
	{
		$user = $this->user;
		if(is_null($user))
		{
			return '用户不存在';
		}
		if($user->category == 1)
		{
			$company = $this->company;
			if(is_null($company))
			{
				return '';
			}
			return $company->company_name;
		}
		else
		{
			return $user->name;
		}
	}
	
	public function isTop(){
		return $this->getAttribute('is_top') ? '<span style="color: red">是</span>' : '否';
	}
	
	public function starCount()
	{
		return \App\WorkEvaluate::where('work_id', '=', $this->id)->avg('star');
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
