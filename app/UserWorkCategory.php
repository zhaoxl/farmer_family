<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkCategory extends Model {

	protected $table = 'user_work_categories';
	protected $fillable = ['user_id', 'work_category_id'];
	public $timestamps = false;

}
