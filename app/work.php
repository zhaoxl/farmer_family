<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model {

	protected $fillable = ['user_id','industry_id','sub_industry_id', 'industry_name', 'work_category_id', 'sub_work_category_id', 'work_category_name', 'price', 'people_number', 'start_at', 'end_at', 'province', 'city', 'street', 'area_name', 'address', 'title', 'content'];


	public function user()
	{
		return $this->belongsTo('\App\User');
	}
}
