<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model {
  protected $table = 'staffs';
	protected $fillable = ['user_id', 'work_category_id', 'work_category_name', 'start_at', 'end_at', 'province', 'city', 'street', 'area_name', 'address', 'title', 'contacts', 'mobile'];
	

	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	
	public function isTop(){
		return $this->getAttribute('is_top') ? '<span style="color: red">是</span>' : '否';
	}
	
	public function starCount()
	{
		return \App\StaffEvaluate::where('staff_id', '=', $this->id)->avg('star');
	}

}
