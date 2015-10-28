<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	protected $fillable = ['user_id', 'company_name', 'address', 'industry_id', 'industry_name', 'tel'];
	
	public $timestamps = false;

}
