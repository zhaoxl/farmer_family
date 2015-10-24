<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'category', 'mobile', 'qq', 'weixin', 'gender', 'age', 'hometown', 'idcard', 'expect_salary', 'area_code', 'area_name', 'public_mobile', 'public_qq', 'public_weixin', 'public_email', 'area_province'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	
	public function work_categories()
  {
		return $this->belongsToMany('App\WorkCategory', 'user_work_categories', 'user_id', 'work_category_id');
  }
	
	public function workCategoryNames()
	{
		$categories = $this->work_categories()->get(['name'])->all();
		$categories = array_map(function($x) { return $x['name'];}, array_values($categories));
		return implode(array_values($categories), "、");
	}
	
	public function categoryName()
	{
		switch($this->category)
		{
			case 0:
				return '找活方';
			break;
			case 1:
				return '企业';
			break;
			case 2:
				return '个人招工';
			break;
		}
	}

}
