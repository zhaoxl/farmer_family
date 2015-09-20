<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model {

	protected $fillable = ['user_id', 'work_category_id', 'work_category_name', 'start_at', 'end_at', 'province', 'city', 'street', 'area_name', 'address'];

}
