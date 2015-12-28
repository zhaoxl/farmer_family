<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model {

	protected $fillable = ['up_id', 'industry_name', 'full_name', 'sort'];
	public $timestamps = false;

}
