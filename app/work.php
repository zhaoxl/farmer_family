<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model {

	protected $fillable = ['user_id','industry_id','sub_industry_id', 'industry_name', 'work_category_id', 'sub_work_category_id', 'work_category_name', 'price', 'people_number', 'start_at', 'end_at', 'province', 'city', 'street', 'area_name', 'address', 'title', 'content'];


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
				return '公司不存在';
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
}
